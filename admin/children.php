<?php
session_start();
include("../dbconnection.php");

    $sql = "SELECT * FROM childrecords";
     $query = mysqli_query($con, $sql);

    if (mysqli_num_rows($query)==null) {
      echo "<tr><td>There are (0) results </td></tr>";
    }else{
      
      while ($row = mysqli_fetch_array($query)) {
        echo "<tr>";
        echo "<td>".$row['childs_number']."</td>";
      
        echo "<td>".$row['child_name']."</td>";

        echo "<td><button class='btn btn-sm btn-raised bg-green' value='$row[childs_number]' onclick='addChildNum(this.value)'>Add weight</button><a href='childreport.php?childnumber=$row[childs_number]' class='btn btn-sm btn-raised bg-cyan text-white'>View Details</a></td>";
        echo "</tr>";
      }
    }

    ?>