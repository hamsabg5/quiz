<?php
require('connection.php');
require('session.php');
if (isset($_POST['update_user'])) {
		// receive all input values from the form
		$firstname = $_POST['firstname'];
		$lastname =  $_POST['lastname'];
		$Address =htmlspecialchars($_POST['Address']);
		$state = $_POST['state'];
		$city = $_POST['city'];
		$dob = $_POST['dob'];
		$phone =$_POST['phone'];
		$email =  $_POST['email'];
		$password_1 = $_POST['password_1'];
		$checkbox1=$_POST['lang'];   
			foreach($checkbox1 as $chk1)  
                $lang .= $chk1." ";  
		$user=$_SESSION['username'];
		if (count($errors) == 0) {// register user if there are no errors in the form
			$c=0;
			$password = hash('gost',$password_1);//encrypt the password before saving in the database
			$query = "UPDATE  $table SET firstname='$firstname' where username='$user' and password='$password';";
			if($conn->exec($query))
			$c+=1;
		    $query = "UPDATE  $table SET lastname='$lastname' where username='$user' and password='$password';";
			if($conn->exec($query))
			$c+=1;
		    $query = "UPDATE  $table SET state='$state' where username='$user' and password='$password';";
			if($conn->exec($query))
			$c+=1;
		    $query = "UPDATE  $table SET city='$city' where username='$user' and password='$password';";
			if($conn->exec($query))
			$c+=1;
		    $query = "UPDATE  $table SET phone=$phone where username='$user' and password='$password';";
			if($conn->exec($query))
			$c+=1;
            $query = "UPDATE  $table SET email='$email' where username='$user' and password='$password';";
			if($conn->exec($query))
			$c+=1;
		    $query = "UPDATE  $table SET dob='$dob' where username='$user' and password='$password';";
			if($conn->exec($query))
			$c+=1;
		    $query = "UPDATE  $table SET language='$lang' where username='$user' and password='$password';";
			if($conn->exec($query))
			$c+=1;
		   
			if($c==0)
			{ array_push($errors, "password incorrect");
				echo '<script type="text/javascript">';
				echo ' alert("password incorrect")'; 
				echo '</script>';
				unset($_SESSION['success']);
			}
			else{
			$_SESSION['success'] = "SAVED CHANGES";
			header('location: index.php');
			}
		
        }
	}
	
		

?>

