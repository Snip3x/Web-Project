<?php
	
	$email = $_REQUEST['email'];
	$password = $_REQUEST['password'];
	
	$conn = mysqli_connect("localhost", "root", "", "storeDB");
	if(mysqli_connect_error()){
		die("ERROR: Could not connect. " . mysqli_connect_error());
	}
	
	$sql = "SELECT password FROM clogin WHERE email ='$email'";
	$selectresult = mysqli_query($conn, $sql);
	
	$table_password = "";
	
	session_start(); //starts the session
	
	if(mysqli_num_rows($selectresult) > 0) //this condition checks if there is any existing email
	{
		while($row = mysqli_fetch_assoc($selectresult)) 
		{
			$table_password = $row['password']; // password is retreived for the entered email
			if($password == $table_password) // this condition checks if databased password matches with the user entered password.
				{
					$_SESSION['user'] = $email; //set the email in a session. This serves as a global variable
					$_SESSION['pass']=$table_password;
					header("location: index.html"); // redirects the user to the authenticated home page
				}
			else
			{

				Print '<script>alert("Incorrect Password!");</script>'; //Prompts the user
				Print '<script>window.location.assign("login.html");</script>'; // redirects to login.php
			}
		}
	}
	else
	{
		Print '<script>alert("Incorrect email!");</script>'; //Prompts the user
		Print '<script>window.location.assign("signin.php");</script>'; // redirects to login.php
	}
	mysqli_close($conn);
?>