<?php 
$profile = $templateParams["profile"];
$messages = $dbh->getChatMessages($_SESSION["userID"], $profile["userID"]);
?>

<div class="profile" data-profileid="<?php echo htmlspecialchars($profile["userID"]); ?>">
    <div class="row p-3 profileChat">
        <div class="col-2" onclick="location.href = './profile.php?id=<?php echo htmlspecialchars($profile['userID']); ?>'">
            <img src="<?php echo htmlspecialchars(PROPIC_DIR . $profile["profile_pic"]); ?>" class="img-fluid rounded-circle" alt="Profile image">
        </div>
        <div class="col-8" onclick="location.href = './profile.php?id=<?php echo htmlspecialchars($profile['userID']); ?>'">
            <h3><?php echo htmlspecialchars($profile["name"]) . ' ' . htmlspecialchars($profile["surname"]); ?></h3>
        </div>
        <div class="col-2 alignCenter heartLike">
            <?php $state = ($dbh->isLiked($profile["userID"], $_SESSION['userID']) ? "on" : "off"); ?>
            <em data-state="<?php echo htmlspecialchars($state); ?>" 
                 class="<?php echo htmlspecialchars($state == "on" ? "fas " : "far "); ?>fa-heart" 
                 aria-hidden="true" 
                 title="Interested button" 
                 style="cursor:pointer"
                 onclick="toggleLike(<?php echo htmlspecialchars($profile['userID']); ?>)"></em>
        </div>
    </div>

    <div class="messagesChat">
        <?php foreach ($messages as $message): ?> 
            <?php $date = DateTime::createFromFormat('Y-m-d H:i:s', $message["date"]); ?>
            <div class="profile <?php echo $message["senderID"] == $_SESSION["userID"] ? 'pl-3 pr-3 pt-1 mb-1 ml-5 mr-2' : 'pl-3 pr-3 pt-1 mb-1 mr-5'; ?> bg-light border border-dark rounded">
                <span class="chatText"><?php echo htmlspecialchars($message["text"]); ?></span>  
                <div class="chatText text-muted font-weight-light text-right">
                    <?php echo $date->format("H:i") . str_repeat('&nbsp;', 3) . $date->format("Y-m-d"); 
                    if ($message["senderID"] == $_SESSION["userID"]): ?>
                        <?php echo str_repeat('&nbsp;', 1); ?><i class="fas fa-check-double"></i>
                    <?php endif; ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div> 

    <form class="row newMessagesChat" id="newMessageForm">
        <div class="col-10 form-group">
            <input id="messageText" class="form-control" placeholder="Message..." required autofocus>
        </div>
        <div class="col-2">
            <button id="sendMessage" type="submit" class="btn" aria-label="Send message">
                <i class="fas fa-location-arrow" aria-hidden="true" title="send message"></i>
            </button> 
        </div>        
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function(){
    $('#newMessageForm').on('submit', function(e) {
        e.preventDefault(); // Prevent the default form submission
        
        var messageText = $('#messageText').val();
        var profileID = $('.profile').data('profileid'); // Get the profile ID
        
        $.ajax({
            type: "POST",
            url: "send_message.php", // Change to your PHP script for sending messages
            data: { text: messageText, recipientID: profileID },
            success: function(response) {
                $('#messageText').val(''); // Clear the input field
                $('.messagesChat').append(response); // Append the new message to chat (response should be the new message HTML)
            },
            error: function() {
                alert('Message could not be sent. Please try again.'); // Error handling
            }
        });
    });
});

function toggleLike(profileID) {
    var currentState = $('[data-state]').data('state');
    var newState = currentState === "on" ? "off" : "on";

    $.ajax({
        type: "POST",
        url: "like_profile.php", // Change to your PHP script for liking/unliking profiles
        data: { profileID: profileID, state: newState },
        success: function() {
            $('[data-state]').data('state', newState);
            $('[data-state]').removeClass(newState === "on" ? "far" : "fas").addClass(newState === "on" ? "fas" : "far");
        },
        error: function() {
            alert('Could not change like state. Please try again.');
        }
    });
}
</script>
