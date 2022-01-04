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
    $date = date("d-m-Y");
    $month = date("M");

    if (isset($_POST['save'])) {
        
        $checkkg = mysqli_query($con, "SELECT * FROM weight WHERE childs_number ='$_POST[number]' AND day ='$date'");
        $check_fetch = mysqli_fetch_array($checkkg);
        $num = mysqli_num_rows($checkkg);
        if ( $num == null) {
            $insertkg = mysqli_query($con, "INSERT INTO weight(childs_number,weight,day,month) VALUES('$_POST[number]','$_POST[weight]','$date','$month')");
            if ($insertkg) {
                $msgDis .='<div  class="py-2 bg-success px-2 text-white">The Child weight has been added successfully</div>';
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


    if (isset($_POST['save_weight'])) {
      $update_weight = mysqli_query($con, "UPDATE weight SET weight='$_POST[weight]' WHERE childs_number='$_POST[wid]'");

      if ($update_weight) {
        ?>
        <script>
          window.alert("Weight has been updated succesfully");
        </script>
        <?php
      }else{
        $error = mysqli_error($con);
        ?>
        <script>
          window.alert("Weight has not been updated an Error Occured "+"<?php echo $error; ?>");
        </script>
        <?php
      }
    }

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>RoyalUI Admin</title>
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
            <a class="nav-link" href="pages/weight/add_weight.php">
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
            <div class="col-md-8 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Seach For a Child</h4>

                  <div class="card-description">
                    <h6>Search a child by Identity ID</h6>
                   <div class=" input-group">
                    <span class="bg-primary col-md-2 pt-3 text-center"><i class="ti-search menu-title text-white"></i></span>
                   <input type="text" name="search" id="searchChild" onkeyup="getChildByAjax(this.value)" class="form-control col-md-12 bg-white" placeholder="Search by Child's Identity ID" autofocus>
                </div>
                  </div>

                  <div style="height: 35vh;" class="table-responsive">
                    <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="searchedValues">
                        <?php

                        $sql = "SELECT * FROM childrecords";
                         $query = mysqli_query($con, $sql);

                        if (mysqli_num_rows($query)==null) {
                          echo "<tr><td>There are (0) results for that search..</td></tr>";
                        }else{
                          
                          while ($row = mysqli_fetch_array($query)) {
                            echo "<tr>";
                            echo "<td>".$row['childs_number']."</td>";
                          
                            echo "<td>".$row['child_name']."</td>";

                            echo "<td><button class='btn btn-primary btn-sm' value='$row[childs_number]' onclick='addChildNum(this.value)'>Add weight</button></td>";
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


            <div class="col-md-4 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Record Weight</h4>
                  <p class="card-description">
                    <?php echo $msgDis;?>
                  </p>
                  <form class="forms-sample" method="POST" action="">
                    <div class="form-group row">
                      <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Child's ID</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="childId" name="number" readonly>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Weight</label>
                      <div class="col-sm-9">
                        <input type="text" name="weight" class="form-control" id="Weight">
                      </div>
                    </div>
                   
                    <button type="submit" name="save" class="btn btn-primary mr-2">Save <i class="ti-save"></i></button>
                    <button class="btn btn-danger" type="">Reset <i class="ti-reload"></i></button>
                  </form>
                </div>
              </div>
            </div>



            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Childrens Weight Records <i class="ti-stats-up"></i></h4>

                  <div class=" input-group my-2">
                   <input type="text" name="search" onkeyup="editChildWeight(this.value)" class="form-control col-md-12 bg-white" placeholder="Search by Child's Identity ID" autofocus>
                   <span class="bg-primary col-md-2 pt-3 text-center"><i class="ti-search menu-title text-white"></i></span>
                   
                  </div>

                  <div style="height: 50vh;" class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>Child ID</th>
                        <th>Child Names</th>
                        <th>Month</th>
                        <th>Weight</th>
                        <th>Date</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody id="editChildWeight">

                      <?php
                      $weight = mysqli_query($con, "SELECT * FROM weight INNER JOIN childrecords ON childrecords.childs_number=weight.childs_number");
                      if (mysqli_num_rows($weight)==null) {
                        echo "<tr class='text-center'> <td>No record for weight to show</td> </tr>";
                      }else{
                        while ($row_weight = mysqli_fetch_array($weight)) {
                          echo '<tr>
                                  <td><strong>'.$row_weight["childs_number"].'</strong></td>
                                  <td><strong>'.$row_weight["child_name"].'</strong></td>
                                  <td><strong>'.$row_weight["month"].'</strong></td>
                                  <td><strong>'.$row_weight["weight"].' KG</strong></td>
                                  <td>'.$row_weight["day"].'</td>
                                  <td><button class="btn btn-sm btn-success" onclick="getChildId(this.value)" value='.$row_weight["childs_number"].' data-toggle="modal" data-target="#childDetails">Edit weight <i class="ti-file"></i></button></td>
                                </tr>';
                        }
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

        <script>
          function getChildId(id){
            document.getElementById('childIdNum').value = id;
          }
        </script>
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
      <script>
        function editChildWeight(num){
          if (num == "" || num == null) {
          $('#searchedValues').load('./children.php');
         }else{
         let xhttp;

          xhttp = new XMLHttpRequest();
          xhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            document.getElementById('editChildWeight').innerHTML = this.responseText;
          } 
          };

          xhttp.open("GET", "../../../search_child_edit.php?cnum="+num, true);
          xhttp.send();
     }
    }
      </script>
      <!-- Modal body -->
      <div class="modal-body">
       <form method="POST" action="">
        <label>Child ID</label>
        <input type="text" name="wid" class="form-control" id="childIdNum" readonly>
        <label>Child Weight</label>
        <input type="text" name="weight" class="form-control" id="childWeight" required>

        <button name="save_weight" class="btn btn-sm btn-success my-2">Save Weight<i class="ti-save"></i></button>
       </form>
      </div>
        
        <!-- Modal footer -->
        <!-- <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div> -->
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
