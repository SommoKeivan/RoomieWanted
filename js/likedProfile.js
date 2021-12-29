$(document).ready(function () {

    $(".heartLike").each(function(){
        let heartIcon = $(this).find(".fa-heart").first();
        let state = heartIcon.attr("data-state");
        if(state == "on"){
            this.style.color = "rgb(255,0,0)";
            heartIcon.attr("data-state", "off");
        }else{
            this.style.color = "rgb(38,38,38)";
            heartIcon.attr("data-state", "on");
        }
    });

    $(".heartLike").click(function(){
        let heartIcon = $(this).find(".fa-heart").first();
        let state = heartIcon.attr("data-state");
        let parent = $(this).parents(".profile").first();
        let liked_userId= parent.attr("data-profileid");
        if(state == "on"){
            updateLikeState("off", liked_userId);
            this.style.color = "rgb(38,38,38)";
            heartIcon.attr("data-state", "off");
        }else{
            updateLikeState("on", liked_userId);
            this.style.color = "rgb(255,0,0)";
            heartIcon.attr("data-state", "on");
        } 
        location.reload(); 
    });
});

function updateLikeState(state, liked_userId){
    const params = "state=" + state + "&profileID=" + liked_userId;
    fun = function(xhttp) {
        console.log(xhttp);
        return !(xhttp === "error")
    }
    return loadDocPostSync("like_unlike_profile.php", fun, params);
}