$(document).ready(function () {
    $("form").submit(function(e){
        e.preventDefault();
        let isFormOk = true;
        const username = $("input#username");
        const password = $("input#password");
        password.siblings(".error-prompt").remove();
        isFormOk = check_username(username, password);
        if(isFormOk){
            e.currentTarget.submit();
        }
    });
});

function check_username(username, password) {
    const params = "username=" + username.val() + "&password=" + password.val();
    fun = function(xhttp) {
        console.log(xhttp);
        if(xhttp === "invalid"){
            password.parent().append('<p class ="error-prompt">Wrong Data</p>');
            return false;
        }
        return true;
    }
    return loadDocPostSync("check_credentials.php", fun, params);
}
