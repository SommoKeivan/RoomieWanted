$(document).ready(function () {
    $("form").submit(function(e){
        e.preventDefault();
        const text = $("input#messageText");
        if(text.val() != ""){
            let parent = $(this).parents(".profile").first();
            let profileID= parent.attr("data-profileid");
            sendChatMessage(text, profileID);
            location.reload(); 
        }
    });
});

function sendChatMessage(text, profileID){
    const params = "text=" + text.val() + "&profileID=" + profileID;
    fun = function(xhttp) {
        console.log(xhttp);
        return !(xhttp === "error")
    }
    return loadDocPostSync("sendMessage.php", fun, params);
}