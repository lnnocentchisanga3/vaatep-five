<?php
$childid = $_GET['get'];

include("../dbconnection.php");


$sql = mysqli_query($con, "SELECT * FROM childrecords INNER JOIN child_account ON childrecords.childs_number =child_account.child_number WHERE childs_number= '$childid'");
$row = mysqli_fetch_array($sql);
?>

<!-- Modal Header -->
<div class="modal-header" id="printedDiv">
  <h4 class="modal-title">Details for <?php echo $row['child_name'] ?></h4> <!-- <button class="btn btn-sm btn-info mx-5">Print <i class="ti-printer" onclick="printContent('printedDiv')"></i></button>
 -->  <button type="button" class="close" data-dismiss="modal">&times;</button>
</div>

<!-- Modal body -->
<div class="modal-body">
  <div class="row">
	  <i class="fa fa-id"></i>
	  <div class="col-md-6 my-3"><span class="mx-2" style="font-weight: bold;"><i class="ti-id-badge"></i> Child Identity Number:</span><?php echo $row[0];?></div>

	  <div class="col-md-6 my-3"><span class="mx-2" style="font-weight: bold;"><i class="ti-user"></i> Child's Names:</span><?php echo $row[2];?></div>

	  <div class="col-md-6 my-3"><span class="mx-2" style="font-weight: bold;"><i class="ti-medall"></i> Gender:</span><?php echo $row[3];?></div>

	  <div class="col-md-6 my-3"><span class="mx-2" style="font-weight: bold;"><i class="ti-face-smile"></i> Mother's Names:</span><?php echo $row[4];?></div>

	  <div class="col-md-6 my-3"><span class="mx-2" style="font-weight: bold;"><i class="ti-face-sad"></i> Father's Name:</span><?php echo $row[6];?></div>

	  <div class="col-md-6 my-3"><span class="mx-2" style="font-weight: bold;"><i class="ti-id-badge"></i> Mothers NRC:</span><?php echo $row[5];?></div>

	  <div class="col-md-6 my-3"><span class="mx-2" style="font-weight: bold;"><i class="ti-id-badge"></i> Fathers NRC:</span><?php echo $row[7];?></div>

	  <div class="col-md-6 my-3"><span class="mx-2" style="font-weight: bold;"><i class="ti-home"></i> Health Facility:</span><?php echo $row[1];?></div>

	  <div class="col-md-6 my-3"><span class="mx-2" style="font-weight: bold;"><i class="ti-calendar"></i> Date First Seen:</span><?php echo $row[8];?></div>

	  <div class="col-md-6 my-3"><span class="mx-2" style="font-weight: bold;"><i class="ti-calendar"></i> Date of Birth:</span><?php echo $row[9];?></div>

	  <div class="col-md-6 my-3"><span class="mx-2" style="font-weight: bold;"><i class="ti-stats-up"></i> Birth Weight:</span><?php echo $row[10];?> KG</div>

	  <div class="col-md-6 my-3"><span class="mx-2" style="font-weight: bold;"><i class="ti-map"></i> Place of birth:</span><?php echo $row[11];?></div>

	  <div class="col-md-6 my-3"><span class="mx-2" style="font-weight: bold;"><i class="ti-direction"></i> Residence:</span><?php echo $row[12];?></div>

	  <div class="col-md-6 my-3"><span class="mx-2" style="font-weight: bold;"><i class="ti-dashboard"></i> Account Status:</span><?php echo $row[13];?></div>

	  <!--<div class="col-md-6 my-3"><span class="mx-2" style="font-weight: bold;"><i class="ti-user"></i> hello:</span><?php echo $row[2];?></div> -->
	</div>
</div>