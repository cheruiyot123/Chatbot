<?php
//session_start();
include('jaro.php');

$match=array();
$match2=array();
$jaro= array();

//$question=array();
$conn=mysqli_connect("localhost","root","","chatboat");
function matchString($res,$conn){
//include('jaro.php');
	$dat=date("y-m-d");
$tim=date("H:i:s");
$e=$_SESSION['visemail'];
$match=array();
$match2=array();
$jaro= array();
$quer="select*from information";
$result=mysqli_query($conn,$quer);
while($row=mysqli_fetch_array($result)){
	$question=$row['question'];
	$jw = new StringCompareJaroWinkler();
	$jw->compare($res,$question);
	//$in++;
	$d=$_SESSION['F'];

	if($d >=0.85){
		$querr="select * from information where question='$question'";
		$q2=mysqli_query($conn,$querr);
		$row2=mysqli_fetch_array($q2);
		$id2=$row2['id'];
		array_push($match2,$id2);
		//echo $id2;
		array_push($jaro,$d);
		//echo "<br>";
		//echo $d;
		//echo "<br>";
	}


}
if(empty($jaro)){
		$query="insert into nores(userid,question,date,time,role)values('$e','$res','$dat','$tim','visitor')";
		$resp=mysqli_query($conn,$query);
		if($resp){
			$nores='sorry '.$_SESSION['visname'].' currently there is no response to that querry, i have notified the admin';
			$_SESSION['ans']=$nores;
		}

}else{
$val=max($jaro);
$key=array_search($val,$jaro);
$id3= $match2[$val];
$q="select * from information where id='$id3'";
$querry=mysqli_query($conn,$q);
$row=mysqli_fetch_array($querry);
$_SESSION['ans']=$row['answer'];
}
}

if (isset($_POST['qrry'])) {
	$in=-1;

$string=mysqli_escape_string($conn,$_POST['q']);
$_SESSION['q']=$string;
//array_push($questions,$string);
$res=preg_replace("/[^a-zA-Z0-9\s]/","", $string);
$data=preg_split("/(?<=\w)\b\s*[!?.]*/", $res);
//search db for a close match
//matchString($res,$conn);
foreach ($data as $dat) {
	if($dat !=''){
		//echo $dat;
		//echo"<br>";
		$querry="select * from information where keyword1 ='$dat' OR keyword2 ='$dat'";
		$result=mysqli_query($conn,$querry);
		if(mysqli_num_rows($result)>0){
			while($row=mysqli_fetch_array($result)){
			$id= $row['id'];
			array_push($match,$id);	
			}
			
		}
		}
	}
	if(empty($match)){
		matchString($res,$conn);
	}
//count duplicates in array
			if(count($match) == count(array_unique($match))){
				foreach ($match as $mat) {
					
				if($mat!=''){	
				//echo "all values are unique";
				$querry="select * from information where id='$mat'";
					$result=mysqli_query($conn,$querry);
					if(mysqli_num_rows($result)>0){
						$row=mysqli_fetch_array($result);
						$question=$row['question'];
						$ans=$row['answer'];
					}
					$jw = new StringCompareJaroWinkler();
					$jw->compare($question,$res);
					$d=$_SESSION['F'];
					if($d >= 0.6){

						$querr="select * from information where question='$question'";
						$q2=mysqli_query($conn,$querr);
						$row2=mysqli_fetch_array($q2);
						$id2=$row2['id'];
						array_push($match2,$id2);
						array_push($jaro,$d);
						$val=max($jaro);
						$key=array_search($val,$jaro);
						$id3= $match2[$val];
						$q="select * from information where id='$id3'";
						$querry=mysqli_query($conn,$q);
						$row=mysqli_fetch_array($querry);
						$_SESSION['ans']=$row['answer'];
					
						//_SESSION['ans']=$ans;
					}
				}
			}
		}else if(count($match) != count(array_unique($match))){
				
			//$duplicates = array_diff($match,array_unique($match));
				$duplicates=array_unique(array_diff_assoc($match, array_unique($match)));
				foreach ($duplicates as $dup) {
					if($dup !=''){
					$querry="select * from information where id='$dup'";
					$result=mysqli_query($conn,$querry);
					$row=mysqli_fetch_array($result);
					$ans=$row['answer'];
					$_SESSION['ans']=$ans;

				}
				}

				}

	//array_push($answer, $_SESSION['ans']);	
}
?>