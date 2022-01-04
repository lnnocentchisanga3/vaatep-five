<?php
include("adheader.php");
include("dbconnection.php");
if(isset($_POST[submit]))
{
	if(isset($_GET[editid]))
	{
		$id = $_GET[editid];
			$sql ="UPDATE under_five_days SET day='$_POST[day]',from_time='$_POST[from]',to_time='$_POST[to]',added_by='$_SESSION[adminid]' WHERE d_id='$_GET[editid]'";
		if($qsql = mysqli_query($con,$sql))
		{
			echo "<script>alert('day record updated successfully...');</script>";
		}
		else
		{
			echo mysqli_error($con);
		}	
	}
	else
	{
	$sql ="INSERT INTO under_five_days(day,from_time,to_time,added_by) values('$_POST[date]','$_POST[from]','$_POST[to]','$_SESSION[adminid]')";
	if($qsql = mysqli_query($con,$sql))
	{
		echo "<script>alert('Day inserted successfully...');</script>";
	}
	else
	{
		echo mysqli_error($con);
	}
}
}
if(isset($_GET[editid]))
{
	$sql="SELECT * FROM under_five_days WHERE d_id='$_GET[editid]' ";
	$qsql = mysqli_query($con,$sql);
	$rsedit = mysqli_fetch_array($qsql);
	
}
?>


<div class="container-fluid">
	<div class="block-header">
		<?php
		if (isset($_GET['editid'])) {
			echo '<h2 class="text-center">Edit A Visiting Day </h2>';
		}else{
			echo '<h2 class="text-center">Add A Visiting Day </h2>';
		}
		?>
	</div>
  <div class="card">

    <form method="post" action="" name="frmdept" onSubmit="return validateform()">
    <table class="table table-hover">
      <tbody>
        <!-- <tr>
          <td width="34%">Day</td>
          <td width="66%"><select name="day" id="select" class="form-control show-tick">
            <option value="">Select</option> -->
            <?php
					  /*$arr = array("Monday","Tuesday","Wednesday","Thursday","Friday","Saturday");
					  foreach($arr as $val)
					  {
						  if($val == $rsedit[day])
						  {
						  echo "<option value='$val' selected>$val</option>";
						  }
						  else
						  {
							  echo "<option value='$val'>$val</option>";			  
						  }
					  }*/
					  ?>
           <!--  </select></td>
        </tr> -->
        <tr>
          <td>Date</td>
          <td><input type="text" placeholder=" Enter Here " class="form-control no-resize" name="date" required><?php echo $rsedit['day'] ?></input></td>
        </tr>
        <tr>
          <td>Starting From</td>
          <td><input type="text" placeholder=" Enter Here " class="form-control no-resize" name="from" required><?php echo $rsedit['from_time'] ?></input></td>
        </tr>
        <tr>
          <td>Ending To</td>
          <td> <input placeholder=" Enter Here " class="form-control" type="text" name="to" required /><?php echo $rsedit['to_time'] ?></input></td>
        </tr>
        <tr>
          <td colspan="2" align="center"><input class="btn btn-default" type="submit" name="submit"  value="Submit" /></td>
        </tr>
      </tbody>
    </table>
    </form>
    <p>&nbsp;</p>
  </div>
</div>
</div>
 <div class="clear"></div>
  </div>
</div>
<?php
include("adfooter.php");
?>
<script type="application/javascript">
var alphaExp = /^[a-zA-Z]+$/; //Variable to validate only alphabets
var alphaspaceExp = /^[a-zA-Z\s]+$/; //Variable to validate only alphabets and space
var numericExpression = /^[0-9]+$/; //Variable to validate only numbers
var alphanumericExp = /^[0-9a-zA-Z]+$/; //Variable to validate numbers and alphabets
var emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/; //Variable to validate Email ID 

function validateform()
{
	if(document.frmdept.departmentname.value == "")
	{
		alert("Department name should not be empty..");
		document.frmdept.departmentname.focus();
		return false;
	}
	else if(!document.frmdept.departmentname.value.match(alphaspaceExp))
	{
		alert("Department name not valid..");
		document.frmdept.departmentname.focus();
		return false;
	}
	else if(document.frmdept.select.value == "" )
	{
		alert("Kindly select the status..");
		document.frmdept.select.focus();
		return false;
	}
	
	else
	{
		return true;
	}
}
</script>