$(document).ready(function () {
    $("form").submit(function(e){
        e.preventDefault();
        const text = $("textarea#textArea");
        if(text.val() != ""){
            let parent = $(this).parents(".profile").first();
            let profileID= parent.attr("data-profileid");
            let alreadyRev = parent.attr("data-alreadyRev");
            const score = $("input#scoreRange");
            sendReview(text, score, profileID, alreadyRev);
            location.reload(); 
        }
    });
});

function sendReview(text, score, profileID, alreadyRev){
    const params = "text=" + text.val() + "&score=" + score.val() + "&profileID=" + profileID + "&alreadyRev=" + alreadyRev;
    fun = function(xhttp) {
        console.log(xhttp);
        return !(xhttp === "error")
    }
    return loadDocPostSync("sendReview.php", fun, params);
}