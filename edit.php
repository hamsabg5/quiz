<?php require('session.php')?>
<?php require('update.php')?>
<html>
<head>
	<title>Edit profile</title>
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
	<span class="text-center" style="font-size:20px">Edit your profile</span>
    <form method="post" action="edit.php">
	<?php require('errors.php');?>
		<div class="input-group row" >
			<label>Name</label>
			<div class="col-lg-6">
			<input type="text" name="firstname" value="<?php echo $firstname; ?>"    >
			</div><div class="col-lg-6">
			<input type="text" name="lastname" value="<?php echo $lastname; ?>" >
			</div>
		</div>
		
		<div class="input-group ">
			<label>Date of birth</label>
			<input type="date" name="dob" value="<?php echo $dob; ?>" max="<?php echo date("Y-m-d"); ?>" >
		</div>

		<div>
			<label>Gender</label>
			<input type="radio" name="gender" value="male" checked>Male
			<input type="radio" name="gender" value="female">Female
			<input type="radio" name="gender" value="other">Other
		</div>
	
		<div class="input-group row">
			<div class="col-lg-6">
				<label>Email</label>
				<input type="email" name="email" value="<?php echo $email; ?>">
			</div>
			<div class="col-lg-6">
				<label>Phone No.</label>
				<input type="number" name="phone" value="<?php echo $phone; ?>">
			</div>
		</div>
		<div class="input-group row">
			<div class="col-lg-6">
			<label>Address</label>
			<textarea name="Address" rows="2" ><?php echo $Address; ?> </textarea>
			</div>	
			<div class="col-lg-3">
			<label>City</label>
			<input type="text" name="city" value="<?php echo $city; ?>" >
			</div>	
			<div class="col-lg-3">
			<label>state</label>
			<input type="text" name="state" value="<?php echo $state; ?>"  >
			</div>	
		</div>
		<div >
			<label>languages known</label>
			<input type="checkbox" name="lang[]" value="kannada" checked>Kannada
			<input type="checkbox" name="lang[]" value="English">Englsih
			<input type="checkbox" name="lang[]" value="Hindi">Hindi
		</div>
		<div class="input-group row">
			<div class="col-lg-12">
			<label>enter your Password to save changes</label>
			<input type="password" name="password_1" placeholder="password: 123@gh"  required>
			</div>	
		</div>
		<div class="input-group row">
		<div class="col-lg-12">
			<button type="submit" class="btn" name="update_user">Update</button>
		</div>
		<div class="col-lg-12">
			<button class="btn"><a href="delete.php">delete profile</a></button>
		</div>
		</div>
	</form>
	</div>
	</div>	
</body>
</html>