function checkPasswordMatch(e){
    var password = document.getElementById("password");
    var passwordCheck = document.getElementById("password-check");
    if (password.value != passwordCheck.value){
    makeRed(password);
    makeRed(passwordCheck);

    alert("Password do not match!");
    e.preventDefault();
    }
}