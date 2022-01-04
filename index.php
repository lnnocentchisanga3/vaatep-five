<?php
/*if(isset($_SESSION[adminid]))
{
  echo "<script>window.location='adminaccount.php';</script>";
}else{
  echo "<script>window.location='index.php';</script>";
}*/
?>

  <?php include 'header.php';?>
  <!-- Bnr Header -->
  <section class="main-banner">
    <div class="tp-banner-container">
      <div class="tp-banner">
        <ul>
          
          <!-- SLIDE  -->
          <li data-transition="random" data-slotamount="7" data-masterspeed="300"  data-saveperformance="off" > 
            <!-- MAIN IMAGE --> 
            <img src="images/Under-Five.jpg"  alt="slider"  data-bgposition=" center center" data-bgfit="cover" data-bgrepeat="no-repeat"> 
            
            <!-- LAYER NR. 1 -->
            <div class="tp-caption sfl tp-resizeme" 
                data-x="center" data-hoffset="0" 
                data-y="center" data-voffset="-120" 
                data-speed="800" 
                data-start="800" 
                data-easing="Power3.easeInOut" 
                data-splitin="chars" 
                data-splitout="none" 
                data-elementdelay="0.03" 
                data-endelementdelay="0.4" 
                data-endspeed="300"
                style="z-index: 5; font-size:50px; font-weight:500; color:white;  max-width: auto; max-height: auto; white-space: nowrap;">The online underfive card</div>
            
            <!-- LAYER NR. 2 -->
            <div class="tp-caption sfr tp-resizeme" 
                data-x="center" data-hoffset="0" 
                data-y="center" data-voffset="-60" 
                data-speed="800" 
                data-start="1000" 
                data-easing="Power3.easeInOut" 
                data-splitin="chars" 
                data-splitout="none" 
                data-elementdelay="0.03" 
                data-endelementdelay="0.1" 
                data-endspeed="300" 
                style="z-index: 6; font-size:40px; color:whitesmoke; font-weight:500; white-space: nowrap;">We care about your Child's health </div>
            
            <!-- LAYER NR. 3 -->
            <div class="tp-caption sfb tp-resizeme" 
                data-x="center" data-hoffset="0" 
                data-y="center" data-voffset="0" 
                data-speed="800" 
                data-start="1200" 
                data-easing="Power3.easeInOut" 
                data-splitin="none" 
                data-splitout="none" 
                data-elementdelay="0.1" 
                data-endelementdelay="0.1" 
                data-endspeed="300" 
                style="z-index: 7;  font-size:22px; color:whitesmoke; font-weight:500; max-width: auto; max-height: auto; white-space: nowrap;">We are here to save you better</div>
            
            <!-- LAYER NR. 4 -->
            <div class="tp-caption lfb tp-resizeme scroll" 
                data-x="center" data-hoffset="0" 
                data-y="center" data-voffset="120"
                data-speed="800" 
                data-start="1300"
                data-easing="Power3.easeInOut" 
                data-elementdelay="0.1" 
                data-endelementdelay="0.1" 
                data-endspeed="300" 
                data-scrolloffset="0"
                style="z-index: 8;"><!-- <a href="./contact.php" class="btn">Contact us</a> --> </div>
          </li>
          
          <!-- SLIDE  -->
          <li data-transition="random" data-slotamount="7" data-masterspeed="300"  data-saveperformance="off" > 
            <!-- MAIN IMAGE --> 
            <img src="images/under5.jpg"  alt="slider"  data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat"> 
            
            <!-- LAYER NR. 1 -->
            <div class="tp-caption sfl tp-resizeme" 
                data-x="left" data-hoffset="400" 
                data-y="center" data-voffset="-100" 
                data-speed="800" 
                data-start="800" 
                data-easing="Power3.easeInOut" 
                data-splitin="chars" 
                data-splitout="none" 
                data-elementdelay="0.03" 
                data-endelementdelay="0.4" 
                data-endspeed="300"
                style="z-index: 5; font-size:40px; font-weight:500; color:#fff;  max-width: auto; max-height: auto; white-space: nowrap;">Chipokota Health Clinic</div>
            
            <!-- LAYER NR. 2 -->
            <div class="tp-caption sfr tp-resizeme" 
                data-x="left" data-hoffset="400" 
                data-y="center" data-voffset="-40" 
                data-speed="800" 
                data-start="800" 
                data-easing="Power3.easeInOut" 
                data-splitin="chars" 
                data-splitout="none" 
                data-elementdelay="0.03" 
                data-endelementdelay="0.4" 
                data-endspeed="300"
                style="z-index: 5; font-size:55px; font-weight:500; color:#fff;  max-width: auto; max-height: auto; white-space: nowrap;">Your best clinic in town</div>
            
            <!-- LAYER NR. 3 -->
            <div class="tp-caption sfb tp-resizeme" 
                data-x="left" data-hoffset="400" 
                data-y="center" data-voffset="30" 
                data-speed="800" 
                data-start="1400" 
                data-easing="Power3.easeInOut" 
                data-splitin="none" 
                data-splitout="none" 
                data-elementdelay="0.1" 
                data-endelementdelay="0.1" 
                data-endspeed="300" 
                style="z-index: 7; font-size:16px; color:whitesmoke; font-weight:500; line-height:26px; max-width: auto; max-height: auto; white-space: nowrap;">Serving you in a very good manner is <br> our main concern</div>
            
            <!-- LAYER NR. 4 -->
            <div class="tp-caption lfb tp-resizeme scroll" 
                data-x="left" data-hoffset="400" 
                data-y="center" data-voffset="140"
                data-speed="800" 
                data-start="1600"
                data-easing="Power3.easeInOut" 
                data-elementdelay="0.1" 
                data-endelementdelay="0.1" 
                data-endspeed="300" 
                data-scrolloffset="0"
                style="z-index: 8;"><!-- <a href="./patientappointment.php" class="btn">MAKE AN APPOINTMENT</a> --> </div>
          </li>
          
          <!-- SLIDE  -->
          <li data-transition="random" data-slotamount="7" data-masterspeed="300"  data-saveperformance="off" > 
            <!-- MAIN IMAGE --> 
            <img src="images/under4.jpg"  alt="slider"  data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat"> 
            
            <!-- LAYER NR. 2 -->
            <div class="tp-caption sfb tp-resizeme" 
                data-x="center" data-hoffset="0" 
                data-y="center" data-voffset="-80" 
                data-speed="800" 
                data-start="800" 
                data-easing="Power3.easeInOut" 
                data-elementdelay="0.1" 
                data-endelementdelay="0.1" 
                data-endspeed="300" 
                data-scrolloffset="0"
                style="z-index: 6; font-size:40px; color:#fff; font-weight:500; white-space: nowrap;"> Welcome To Our Research Center </div>
            
            <!-- LAYER NR. 3 -->
            <div class="tp-caption sfb tp-resizeme text-center" 
                data-x="center" data-hoffset="0" 
                data-y="center" data-voffset="-10" 
                data-speed="800" 
                data-start="1000" 
                data-easing="Power3.easeInOut" 
                data-elementdelay="0.1" 
                data-endelementdelay="0.1" 
                data-endspeed="300" 
                data-scrolloffset="0"
                style="z-index: 7; font-size:20px; font-weight:500; line-height:26px; color:whitesmoke; max-width: auto; max-height: auto; white-space: nowrap;">We work in a friendly and efficient using the latest <br>
              technologies and sharing our expertise.</div>
          </li>
        </ul>
      </div>
    </div>
  </section>
  
  <!-- Content -->
  <div id="content"> 
    
    <!-- Intro -->
    <section class="p-t-b-150">
      <div class="container">
        <div class="intro-main">
          <div class="row"> 
            
            <!-- Intro Detail -->
            <div class="col-md-8">
              <div class="text-sec">
                <h5>OTHER HEALTH SERVICES</h5>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo</p>
                <ul class="row">
                  <li class="col-sm-6">
                    <h6> <i class="lnr  lnr-checkmark-circle"></i> EMERGENCY CASE</h6>
                    <p>Excepteur sint occaecat cupidatat non roident, 
                      sunt in culpa qui officia deserunt mollit </p>
                  </li>
                  <li class="col-sm-6">
                    <h6> <i class="lnr  lnr-checkmark-circle"></i> QUALIFIED WORKERS</h6>
                    <p>Excepteur sint occaecat cupidatat non roident, 
                      sunt in culpa qui officia deserunt mollit </p>
                  </li>
                  <li class="col-sm-6">
                    <h6> <i class="lnr  lnr-checkmark-circle"></i> ONLINE APPOINTMENT</h6>
                    <p>Excepteur sint occaecat cupidatat non roident, 
                      sunt in culpa qui officia deserunt mollit </p>
                  </li>
                  <li class="col-sm-6">
                    <h6> <i class="lnr  lnr-checkmark-circle"></i> FREE HEALTH COUNSELING</h6>
                    <p>Excepteur sint occaecat cupidatat non roident, 
                      sunt in culpa qui officia deserunt mollit </p>
                  </li>
                  <script>
                    
                  </script>
                </ul>
              </div>
            </div>
            
            <!-- Intro Timing (this has to be dynamic)-->
            <div class="col-md-4">
              <h5 class="text-uppercase">Days to visit the clinic</h5>
              <div class="timing"> <i class="lnr lnr-clock"></i>
                <ul>
                  <?php
                  $query ="SELECT * FROM `under_five_days`";
                  $sql =  mysqli_query($conn , $query);

                  if (mysqli_num_rows($sql)==null) {
                    echo '<li> Sorry !! there are no days to visit the clinic </li>';
                  }else{
                     while($row = mysqli_fetch_array($sql)) {
                    echo '<li> '.$row["day"].' <span>'.$row["from_time"].' - '.$row["to_time"].'</span></li>';
                  }
                  }
                  ?>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
   
    
    
  </div>
  
  <!-- Footer -->
<?php include 'footer.php';?>

