function Validation() {
    let username = document.getElementById("username").value;
    let password = document.getElementById("password").value;




    if (username == "") {
        document.getElementById("ErrUName").innerHTML = "Username Can not be empty";
    }
    else {
        document.getElementById("ErrUName").innerHTML = "";
    }

    if (password.length < 6) {
        document.getElementById("ErrPass").innerHTML = "Password must needed";
        return false;
    }
    else {
        document.getElementById("ErrPass").innerHTML = "";
    }



}