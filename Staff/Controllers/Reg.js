
function validateGen() {
    var gn = document.getElementsByName("gender");
    var checked = false;
    for (var i = 0; i < gn.length; i++) {
        if (gn[i].checked) {
            checked = true;
            break;
        }
    }
    return checked;
}

function Validation() {
    let name = document.getElementById("name").value;
    let username = document.getElementById("username").value;
    let password = document.getElementById("password").value;
    let Email = document.getElementById("email").value;
    let mobile = document.getElementById("phone").value;


    if (name == "") {
        document.getElementById("ErrName").innerHTML = "Name Can not be empty";
        return false;
    }
    else {
        document.getElementById("ErrName").innerHTML = "";
    }


    if (username == "") {
        document.getElementById("ErrUName").innerHTML = "Username Can not be empty";
        return false;
    }
    else {
        document.getElementById("ErrUName").innerHTML = "";
    }


    if (Email == "") {
        document.getElementById("ErrMail").innerHTML = "Email Filed Can not be empty";
        return false;
    }
    else {
        document.getElementById("ErrMail").innerHTML = "";
    }

    if (mobile == "") {
        document.getElementById("ErrMobile").innerHTML = "Contact Number Can not be empty";
        return false;
    }

    else {
        document.getElementById("ErrMobile").innerHTML = "";
    }

    if (validateGen() == false) {
        document.getElementById("Errgender").innerHTML = "Gender must requried";
        return false;
    }
    else {
        document.getElementById("Errgender").innerHTML = "";
    }



}