<?php include("admin_header.php"); ?>

<?php 

    session_start();

    if (!$_SESSION['userid']) {
            header("Location: index.php");
    } else {
?>

<section class="site-hero overlay" style="background-image: url(img/hero_2.jpg" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row site-hero-inner justify-content-center align-items-center">
          <div class="col-md-10 text-center" data-aos="fade-up">
            <h1 class="thaifont7">ห้องพักโยกไปมา<br>ยินดีต้อนรับ</h1>
          </div>
        </div>
      </div>

      <a class="mouse smoothscroll" href="#next">
        <div class="mouse-icon">
          <span class="mouse-wheel"></span>
        </div>
      </a>
    </section>
    <section class="section contact-section" id="next">
      <div class="container text-center">
    <h1>you are admin</h1>
    <h3>hi , <?php echo $_SESSION['user']; ?></h3>
    <a href="logout.php">Logout</a>
    <?php include("books_range.php"); ?>


    <?php } ?>
    </div>
    </section>
    <?php include("footer.php"); ?>