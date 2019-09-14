<?php
$mysqli = new mysqli("localhost", "kq000102_pStats", "bo17vereVU", "kq000102_pStats"); 

if ($mysqli === false) { 
	die("ERROR: Could not connect. " 
						.$mysqli->connect_error); 
} 

$sql = "SELECT *
			FROM wo_Running"; 
			
if ($res = $mysqli->query($sql)) { 
	if ($res->num_rows > 0) { 
		echo "<table>"; 
		echo "<tr>"; 
		echo "<th>Date</th>"; 
		echo "<th>Done</th>"; 
		echo "<th>Goal</th>"; 
		echo "<th>Time</th>"; 
		echo "</tr>"; 
		while ($row = $res->fetch_array()) 
		{ 
			echo "<tr>"; 
			echo "<td>".$row['fecha']."</td>"; 
			echo "<td>".$row['kmCorridos']."</td>"; 
			echo "<td>".$row['kmObjetivo']."</td>";
			echo "<td>".$row['tiempoCorrido']."</td>";  
			echo "</tr>"; 
		} 
		echo "</table>"; 
		$res->free(); 
	} 
	else { 
		echo "No matching records are found."; 
	} 
} 
else { 
	echo "ERROR: Could not able to execute $sql. " 
											.$mysqli->error; 
} 
$mysqli->close(); 
?> 
