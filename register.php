<?php include('server.php');
	  include('validate_functions.php'); ?>
<html>
<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<title>Registration </title>
	<?php require ('header.php');?>
</head>
<body>
	<div class="header">
		<h2>Register</h2>
	</div>
	<form method="post" action="register.php" enctype="multipart/form-data">
		<?php include('errors.php'); ?>
		<div class="input-group row" >
			<label>Name</label>
			<div class="col-sm-6">
			<input type="text" name="firstname" value="<?php echo $firstname; ?>" placeholder="First name" required >
			</div><div class="col-sm-6">
			<input type="text" name="lastname" value="<?php echo $lastname; ?>"  placeholder="Last name" required >
			</div>
		</div>
		<div class="input-group ">
			<label>Date of birth</label>
			<input type="date" name="dob" value="<?php echo $dob; ?>" max="<?php echo date("Y-m-d"); ?>"placeholder="date of birth" required>
		</div>
		<div>
			<label>Gender</label>
			<input type="radio" name="gender" value="male" checked>Male
			<input type="radio" name="gender" value="female">Female
			<input type="radio" name="gender" value="other">Other
		</div>
		<div class="input-group row">
			<div class="col-sm-4">
				<label>Email</label>
				<input type="email" name="email"  id="email"  value="<?php echo $email; ?>"  placeholder="mail like abc@gmail.com" required required onblur="validateEmail(this.value)" style="border:2px solid">
			</div>
			<div class="col-sm-4" id="email_warning">
			</div>
			<div class="col-sm-4">
				<label>Phone No.</label>
				<input type="number" name="phone" value="<?php echo $phone; ?>"  placeholder="Phone no." required>
			</div>
		</div>
		<div class="input-group row">
			<div class="col-sm-6">
			<label>Address</label>
			<textarea name="Address" rows="2"  placeholder="door no,street" required><?php echo $Address; ?></textarea>
			</div>	
			<div class="col-sm-3">
			<label>City</label>
			<input type="text" name="city" value="<?php echo $city; ?>"placeholder="town/city" required>
			</div>	
			<div class="col-sm-3">
			<label>state</label>
			<input type="text" name="state" value="<?php echo $state; ?>" placeholder="state" required >
			</div>	
		</div>
		<div >
			<label>languages known</label>
			<input type="checkbox" name="lang[]" value="Kannada" checked>Kannada
			<input type="checkbox" name="lang[]" value="English">Englsih
			<input type="checkbox" name="lang[]" value="Hindi">Hindi
		</div>
		<div class=" row">
			<div class="col-sm-4 input-group">
			<label>Username</label>
			<input type="text" name="username" id="username" value="<?php echo $username; ?>" placeholder="username like abc" requiredrequired onblur="validateUsername()" style="border:2px solid" >
			</div>
			<div class="col-sm-4" id="username_warning">
			</div>
			<div class="col-sm-4">
			<label>profile picture</label>
			<input type="file" name="pic" accept="image/*">
			</div> 
		</div>

		<div class="input-group row">
			<div class="col-sm-4">
				<label>Password</label>
				<input type="password" id="psw" name="password_1" placeholder="password: 123@gh" required onblur="validatePassword()" style="border:2px solid">
			</div>
			<div class="col-sm-4">
				<label>Confirm password</label>
				<input type="password" id="psw1" name="password_2" placeholder="password: 123@gh" required onblur="passwordmatch()" style="border:2px solid">	
			</div>
			<div class="col-sm-4" id="password_warning" >
				<p id="password_warning"> </p>
			</div>		
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="reg_user">Register</button>
		</div>
		<p>Already a member? <a href="login.php">Sign in</a></p>
	</form>
</body>
</html>