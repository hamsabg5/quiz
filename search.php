<?php
require('connection.php');
require('session.php');
if (isset($_POST['search1'])) {
   
	try{	
    // receive all input values from the form
		$key= $_POST['search'];
		$user=$_SESSION['username'];
		if (count($errors) == 0) {
			if($key)
           { $query = $conn->prepare( "SELECT  *FROM $table where firstname='$key';");
			      $query->execute();
              if($query->rowCount()>0)
              {   $_SESSION['success'] = "record found";
                  $result = $query->setFetchMode(PDO::FETCH_ASSOC);
                  $res=1;
                foreach($query->fetchAll() as $k=>$v) {
                  $firstname = $v['firstname'];
                  $lastname =  $v['lastname'];
                  $username= $v['username'];
                  $src=$v['image'];
              }
           }
           else{
              $res=0;
              $_SESSION['success'] = "record not found";
            }
          }
		
        }
      }
  catch(PDOException $e){
    return $e->getMessage();
  }
}
?>