<?php
require('connection.php');
require('session.php');
	try{	
		if (count($errors) == 0) {
            $query = $conn->prepare( "SELECT  * FROM $table;");
			      $query->execute();
              if($query->rowCount()>0)
              { 
                  echo "<table style='padding:20px;border:2px solid black;' cellspacing='100px'><tr><th>Name</th><th></th><th>Address</th><th>city</th><th>state</th><th>DOB</th><th>Phone</th><th>Email</th><th>Username</th></tr>";
                foreach($query->fetchAll() as $k=>$v) {
                echo "<tr><td>". $v['firstname']. "</td>&nbsp&nbsp&nbsp<td> ". $v['lastname']. "</td>&nbsp&nbsp&nbsp<td> ". $v['address']. "</td>&nbsp&nbsp&nbsp<td>". $v['city']. "</td>&nbsp&nbsp&nbsp<td> ". $v['state']. "</td>&nbsp&nbsp&nbsp<td> ". $v['dob']. "</td> &nbsp&nbsp&nbsp <td> ". $v['phone']. "</td> &nbsp&nbsp&nbsp<td> ". $v['email']. "</td>&nbsp&nbsp&nbsp<td> ". $v['username']. "</td>&nbsp&nbsp&nbsp";
                $src=$v['image'];
                echo "<td><img src='$src' height='50' width='50'></td></tr> ";
                echo "<br><br>";
            }
            echo "</table>";
           }
        }
	}
   catch(PDOException $e)
            {
                return $e->getMessage();
            }
?>