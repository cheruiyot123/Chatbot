
<?php
  $servername = "localhost";
  $username = "root";
  $db ="chatboat";
  $password="";
  $conn = mysqli_connect($servername, $username, $password, $db);
   
   if(! $conn ) {
      die('Could not connect: ' . mysql_error());
   }
   
   $sql = 'SELECT * FROM updates';
   $result = mysqli_query($conn, $sql);
   //$quer = mysql_num_rows($result);

   

   if(! $result ) {
      die('Could not get data: ' . mysql_error());
   }
   echo'<h1>Current Updates</h1>';
   while($row = mysqli_fetch_array($result)) {
   
?>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
<div class="container card">
  <div class="card-body">
    <h5 class="card-title"><?php echo $row['Title']; ?></h2></h5>
    <p class="card-text"><?php echo $row['body']; ?></p>
    <p class="card-title"><?php echo $row['created_at'];  ?> </p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>

</div>
</body>
</html>
<?php } ?>
