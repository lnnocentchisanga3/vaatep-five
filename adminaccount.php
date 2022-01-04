<?php
include("adheader.php");
include("dbconnection.php");

    session_start();
    if(!isset($_SESSION[adminid])){
        echo "<script>window.location='adminlogin.php';</script>";
    }
    if(!isset($_SESSION[adminid])){
        echo "<script>window.location='adminlogin.php';</script>";
    }
    $msgDis = "";
    $date = date("d-m-Y");

    if (isset($_POST['save'])) {
        
        $checkkg = mysqli_query($con, "SELECT * FROM weight WHERE childs_number ='$_POST[number]' AND day ='$date'");
        $check_fetch = mysqli_fetch_array($checkkg);
        $num = mysqli_num_rows($checkkg);
        if ( $num == null) {
            $insertkg = mysqli_query($con, "INSERT INTO weight(childs_number,weight,day) VALUES('$_POST[number]','$_POST[weight]','$date')");
            if ($insertkg) {
                $msgDis .='<div  class="py-2 bg-cyan px-2 text-white">The Child weight has been added successfully</div>';
            }else{
                $msgDis .='<div  class="py-2 bg-danger px-2 text-white">Error '.mysqli_error($con).'</div>';
            }
        }else{
            $msgDis .='<div  class="py-2 bg-danger px-2 text-white">The Child weight has been added Already</div>';
        }
        /*if ($checkkg) {
            echo "hello";
        }else{
            echo "Error".mysqli_error($con);
        }*/
    }
    $delMsg = "";

    if (isset($_GET['delid'])) {
        $del = mysqli_query($con, "DELETE FROM under_five_days WHERE d_id ='$_GET[delid]'");
        if ($del) {
            $delMsg .='<div  class="py-2 bg-green px-2 text-white">Record has been Deleted successfully</div>';
        }else{
            $delMsg .='<div  class="py-2 bg-red px-2 text-white">Error '.mysqli_error($con).'</div>';
        }
    }

?>


