<?php 
require('connection.php');
extract($_POST);
if(isset($save))
{

	if($n=="" || $n2=="" || $e=="" || $mob=="")
	{
	$err="<font color='red'>fill all the fileds</font>";	
	}
	else
	{
		$dat=date("y-m-d");
		$tim=date("H:i:s");
$sql="insert into visitors(fname,sname,email,phone,date,time)values('$n','$n2','$e','$mob','$dat','$tim')";
mysqli_query($conn,$sql);
$_SESSION['visname']=$n;
$_SESSION['visemail']=$e;

	$err="<font color='blue'>Details added</font>";
	header('location:index.php?option=vischat');
}
}
	?>
<h2>Visitor's slip</h2>
		<form method="post">
			<table class="table table-bordered">
	<Tr>
		<Td colspan="2"><?php echo @$err;?></Td>
	</Tr>
				
				<tr>
					<td>First Name</td>
					<Td><input  type="text"  class="form-control" name="n" required/></td>
				</tr>
				<tr>
					<td>Second Name</td>
					<Td><input  type="text"  class="form-control" name="n2" required/></td>
				</tr>
				<tr>
					<td>E-mail </td>
					<Td><input type="email"  class="form-control" name="e" required/></td>
				</tr>
				<tr>
					<td> Phone</td>
					<Td><input  class="form-control" type="text" name="mob" required/></td>
				</tr>
				<tr>
					
									
<Td colspan="2" align="center">
<input type="submit" class="btn btn-success" value="Save" name="save"/>	
					</td>
				</tr>
			</table>
		</form>
	</body>
</html>