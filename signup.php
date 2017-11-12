<?php
session_start();
include 'connect.inc.php';
if (isset($_POST['username']) && isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['c_password'])){
    if (empty($_POST['username']) || empty($_POST['fname']) || empty($_POST['lname']) || empty($_POST['email']) || empty($_POST['password']) || empty($_POST['c_password'])){
        echo "Please fill in all fields";

    }else {

            
            $username=strip_tags($_POST['username']);
            $fname=strip_tags($_POST['fname']);
            $lname=strip_tags($_POST['lname']);
            $email=strip_tags($_POST['email']);
            $password=strip_tags($_POST['password']);
            $c_password=strip_tags($_POST['c_password']);
            $username=stripslashes($username);
            $fname=stripslashes($fname);
            $lname=stripslashes($lname);
            $email=stripslashes($email);
            $password=stripslashes($password);
            $c_password=stripslashes($c_password);
            $username=mysqli_real_escape_string($db,$username);
            $fname=mysqli_real_escape_string($db,$fname);
            $lname=mysqli_real_escape_string($db,$lname);
            $email=mysqli_real_escape_string($db,$email);
            $password=mysqli_real_escape_string($db,$password);
            $c_password=mysqli_real_escape_string($db,$c_password);
            $password=md5($password);
            $c_password=md5($c_password);
            if ($c_password!=$password){
                echo "Password does not match";
            }
            else{
                $sql_confim_user="SELECT * FROM myfirstdb  WHERE username='$username' or `email`='$email'";
                $query_run_confirm= mysqli_query($db,$sql_confim_user);
                $rows_number=mysqli_num_rows($query_run_confirm);
                if($rows_number>0){
                    echo "Username or Password already taken\n";
                    return;
                }else{
                     $sql_insert="INSERT INTO myfirstdb (id, firstname, lastname, username, email, password) VALUES ('','$fname','$lname','$username','$email','$password')";
                     $query_run_insert= mysqli_query($db,$sql_insert);
                     echo "Sign up success";
                    header("Location: login.php");
                         } }
        }
}


?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<title>SIGN UP</title>
	<style type="text/css">
		.fm {
                background-color: rgba(0,0,0,0.3);
                font-size: 25px;
                text-align: center;
                width: 30%;
                position: center;
                margin-left: 35%;
               
                 }
            .fm input[type="text"]{
            	width: 200px;
            	height: 35px;
            	border: 10px;
            	border-radius: 5px;
            	-webkit-border-radius: 5px;
            	-moz-border-radius:5px;
            	-o-border-radius:5px;
            	font-size: 15px;
            }
            .fm input[type="password"]{
            	width: 200px;
            	height: 35px;
            	border: 10px;
            	border-radius: 5px;
            	-webkit-border-radius: 5px;
            	-moz-border-radius:5px;
            	-o-border-radius:5px;
            	font-size: 15px;
            }
            .fm input[type="submit"]{
            	width: 200px;
            	height: 35px;
            	border: 10px;
            	border-radius: 5px;
            	-webkit-border-radius: 5px;
            	-moz-border-radius:5px;
            	-o-border-radius:5px;
            	font-size: 25px;
            }
           H1 { color: black;
           	    
                 }
            html{
            	background: url('background.jpg') no-repeat center center fixed;
            	-webkit- background-size: cover;
            	-moz-background-size:cover;
            	-o-background-size:cover;
            	background-size: cover; 
            	font-family: tahoma;
            }
            body{
            	color: white;
            	
            }

           }

	</style>
</head>
<body>
	<h1><strong>SIGN UP HERE</strong></h1>

    <div class="fm">
        <form action= "signup.php" method= "POST">

            User Name:<br> <i class="fa fa-user" aria-hidden="true"></i> <input type="text" name="username" placeholder="Enter user name" ><br><br>
            First Name: <br><input type= "text" name= "fname" placeholder="Enter first name"> <br><br>
            Last Name: <br><input type= "text" name= "lname" placeholder="Enter last name"><br><br>
            Email: <br><i class="fa fa-envelope" aria-hidden="true"></i> <input type= "text" name= "email" placeholder="Enter Email address"><br><br>
            Password: <br><i class="fa fa-lock" aria-hidden="true"></i> <input type= "Password" name= "password" placeholder="Enter password" ><br><br>
            Confirm password: <br><i class="fa fa-lock" aria-hidden="true"></i> <input type= "password" name= "c_password" placeholder="Enter password again"><br><br>
            <input type="submit" value ="Submit"><br><br><br>

            </form>
        </div>
        <div class="fm">
            <?php
                echo 'ALREADY A USER? <br>';
                echo 'LOGIN HERE <br>';
            ?>

        <form action="login.php" method="POST">
        <input type="Submit" value="LOGIN"><br>	
        </form><br>
    </div>
</body>
</html>
