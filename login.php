<?php

session_start();
if (isset($_POST['email']) && isset($_POST['password'])){
	//if (!empty($_POST['email']) && !empty($_POST['password']){

			include 'connect.inc.php';
			$email=strip_tags($_POST['email']);
			$password=strip_tags($_POST['password']);
			$email=stripslashes($email);
			$password=stripslashes($password);
			$email=mysqli_real_escape_string($db,$email);
			$password=mysqli_real_escape_string($db,$password);
			$password=md5($password);
			$sql="SELECT * FROM myfirstdb WHERE email='$email' ";
			$query=mysqli_query($db,$sql);
			if(mysqli_num_rows($query)>0){
				$row= mysqli_fetch_assoc($query);
				$id=$row['id'];
				$db_password=$row['password'];

				if($password==$db_password){
					$_SESSION['email']=$email;
					$_SESSION['id']=$id;
					header("Location: index.php");

				} 
			
  		//}
				else{
					echo "<h2>You did not fill in the correct email or password!<h2>";
					} 
				}
				else{
					echo "Account does not exist. Please register";
				}

}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<title>LOG IN</title>
	<style type="text/css">
		html {
			background: url('background.jpg') no-repeat center center fixed;
			background-size: cover;
			-webkit-background-size:cover;
			-moz-background-size:cover;
			-o-background-size:cover;
			font-family: tahoma;
		}
		.log{
			font-size: 25px;
			padding: 20px;
			background-color: rgba(0,0,0,0.3);
			color: white;
			text-align: center;
			width: 30%;
			margin-left:35%;
		}
		.log input[type="text"]{
			width: 300px;
            height: 35px;
            border: 10px;
            border-radius: 5px;
            -webkit-border-radius: 5px;
            -moz-border-radius:5px;
            -o-border-radius:5px;
            font-size: 15px;
		}
        .log input[type="password"]{
            	width: 300px;
            	height: 35px;
            	border: 10px;
            	border-radius: 5px;
            	-webkit-border-radius: 5px;
            	-moz-border-radius:5px;
            	-o-border-radius:5px;
            	font-size: 15px;
            }
        .log input[type="submit"]{
            	width: 200px;
            	height: 35px;
            	border: 10px;
            	border-radius: 5px;
            	-webkit-border-radius: 5px;
            	-moz-border-radius:5px;
            	-o-border-radius:5px;
            	font-size: 25px;
            }

		h1{
			color: black;
		}
	</style>
</head>
<body>
<h1><strong>WELCOME PLEASE LOG IN HERE</strong></h1>

<div class="log">
	<form action= "login.php" method= "POST">
		Email: <br> <i class="fa fa-envelope" aria-hidden="true"> </i></t> <input type= "text" name= "email" placeholder="Enter your email"><br><br>
		Password: <br> <i class="fa fa-lock" aria-hidden="true"></i> <input type= "Password" name= "password" placeholder="Password"><br><br>
		<input type="submit" value ="LOGIN"><br><br>



	</form>

	<form action="signup.php" method="POST">
		NOT A MEMBER?<br>
		SIGN UP HERE <br><input type="submit" value="SIGN UP"><br>
		Connect with us<br>
		<div>
			<i class="fa fa-twitter" aria-hidden="true"><a href="#"></a></i></t><i class="fa fa-facebook-official" aria-hidden="true"><a href="htttps://facebook.com"></a></i></t>
		</div> 
	</form>
</div>
</body>
</html>