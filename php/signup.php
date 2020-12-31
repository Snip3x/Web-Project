<?php
if ($_SERVER["REQUEST_METHOD"] == "POST"){
	$email=$_REQUEST["signUpEmail"];
	$password=$_REQUEST["password"];

	echo "<br/>"."The email is " .$email ."<br/>";
	echo "The password is " .$password;

	$conn = mysqli_connect("localhost", "root", "", "test");
	if(mysqli_connect_error()){
		die("ERROR: Could not connect. " . mysqli_connect_error());
	}
	
	$bool = true;
	$sql = "SELECT * FROM user";
	$selectresult = mysqli_query($conn, $sql);
	
	if(mysqli_num_rows($selectresult) > 0){
		while($row = mysqli_fetch_assoc($selectresult)) {
			$db_email= $row["email"];
			//echo "id: " . $row["id"]. " - email: " . $row["email"]. " - Password:" . $row["password"]. "<br>";
			if($db_email == $email)
			{
                echo "Email Already Exists";
				$bool = false;
			}
		}
	}
	else{
		echo "0 results";
	}
	
	
	if ($bool)
	{
		$insert = "INSERT INTO user (email, password) VALUES ('$email', '$password')";		
		
		if(mysqli_query($conn, $insert)){
            echo "<br/>"."Records added successfully.";
            header('Location: index.html');
		}
		else{
			echo "ERROR: Could not able to execute $insert. " . mysqli_error($conn);
		}
	}
mysqli_close($conn);
}
?>