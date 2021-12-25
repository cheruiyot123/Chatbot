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

$sql=mysqli_query($conn,"select * from users where email='$e' and pass='$pass' and role='student'");

$r=mysqli_num_rows($sql);

if($r==true)
{
$_SESSION['user']=$e;
header('location:student');
}

else
{

$err="<font color='red'>Invalid login details</font>";

}
}
}


?>

<div class="row center-xs center-sm center-md center-lg">
	<div class="col-xs-6">
<div class="login">
	<h2>Student Login</h2>
	

<form name="login" method="POST">
	
		
		<?php echo @$err;?>
			
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
</div>
</div>
		<div class="panelo">
		<div class="col-md-4 col-md-offset-2">
		<div class="panel panel-default">
  <div class="panel-heading"><b>Latest news</b></div>
  <div class="panel-body">
  <p><?php 
  $dat=date('Y-m-d');
//$dat='2019-04-11';
 echo "$dat";

$sql="select * from notice where Date='$dat'";
$result=$conn->query($sql);
if(mysqli_num_rows($result) > 0)
    	{
        while($row=mysqli_fetch_array($result)){
   $subject = $row['Subject'];
   $details = $row['Details'];
   //.'</strong><br /> <small><em>'.$row['details'].'</em></small> </a> </li> ';
   // } ?>
<br>
  <strong><?php  echo "$subject";?></strong>
  <br>
    <?php echo "$details"; 
}
}
 ?> 
  
    </p>
  </div>
</div>
</div>
</div>
