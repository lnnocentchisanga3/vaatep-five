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
              <a href="pdf_days.php?create_pdf_days" class="btn btn-purple text-uppercase shadow">Download Visting Dates Form <i class="fa fa-download"></i></a>
            </div>
          </div><!-- az-dashboard-one-title -->

          <div class="az-dashboard-nav"> 
            <nav class="nav">
              <a class="nav-link" data-toggle="tab" href="#"><i class="fa fa-newspaper"></i> Announcement </a>
            </nav>

            <nav class="nav">
              <!-- <a class="nav-link" href="#"><i class="far fa-save"></i> Save Report</a> -->
             <!--  <a class="nav-link" href="#"><i class="far fa-file-pdf"></i> Export to PDF</a> -->
             <!--  <a class="nav-link" href="#"><i class="far fa-envelope"></i>Send to Email</a> -->
              <a class="nav-link" href="#"><i class="fas fa-ellipsis-h"></i></a>
            </nav>
          </div>

          <div class="row row-sm mg-b-20">
           

            <div class="col-lg-12 mg-t-20 mg-lg-t-0">
              <div class="row row-sm">
                
                <div class="col-sm-12">
                  <div class="card shadow">
                    <div class="card-header bg-transparent border-bottom">
                      <h6><i class="fa fa-calendar"></i> Visting days</h6>
                    </div><!-- card-header -->
                    <div class="card-body">
                 <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                         <th>Date</th>
                        <th>Time From</th>
                        <th>Time To</th>
                      </tr>
                    </thead>
                    <tbody>

                      <?php
                      $v_days = mysqli_query($con, "SELECT * FROM `under_five_days` ");
                      if (mysqli_num_rows($v_days)==null) {
                        echo "<tr class='text-center'> <td>No record for immunization to show</td> </tr>";
                      }else{
                        while ($row_days = mysqli_fetch_array($v_days)) {
                          echo '<tr>
                                  <td>'.$row_days["day"].'</td>
                                  <td><strong>'.$row_days["from_time"].'</strong></td>
                                  <td><strong>'.$row_days["to_time"].'</strong></td>
                                </tr>';
                        }
                      }
                      ?>
                    </tbody>
                  </table>
                </div><!-- table-responsive -->
                    </div>
                  </div>
                </div>

                
              </div><!-- row -->
            </div><!--col -->
          </div><!-- row -->
        </div><!-- az-content-body -->
      </div>
    </div><!-- az-content -->