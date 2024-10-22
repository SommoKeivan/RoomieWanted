$(document).ready(function () {
    // Handle the form submission event
    $("form").submit(function(e) {
        e.preventDefault(); // Prevent the default form submission behavior

        const text = $("textarea#textArea"); // Get the textarea for the review text
        
        // Check if the review text is not empty
        if (text.val() != "") {
            // Get the parent profile element
            let parent = $(this).parents(".profile").first();
            // Retrieve the profile ID from the data attribute
            let profileID = parent.attr("data-profileid");
            // Retrieve the alreadyRev status from the data attribute
            let alreadyRev = parent.attr("data-alreadyRev");
            // Get the score from the input range
            const score = $("input#scoreRange");
            
            // Send the review details
            sendReview(text, score, profileID, alreadyRev);
            location.reload(); // Reload the page to reflect the new review
        }
    });
});

/**
 * Sends a review to the specified profile.
 *
 * @param {jQuery} text - The jQuery object for the review text area.
 * @param {jQuery} score - The jQuery object for the score input.
 * @param {string} profileID - The ID of the profile to send the review to.
 * @param {string} alreadyRev - The status indicating if a review has already been submitted.
 * @returns {boolean} - Indicates whether the review was sent successfully.
 */
function sendReview(text, score, profileID, alreadyRev) {
    // Prepare parameters for the AJAX request
    const params = "text=" + encodeURIComponent(text.val()) + 
                   "&score=" + encodeURIComponent(score.val()) + 
                   "&profileID=" + encodeURIComponent(profileID) + 
                   "&alreadyRev=" + encodeURIComponent(alreadyRev);

    // Callback function to handle the AJAX response
    const fun = function(xhttp) {
        console.log(xhttp); // Log the response for debugging purposes
        return !(xhttp === "error"); // Return false if there was an error
    };

    // Send the synchronous request to send the review
    return loadDocPostSync("sendReview.php", fun, params);
}
