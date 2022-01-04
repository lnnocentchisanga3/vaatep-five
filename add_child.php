<?php
include("adformheader.php");
include("dbconnection.php");
if(isset($_POST[submit]))
{
	if(isset($_GET[editid]))
	{
		$sql ="UPDATE childrecords SET childs_number='$_POST[childn]',health_facility='$_POST[facility]',child_name='$_POST[cname]',gender='$_POST[gender]',M_names='$_POST[mname]',M_nrc='$_POST[mnrc]',F_names='$_POST[fname]',F_nrc='$_POST[fnrc]',date_first_seen='$_POST[dateseen]',date_of_birth='$_POST[dbirth]',weight_kg='$_POST[weight]',place_of_birth='$_POST[placeofbirth]',residence='$_POST[residence]',status='Active' WHERE childs_number='$_GET[editid]'";
		if($qsql = mysqli_query($con,$sql))
		{
			if(mysqli_query($con, "UPDATE child_account SET child_number='$_POST[childn]',password='$_POST[password]',phone='$_POST[phone]' WHERE child_number='$_GET[editid]'"))
            {
                echo '<h6 class="bg-success py-2 text-white text-center">A child record has been updated successfully...</h6>';

            }
            else
            {
                 echo 'Error'.mysqli_error($con);   
            }
		}
		else
		{
			echo mysqli_error($con);
		}	
	}
	else
	{
		$sql ="INSERT INTO childrecords(childs_number,health_facility,child_name,gender,M_names,M_nrc,F_names,F_nrc,date_first_seen,date_of_birth,weight_kg,place_of_birth,residence,status) values('$_POST[childn]','$_POST[facility]','$_POST[cname]','$_POST[gender]','$_POST[mname]','$_POST[mnrc]','$_POST[fname]','$_POST[fnrc]','$_POST[dateseen]','$_POST[dbirth]','$_POST[weight]','$_POST[placeofbirth]','$_POST[residence]','Active')";
		if($qsql = mysqli_query($con,$sql))
		{
			
			/*$insid= mysqli_insert_id($con);*/
			if(mysqli_query($con, "INSERT INTO child_account(child_number,password,email,phone) VALUES('$_POST[childn]','$_POST[password]','$_POST[email]','$_POST[phone]')"))
			{
				echo '<h6 class="bg-success py-2 text-white text-center">A child record has been inserted successfully...</h6>';	
			}
			else
			{
				 echo 'Error'.mysqli_error($con);	
			}		
		}
		else
		{
			echo mysqli_error($con);
            /*echo '<h6 class="bg-danger py-2 text-white text-center">Opps! There was an error try again(2)</h6>';*/
		}
	}
}
if(isset($_GET[editid]))
{
	$sql="SELECT * FROM childrecords INNER JOIN child_account ON childrecords.childs_number=child_account.child_number WHERE childs_number='$_GET[editid]' ";
	$qsql = mysqli_query($con,$sql);

    /*if ($qsql) {
        echo "hello";
    }else{
        echo "Error".mysqli_error($con);
    }*/
	$rsedit = mysqli_fetch_array($qsql);
	
}
?>

<div class="container-fluid">
    <div class="block-header">
        <h2 class="text-center">Child Registration Panel</h2>

    </div>
    <div class="card">

        <form method="post" action="" onSubmit="return validateform()" style="padding: 10px">



            <div class="form-group"><label>Child's Number</label>
                <div class="form-line">
                    <input class="form-control" type="text" name="childn" id="childname" value="<?php echo $rsedit[childs_number];?>" required/>
                </div>
            </div>

            <div class="form-group"><label>Health Facility</label>
                <div class="form-line">
                    <input class="form-control" type="text" name="facility" id="hfacility" value="<?php echo $rsedit[health_facility];?>" required/>
                </div>
            </div>


            <div class="form-group"><label>Child's Name</label>
                <div class="form-line">
                    <input class="form-control" type="text" name="cname" id="cname" value="<?php echo $rsedit[child_name];?>" required/>
                </div>
            </div>

            <div class="form-group">
                <label>Gender</label>
                <div class="form-line">
                    <select class="form-control" name="gender" id="gender">
                       <option value="">Select</option>
                        <?php
                    $arr = array("MALE","FEMALE");
                    foreach($arr as $val)
                    {
                      if ($val == $rsedit['gender']) {
                          echo "<option value='$val' selected>$val</option>";
                      }else{
                        echo "<option value='$val' selected>$val</option>";
                      }
                    }
                    ?>
                    </select>
                </div>
            </div>

            <div class="form-group"><label>Mother's name</label>
                <div class="form-line">
                    <input class="form-control" type="text" name="mname" id="mobilenumber" value="<?php echo $rsedit[M_names];?>" required/>
                </div>
            </div>


            <div class="form-group"><label>Mother's NRC</label>
                <div class="form-line">
                    <input class="form-control" type="text" name="mnrc" id="mnrc" value="<?php echo $rsedit[M_nrc];?>" required/>
                </div>
            </div>


            <div class="form-group"><label>Father's name</label>
                <div class="form-line">
                    <input class="form-control" type="text" name="fname" id="fname" value="<?php echo $rsedit[F_names];?>" required/>
                </div>
            </div>


            <div class="form-group"><label>Father's NRC</label>
                <div class="form-line">
                    <input class="form-control" type="text" name="fnrc" id="fnrc" value="<?php echo $rsedit[F_nrc];?>" required/>
                </div>
            </div>


            <div class="form-group"><label>Date First Seen</label>
                <div class="form-line">
                    <input class="form-control" type="date" name="dateseen" id="dateseen" value="<?php echo $rsedit[date_first_seen];?>" required/>
                </div>
            </div>


            <div class="form-group"><label>Where the family lives : address</label>
                <div class="form-line">
                    <input class="form-control" type="text" name="residence" id="residence" value="<?php echo $rsedit[residence];?>" required/>
                </div>
            </div>


            <div class="form-group"><label>Weight On Birth</label>
                <div class="form-line">
                    <input type="text" name="weight" id="weight" class="form-control" value="<?php echo $rsedit[weight_kg];?>">
                </div>
            </div>


            <div class="form-group"><label>Place of Birth</label>
                <div class="form-line">
                    <input type="text" name="placeofbirth" class="form-control" value="<?php echo $rsedit[place_of_birth];?>">
                </div>
            </div>


            <div class="form-group"><label>Date Of Birth</label>
                <div class="form-line">
                    <input class="form-control" type="date" name="dbirth" id="dateofbirth" value="<?php echo $rsedit[date_of_birth];?>" required/>
                </div>
            </div>

            <h6 class="col-md-12 py-2">Account Details</h6>

            <div class="form-group"><label>Email</label>
                <div class="form-line">
                    <input class="form-control" type="email" name="email" value="<?php echo $rsedit[email];?>"  required/>
                </div>
            </div>

            <div class="form-group"><label>Phone</label>
                <div class="form-line">
                    <input class="form-control" type="text" name="phone" value="<?php echo $rsedit[phone];?>" required/>
                </div>
            </div>

            <div class="form-group"><label>Password</label>
                <div class="form-line">
                    <input class="form-control" type="password" name="password" value="<?php echo $rsedit[password];?>"  required/>
                </div>
            </div>





            <input class="btn btn-default" type="submit" name="submit" id="submit" value="Submit" />




        </form>
        <p>&nbsp;</p>
    </div>
