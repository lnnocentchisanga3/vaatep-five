<?php
session_start();
/*include("adformheader.php");*/
include("../../dbconnection.php");

$alert_msg = "";
if(isset($_POST['submit']))
{
  if(isset($_GET['editid']))
  {
    $editid = $_GET['editid'];
    $sql ="UPDATE childrecords SET childs_number='$_POST[childn]',health_facility='$_POST[facility]',child_name='$_POST[cname]',gender='$_POST[gender]',M_names='$_POST[mname]',M_nrc='$_POST[mnrc]',F_names='$_POST[fname]',F_nrc='$_POST[fnrc]',date_first_seen='$_POST[dateseen]',date_of_birth='$_POST[dbirth]',weight_kg='$_POST[weight]',place_of_birth='$_POST[placeofbirth]',residence='$_POST[residence]',status='Active' WHERE childs_number='$editid'";
    if($qsql = mysqli_query($con,$sql))
    {
      if(mysqli_query($con, "UPDATE child_account SET child_number='$_POST[childn]',password='$_POST[password]',phone='$_POST[phone]' WHERE child_number='$editid'"))
            {
                $alert_msg= '<h6 class="bg-success py-2 text-white text-center">A child record has been updated successfully...</h6>';

            }
            else
            {
                 $alert_msg= 'Error'.mysqli_error($con);   
            }
    }
    else
    {
      $alert_msg= mysqli_error($con);
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
        $alert_msg= '<h6 class="bg-success py-2 text-white text-center">A child record has been inserted successfully...</h6>';  
      }
      else
      {
         $alert_msg= 'Error'.mysqli_error($con); 
      }   
    }
    else
    {
      $alert_msg= mysqli_error($con);
            /*$alert_msg= '<h6 class="bg-danger py-2 text-white text-center">Opps! There was an error try again(2)</h6>';*/
    }
  }
}
if(isset($_GET['editid']))
{
  $editid = $_GET['editid'];
  $sql="SELECT * FROM childrecords INNER JOIN child_account ON childrecords.childs_number=child_account.child_number WHERE childs_number='$editid' ";
  $qsql = mysqli_query($con,$sql);

    /*if ($qsql) {
        $alert_msg= "hello";
    }else{
        $alert_msg= "Error".mysqli_error($con);
    }*/
  $rsedit = mysqli_fetch_array($qsql);
  
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Vaatep</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../../vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="../../vendors/base/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../../css/style.css">

   <style>
      /* width */
      ::-webkit-scrollbar {
        width: 15px;
      }

      /* Track */
      ::-webkit-scrollbar-track {
        background: #f1f1f1;
      }

      /* Handle */
      ::-webkit-scrollbar-thumb {
        border-radius: 1rem;
        background: #6600cc;
        opacity: 0.7;
      }

      /* Handle on hover */
      ::-webkit-scrollbar-thumb:hover {
        background: #555;
      }

      @media print{
    .myDivToPrint{
        background: linear-gradient(to bottom, rgba(0,0,0,0), rgba(0,0,0,1));
        background-size: cover;
        background-repeat: no-repeat;
        background-position: right top;
        height: 100%;
        width: 100%;
        position: fixed;
        top: 0;
        left: 0;
        margin: 0;
        padding: 15px;
        font-size: 14px;
        line-height: 18px;
    }
}
    </style>
  <!-- endinject -->
  <link rel="shortcut icon" href="../../images/icon.png" />
</head>

<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top  d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo mr-5" href="index.php"><img src="../../images/logo.png" class="mr-2" alt="logo"/></a>
        <a class="navbar-brand brand-logo-mini" href="index.php"><img src="../../images/icon.png" alt="logo"/></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="ti-view-list"></span>
        </button>
        <!-- <ul class="navbar-nav mr-lg-2">
          <li class="nav-item nav-search d-none d-lg-block">
            <div class="input-group">
              <div class="input-group-prepend hover-cursor" id="navbar-search-icon">
                <span class="input-group-text" id="search">
                  <i class="ti-search"></i>
                </span>
              </div>
              <input type="text" class="form-control" id="navbar-search-input" placeholder="Search now" aria-label="search" aria-describedby="search">
            </div>
          </li>
        </ul> -->
        <ul class="navbar-nav navbar-nav-right">
          <!-- <li class="nav-item dropdown mr-1">
            <a class="nav-link count-indicator dropdown-toggle d-flex justify-content-center align-items-center" id="messageDropdown" href="#" data-toggle="dropdown">
              <i class="ti-email mx-0"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="messageDropdown">
              <p class="mb-0 font-weight-normal float-left dropdown-header">Messages</p>
              <a class="dropdown-item">
                <div class="item-thumbnail">
                    <img src="images/faces/face4.jpg" alt="image" class="profile-pic">
                </div>
                <div class="item-content flex-grow">
                  <h6 class="ellipsis font-weight-normal">David Grey
                  </h6>
                  <p class="font-weight-light small-text text-muted mb-0">
                    The meeting is cancelled
                  </p>
                </div>
              </a>
              <a class="dropdown-item">
                <div class="item-thumbnail">
                    <img src="images/faces/face2.jpg" alt="image" class="profile-pic">
                </div>
                <div class="item-content flex-grow">
                  <h6 class="ellipsis font-weight-normal">Tim Cook
                  </h6>
                  <p class="font-weight-light small-text text-muted mb-0">
                    New product launch
                  </p>
                </div>
              </a>
              <a class="dropdown-item">
                <div class="item-thumbnail">
                    <img src="images/faces/face3.jpg" alt="image" class="profile-pic">
                </div>
                <div class="item-content flex-grow">
                  <h6 class="ellipsis font-weight-normal"> Johnson
                  </h6>
                  <p class="font-weight-light small-text text-muted mb-0">
                    Upcoming board meeting
                  </p>
                </div>
              </a>
            </div>
          </li> -->

          <!-- <li class="nav-item dropdown">
            <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
              <i class="ti-bell mx-0"></i>
              <span class="count"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="notificationDropdown">
              <p class="mb-0 font-weight-normal float-left dropdown-header">Notifications</p>
              <a class="dropdown-item">
                <div class="item-thumbnail">
                  <div class="item-icon bg-success">
                    <i class="ti-info-alt mx-0"></i>
                  </div>
                </div>
                <div class="item-content">
                  <h6 class="font-weight-normal">Application Error</h6>
                  <p class="font-weight-light small-text mb-0 text-muted">
                    Just now
                  </p>
                </div>
              </a>
              <a class="dropdown-item">
                <div class="item-thumbnail">
                  <div class="item-icon bg-warning">
                    <i class="ti-settings mx-0"></i>
                  </div>
                </div>
                <div class="item-content">
                  <h6 class="font-weight-normal">Settings</h6>
                  <p class="font-weight-light small-text mb-0 text-muted">
                    Private message
                  </p>
                </div>
              </a>
              <a class="dropdown-item">
                <div class="item-thumbnail">
                  <div class="item-icon bg-info">
                    <i class="ti-user mx-0"></i>
                  </div>
                </div>
                <div class="item-content">
                  <h6 class="font-weight-normal">New user registration</h6>
                  <p class="font-weight-light small-text mb-0 text-muted">
                    2 days ago
                  </p>
                </div>
              </a>
            </div>
          </li> -->

           <?php
            $sql = "SELECT * FROM admin WHERE adminid= '$_SESSION[adminid]' AND status='Active'";
            $sql_admin = mysqli_query($con,$sql);
            $admin = mysqli_fetch_array($sql_admin);
            ?>
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
              <button class="btn btn-danger btn-rounded">
                <i class="ti-user menu-icon"></i>Account
              </button>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <a class="dropdown-item">
                <i class="ti-user text-primary"></i>
                <?php echo $admin[1];?>
              </a>
              <a class="dropdown-item" href="../../logout.php">
                <i class="ti-power-off text-primary"></i>
                Logout
              </a>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="ti-view-list"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:../../partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="../../index.php">
              <i class="ti-shield menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../weight/add_weight.php">
             <i class="ti-stats-up menu-icon"></i>
              <span class="menu-title">Record Weight</span>
            </a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="../addChild/addchild.php">
              <i class="ti-user menu-icon">+</i>
              <span class="menu-title">Add a Child</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../visit_days/visit.php">
              <i class="ti-calendar menu-icon"></i>
              <span class="menu-title">Visting Dates</span>
            </a>
          </li>
          <!-- <li class="nav-item">
            <a class="nav-link" href="../others/others.php">
              <i class="ti ti-shield menu-icon"></i>
              <span class="menu-title">Immunization/Vitamins</span>
            </a>
          </li> -->
        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                 <?php 
              if(isset($_GET['editid']))
                {
                   echo '<h4 class="card-title">Child Details edit Panel</h4>';
                    
                }else{
                    echo '<h4 class="card-title">Child Registration Panel</h4>';
                }?>
                  <h6 class="col-md-12">
                    <?php echo $alert_msg;?>
                  </h6>

                  <?php 
              if(isset($_GET['editid']))
                {
                  ?>

                  <form method="post" action="" onSubmit="return validateform()" style="padding: 10px">



      <div class="form-group"><label>Child's Number</label>
          <div class="form-line">
              <input class="form-control" type="text" name="childn" id="childname" value="<?php echo $rsedit['childs_number'];?>" required/>
          </div>
      </div>

      <div class="form-group"><label>Health Facility</label>
          <div class="form-line">
              <input class="form-control" type="text" name="facility" id="hfacility" value="<?php echo $rsedit['health_facility'];?>" required/>
          </div>
      </div>


      <div class="form-group"><label>Child's Name</label>
          <div class="form-line">
              <input class="form-control" type="text" name="cname" id="cname" value="<?php echo $rsedit['child_name'];?>" required/>
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
              <input class="form-control" type="text" name="mname" id="mobilenumber" value="<?php echo $rsedit['M_names'];?>" required/>
          </div>
      </div>


      <div class="form-group"><label>Mother's NRC</label>
          <div class="form-line">
              <input class="form-control" type="text" name="mnrc" id="mnrc" value="<?php echo $rsedit['M_nrc'];?>" required/>
          </div>
      </div>


      <div class="form-group"><label>Father's name</label>
          <div class="form-line">
              <input class="form-control" type="text" name="fname" id="fname" value="<?php echo $rsedit['F_names'];?>" required/>
          </div>
      </div>


      <div class="form-group"><label>Father's NRC</label>
          <div class="form-line">
              <input class="form-control" type="text" name="fnrc" id="fnrc" value="<?php echo $rsedit['F_nrc'];?>" required/>
          </div>
      </div>


      <div class="form-group"><label>Date First Seen</label>
          <div class="form-line">
              <input class="form-control" type="date" name="dateseen" id="dateseen" value="<?php echo $rsedit['date_first_seen'];?>" required/>
          </div>
      </div>


      <div class="form-group"><label>Where the family lives : address</label>
          <div class="form-line">
              <input class="form-control" type="text" name="residence" id="residence" value="<?php echo $rsedit['residence'];?>" required/>
          </div>
      </div>


      <div class="form-group"><label>Weight On Birth</label>
          <div class="form-line">
              <input type="text" name="weight" id="weight" class="form-control" value="<?php echo $rsedit['weight_kg'];?>">
          </div>
      </div>


      <div class="form-group"><label>Place of Birth</label>
          <div class="form-line">
              <input type="text" name="placeofbirth" class="form-control" value="<?php echo $rsedit['place_of_birth'];?>">
          </div>
      </div>


      <div class="form-group"><label>Date Of Birth</label>
          <div class="form-line">
              <input class="form-control" type="date" name="dbirth" id="dateofbirth" value="<?php echo $rsedit['date_of_birth'];?>" required/>
          </div>
      </div>

      <h6 class="col-md-12 py-2">Account Details</h6>

      <div class="form-group"><label>Email</label>
          <div class="form-line">
              <input class="form-control" type="email" name="email" value="<?php echo $rsedit['email'];?>"  required/>
          </div>
      </div>

      <div class="form-group"><label>Phone</label>
          <div class="form-line">
              <input class="form-control" type="text" name="phone" value="<?php echo $rsedit['phone'];?>" required/>
          </div>
      </div>

      <div class="form-group"><label>Password</label>
          <div class="form-line">
              <input class="form-control" type="password" name="password" value="<?php echo $rsedit['password'];?>"  required/>
          </div>
      </div>





      <input class="btn btn-primary" type="submit" name="submit" id="submit" value="Submit" />




  </form>

                  <?php
                    
                }else{
                    ?>

      <form method="post" action="" onSubmit="return validateform()" style="padding: 10px">

      <div class="form-group"><label>Child's Number</label>
          <div class="form-line">
              <input class="form-control" type="text" name="childn" id="childname" value="" required/>
          </div>
      </div>

      <div class="form-group"><label>Health Facility</label>
          <div class="form-line">
              <input class="form-control" type="text" name="facility" id="hfacility" value="" required/>
          </div>
      </div>


      <div class="form-group"><label>Child's Name</label>
          <div class="form-line">
              <input class="form-control" type="text" name="cname" id="cname" value="" required/>
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
              <input class="form-control" type="text" name="mname" id="mobilenumber" value="" required/>
          </div>
      </div>


      <div class="form-group"><label>Mother's NRC</label>
          <div class="form-line">
              <input class="form-control" type="text" name="mnrc" id="mnrc" value="" required/>
          </div>
      </div>


      <div class="form-group"><label>Father's name</label>
          <div class="form-line">
              <input class="form-control" type="text" name="fname" id="fname" value="" required/>
          </div>
      </div>


      <div class="form-group"><label>Father's NRC</label>
          <div class="form-line">
              <input class="form-control" type="text" name="fnrc" id="fnrc" value="" required/>
          </div>
      </div>


      <div class="form-group"><label>Date First Seen</label>
          <div class="form-line">
              <input class="form-control" type="date" name="dateseen" id="dateseen" value="" required/>
          </div>
      </div>


      <div class="form-group"><label>Where the family lives : address</label>
          <div class="form-line">
              <input class="form-control" type="text" name="residence" id="residence" value="" required/>
          </div>
      </div>


      <div class="form-group"><label>Weight On Birth</label>
          <div class="form-line">
              <input type="text" name="weight" id="weight" class="form-control" value="">
          </div>
      </div>


      <div class="form-group"><label>Place of Birth</label>
          <div class="form-line">
              <input type="text" name="placeofbirth" class="form-control" value="">
          </div>
      </div>


      <div class="form-group"><label>Date Of Birth</label>
          <div class="form-line">
              <input class="form-control" type="date" name="dbirth" id="dateofbirth" value="" required/>
          </div>
      </div>

      <h6 class="col-md-12 py-2">Account Details</h6>

      <div class="form-group"><label>Email</label>
          <div class="form-line">
              <input class="form-control" type="email" name="email" value=""  required/>
          </div>
      </div>

      <div class="form-group"><label>Phone</label>
          <div class="form-line">
              <input class="form-control" type="text" name="phone" value="" required/>
          </div>
      </div>

      <div class="form-group"><label>Password</label>
          <div class="form-line">
              <input class="form-control" type="password" name="password" value=""  required/>
          </div>
      </div>





      <input class="btn btn-primary" type="submit" name="submit" id="submit" value="Submit" />




  </form>

                    <?php
                }?>

                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © <img src="../../images/logo.png" width="70px"></span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="../../vendors/base/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <script src="../../vendors/chart.js/Chart.min.js"></script>
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="../../js/off-canvas.js"></script>
  <script src="../../js/hoverable-collapse.js"></script>
  <script src="../../js/template.js"></script>
  <script src="../../js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="../../js/chart.js"></script>
  <!-- End custom js for this page-->
</body>

</html>
