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
             <!--  <a href="pdf_days.php?create_pdf_days" class="btn btn-purple text-uppercase shadow">Download Visting Dates Form <i class="fa fa-download"></i></a> -->
            </div>
          </div><!-- az-dashboard-one-title -->

          <div class="az-dashboard-nav"> 
            <nav class="nav">
              <a class="nav-link" data-toggle="tab" href="#"><i class="fa fa-clock"></i> Child Weight Records</a>
            </nav>

            <nav class="nav">
             
            </nav>
          </div>

          <div class="row row-sm mg-b-20">
            <div class="col-lg-12">
              <div class="card shadow">
                <div class="card-header bg-transparent border-bottom">
                  <h6>Weight Records</h6>
                </div><!-- card-header -->
                <div class="card-body">
                  <div class="card-body-top">
                  </div><!-- card-body-top -->
                  
                  <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th class="">Month</th>
                        <th>Weight</th>
                        <th>Date</th>
                      </tr>
                    </thead>
                    <tbody>

                      <?php
                      $weight = mysqli_query($con, "SELECT * FROM weight WHERE childs_number='$_SESSION[child_number]'");
                      if (mysqli_num_rows($weight)==null) {
                        echo "<tr class='text-center'> <td>No record for weight to show</td> </tr>";
                      }else{
                        while ($row_weight = mysqli_fetch_array($weight)) {
                          echo '<tr>
                                  <td><strong>'.$row_weight["month"].'</strong></td>
                                  <td><strong>'.$row_weight["weight"].'KG</strong></td>
                                  <td>'.$row_weight["day"].'</td>
                                </tr>';
                        }
                      }
                      ?>
                    </tbody>
                  </table>
                </div><!-- table-responsive -->

                </div><!-- card-body -->
              </div><!-- card -->
            </div><!-- col -->
            
          </div><!-- row -->
        </div><!-- az-content-body -->
      </div>
    </div><!-- az-content -->