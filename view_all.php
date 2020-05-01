<?php require('session.php');?>
<html>
<head>
	<title>all</title>
  <?php include 'header.php';?>
</head>
<body>
<div style="background-color:rgb(43, 118, 216);">
	<hr color="lightblue"></hr>
	<i class='fa fa-user-graduate' style='font-size:48px;margin-left: 30px;'></i>
	<span class="text-center">
		<h2>Student Details</h2>
</span>
    <table style="float: right;margin-right:30px;" >
      <tr>
	  <form method="post" action="search_results.php">
          <td> <input style="border:0;font-size:25px;border-radius:25px; " type="text" placeholder="Search  by firstname.." name="search"><button class="btn" type="submit" name="search1">  <i class="fa fa-search" style="font-size:25px;"></i></button>
          </td>
		  <td >
	<div class="dropdown">
    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
	<i class='fa fa-user' style='font-size:30px'></i><?php echo $_SESSION['username']; ?>
    </button>
    <div class="dropdown-menu">
      <a class="dropdown-item" href="edit.php">edit</a><br>
      <a class="dropdown-item" href="index.php?logout='1'" style="color: red;">logout</a><br>
      <a class="dropdown-item" href="index.php">home</a>
    </div>
  </div>
</td>
      </tr>
  </table>    
<div class="content">
    <?php require('view.php')?>
	</div>
</div>	
</body>
</html>