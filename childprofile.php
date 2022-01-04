<?php
include("dbconnection.php");

if(isset($_GET[childnumber]))
{
$sqlchild = "SELECT * FROM childrecords where childs_number='$_GET[childnumber]'";
$qsqlchild_sql = mysqli_query($con,$sqlchild);
$row=mysqli_fetch_array($qsqlchild_sql);
?>

    <table class="table table-bordered table-striped">
      <tbody>
        <tr>
          <td width="16%"><strong>Child Name </strong></td>
          <td width="34%">&nbsp;<?php echo $row[child_name]; ?></td>
          <td width="16%"><strong>Child ID</strong></td>
          <td width="34%">&nbsp;<?php echo $row[childs_number]; ?></td>
        </tr>
        <tr>
          <td><strong>Address</strong></td>
          <td>&nbsp;<?php echo $row[residence]; ?></td>
          <td><strong>Gender</strong></td>
          <td> <?php echo $row[gender];?></td>
        </tr>
        <tr>
          <td><strong>Facility</strong></td>
          <td>&nbsp;<?php echo $row[health_facility]; ?></td>
          <td><strong>Date Of Birth </strong></td>
          <td>&nbsp;<?php echo $row[date_of_birth]; ?></td>
        </tr>
      </tbody>
    </table>
<?php
}

?>


<script type="application/javascript">
/*function validateform()
{
	if(document.frmpatdet.patientname.value == "")
	{
		alert("Patient name should not be empty..");
		document.frmpatdet.patientname.focus();
		return false;
	}
	else if(document.frmpatdet.patientid.value == "")
	{
		alert("Patient ID should not be empty..");
		document.frmpatdet.patientid.focus();
		return false;
	}
	else if(document.frmpatdet.admissiondate.value == "")
	{
		alert("Admission date should not be empty..");
		document.frmpatdet.admissiondate.focus();
		return false;
	}
	else if(document.frmpatdet.admissiontime.value == "")
	{
		alert("Admission time should not be empty..");
		document.frmpatdet.admissiontime.focus();
		return false;
	}
	else if(document.frmpatdet.address.value == "")
	{
		alert("Address should not be empty..");
		document.frmpatdet.address.focus();
		return false;
	}
	else if(document.frmpatdet.select.value == "")
	{
		alert("Gender should not be empty..");
		document.frmpatdet.select.focus();
		return false;
	}
	else if(document.frmpatdet.mobilenumber.value == "")
	{
		alert("Contact number should not be empty..");
		document.frmpatdet.mobilenumber.focus();
		return false;
	}
	else if(document.frmpatdet.dateofbirth.value == "")
	{
		alert("Date Of Birth should not be empty..");
		document.frmpatdet.dateofbirth.focus();
		return false;
	}
	
	else
	{
		return true;
	}
}*/
</script>