<?php
include("dbconnection.php");
$search = $_GET['cnum'];
 $sql = "SELECT * FROM childrecords WHERE childs_number LIKE '%$search%'";
 $query = mysqli_query($con, $sql);

if (mysqli_num_rows($query)==null) {
	echo "<tr><td>There are (0) results for that search..</td></tr>";
}else{
	
	while ($row = mysqli_fetch_array($query)) {
		echo "<tr>";
		echo "<td>".$row['childs_number']."</td>";
	
		echo "<td>".$row['child_name']."</td>";

		echo "<td><button class='btn btn-primary btn-sm' value='$row[childs_number]' onclick='addChildNum(this.value)'>Add weight</button></td>";
		echo "</tr>";
	}
}

?>

