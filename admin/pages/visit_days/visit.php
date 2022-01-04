<?php
/*include("adheader.php");*/
include("../../dbconnection.php");

    session_start();
    if(!isset($_SESSION["adminid"])){
        echo "<script>window.location='../../adminlogin.php';</script>";
    }
    if(!isset($_SESSION["adminid"])){
        echo "<script>window.location='../../adminlogin.php';</script>";
    }
    $msgDis = "";
    $msgDis1 = "";
    $date = date("d-m-Y");
    $month = date("M");

    if (isset($_POST['save'])) {
        
            $insertkg = mysqli_query($con, "INSERT INTO `under_five_days`(day,from_time,to_time,added_by) VALUES('$_POST[day]','$_POST[from]','$_POST[to]','$_SESSION[adminid]')");
            if ($insertkg) {
                $msgDis .='<div  class="py-2 bg-success px-2 text-white">Visiting day has been added successfully</div>';
            }else{
                $msgDis .='<div  class="py-2 bg-danger px-2 text-white">Error '.mysqli_error($con).'</div>';
            }
    }

    if (isset($_POST['editsave'])) {
        
            $update = mysqli_query($con, "UPDATE `under_five_days` SET day='$_POST[day]',from_time='$_POST[from]',to_time='$_POST[to]',added_by='$_SESSION[adminid]' WHERE d_id='$_GET[edtid]' ");
            if ($update) {
                $msgDis .='<div  class="py-2 bg-success px-2 text-white">Record has been updated successfully</div>';
            }else{
                $msgDis .='<div  class="py-2 bg-danger px-2 text-white">Error '.mysqli_error($con).'</div>';
            }
    }


    $delMsg = "";

    if (isset($_GET['delid'])) {
        $del = mysqli_query($con, "DELETE FROM under_five_days WHERE d_id ='$_GET[delid]'");
        if ($del) {
            $msgDis1 .='<div  class="py-2 bg-success px-2 text-white">Record has been Deleted successfully</div>';
        }else{
            $msgDis1 .='<div  class="py-2 bg-danger px-2 text-white">Error '.mysqli_error($con).'</div>';
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
  <link rel="stylesheet" href="../../vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="../../vendors/base/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
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
    <!-- partial:../../partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top  d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo mr-5" href="index.php"><img src="../../images/logo.png" class="mr-2" alt="logo"/></a>
        <a class="navbar-brand brand-logo-mini" href="index.php"><img src="../../images/icon.png" alt="logo"/></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="ti-view-list"></span>
        </button>
        <ul class="navbar-nav navbar-nav-right">

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
          <li class="nav-item">
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

            <?php
            if (isset($_GET['edtid'])) {
              $get_edit = mysqli_query($con, "SELECT * FROM under_five_days WHERE d_id='$_GET[edtid]'");
              $g_edit = mysqli_fetch_array($get_edit);
            ?>
            <div class="col-md-5 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title bg-danger text-white py-2 px-2"><i class="ti ti-pencil"></i> Edit a visting day</h4>
                  <p class="card-description">
                    <?php echo $msgDis;?>
                  </p>

                  <form class="forms-sample" method="POST" action="">

                    <div class="form-group row">
                      <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Dates</label>
                      <div class="col-sm-9">
                        <input type="date" class="form-control"  name="day" value="<?php echo $g_edit['day'];?>">
                      </div>
                    </div>

                    <h6>Enter the Time</h6>
                    <div class="form-group row">
                      <label for="exampleInputEmail2" class="col-sm-3 col-form-label">From</label>
                      <div class="col-sm-9">
                        <input type="time" name="from" class="form-control" value="<?php echo $g_edit['from_time'];?>">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="exampleInputEmail2" class="col-sm-3 col-form-label">To</label>
                      <div class="col-sm-9">
                        <input type="time" name="to" class="form-control" value="<?php echo $g_edit['to_time'];?>">
                      </div>
                    </div>
                   
                    <button type="submit" name="editsave" class="btn btn-sm btn-primary float-right">Save Changes <i class="ti-save"></i></button>
                   </form>
                </div>
              </div>
            </div>
            <?php 
            }else{
              ?>
              <div class="col-md-5 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title"><i class="ti ti-calendar"></i> <i class="ti ti-plus"></i> Add a visting day</h4>
                  <p class="card-description">
                    <?php echo $msgDis;?>
                  </p>

                  <form class="forms-sample" method="POST" action="">

                    <div class="form-group row">
                      <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Dates</label>
                      <div class="col-sm-9">
                        <input type="date" class="form-control"  name="day">
                      </div>
                    </div>

                    <h6>Enter the Time</h6>
                    <div class="form-group row">
                      <label for="exampleInputEmail2" class="col-sm-3 col-form-label">From</label>
                      <div class="col-sm-9">
                        <input type="time" name="from" class="form-control" id="Weight">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="exampleInputEmail2" class="col-sm-3 col-form-label">To</label>
                      <div class="col-sm-9">
                        <input type="time" name="to" class="form-control" id="Weight">
                      </div>
                    </div>
                   
                    <button type="submit" name="save" class="btn btn-sm col-md-4 btn-primary float-right"><i class="ti ti-plus"></i> Add a Day</button>
                   </form>
                </div>
              </div>
            </div>
              <?php
            }
            ?>


            <div class="col-md-7 grid-margin stretch-card">
              <div class="card">
                <div class="card-header"> <?php echo $msgDis1;?></div>
                <div class="card-body">
                  <h4 class="card-title"><i class="ti ti-calendar"></i> Visting Days</h4>
                  <div style="height: 60vh;" class="table-responsive">
                    <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Day</th>
                            <th>From</th>
                            <th>To</th>
                            <th>Added By</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="searchedValues">
                        <?php

                        $sql = "SELECT * FROM `under_five_days`";
                         $query = mysqli_query($con, $sql);

                        if (mysqli_num_rows($query)==null) {
                          echo "<tr><td>There are (0) results for that search..</td></tr>";
                        }else{
                          
                          while ($row = mysqli_fetch_array($query)) {
                            echo "<tr>";
                            echo "<td>".$row['day']."</td>";
                          
                            echo "<td>".$row['from_time']."</td>";

                            echo "<td>".$row['to_time']."</td>";

                            $add = mysqli_query($con, "SELECT * FROM admin WHERE adminid='$row[added_by]'");

                            $admin = mysqli_fetch_array($add);

                            echo "<td>".$admin['adminname']."</td>";

                            echo "<td><a class='btn btn-success btn-sm' href='visit.php?edtid=$row[d_id]'>Edit</a><br><hr>
                            <a class='btn btn-danger btn-sm' href='visit.php?delid=$row[d_id]'>Delete</a>
                            </td>";
                            echo "</tr>";
                          }
                        }

                        ?>
                    </tbody>
                </table>
                <script>
                     function getChildByAjax(num){
                        if (num == "" || num == null) {
                        $('#searchedValues').load('./children.php');
                       }else{
                       let xhttp;

                        xhttp = new XMLHttpRequest();
                        xhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                          document.getElementById('searchedValues').innerHTML = this.responseText;
                        } 
                        };

                        xhttp.open("GET", "../../../search_child.php?cnum="+num, true);
                        xhttp.send();
                     }
                    }
                   </script>
                  </div>

                </div>
              </div>
            </div>
          </div>
        </div>
        <script>
          function addChildNum(num){
                document.getElementById('childId').value = num;
            }
        </script>
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

  <!-- The Modal -->
  <div class="modal fade" id="childDetails">
    <div class="modal-dialog modal-sm">
      <div class="modal-content" id="childDetailsDisplay">

        <!-- Modal Header -->
      <div class="modal-header" id="printedDiv">
        <h4 class="modal-title">Edit The Weight</h4> <!-- <button class="btn btn-sm btn-info mx-5">Print <i class="ti-printer" onclick="printContent('printedDiv')"></i></button>
       -->  <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <label>Child ID</label>
        <input type="text" name="weight" class="form-control" id="childIdNum" readonly>
        <label>Child Weight</label>
        <input type="text" name="weight" class="form-control" id="childWeight">


        <button class="btn btn-success my-2">Save <i class="ti-save"></i></button>
      </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
        </div>
      </div>
    </div>
  </div>

  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="../../vendors/base/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="../../js/off-canvas.js"></script>
  <script src="../../js/hoverable-collapse.js"></script>
  <script src="../../js/template.js"></script>
  <script src="../../js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="../../js/file-upload.js"></script>

  <script>
    function getChildId(id){
      /*document.getElementById('childIdNum').value = id;*/
      window.alert(id);
    }


    function addValue(num){
       let child ='<?php echo $id; ?>';
       let xhttp;

        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById('editDone').innerHTML = this.responseText;
        } 
        };

        xhttp.open("GET" "/edit_weight.php?cnum="+num+"&number="+child, true);
        xhttp.send();
  }
  </script>
  <!-- End custom js for this page-->
</body>

</html>
