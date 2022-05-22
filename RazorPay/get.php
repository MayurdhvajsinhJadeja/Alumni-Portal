<?php
    session_start();
    if(isset($_POST['enrollmentnumber']) && isset($_POST['email']) && isset($_POST['phonenumber']) && isset($_POST['password']) && isset($_POST['registration']))
    {
        $enrollmentnumber = $_POST['enrollmentnumber'];
        $_SESSION['enrollmentnumber'] = $enrollmentnumber;

        $email = $_POST['email'];
        $_SESSION['email'] = $email;

        $phonenumber = $_POST['phonenumber'];
        $_SESSION['phonenumber'] = $phonenumber;

        $password = $_POST['password'];
        $_SESSION['password'] = $password;

        header('Location: ./pay.php');
    }
    else
    {
?>
        <script> alert('Error Validate Value'); </script>
<?php
    }
?>