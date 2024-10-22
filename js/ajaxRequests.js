/**
 * Synchronously loads a document via a POST request.
 * 
 * @param {string} url - The URL to send the request to.
 * @param {function} cFunction - The callback function to handle the response.
 * @param {string} params - The parameters to be sent with the request.
 * @returns {*} - The result of the callback function after processing the response.
 */
function loadDocPostSync(url, cFunction, params) {
  var xhttp = new XMLHttpRequest(); // Create a new XMLHttpRequest object

  // Initialize a POST request to the specified URL
  xhttp.open("POST", url, false); // 'false' makes the request synchronous

  // Set the appropriate request header for URL-encoded form data
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

  // Send the request with the specified parameters
  xhttp.send(params);

  // Return the result of the callback function, passing the response text
  return cFunction(xhttp.responseText);
}
