function check_empty_filed()
{
    var email = document.getElementById('login_email').value;
    var password = document.getElementById('login_password').value;

    if(email == '' && password == ''){
        window.alert("Ple. Enter Email ID & Password");
    } else if(email == ''){
        // document.getElementById('email_empty_error').innerHTML = "Please Enter Your Name *"
        window.alert("Ple. Enter Email Address");
        // email.focus(); 
    } else if(password == ''){
        window.alert("Ple. Enter Password");
    }
}

function togglePassword(el)
{
    var checked = el.checked;
    if(checked){
     document.getElementById("login_password").type = 'text';
    } else{
     document.getElementById("login_password").type = 'password';
    }
}