<?php

class DatabaseHelper {
    private $db;

    public function __construct($servername, $username, $password, $dbname) {
        $this->db = new mysqli($servername, $username, $password, $dbname);
        if ($this->db->connect_error) {
            throw new Exception("Database connection failed: " . $this->db->connect_error);
        }
    }

    public function checkCredentials($username, $password) {
        $stmt = $this->db->prepare("SELECT password FROM user WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 0) {
            return null; // User not found
        }

        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            return "yes"; // Credentials are valid
        }
        return null; // Invalid credentials
    }

    public function getUsersFromResearch($keyword){
        $stmt = $this->db->prepare("SELECT * FROM user u WHERE state = 'looking'");
        // $stmt->bind_param("s", $keyword);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getTagsFromUser($userID){
        $stmt = $this->db->prepare("SELECT t.name FROM tag t 
        INNER JOIN user_tag ut ON t.ID = ut.tagID
        WHERE ut.userID = ?");
        $stmt->bind_param("i", $userID);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getProfileById($userID){
        $stmt = $this->db->prepare("SELECT * FROM user 
        WHERE userID = ?");
        $stmt->bind_param("i", $userID);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_array(MYSQLI_ASSOC);
    }

    public function getCountryById($userID){
        $stmt = $this->db->prepare("SELECT country_name FROM user u 
        INNER JOIN countries c ON u.countryID = c.id
        WHERE userID = ?");
        $stmt->bind_param("i", $userID);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_array(MYSQLI_ASSOC);
    }

    public function getLanguagesById($userID){
        $stmt = $this->db->prepare("SELECT l.name FROM user_language ul 
        INNER JOIN  languages l ON ul.languageID = l.ID
        WHERE userID = ?");
        $stmt->bind_param("i", $userID);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getNeighborhoodsById($userID){
        $stmt = $this->db->prepare("SELECT n.name FROM user_neighborhood un 
        INNER JOIN  neighborhood n ON un.neighborhoodID = n .ID
        WHERE userID = ?");
        $stmt->bind_param("i", $userID);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getPhotosById($userID){
        $stmt = $this->db->prepare("SELECT up.name FROM user_pic up
        WHERE userID = ?
        ORDER BY up.date DESC");
        $stmt->bind_param("i", $userID);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getTopNPhotosById($userID, $n){
        $stmt = $this->db->prepare("SELECT up.name FROM user_pic up
        WHERE userID = ?
        ORDER BY up.date DESC
        LIMIT ?");
        $stmt->bind_param("ii", $userID, $n);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getIDFromUsername($username){
        $stmt = $this->db->prepare("SELECT userID FROM user
        WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_array(MYSQLI_ASSOC);
    }

    public function getUsernameById($userID){
        $stmt = $this->db->prepare("SELECT username FROM user
        WHERE userID = ?");
        $stmt->bind_param("i", $userID);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_array(MYSQLI_ASSOC);
    }


    /* ---------------- Chat System ----------------- */

    public function getUsersWithOpenChats($userID) {
        $stmt =  $this->db->prepare("(SELECT recipientID as userID FROM chat_message 
        WHERE senderID = ? GROUP BY recipientID) 
        UNION
        (SELECT senderID as userID FROM chat_message 
        WHERE recipientID = ? AND senderID NOT IN 
        (SELECT recipientID FROM chat_message WHERE senderID = ? GROUP BY recipientID) 
        GROUP BY senderID);");
        $stmt->bind_param("iii", $userID, $userID, $userID);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    
    public function getLastMessageById($userID, $profileID) {
        $stmt =  $this->db->prepare("SELECT * FROM chat_message 
        WHERE (senderID = ? AND recipientID = ?) 
        OR (senderID = ? AND recipientID = ?) ORDER BY date DESC
        LIMIT 1");
        $stmt->bind_param("iiii", $userID, $profileID, $profileID, $userID);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_array(MYSQLI_ASSOC);
    }

    public function getChatMessages($userID, $profileID) {
        $stmt =  $this->db->prepare("SELECT * FROM chat_message 
        WHERE (senderID = ? AND recipientID = ?) 
        OR (senderID = ? AND recipientID = ?) ORDER BY date ASC");
        $stmt->bind_param("iiii", $userID, $profileID, $profileID, $userID);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function newMessage($userID, $profileID, $text) {
        $date = (new DateTime())->format('Y-m-d H:i:s');
        $stmt = $this->db->prepare("INSERT INTO chat_message(senderID, recipientID, text, date) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("iiss", $userID, $profileID, $text, $date);
        if (!$stmt->execute()) {
            throw new Exception("Error inserting message: " . $stmt->error);
        }
    }

    /* ---------------- Reviw system ----------------- */

    public function getReview($userID, $profileID) {
        $stmt =  $this->db->prepare("SELECT * FROM review 
        WHERE userID = ? AND senderID = ?");
        $stmt->bind_param("ii", $profileID, $userID);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_array(MYSQLI_ASSOC);
    }

    public function getLastReviewById($userID) {
        $stmt =  $this->db->prepare("SELECT * FROM review 
        WHERE userID = ?
        ORDER BY date DESC 
        LIMIT 1");
        $stmt->bind_param("i", $userID);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_array(MYSQLI_ASSOC);
    }

    public function getReviewsById($userID) {
        $stmt =  $this->db->prepare("SELECT * FROM review 
        WHERE userID = ?
        ORDER BY date DESC");
        $stmt->bind_param("i", $userID);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function newReview($userID, $profileID, $text, $score) {
        $stmt = $this->db->prepare("INSERT INTO review(userID, senderID, text, score, date) 
        VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("iisis", $profileID, $userID, $text, $score, date("Y-m-d"));
        $stmt->execute();
    }

    public function updateReview($userID, $profileID, $text, $score) {
        $stmt = $this->db->prepare("UPDATE review
        SET text = ?, score = ?, date = ? 
        WHERE userID = ? AND senderID = ?");
        $stmt->bind_param("sisii", $text, $score, date("Y-m-d"), $profileID, $userID);
        $stmt->execute();
    }

    public function checkReview($userID, $profileID) {
        $stmt =  $this->db->prepare("SELECT * FROM review 
        WHERE userID = ? AND senderID = ?");
        $stmt->bind_param("ii", $profileID, $userID);
        $stmt->execute();
        $result = $stmt->get_result();
        return ($result->num_rows != 0);
    }

    public function isReviewed($ID) {
        $stmt =  $this->db->prepare("SELECT * FROM review 
        WHERE userID = ?");
        $stmt->bind_param("i", $ID);
        $stmt->execute();
        $result = $stmt->get_result();
        return ($result->num_rows != 0);
    }

    /* ---------------- Liked Profiles ----------------- */
    
    public function getLikedProfiles($userID) {
        $stmt = $this->db->prepare("SELECT u.* FROM user_liked ul 
        INNER JOIN user u ON u.userID = ul.liked_userID 
        WHERE ul.userID = ?");
        $stmt->bind_param("i", $userID);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    
    public function isLiked($likedID, $userID) {
        $stmt = $this->db->prepare("SELECT * FROM user_liked
        WHERE liked_userID = ? AND userID = ?");
        $stmt->bind_param("ii", $likedID, $userID);
        $stmt->execute();
        return empty($stmt->get_result()->fetch_all(MYSQLI_ASSOC)) ? false : true;
    }

    public function likeProfile($likedID, $userID) {
        $stmt = $this->db->prepare("INSERT INTO user_liked(userID, liked_userID) VALUES (?,?)");
        $stmt->bind_param("ii", $userID, $likedID);
        $stmt->execute();
    }
    
    public function unlikeProfile($likedID, $userID) {
        $stmt = $this->db->prepare("DELETE FROM user_liked WHERE userID = ? AND liked_userID = ?");
        $stmt->bind_param("ii", $userID, $likedID);
        $stmt->execute();
    }
}
?>