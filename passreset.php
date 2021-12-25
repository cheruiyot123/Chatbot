<?php 
extract($_POST);
if(isset($res))
{

	if($e=="" || $p=="")
	{
	$err="<font color='red'>fill all the fileds first</font>";	
	}
	else
	{
	if($p != $p2){
		$err="<font color='red'>Passwords dont match</font>";
	}else{
		$pass=md5($p);
	}
	

//$sql=mysqli_query($conn,"select * from users where email='$e' and pass='$pass' and role='student'");
$query ="UPDATE users SET pass='$pass' WHERE email='$e' and phone='$mob'";
mysqli_query($conn, $query);



$err="<font color='green'>Password reset success</font>";


}
}

?>
<div class="res">
	<h2>Password Reset</h2>
<form name="res" method="POST">
	<div class="row">
		<div class="col-sm-4"></div>
			<div class="error">
		<?php echo @$err;?>
			</div>
	</div>
	<div class="input-container">
	<i class="fa fa-envelope icon"></i>
	<input class="input-field" type="text" placeholder="e-mail" autocomplete="off" name="e">
	</div>
	<div class="input-container">
	<i class="fa fa-phone icon"></i>
	<input class="input-field" type="text" placeholder="phone-number" autocomplete="off" name="mob">
	</div>
	<div class="input-container">
	<i class="fa fa-key icon"></i>
	<input class="input-field" type="password" placeholder="New-password" autocomplete="off" name="p">
	</div>
	<div class="input-container">
	<i class="fa fa-key icon"></i>
	<input class="input-field" type="Password" placeholder="Confirm-password" autocomplete="off" name="p2">
	</div>
	<button type="submit" name="res" class="btn">Reset</button>
	<br>
	<p><a href="index.php?page=enterreg.php">Login</a> |  <a href="index.php?option=New_user">Signup</a></p>
	
</form>
</div>