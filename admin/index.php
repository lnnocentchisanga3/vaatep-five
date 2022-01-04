<?php
/*include("adheader.php");*/
include("../dbconnection.php");

    session_start();
    if(!isset($_SESSION["adminid"])){
        echo "<script>window.location='../adminlogin.php';</script>";
    }
    if(!isset($_SESSION["adminid"])){
        echo "<script>window.location='../adminlogin.php';</script>";
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
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Vaatep</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="vendors/base/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/style.css">

  <!-- custom css -->
    <style>

      body.waiting * {
    cursor: progress;
      }
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
  <link rel="shortcut icon" href="images/icon.png" />
</head>
<body>

  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo mr-5" href="index.php"><img src="images/logo.png" class="mr-2" alt="logo"/></a>
        <a class="navbar-brand brand-logo-mini" href="index.php"><img src="images/icon.png" alt="logo"/></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="ti-view-list"></span>
        </button>
        
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


          <!--<li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
              
            </a>
             <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <a class="dropdown-item">
                <i class="ti-user text-primary"></i>
                <?php echo $fname." ".$lname;?>
              </a>
              <a class="dropdown-item" href="./logout.php">
                <i class="ti-power-off text-primary"></i>
                Logout
              </a>
            </div> 
          </li>-->
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="ti-view-list"></span>
        </button>
      </div>
      <div style="width: 100%; text-align: center; display: none;" id="sendLoader">
        <img src="images/loading1.gif" alt="profile" style="margin-left: 40%;" />
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="index.php" onclick="cursorLoad()">
              <i class="ti-shield menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="pages/weight/add_weight.php" onclick="cursorLoad()">
             <i class="ti-stats-up menu-icon"></i>
              <span class="menu-title">Record Weight</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="pages/addChild/addchild.php" onclick="cursorLoad()">
              <i class="ti-user menu-icon">+</i>
              <span class="menu-title">Add a Child</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="pages/visit_days/visit.php" onclick="cursorLoad()">
              <i class="ti-calendar menu-icon"></i>
              <span class="menu-title">Visting Dates</span>
            </a>
          </li>
          <!-- <li class="nav-item">
            <a class="nav-link" href="pages/others/others.php">
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
            <div class="col-md-12 grid-margin">
              <div class="d-flex justify-content-between align-items-center">
                <div>
                  <h4 class="font-weight-bold mb-0">
                    <?php
                    $sql = "SELECT * FROM admin WHERE adminid= '$_SESSION[adminid]' AND status='Active'";
                    $sql_admin = mysqli_query($con,$sql);
                    $admin = mysqli_fetch_array($sql_admin);
                    ?>
                    Welcome <span class="text-uppercase"><?php echo $admin[1]; ?></span></h4>
                </div>
                <div >
                   <a href="../send.php?send" class="btn btn-primary btn-rounded" id="loadCursor" onclick="cursorLoad()">
                       Send a Notification <i class="ti-email btn-icon-prepend"></i>
                    </a>


                    <a href="./logout.php" class="btn btn-danger btn-rounded" onclick="cursorLoad()">
                       <i class="ti-power-off btn-icon-prepend"></i> Logout
                    </a>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-3 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title text-md-center text-xl-left">Total Number of Children</p>
                  <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                    <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0">
                       <?php
                        $sql = "SELECT * FROM childrecords WHERE status='Active'";
                        $qsql = mysqli_query($con,$sql);
                        echo mysqli_num_rows($qsql);
                        ?>
                    </h3>
                    <i class="ti-calendar icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                  </div>  
                  <!-- <p class="mb-0 mt-2 text-danger">0.12% <span class="text-black ml-1"><small>(30 days)</small></span></p> -->
                </div>
              </div>
            </div>
            <div class="col-md-3 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title text-md-center text-xl-left">Total Number of Admins</p>
                  <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                    <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0">
                      <?php
                        $sql = "SELECT * FROM admin WHERE status='Active'";
                        $qsql = mysqli_query($con,$sql);
                        echo mysqli_num_rows($qsql);
                        ?>
                          
                        </h3>
                    <i class="ti-user icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                  </div>  
                  <!-- <p class="mb-0 mt-2 text-danger">0.47% <span class="text-black ml-1"><small>(30 days)</small></span></p> -->
                </div>
              </div>
            </div>
            <div class="col-md-3 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title text-md-center text-xl-left">Todays attendance</p>
                  <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                    <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0">
                       <?php 
                         $date = date("d-m-Y");
                          $sql = "SELECT * FROM `weight` WHERE day ='$date'";
                          $qsql = mysqli_query($con,$sql);
                            echo mysqli_num_rows($qsql);
                          ?>
                    </h3>
                    <i class="ti-agenda icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                  </div>  
                  <!-- <p class="mb-0 mt-2 text-success">64.00%<span class="text-black ml-1"><small>(30 days)</small></span></p> -->
                </div>
              </div>
            </div>
            <!-- <div class="col-md-3 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title text-md-center text-xl-left">Returns</p>
                  <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                    <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0">61344</h3>
                    <i class="ti-layers-alt icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                  </div>  
                  <p class="mb-0 mt-2 text-success">23.00%<span class="text-black ml-1"><small>(30 days)</small></span></p>
                </div>
              </div>
            </div> -->
          </div>

          <!-- PHP code for deleting child details -->
          <?php
          if(isset($_GET['delid']))
            {
              $delid = $_GET['delid'];

              $sql ="DELETE FROM childrecords WHERE childs_number='$delid'";
              $qsql=mysqli_query($con,$sql);
              if($qsql)
              {
                $sql1 = "DELETE FROM child_account WHERE child_number='$delid'";
                $sql2 =mysqli_query($con,$sql1);

                if ($sql2) {
                  echo '<h6 class="bg-success py-2 text-white text-center">A child record has been Deleted successfully...</h6>';
                }else{
                  echo '<h6 class="bg-danger py-2 text-white text-center">A child record has not been Deleted (1)...</h6>';
                }
              }else{
                echo '<h6 class="bg-danger py-2 text-white text-center">A child record has not been Deleted (2)...</h6>';
              }
            }
            ?>
          <!-- End of delete details code -->
    
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title mb-0">List of Children Registered</p>

                  <div class=" input-group my-2">
                   <!-- <input type="text" name="search" id="searchChild" onkeyup="getChildByAjax(this.value)" class="form-control col-md-12 bg-white" placeholder="Search by Child's Identity ID" autofocus>
                   <span class="bg-primary col-md-2 pt-3 text-center"><i class="ti-search menu-title text-white"></i></span> -->
                </div>

                  <div style="height: 60vh;" class="table-responsive">
                  <table class="table table-bordered table-hover">
                    <thead class="bg-secondary text-white">
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
                      <td><strong>Weight</strong> - $rs[weight_kg] kg<br><br>
                      <strong>Gender</strong> - &nbsp;$rs[gender]<br><br>
                      <strong>DOB</strong> - &nbsp;$rs[date_of_birth]</td>
                      <td align='center'>Status - $rs[status] <br>";
                      if(isset($_SESSION['adminid']))
                      {
                        echo "<a href='./pages/addChild/addchild.php?editid=$rs[childs_number]' class='btn btn-success btn-sm btn-raised bg-green mx-2'>Edit</a><a href='index.php?delid=$rs[childs_number]' class='btn btn-danger btn-sm btn-raised bg-blush'>Delete</a> <hr>
                        <button value='$rs[childs_number]' onclick='getChildDetails(this.value)' class='btn btn-info btn-sm btn-raised bg-cyan' data-toggle='modal' data-target='#childDetails'>View Details</button>";
                      }
                      echo "</td></tr>";
                    }
                    ?>
                  </tbody>
                </table>
                </div>
                </div>
              </div>
            </div>
          </div>
          
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © <img src="images/logo.png" width="70px"></span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->


   <!-- The Modal -->
  <div class="modal fade" id="childDetails">
    <div class="modal-dialog modal-xl">
      <div class="modal-content" id="childDetailsDisplay">
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>


  <script>
    function cursorLoad(){
      
      var load = document.getElementById("sendLoader");

      load.style.display = "flex";

      return true;
    }
  </script>


  <!-- plugins:js -->
  <script src="vendors/base/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <script src="vendors/chart.js/Chart.min.js"></script>
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="js/dashboard.js"></script>
  <!-- End custom js for this page-->
  <!-- Online CDN -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <!-- End of Online CDN -->

  <!-- custom js 2 -->
  <script>
    function getChildDetails(childid) {

      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("childDetailsDisplay").innerHTML = this.responseText;
        }
      };
      xhttp.open("GET", "child_details.php?get="+childid, true);
      xhttp.send();

     }

     function printContent(printpage){
            alert(hello);
        }
  </script>
  <!-- End of custom js 2 -->
</body>

</html>

