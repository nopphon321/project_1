<?php include("head/user_header.php") ; ?>
    <!-- END head -->

    <section class="site-hero inner-page overlay" style="background-image: url(img/hotel.jpg)" data-stellar-background-ratio="0.5">
      <div class="container "><br><br>
        <div class="row  justify-content-center align-items-center text-center  ">
          <div class="col-md-8 text-center  " data-aos="fade-up">
            
            <form action="loginadminuser.php" method="post" class="bg-light" >
              <br><br>
            <label for="username" class="family">Username:</label>
            <input type="text" name="username" >
            <br>
            <label for="username" class="family">Password:</label>
            <input type="password" name="password" >
            <br>
            <input type="submit" value="ตกลง" class="btn btn-default family" name="ตกลง"   >
            <a  href="register_form.php"  class="btn btn-default family" > สมัคสมาชิก</a>
            <br>
            <br>
</form>
          </div>
        </div>
      </div>

      <a class="mouse smoothscroll" href="#next">
        <div class="mouse-icon">
          <span class="mouse-wheel"></span>
        </div>
      </a>
    </section>
    <!-- END section -->
   
   
    <?php include("footer.php")?>