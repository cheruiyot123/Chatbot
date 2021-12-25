<?php 
$_SESSION['ans']='';
include('conn.php');

if(empty($_SESSION['visname'])){
	header('location:index.php?option=visslip');
}
$dat=date("y-m-d");
$tim=date("H:i:s");
$e=$_SESSION['visemail'];
$q=$_SESSION['q'] ?? null;
$a=$_SESSION['ans'];
if(isset($_POST['inval'])){

	/*$qry="insert into invalid(userid,question,answer,date,time,role)values('$e','$q','$a','$dat','$tim','visitor')";
	$res=mysqli_query($conn,$qry);
	if($res){
		$_SESSION['ans']="your response has been submitted to admin for update";
	}*/
}
 ?>
 
			<div class="row center-xs center-sm center-md center-lg">
				<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
						<h2>Welcome to Meru University Chatboat</h2>
						<p>Feel free to ask your Questions</p>
						<div class="nav-sidebar2">
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					          
					            <p><span class="glyphicon glyphicon-user"></span> <?php echo $_SESSION['visname'] ?? null; ?></p>
					            <p><a href="logout.php" class="glyphicon glyphicon-off"> Logout</a></p>				
					        </div>

						</div>
				</div>
				<div class="col-xs-12 col-sm-4 col-md-6 col-lg-6">
				<div class="vis-contain">
					<div class="chat-output">
				      <div class="chat-output">
						<div class="user-message">
						<div class="message"><?php if(empty($_SESSION['ans'])){echo 'Hey '.$_SESSION['visname'].', I am bot how can i help you?';}else{echo $_SESSION['ans'];}?></div>
						</div>
				      </div>
				      <div class='bot-message'>
				        <div class='message'>
				       <?php echo $_POST['q'] ?? null;
				       	?>	
				       
				        </div>
				      </div>
				 </div>	
				 <div class="chat-input">
<form method="POST" action="index.php?option=vischat" id="user-input-form">
<input type="text" id="user-input" class="user-input" placeholder="Talk to the bot." name="q">
<button class="but" type="submit" name="qrry">ask</button>
			
<button class="but" type="submit" name="inval">invalid?</button>	
	
</form>
</div>
		<!--<h3>Response</h3>-->
		<textarea id="mytext" cols="50" rows="5" style="display: none;"><?php echo $_SESSION['ans']; ?></textarea>
		<label>
			<span>Voice volume</span>
			<input type="range" id="volumeslider" style="display:none;" min="0" max="1" value="0.5" step="0.1"/>
		</label>
		<div class="but" onclick="speak();" >Speak</div>
		
		<!--<label>
			<span>Click if the response is invalid</span>
			<form method="POST" action="index.php?option=vischat">
			<button class="but" type="submit" name="inval">invalid?</button>
			</form>
		</label>-->
	
	</div>
	</section>
<script type="text/javascript">

		function checkcompatibility (){
			if(!('speechSynthesis' in window)){
				alert('your browser is not supported');
			}
		};
		checkcompatibility();
		var voiceOptions = document.getElementById('voiceOptions');
		var volumeslider = document.getElementById('volumeslider');
		var rateslider = document.getElementById('rateslider');
		var pitchslider = document.getElementById('pitchslider');
		var mytext = document.getElementById('mytext');

		var voiceMap =[];

		function speak(){
			var msg= new SpeechSynthesisUtterance();
			msg.volume= volumeslider.value;
			msg.text = mytext.value;
			window.speechSynthesis.speak(msg);
		}

	</script>
					
				</div>
			</div>
		

