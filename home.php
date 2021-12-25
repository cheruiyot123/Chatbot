<div class="row">
	<!-- container -->
		<div class="col-sm-8">
		
		<?php echo "<h2>
		Chatbot 
		</h2>
		<br>
		<p><strong>Sign up to get started</strong></p>

		"?>
		
		
		
		
		</div>
	<!-- container -->
		<div class="panelo">
		<div class="col-sm-4">
		<div class="panel panel-default">
  <div class="panel-heading"><b>Welcome to Meru university website</b></div>
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
</div>





<br/>
<br/>