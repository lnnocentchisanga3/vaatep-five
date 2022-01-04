<div class="az-content az-content-dashboard">
      <div class="container">
        <div class="az-content-body">
          <div class="az-dashboard-one-title">
            <div>
              <h2 class="az-dashboard-title">Hi, welcome back!</h2>
              <p class="az-dashboard-text">Mr / Mrs <?php echo $info[6]; ?></p>
            </div>
            <div class="az-content-header-right">
              <div class="media">
                <div class="media-body">
                  <label>Today's Date</label>
                  <h6 ><?php echo date("M d ,y")?></h6>
                </div><!-- media-body -->
              </div><!-- media -->
              <div class="media">
                <div class="media-body">
                  <!-- <label>Next Visiting Day</label>
                  <h6>Oct 23, 2018</h6> -->
                </div><!-- media-body -->
              </div><!-- media -->
              <a href="pdf_days.php?create_pdf_days" class="btn btn-purple text-uppercase shadow rounded">Download Visting Dates Form <i class="fa fa-download"></i></a>
            </div>
          </div><!-- az-dashboard-one-title -->

          <div class="az-dashboard-nav"> 
            <nav class="nav">
              <a class="nav-link text-dark" data-toggle="tab" href="#"><i class="fa fa-user"></i> Child Details</a>
            </nav>

            <nav class="nav">
              <!-- <a class="nav-link" href="#"><i class="far fa-save"></i> Save Report</a> -->
              <!-- <a class="nav-link" href="#"><i class="far fa-file-pdf"></i> Export to PDF</a> -->
             <!--  <a class="nav-link" href="#"><i class="far fa-envelope"></i>Send to Email</a> -->
              <a class="nav-link" href="#"><i class="fas fa-ellipsis-h"></i></a>
            </nav>
          </div>

          <div class="row row-sm mg-b-20">
            <div class="col-lg-12">
              <div class="card shadow rounded" id="printedDiv">
                <div class="card-header bg-transparent border-bottom">
                  <div class="container-fluid">
                    <div class="row col-md-12">
                       <h6 class="col-md-8"><?php echo $info[2];?></h6>
                        <a class="nav-link col-md-4 btn btn-purple shadow rounded" id="printBtn" href="#" onclick="printContent('printedDiv')"><i class="far fa-save"></i> Save Details</a>
                    </div>
                  </div>
                </div><!-- card-header -->
                <div class="card-body">
                  <div class="card-body-top">
                  </div><!-- card-body-top -->
                  <div class="flot-chart-wrapper">
                    <div id="childDetails" class="flot-chart">
                      <div class="container-fluid">
                        <div class="row">
                          <i class="fa fa-id"></i>
                          <div class="col-md-6 my-2"><span class="mx-2" style="font-weight: bold;">Child Identity Number:</span><?php echo $info[0];?></div>
                          <div class="col-md-6 my-2"><span class="mx-2" style="font-weight: bold;">Child's Names:</span><?php echo $info[2];?></div>
                          <div class="col-md-6 my-2"><span class="mx-2" style="font-weight: bold;">Gender:</span><?php echo $info[3];?></div>
                          <div class="col-md-6 my-2"><span class="mx-2" style="font-weight: bold;">Mother's Names:</span><?php echo $info[4];?></div>
                          <div class="col-md-6 my-2"><span class="mx-2" style="font-weight: bold;">Father's Name:</span><?php echo $info[6];?></div>
                          <div class="col-md-6 my-2"><span class="mx-2" style="font-weight: bold;">Mothers NRC:</span><?php echo $info[5];?></div>
                          <div class="col-md-6 my-2"><span class="mx-2" style="font-weight: bold;">Fathers NRC:</span><?php echo $info[7];?></div>
                          <div class="col-md-6 my-2"><span class="mx-2" style="font-weight: bold;">Health Facility:</span><?php echo $info[1];?></div>
                          <div class="col-md-6 my-2"><span class="mx-2" style="font-weight: bold;">Date First Seen:</span><?php echo $info[8];?></div>
                          <div class="col-md-6 my-2"><span class="mx-2" style="font-weight: bold;">Date of Birth:</span><?php echo $info[9];?></div>
                          <div class="col-md-6 my-2"><span class="mx-2" style="font-weight: bold;">Birth Weight:</span><?php echo $info[10];?> KG</div>
                          <div class="col-md-6 my-2"><span class="mx-2" style="font-weight: bold;">Place of birth:</span><?php echo $info[11];?></div>
                          <div class="col-md-6 my-2"><span class="mx-2" style="font-weight: bold;">Residence:</span><?php echo $info[12];?></div>
                          <div class="col-md-6 my-2"><span class="mx-2" style="font-weight: bold;">Account Status:</span><?php echo $info[13];?></div>
                          <!--<div class="col-md-6 my-2"><span class="mx-2" style="font-weight: bold;">hello:</span><?php echo $info[2];?></div> -->
                        </div>
                      </div>
                    </div>
                  </div><!-- flot-chart-wrapper -->
                </div><!-- card-body -->
              </div><!-- card -->
            </div><!-- col -->
          </div>

            <!-- <div class="col-lg-5 mg-t-20 mg-lg-t-0">
              <div class="row row-sm"> -->
                
                <!-- <div class="col-sm-12">
                  <div class="card shadow">
                    <div class="card-header bg-transparent border-bottom">
                      <h6>Immunization</h6>
                    </div>
                    <div class="card-body" style="height: 50vh;">
                <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th class="wd-45p">Name</th>
                        <th>Status</th>
                        <th>Date</th>
                      </tr>
                    </thead>
                    <tbody> -->

                      <?php
                      /*$immun = mysqli_query($con, "SELECT * FROM immunization WHERE child_number='$_SESSION[child_number]'");

                      if (mysqli_num_rows($immun)==null) {
                        echo "<tr class='text-center'> <td>No record for immunization to show</td> </tr>";
                      }else{
                        while ($row_immun = mysqli_fetch_array($immun)) {
                          echo '<tr>
                                  <td><strong>'.$row_immun["name"].'</strong></td>
                                  <td><strong>'.$row_immun["status"].'</strong></td>
                                  <td>'.$row_immun["date"].'</td>
                                </tr>';
                        }
                      }
                       mysqli_close($con);*/
                      ?>
                    <!-- </tbody>
                  </table>
                </div>
                    </div>
                  </div>
                </div>table-responsive -->
              <!-- </div>
            </div>
          </div>
        </div>az-content -->
      <!-- </div>
    </div> -->
    <script>
       function printContent(printpage){
            document.getElementById('printBtn').style.display = "none";
            document.body.className = "myDivToPrint";
           /*document.body.style.backgroundImage = "url('../img/under4.jpg')";
           document.body.style.backgroundRepeat = "no-repeat";
           document.body.style.backgroundSize = "cover";*/
            var headstr = "<html><head><title></title></head><body>";
            var footstr = "</body>";
            var newstr = document.all.item(printpage).innerHTML;
            var oldstr = document.body.innerHTML;
            document.body.innerHTML = headstr + newstr + footstr;
            window.print();
            document.body.innerHTML = oldstr;
            document.getElementById('printBtn').style.display = "block";
            return false;
        }

    </script>