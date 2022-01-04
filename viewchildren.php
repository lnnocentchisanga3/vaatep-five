<?php
include("adformheader.php");
include("dbconnection.php");
if(isset($_GET[delid]))
{
	$sql ="DELETE FROM childrecords WHERE childs_number='$_GET[delid]'";
	$qsql=mysqli_query($con,$sql);
	if(mysqli_affected_rows($con) == 1)
	{
		$sql1 = "DELETE FROM child_account WHERE childs_number='$_GET[delid]'";
    $sql2 =mysqli_query($con,$sql1);

    if (mysqli_affected_rows($con) == 1) {
      echo '<h6 class="bg-success py-2 text-white text-center">A child record has been Deleted successfully...</h6>';
    }else{
      echo '<h6 class="bg-danger py-2 text-white text-center">A child record has not been Deleted (1)...</h6>';
    }
	}else{
    echo '<h6 class="bg-danger py-2 text-white text-center">A child record has not been Deleted (2)...</h6>';
  }
}
?>
<div class="container-fluid">
  <div class="block-header">
    <h2 class="text-center">View children Records</h2>

  </div>

<div class="card">

  <section class="container">
    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">

      <thead>
        <tr>
          <th>Child names</th>
          <th>Dates</th>
          <th>Address, Birth of place</th>    
          <th>Child Profile</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
       <?php
       $sql ="SELECT * FROM `childrecords`";
       $qsql = mysqli_query($con,$sql);
       while($rs = mysqli_fetch_array($qsql))
       {
        echo "<tr>
        <td>$rs[child_name]<br><br>
        <strong>Child ID :</strong> $rs[childs_number] </td>
        <td>
        <strong>First Seen</strong>: &nbsp;$rs[date_first_seen]<br><br>
        <strong>DOB</strong>: &nbsp;$rs[date_of_birth]</td>
        <td>$rs[residence]<br><br> <strong>POB</strong> : &nbsp;$rs[place_of_birth]</td>
        <td><strong>Weight</strong> - $rs[weight_kg] kg<br>
        <strong>Gender</strong> - &nbsp;$rs[gender]<br>
        <strong>DOB</strong> - &nbsp;$rs[date_of_birth]</td>
        <td align='center'>Status - $rs[status] <br>";
        if(isset($_SESSION[adminid]))
        {
          echo "<a href='add_child.php?editid=$rs[childs_number]' class='btn btn-sm btn-raised bg-green'>Edit</a><a href='viewchildren.php?delid=$rs[childs_number]' class='btn btn-sm btn-raised bg-blush'>Delete</a> <hr>
          <a href='childreport.php?childnumber=$rs[childs_number]' class='btn btn-sm btn-raised bg-cyan'>View Report</a>";
        }
        echo "</td></tr>";
      }
      ?>
    </tbody>
  </table>
</section>

</div>
</div>
<?php
include("adformfooter.php");
?>