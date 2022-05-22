<!DOCTYPE html>
<html lang="en">
<head>
    <title>Register</title>
    
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="./css_lr/style.css">
</head>
<body>
    <!-- Register Form -->
    <br><br><section class="signup">
        <div class="container" style="height: 500px;">
            <div class="signup-content">
                <div class="signup-image">
                    <figure><img src="images/signup-image.jpg" alt="sing up image" style="margin-top: -12%; margin-left: 9%;"></figure>
                </div>
    
                <div class="signup-form" style="margin-top: -5%;">
                    <h2 class="form-title">Sign up</h2>  

                    <form name="myform" method="POST" onsubmit="return register()" action="../RazorPay/get.php" class="register-form" id="register-form">
                        <div class="form-group">
                            <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                            <input type="number" id="enrollmentnumber" name="enrollmentnumber" placeholder="Enrollment Number"/>
                        </div>
                        
                        <div class="form-group">
                            <label for="email"><i class="zmdi zmdi-email"></i></label>
                            <input type="email" id="email" name="email" placeholder="Your Email"/>
                        </div>

                        <div class="form-group">
                            <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                            <input type="text" id="phonenumber" name="phonenumber" placeholder="Your Mobile Number"/>
                        </div>
                        
                        <div class="form-group">
                            <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                            <input type="password" id="password" name="password" placeholder="Password"/>
                        </div>
                        
                        <div class="form-group form-button">
                            <input type="submit" name="registration" class="form-submit" value="Register"/>
                            <button name="back" type="button" class="form-submit" style="border: none; height: 48px;"><a href="../index.php" style="color: white; text-decoration : none;">Back</a></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <script>
        function register()
        {  
            var enrollmentnumber = document.getElementById('enrollmentnumber').value;
            var email = document.getElementById('email').value;
            var phonenumber = document.getElementById('phonenumber').value;
            var password = document.getElementById('password').value;

            if (enrollmentnumber=="" || email=="" || phonenumber=="" || password=="")
            {
                alert("field can't be blank");  
                return false; 
            } 
            else if(password.length < 8)
            {
                alert("Password Length Must be Greater than 8");
                return false;
            }
        }
        </script>
</body>
</html>