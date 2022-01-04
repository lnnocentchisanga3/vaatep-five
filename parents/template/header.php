 <div class="az-header">
      <div class="container">
        <div class="az-header-left">
           <a href="index.php?page=dashboard"><img src="../img/logo.png" alt="logo" style="height: 40px;"></a>
          <a href="" id="azMenuShow" class="az-header-menu-icon d-lg-none"><span></span></a>
        </div><!-- az-header-left -->
        <div class="az-header-menu">
          <div class="az-header-menu-header">
             <a href="index.php?page=dashboard"><img src="../img/logo.png" alt="logo" style="height: 40px;"></a>
            <a href="" class="close">&times;</a>
          </div><!-- az-header-menu-header -->
          <ul class="nav">
            <li class="nav-item">
              <a href="index.php?page=dashboard" class="btn btn-purple shadow rounded" id="linkShow" onclick="ShowLink(this.value)"><i class="typcn typcn-chart-area-outline"></i> Dashboard</a>
            </li>
            <li class="nav-item">
              <a href="index.php?page=weight" class="btn btn-purple shadow rounded" id="linkShow" onclick="ShowLink(this.value)"><i class="typcn typcn-document"></i> Weight</a>
            </li>
            <!-- <li class="nav-item">
              <a href="chart-chartjs.html" class="nav-link" id="linkShow"><i class="typcn typcn-chart-bar-outline"></i> Child's Graph</a>
            </li> -->
            <!-- <li class="nav-item">
              <a href="index.php?page=vitamis" class="btn btn-purple shadow rounded" id="linkShow" onclick="ShowLink(this.value)"><i class="typcn typcn-user-outline"></i> Vitamins</a>
            </li> -->
            <li class="nav-item">
              <a href="index.php?page=others" class="btn btn-purple shadow rounded" id="linkShow" onclick="ShowLink(this.value)"><i class="typcn typcn-calendar-outline"></i> Visiting Dates</a>
            </li>
          </ul>
        </div><!-- az-header-menu -->
        <div class="az-header-right">
          <div class="dropdown az-profile-menu">
            <a href="" class="az-img-user"><i class="fa fa-user-circle fa-2x"></i></a>
            <div class="dropdown-menu">
              <div class="az-dropdown-header d-sm-none">
                <a href="" class="az-header-arrow"><i class="icon ion-md-arrow-back"></i></a>
              </div>
              <div class="az-header-profile">
                <h6><?php echo $info[2];?></h6>
              </div><!-- az-header-profile -->
              <a href="index.php?page=settings" class="dropdown-item"><i class="typcn typcn-cog-outline"></i> Account Settings</a>
              <a href="../logout.php" class="dropdown-item"><i class="typcn typcn-power-outline"></i> Sign Out</a>
            </div><!-- dropdown-menu -->
          </div>
        </div><!-- az-header-right -->
      </div><!-- container -->
    </div><!-- az-header -->