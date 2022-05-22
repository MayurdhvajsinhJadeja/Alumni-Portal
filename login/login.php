<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="./css_lr/style.css">
</head>

<body>
    <!-- Login Form -->
    <br><br><section>
        <div class="container" style="height: 500px;">
            <div class="signin-content">
                <div class="signin-image">
                    <figure><img src="images/signin-image.jpg" alt="sing up image"></figure>
                </div>

                <div class="signin-form" style="margin-top: -1%;">
                    <h2 class="form-title">Sign In</h2>
                    <form name="myform" method="POST" class="register-form" id="login-form">

                        <div class="form-group">
                            <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                            <input type="text" name="enrollment" id="enrollment" placeholder="Enrollment Number"/>
                        </div>

                        <div class="form-group">
                            <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                            <input type="password" name="password" id="password" placeholder="Password"/>
                        </div>

                        <div class="form-group">
                            <input type="checkbox" name="remember-me" id="remember-me" class="agree-term" />
                            <label for="remember-me" class="label-agree-term"><span><span></span></span>Remember me</label>
                        </div>

                        <div class="form-group form-button">
                            <input type="submit" class="form-submit" value="Log in" onclick="login()"/>
                            <button name="back" type="button" class="form-submit" style="border: none; height: 48px;"><a href="../index.php" style="color: white; text-decoration : none;">Back</a></button>
                        </div>
                        
                        <div>
                            <a class="forgot" href="../Forgot Password/forgotpassword.html">Forgot Password?</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    
    <script>
        function login()
        {
            var enrollment = document.getElementById('enrollment').value;
            var password = document.getElementById('password').value;

            if (enrollment=="" || password=="")
            {
                alert("field can't be blank");  
                return false; 
            } 
            else
            {
                <?php
                    session_start();
                    include('../Php/dbconnection.php');

                    if(isset($_POST['enrollment']) && isset($_POST['password']))
                    {
                        $enrollment = $_POST['enrollment'];
                        $password = $_POST['password'];
                        
                        $SUBQUERY = "SELECT log.password, log.category, user.* FROM login log, user_details user WHERE log.enrollment_no = user.enrollment_Number AND log.enrollment_no = '$enrollment' AND log.password = '$password'";
                        $result1 = $conn->query($SUBQUERY);

                        if($result1 -> num_rows > 0)
                        {
                            while($row = $result1 -> fetch_assoc())
                            {
                                if($row['category'] == 'user')
                                {
                                    $_SESSION['id_user'] = $row['id'];
                                    $_SESSION['name_user'] = $row['name'];
                                    $_SESSION['email_user'] = $row['email'];
                                    $_SESSION['mobile_No_user'] = $row['mobile_No'];
                                    $_SESSION['current_job_user'] = $row['current_job'];
                                    $_SESSION['package_user'] = $row['package'];
                                    $_SESSION['image_user'] = $row['image'];
                                    $_SESSION['enroll_user'] = $row['enrollment_no'];
                                    header('Location: ../User/user_dashboard.php');
                                }
                                else if($row['category'] == 'admin')
                                {
                                    $_SESSION['id_admin'] = $row['id'];
                                    $_SESSION['enrollment_admin'] = $row['enrollment_Number'];
                                    $_SESSION['name_admin'] = $row['name'];
                                    $_SESSION['email_admin'] = $row['email'];
                                    $_SESSION['mobile_No_admin'] = $row['mobile_No'];
                                    $_SESSION['current_job_admin'] = $row['current_job'];
                                    $_SESSION['package_admin'] = $row['package'];
                                    $_SESSION['image_admin'] = $row['image'];
                                    header('Location: ../Admin/admin_dashboard.php');
                                }
                                else
                                {
                ?>
                                    alert('Enter validate Information');
                                    window.location.href = "./index.php";
                <?php
                                }
                            }
                        }
                    }
                ?>
            }
        }
    </script>
</body>
</html>