<div class="container-fluid">
    <div class="block-header">
        <h2>Dashboard</h2>
        <small class="text-muted">Welcome to Admin Panel</small>
    </div>

    <div class="row clearfix">
        <div class="col-lg-3 col-md-3 col-sm-6">
            <div class="info-box-4 hover-zoom-effect">
                <div class="icon"> <i class="zmdi zmdi-male-female col-blush"></i> </div>
                <div class="content">
                    <div class="text">Total Children</div>
                    <div class="number">
                        <?php
                        $sql = "SELECT * FROM childrecords WHERE status='Active'";
                        $qsql = mysqli_query($con,$sql);
                        echo mysqli_num_rows($qsql);
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="col-lg-3 col-md-3 col-sm-6">
            <div class="info-box-4 hover-zoom-effect">
                <div class="icon"> <i class="zmdi zmdi-account-circle col-cyan"></i> </div>
                <div class="content">
                    <div class="text">Total Doctor </div>
                    <div class="number"> -->
                        <?php
                        /*$sql = "SELECT * FROM doctor WHERE status='Active' ";
                        $qsql = mysqli_query($con,$sql);
                        echo mysqli_num_rows($qsql);*/
                        ?>
                    <!-- </div>
                </div>
            </div>
        </div> -->
        <div class="col-lg-3 col-md-3 col-sm-6">
            <div class="info-box-4 hover-zoom-effect">
                <div class="icon"> <i class="zmdi zmdi-account-box-mail col-blue"></i> </div>
                <div class="content">
                    <div class="text">Total Admins</div>
                    <div class="number">
                        <?php
                        $sql = "SELECT * FROM admin WHERE status='Active'";
                        $qsql = mysqli_query($con,$sql);
                        echo mysqli_num_rows($qsql);
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6">
            <div class="info-box-4 hover-zoom-effect">
                <div class="icon"> <i class="zmdi zmdi-account col-green"></i> </div>
                <div class="content">
                    <div class="text">Today's Attendance</div>
                    <div class="number"> 
                        <?php 
                         $date = date("d-m-Y");
                          $sql = "SELECT * FROM `weight` WHERE day ='$date'";
                          $qsql = mysqli_query($con,$sql);
                            echo mysqli_num_rows($qsql);
                          ?>
                    </div>
                </div>
            </div>
        </div>
    </div>


   <div class="container-fluid">
       <div class="row">
        <h6 class="col-md-12">Add the Weight of the child</h6>
           <div class="col-md-4 my-3">
            <div class=" input-group">
                <span class="bg-cyan col-md-2 py-2 mx-1"><i class="fa fa-search"></i></span>
               <input type="text" name="search" id="searchChild" onkeyup="getChildByAjax(this.value)" class="form-control col-md-12 bg-white" placeholder="Search by Child's Identity ID" autofocus>
            </div>

            <div class="bg-white col-md-12 py-2" style="height: auto;">
                <table class="table table-bordered table-striped table-hover dataTable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="searchedValues">
                    <tr><td>Your searched data will be here..</td></tr>
                </tbody>
            </table>
            </div>
           </div>
           <div class="col-md-3 my-3">
            <div><?php echo $msgDis; ?></div>
            <!-- <p>Enter the weight of the child</p> -->
            <form method="POST" action="" onSubmit="return validateform()">
                <label>Child's Identity</label>
            <input type="text" name="number" id="cnum" class="form-control col-md-12 mx-1" placeholder="eg. 33454" required style="border: 1px solid black; color: black; background-color:white;">
            <label>Child's Weight</label>
               <input type="text" name="weight" id="weight" class="form-control col-md-12 bg-white mx-1" placeholder="Enter the weight" required>
               <button class="btn btn-sm bg-cyan text-white" name="save">Save <i class="fa fa-save text-white"></i></button>
            </form>
           </div>
               <div class="col-md-5">
                <?php echo $delMsg;?>
              <h6 class="text" >Days to visit the clinic</h6>
              <div class="">

                  <?php
                  $query ="SELECT * FROM `under_five_days`";
                  $sql =  mysqli_query($con , $query);

                  if (mysqli_num_rows($sql)==null) {
                    echo '<ol class=""><li class="nav-item py-2 text-primary"> Sorry !! there are no days to visit the clinic </li></ol>';
                  }else{
                    echo '<table class="table table-hover table-striped table-bordered table-responsive">
                      <thead>
                          <tr>
                              <th>Day</th>
                              <th>From</th>
                              <th>To</th>
                              <th>Action</th>
                          </tr>
                      </thead>
                      <tbody>';
                     while($row = mysqli_fetch_array($sql)) {
                    echo '<tr>
                              <td>'.$row["day"].'</td>
                              <td>'.$row["from_time"].'</td>
                              <td>'.$row["to_time"].'</td>
                              <td><a class="btn btn-sm bg-cyan text-white" href="addvisit.php?editid='.$row[d_id].'"><i class="fa fa-edit"></i></a>
                              <a class="btn btn-sm bg-red text-white" href="adminaccount.php?delid='.$row[d_id].'"><i class="fa fa-trash"></i></a>
                              </td>
                          </tr>';
                  }
                  echo'</tbody>
                  </table>';
                  }
                  ?>
              </div>
            </div>
       </div>
   </div>

    <div class="clear"></div>
</div>
</div>
<?php
include("adfooter.php");
?>
<script type="text/javascript">
    function getChildByAjax(num){
        if (num == "" || num == null) {
        document.getElementById('searchedValues').innerHTML = "There are (0) results for that search..";
       }else{
       let xhttp;

        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById('searchedValues').innerHTML = this.responseText;
        } 
        };

        xhttp.open("GET", "./search_child.php?cnum="+num, true);
        xhttp.send();
     }
    }

    function addChildNum(num){
        document.getElementById('cnum').value = num;
    }
</script>