</div>
</div>
<div class="clear"></div>
</div>
</div>
<?php
include("adformfooter.php");
?>
<script type="application/javascript">
/*var alphaExp = /^[a-zA-Z]+$/; //Variable to validate only alphabets
var alphaspaceExp = /^[a-zA-Z\s]+$/; //Variable to validate only alphabets and space
var numericExpression = /^[0-9]+$/; //Variable to validate only numbers
var alphanumericExp = /^[0-9a-zA-Z]+$/; //Variable to validate numbers and alphabets
var emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/; //Variable to validate Email ID 

function validateform() {
    if (document.frmpatient.patientname.value == "") {
        alert("Patient name should not be empty..");
        document.frmpatient.patientname.focus();
        return false;
    } else if (!document.frmpatient.patientname.value.match(alphaspaceExp)) {
        alert("Patient name not valid..");
        document.frmpatient.patientname.focus();
        return false;
    } else if (document.frmpatient.admissiondate.value == "") {
        alert("Admission date should not be empty..");
        document.frmpatient.admissiondate.focus();
        return false;
    } else if (document.frmpatient.admissiontme.value == "") {
        alert("Admission time should not be empty..");
        document.frmpatient.admissiontme.focus();
        return false;
    } else if (document.frmpatient.address.value == "") {
        alert("Address should not be empty..");
        document.frmpatient.address.focus();
        return false;
    } else if (document.frmpatient.mobilenumber.value == "") {
        alert("Mobile number should not be empty..");
        document.frmpatient.mobilenumber.focus();
        return false;
    } else if (!document.frmpatient.mobilenumber.value.match(numericExpression)) {
        alert("Mobile number not valid..");
        document.frmpatient.mobilenumber.focus();
        return false;
    } else if (document.frmpatient.city.value == "") {
        alert("City should not be empty..");
        document.frmpatient.city.focus();
        return false;
    } else if (!document.frmpatient.city.value.match(alphaspaceExp)) {
        alert("City not valid..");
        document.frmpatient.city.focus();
        return false;
    } else if (document.frmpatient.pincode.value == "") {
        alert("Pincode should not be empty..");
        document.frmpatient.pincode.focus();
        return false;
    } else if (!document.frmpatient.pincode.value.match(numericExpression)) {
        alert("Pincode not valid..");
        document.frmpatient.pincode.focus();
        return false;
    } else if (document.frmpatient.loginid.value == "") {
        alert("Login ID should not be empty..");
        document.frmpatient.loginid.focus();
        return false;
    } else if (!document.frmpatient.loginid.value.match(alphanumericExp)) {
        alert("Login ID not valid..");
        document.frmpatient.loginid.focus();
        return false;
    } else if (document.frmpatient.password.value == "") {
        alert("Password should not be empty..");
        document.frmpatient.password.focus();
        return false;
    } else if (document.frmpatient.password.value.length < 8) {
        alert("Password length should be more than 8 characters...");
        document.frmpatient.password.focus();
        return false;
    } else if (document.frmpatient.password.value != document.frmpatient.confirmpassword.value) {
        alert("Password and confirm password should be equal..");
        document.frmpatient.confirmpassword.focus();
        return false;
    } else if (document.frmpatient.select2.value == "") {
        alert("Blood Group should not be empty..");
        document.frmpatient.select2.focus();
        return false;
    } else if (document.frmpatient.select3.value == "") {
        alert("Gender should not be empty..");
        document.frmpatient.select3.focus();
        return false;
    } else if (document.frmpatient.dateofbirth.value == "") {
        alert("Date Of Birth should not be empty..");
        document.frmpatient.dateofbirth.focus();
        return false;
    } else if (document.frmpatient.select.value == "") {
        alert("Kindly select the status..");
        document.frmpatient.select.focus();
        return false;
    } else {
        return true;
    }
}*/
</script>