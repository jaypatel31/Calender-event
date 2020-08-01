<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calender</title>
	<style>
	table{
		border-collapse:collapse;
	}
		span{
			color:red;
		}
	td,th{
		padding:5px;
	}
	td:nth-child(7){
		color:red;
	}
	.blue{
		background-color:blue;
		color:white;
		font-weight:bold;
		cursor:pointer;
	}
	.red{
		background-color:red;
		color:white;
		font-weight:bold;
		cursor:pointer;
	}
	.green{
		background-color:green;
		color:white;
		font-weight:bold;
		cursor:pointer;
	}
	</style>
</head>
<body>
<?php 
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		$ob = $_POST['dob'];
	}
?>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" >
	<label for="mth">
	 Select Any Month : <input name="mth"  id="mth" type="month">
	</label><br/><br/>
	<label for="db">
		DOB : <input type="date" id="db" name="dob" value="<?php echo $ob ?>">
	</label><br/><br/>
	<label for="en">
		EVENT WORD : <input type="text" id="en" name="en" value="<?php echo "" ?>">
	</label><br/><br/>
	<label for="ed">
		EVENT DATE : <input type="date" id="ed" name="ed" value="<?php echo "" ?>">
	</label><br/><br/>
	<input type="submit" value=" submit">
</form>
<?php
	echo "<br/>";
	echo "<br/>";
	
if($_SERVER["REQUEST_METHOD"] == "POST"){
	$a = $_POST['mth'];
	$t = strtotime($a);
	echo date("F Y",$t);
	echo "<br/>";
	$ob = $_POST['dob'];
	$bb = strtotime($ob);
	$dob = date("m-d",$bb); 
	echo "DOB : ".$ob;
	echo "<br/>";
	$ed = $_POST['ed'];
	$en = $_POST['en'];
	$en = strtoupper($en);	
	echo "EVENT DATE : ".$ed;
	echo "<br/>";
	echo "EVENT : ".$en;
	echo "<br/>";
	$day = date("l",$t);
	$st = strtotime($a);
	$lt = strtotime("+1 month",$st);
	$start = date("d",$st);
	$lastdate = strtotime("-1 day",$lt);
	$end =date("d",$lastdate);
	$print = strtotime("+0 day",$st);
	echo "<table border='1px'>";
		echo "<tr>";
			echo "<td>";
				echo "Mon";
			echo "</td>";
			echo "<td>";
				echo "Tue";
			echo "</td>";
			echo "<td>";
				echo "Wed";
			echo "</td>";
			echo "<td>";
				echo "Thu";
			echo "</td>";
			echo "<td>";
				echo "Fri";
			echo "</td>";
			echo "<td>";
				echo "Sat";
			echo "</td>";
			echo "<td>";
				echo "Sun";
			echo "</td>";
		echo "</tr>";
		echo "<tr>";
		$week = 0;
		if($day == "Sunday"){
			$week = 6;
		}
		else if($day == "Tuesday"){
			$week = 1;	
		}
		else if($day == "Wednesday"){
				$week = 2;
				
		}
		else if($day == "Thursday"){
				$week = 3;
				
		}
		else if($day == "Friday"){
				$week = 4;
				
		}
		else if($day == "Saturday"){
				$week = 5;
		}
		for($j=0;$j<$week;$j++){
			echo "<td>";
			echo "</td>";
		}
	for($i=$start;$i<=$end;$i++){
			$dobm = date("m-d",$print);
			$event = date("Y-m-d",$print);
			if($dobm == $dob){
				
				if($ob == $ed){
					echo '<td class="green" title="YOUR BIRTHDAY + '.$en.'">';
				}
				else{
					echo "<td class='blue' title='YOUR BIRTHDAY'>";
				}
			}
			else if($event == $ed){
				echo '<td class="red" title="'.$en.'">';
			}
			else if($dobm !== $dob){
				echo "<td>";
			};
			
			$split = date("d",$print);
			
			echo $split;
			if(date("l",$print) == "Sunday"){
				echo "</tr>";
				echo "<tr>";
			}
		$print = strtotime("+1 day",$print);
	}
}
	
	echo "</table>";
	
?>

</body>
</html>
