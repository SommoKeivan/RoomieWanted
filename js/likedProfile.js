$(document).ready(function () {

    // Initialize the heart icon state for each element with the class 'heartLike'
    $(".heartLike").each(function() {
        let heartIcon = $(this).find(".fa-heart").first(); // Get the first heart icon
        let state = heartIcon.attr("data-state"); // Get the current state of the heart icon

        // Set the initial color based on the state
        if (state === "on") {
            this.style.color = "rgb(255,0,0)"; // Set color to red if liked
            heartIcon.attr("data-state", "off"); // Update the state to 'off'
        } else {
            this.style.color = "rgb(38,38,38)"; // Set color to gray if not liked
            heartIcon.attr("data-state", "on"); // Update the state to 'on'
        }
    });

    // Click event handler for the heart icons
    $(".heartLike").click(function() {
        let heartIcon = $(this).find(".fa-heart").first(); // Get the first heart icon
        let state = heartIcon.attr("data-state"); // Get the current state of the heart icon
        let parent = $(this).parents(".profile").first(); // Find the closest parent with class 'profile'
        let liked_userId = parent.attr("data-profileid"); // Get the profile ID from the parent element

        // Toggle the like state and update the color
        if (state === "on") {
            updateLikeState("off", liked_userId); // Update the like state to 'off'
            this.style.color = "rgb(38,38,38)"; // Set color to gray
            heartIcon.attr("data-state", "off"); // Update the state to 'off'
        } else {
            updateLikeState("on", liked_userId); // Update the like state to 'on'
            this.style.color = "rgb(255,0,0)"; // Set color to red
            heartIcon.attr("data-state", "on"); // Update the state to 'on'
        } 

        // Reload the page to reflect the updated state
        location.reload(); 
    });
});

/**
 * Updates the like state for a specific profile.
 * 
 * @param {string} state - The new like state ('on' or 'off').
 * @param {string} liked_userId - The ID of the profile being liked or unliked.
 * @returns {boolean} - Indicates whether the operation was successful.
 */
function updateLikeState(state, liked_userId) {
    const params = "state=" + state + "&profileID=" + liked_userId; // Prepare parameters for the request

    // Callback function to handle the response
    const fun = function(xhttp) {
        console.log(xhttp); // Log the response
        return !(xhttp === "error"); // Return true if the response is not an error
    }

    // Send the synchronous request to update the like state
    return loadDocPostSync("like_unlike_profile.php", fun, params);
}
