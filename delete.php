<?php require('session.php')?>
<?php require('remove_user.php')?>
<html>
<head>
	<title>delete profile</title>
	<?php require ('header.php');?>
	<?php require ('fetch_details.php');?>
</head>
<body>
<div style="background-color:rgb(43, 118, 216);">
	<hr color="lightblue"></hr>
	<i class='fa fa-user-graduate' style='font-size:48px;margin-left: 30px;'></i>
    <table style="float: right;margin-right:30px;" >
      <tr>
          <td> <button class="btn" type="submit">  <input style="border:0;font-size:25px;border-radius:25px; " type="text" placeholder="Search.." name="search"><i class="fa fa-search" style="font-size:25px;"></i></button>
          </td>
		  <td>
            <div class="dropdown">
                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                <i class='fa fa-user' style='font-size:30px'></i><?php echo $_SESSION['username']; ?>
                </button>
                <div class="dropdown-menu">
                <a class="dropdown-item" href="index.php">Home</a><br>
                <a class="dropdown-item" href="index.php?logout='1'" style="color: red;">logout</a>
                </div>
            </div>
          </td>
      </tr>
    </table>    
	
	<div class="content">
	<span class="text-center" style="font-size:20px">Delete your profile</span>
    <form method="post" action=" ">
	<?php require('errors.php');?>
	
		<div class="input-group row">
			<div class="col-lg-12">
			<label>enter your Password to save changes</label>
			<input type="password" name="password_1" placeholder="password: 123@gh"  required>
			</div>	
		</div>
		<div class="input-group row">
		<div class="col-lg-12">
			<button class="btn" name="delete">delete</button>
		</div>
		</div>
	</form>
	</div>
	</div>	
</body>
</html>