<html>
	<head>
		<title>Forgot Password</title>
	</head>

	<body>
		<table style="width: 100%; height: 50%; text-align: center;">
			<td>
				<table class="page-center" style="text-align: left; padding-bottom: 88px; width: 100%; padding-left: 120px; padding-right: 120px;">
				<tr>
					<td colspan="2" style="padding-top: 72px; color: #000000; font-size: 48px; font-weight: 600;">Enter your New password</td>
				</tr>
				
				<tr>
					<td style="padding-top: 48px; padding-bottom: 48px;">
					<table cellpadding="0" cellspacing="0" style="width: 100%"></td>
				</tr>
			</td>
		</table>

		<form action="#" method="post">
			<input type="text" name="pass" style="font-size: 12px; font-weight: 600; line-height: 48px; width: 30%;"><br>

			<tr>
				<td>
					<a href="../login.php">
                        <button name="btn-new" style="margin-top: 36px; color: #ffffff; font-size: 12px; font-weight: 600; line-height: 48px; text-decoration: none; width: 220px; background-color: #00cc99; border-radius: 28px; display: block; text-align: center; text-transform: uppercase">
                            Submit
                        </button>
                    </a>
				</td>
			</tr>
		</form>
	</body>
</html>

<?php
	if(isset($_POST['btn-new']))
	{
		session_start();
		include('../Php/dbconnection.php');
		$email = $_SESSION['emailid'];

		$pass = $_POST['pass'];
		$sql = "UPDATE project SET password = $pass WHERE email = '$email' ";
		$result = $conn->query($sql);
	}
?>