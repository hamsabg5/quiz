<?php
require('connection.php');
require('session.php');
$name=$_SESSION['username'];
$query = $conn->prepare( "SELECT * FROM users WHERE username='$name';");
$query->execute();
if($query->rowCount()>0)
{  
    foreach($query->fetchAll() as $k=>$v) {
        $firstname =  $v['firstname'];
        $lastname =  $v['lastname'];
        $Address = $v['address'];
        $city =  $v['city'];
        $state = $v['state'];
        $dob = $v['dob'];
        $phone =$v['phone'];
        $email =  $v['email'];
        $src=$v['image'];
        $language=$v['language'];

    }
}

               
		
	