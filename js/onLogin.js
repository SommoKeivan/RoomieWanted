$(document).ready(function () {
    // Handle form submission
    $("form").submit(function(e) {
        e.preventDefault(); // Prevent the default form submission
        let isFormOk = true; // Initialize a variable to track form validity
        const username = $("input#username"); // Get the username input field
        const password = $("input#password"); // Get the password input field
        
        // Remove any existing error messages for the password field
        password.siblings(".error-prompt").remove();
        
        // Check the validity of the username and password
        isFormOk = check_username(username, password);
        
        // If the form is valid, submit it
        if (isFormOk) {
            e.currentTarget.submit(); // Submit the form
        }
    });
});

/**
 * Validates the username and password by sending an AJAX request.
 * 
 * @param {jQuery} username - The jQuery object for the username input field.
 * @param {jQuery} password - The jQuery object for the password input field.
 * @returns {boolean} - Indicates whether the username and password are valid.
 */
function check_username(username, password) {
    // Prepare parameters for the AJAX request
    const params = "username=" + username.val() + "&password=" + password.val();
    
    // Callback function to handle the AJAX response
    const fun = function(xhttp) {
        console.log(xhttp); // Log the response
        
        // If the response indicates invalid credentials
        if (xhttp === "invalid") {
            // Append an error message below the password field
            password.parent().append('<p class="error-prompt">Wrong Data</p>');
            return false; // Return false to indicate invalid input
        }
        return true; // Return true to indicate valid input
    };
    
    // Send the synchronous request to check the credentials
    return loadDocPostSync("check_credentials.php", fun, params);
}
