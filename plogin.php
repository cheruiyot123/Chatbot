<?php 
extract($_POST);
if(isset($login))
{

	if($e=="" || $p=="")
	{
	$err="<font color='red'>fill all the fileds first</font>";	
	}
	else
	{
$pass=md5($p);	

$sql=mysqli_query($conn,"select * from users where email='$e' and pass='$pass' and role='parent'");

$r=mysqli_num_rows($sql);

if($r==true)
{
$_SESSION['user']=$e;
header('location:parent');
}

else
{

$err="<font color='red'>Invalid login details</font>";

}
}
}

?>
<div class="login">
	<h2>Parent Login</h2>
<form name="login" method="POST">
		
		<div class="error">
		<?php echo @$err;?>
		</div>
	
	<div class="input-container">
	<i class="fa fa-envelope icon"></i>
	<input class="input-field" type="text" placeholder="e-mail" autocomplete="off" name="e">
	</div>
	<div class="input-container">
	<i class="fa fa-key icon"></i>
	<input class="input-field" type="Password" placeholder="password" autocomplete="off" name="p">
	</div>
	<button type="submit" name="login" class="btn">LogIn</button>
	<br>
	<p><a href="index.php?option=passreset">Reset password </a> |  <a href="index.php?option=New_user">Signup</a></p>
	
</form>
</div>