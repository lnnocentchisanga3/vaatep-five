<?php
include("dbconnection.php");
$search = $_GET['cnum'];

 $query = mysqli_query($con, "SELECT * FROM weight INNER JOIN childrecords ON childrecords.childs_number=weight.childs_number LIKE '%$search%'");

if (mysqli_num_rows($query)==null) {
	echo "<tr><td>There are (0) results for that search..</td></tr>".mysqli_Error($con);
}else{
	
	 while ($row_weight = mysqli_fetch_array($query)) {
          echo '<tr>
                  <td><strong>'.$row_weight["childs_number"].'</strong></td>
                  <td><strong>'.$row_weight["child_name"].'</strong></td>
                  <td><strong>'.$row_weight["month"].'</strong></td>
                  <td><strong>'.$row_weight["weight"].' KG</strong></td>
                  <td>'.$row_weight["day"].'</td>
                  <td><button class="btn btn-sm btn-success" onclick="getChildId(this.value)" value='.$row_weight["childs_number"].' data-toggle="modal" data-target="#childDetails">Edit weight <i class="ti-file"></i></button></td>
                </tr>';
	}
}

?>

<?php
 /* $weight = 
  if (mysqli_num_rows($weight)==null) {
    echo "<tr class='text-center'> <td>No record for weight to show</td> </tr>";
  }else{
   
    }
  }*/
  ?>