$(document).ready(function () {
    // Handle the form submission event
    $("form").submit(function(e) {
        e.preventDefault(); // Prevent the default form submission behavior

        const text = $("input#messageText"); // Get the input field for the chat message

        // Check if the message text is not empty
        if (text.val() != "") {
            // Get the parent profile element
            let parent = $(this).parents(".profile").first();
            // Retrieve the profile ID from the data attribute
            let profileID = parent.attr("data-profileid");

            // Send the chat message
            sendChatMessage(text, profileID);
            location.reload(); // Reload the page to reflect the new message
        }
    });
});

/**
 * Sends a chat message to the specified profile.
 *
 * @param {jQuery} text - The jQuery object for the message text input field.
 * @param {string} profileID - The ID of the profile to send the message to.
 * @returns {boolean} - Indicates whether the message was sent successfully.
 */
function sendChatMessage(text, profileID) {
    // Prepare parameters for the AJAX request
    const params = "text=" + text.val() + "&profileID=" + profileID;

    // Callback function to handle the AJAX response
    const fun = function(xhttp) {
        console.log(xhttp); // Log the response for debugging purposes
        return !(xhttp === "error"); // Return false if there was an error
    };

    // Send the synchronous request to send the message
    return loadDocPostSync("sendMessage.php", fun, params);
}
