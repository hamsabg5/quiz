<?php 
	session_start();
	require('connection.php');
	try{
		$sql = "CREATE TABLE IF NOT EXISTS $table (
		username VARCHAR(100)  PRIMARY KEY,
		firstname VARCHAR(100), 
		lastname VARCHAR(100), 
		address varchar(300),
		state varchar(100),
		city varchar(100),
		dob DATE,
		phone int(10),
		language varchar(100),
		gender varchar(10),
		email varchar(100) UNIQUE NOT NULL,
		password VARCHAR(100) NOT NULL,
		image varchar(200),
		quiz_score int default 0
		);";
	$conn->exec($sql);
    }
catch(PDOException $e)
    {
    echo header('location:register.php');
    }
	// REGISTER USER
	if (isset($_POST['reg_user'])) {
		// receive all input values from the form
		$username =  $_POST['username'];
		$firstname = $_POST['firstname'];
		$lastname =  $_POST['lastname'];
		$Address =htmlspecialchars($_POST['Address']);
		$state = $_POST['state'];
		$city = $_POST['city'];
		$dob = $_POST['dob'];
		$phone =$_POST['phone'];
		$email =  $_POST['email'];
		$gender =$_POST['gender'];
		$password_1 = $_POST['password_1'];
		$password_2 =  $_POST['password_2'];
		$checkbox1=$_POST['lang'];   
			foreach($checkbox1 as $chk1)  
				$lang .= $chk1." "; 
				
		$folder="./img/";
		move_uploaded_file($_FILES["pic"]["tmp_name"], "$folder".$_FILES["pic"]["name"]);
		$image="$folder".$_FILES["pic"]["name"];
		// register user if there are no errors in the form
		if (count($errors) == 0) {
			$password =hash('gost',$password_1);//encrypt the password before saving in the database
			$query = "INSERT INTO  $table (username,firstname, lastname, address,state,city,dob,phone,language,email,password,image,gender)
					  VALUES('" . $username. "','" .$firstname. "','" .$lastname. "','" .$Address. "','" .$state. "','" .$city. "','" .$dob. "','$phone','".$lang."','" .$email. "','" .$password."','".$image."','".$gender."');";
	
		if($conn->exec($query))
		{
		$_SESSION['username'] = $username;
		$_SESSION['success'] = "You are now logged in";
		header('location: index.php');
		}
		else{
			array_push($errors, "please check before warnings before submission"); 
			header('location:register.php');
		}
	}
}

// LOGIN USER
if (isset($_POST['login_user'])) {
	$username =  $_POST['username'];
	$password1 = $_POST['password'];
	$password = hash('gost',$password1);
	if (count($errors) == 0) {
		if($username==$admin and $password==hash('gost',$admin_password))
		$_SESSION['username'] = $username;
		$_SESSION['success'] = "You are now logged in";
		header('location: admin_privalages.php');
		$query =  $conn->prepare("SELECT * FROM users WHERE username='$username' AND password='$password'");
		$query->execute();
    // set the resulting array to associative
		if ($query->rowCount()) {
			$_SESSION['username'] = $username;
			$_SESSION['success'] = "You are now logged in";
			header('location: index.php');
		} 
		else{
			array_push($errors, "Wrong username/password combination");
		}
	}
}

?>