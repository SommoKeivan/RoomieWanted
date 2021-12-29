function loadDocPostSync(url, cFunction, params) {
  var xhttp;
  xhttp=new XMLHttpRequest();
  xhttp.open("POST", url, false);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send(params);
  return cFunction(xhttp.responseText);
}