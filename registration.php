<?php 
require('connection.php');
extract($_POST);
if(isset($save))
{
//check user alereay exists or not
$sql=mysqli_query($conn,"select * from users where email='$e'");

$r=mysqli_num_rows($sql);

if($r==true)
{
$err= "<font color='red'>This user already exists</font>";
}
else
{
//dob
$dob=$yy."-".$mm."-".$dd;

//image
//$imageName=$_FILES['img']['name'];
//$image =addslashes(file_get_contents($_FILES['image']['tmp_name']));
//$imageName=addslashes($_FILES['image']['name']);

//encrypt your password
if($p!=$p2){
$err= "<font color='red'>Passwords don't match</font>";
}else{
$pass=md5($p);
}
$role='student';


//$query="insert into users values('','$n','$e','$pass','$mob','$gen','$hob','$imageName','$dob',now())";
$query ="INSERT INTO users(fname,secname,email,phone,gender,image,dob,pass,role)
		VALUES('$n','$n2','$e','$mob','$gen','{$image}','$dob','$pass','$role')";
mysqli_query($conn,$query);

//upload image

//mkdir("images/$e");
//move_uploaded_file($_FILES['img']['tmp_name'],"images/$e/".$_FILES['img']['name']);

$err="<font color='blue'>Registration successfull !!</font>";

}
}




?>
<div class="reg">
<h2>SIGN UP</h2>
		<form method="post" enctype="multipart/form-data">
		<Tr>
		<Td colspan="2"><?php echo @$err;?></Td>
	</Tr>
			<div class="input-container">
			<i class="fa fa-user icon"></i>
			<input class="input-field" type="text" placeholder="first-name" autocomplete="off" name="n" required>
			</div>
			<div class="input-container">
			<i class="fa fa-user icon"></i>
			<input class="input-field" type="text" placeholder="Second-name" autocomplete="off" name="n2" required>
			</div>
			<div class="input-container">
			<i class="fa fa-envelope icon"></i>
			<input class="input-field" type="email" placeholder="email" autocomplete="off" name="e" required>
			</div>
			<div class="input-container">
			<i class="fa fa-phone icon"></i>
			<input class="input-field" type="text" placeholder="phone-number" autocomplete="off" name="mob" required>
			</div>
			<<div class="input-container">
			<i class="fa fa-male icon"></i>
			Male<input type="radio" name="gen" value="m" required/>&nbsp;&nbsp;
			<i class="fa fa-female icon"></i>
			Female<input type="radio" name="gen" value="f" required/>
			</div>
			<div class="input-container">
			<i class="fa fa-file-photo-o">photo</i>
			<input type="file" name="image" required>
			</div>
			<div class="input-container">
			<i class="fa fa-calendar icon"></i>
			<select name="yy" required>
					<option value="">Year</option>
					<?php 
					for($i=1950;$i<=2016;$i++)
					{
					echo "<option>".$i."</option>";
					}					
					?>
					
					</select>
					
					<select name="mm" required>
					<option value="">Month</option>
					<?php 
					for($i=1;$i<=12;$i++)
					{
					echo "<option>".$i."</option>";
					}					
					?>
					
					</select>
					
 					
					<select name="dd" required>
					<option value="">Date</option>
					<?php 
					for($i=1;$i<=31;$i++)
					{
					echo "<option>".$i."</option>";
					}					
					?>-->
					
					</select>
			</div>
			<div class="input-container">
			<i class="fa fa-key icon"></i>
			<input class="input-field" type="Password" placeholder="password" autocomplete="off" name="p">
			</div>
			<div class="input-container">
			<i class="fa fa-key icon"></i>
			<input class="input-field" type="Password" placeholder="confirm-password" autocomplete="off" name="p2">
			</div>
			<input type="submit" class="btn" value="Save" name="save"/>
			<input type="reset" class="btn" value="Reset"/>	
		</form>
	</div>
	</body>
</html>