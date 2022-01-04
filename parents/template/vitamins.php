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
              <a class="nav-link" data-toggle="tab" href="#"><i class="fa fa-user"></i> Vitamis</a>
            </nav>

            <nav class="nav">
             
            </nav>
          </div>

          <div class="col-lg-12 mg-t-20 mg-lg-t-0">
              <div class="row row-sm">
                
                <div class="col-sm-12">
                  <div class="card shadow">
                    <div class="card-header bg-transparent border-bottom">
                      <h6>Vitamins</h6>
                    </div><!-- card-header -->
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
                    <tbody>

                      <?php
                      $vitamin = mysqli_query($con, "SELECT * FROM `vitamins` WHERE childs_number='$_SESSION[child_number]'");

                      if (mysqli_num_rows($vitamin)==null) {
                        echo "<tr class='text-center'> <td>No record for Vitamins to show</td> </tr>";
                      }else{
                        while ($row_vitamin = mysqli_fetch_array($vitamin)) {
                          echo '<tr>
                                  <td><strong>'.$row_vitamin["name"].'</strong></td>
                                  <td><strong>'.$row_vitamin["status"].'</strong></td>
                                  <td>'.$row_vitamin["date_given"].'</td>
                                </tr>';
                        }
                      }
                       mysqli_close($con);
                      ?>
                    </tbody>
                  </table>
                </div><!-- table-responsive -->
                    </div>
                  </div>
                </div>
              </div><!-- row -->
            </div><!--col -->

        </div><!-- az-content-body -->
      </div>
    </div><!-- az-content -->