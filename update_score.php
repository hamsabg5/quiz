<?php
require('connection.php');
require('session.php');
if (isset($_POST['update_score'])) {
        $user=$_SESSION['username'];
        $score=$_POST['score'];
				
		if (count($errors) == 0) {
			$c=0;
			$query = "UPDATE  $table SET quiz_score=$score where username='$user';";
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
            echo '<script type="text/javascript">';
				echo ' alert("score updated")'; 
				echo '</script>';
			header('location: index.php');
			}
		
        }
	}
	
		

?>

