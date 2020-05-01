<?php require('session.php');?>
<html>
<head>
	<title>Home</title>
	<?php include 'header.php';?>
</head>
<body>
<div style="background-color:rgb(43, 118, 216);">
	<hr color="lightblue"></hr>
	<i class='fa fa-user-graduate' style='font-size:48px;margin-left: 30px;'></i>
	<span class="text-center">
		<h2>Home Page</h2>
</span>
    <table style="float: right;margin-right:30px;" >
      <tr>
	  <form method="post" action="search_results.php">
          <td> <input style="border:0;font-size:25px;border-radius:25px; " type="text" placeholder="Search by firstname.." name="search"><button class="btn" type="submit" name="search1">  <i class="fa fa-search" style="font-size:25px;"></i></button>
          </td>
		  <td >
	<div class="dropdown">
    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
	<i class='fa fa-user' style='font-size:30px'></i><?php echo $_SESSION['username']; ?>
    </button>
    <div class="dropdown-menu">
      <a class="dropdown-item" href="index.php?logout='1'" style="color: red;">logout</a>
    </div>
  </div>
</td>
      </tr>
  </table>    
	
	<div class="content">
		<!-- notification message -->
		<?php if (isset($_SESSION['success'])) : ?>
			<div class="error success" >
				<h3>
					<?php 
						echo $_SESSION['success']; 
						unset($_SESSION['success']);
					?>
				</h3>
			</div>
		<?php endif ?>
		<!-- logged in user information -->
		<p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
        <br><br>
        <button><a href="quiz/index_add.php">click here add quiz</a></button><br><br>
		<button><a href="quiz/index_quiz2.php">click here to trial the built quiz</a></button>
	</div>
</div>	
</body>
</html>