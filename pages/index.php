<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="../css/style.css">
  <script src="https://kit.fontawesome.com/51a1469d66.js" crossorigin="anonymous"></script>

  <link rel="icon" type="image/x-icon" href="../images/logo/icon/favicon.ico">



</head>

<body>


  <!-- vrhskw poses syntages uparxoun gia na valw sto carousel treis tuxaies -->
  <?php
  include "connect_db.php";
  $search_thing = '';
  $entry_number_sql = "SELECT * FROM recipes";
  $entry_number_querry = mysqli_query($conn, $entry_number_sql);
  $entry_number = mysqli_num_rows($entry_number_querry);
  ?>


  <!-- arxh navbar -->
  <nav class="navbar navbar-expand-sm sticky-top navbar-dark">
    <div class="container">
      <a class="navbar-brand fs-2" href="index.php"><img src="../images/logo/logo2.png" alt="" srcset="" style="max-width: 2.5rem; padding:0%; margin:0%" class=" mb-1"> Foodini</a>
      <!-- koubi gia dropdown otan mikrainei to parathuro -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item active">
            <a class="nav-link" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="faghta_kai_glyka.php?category=Αλμυρό">Φαγητά</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="faghta_kai_glyka.php?category=Γλυκό">Γλυκά</a>
          </li>
        </ul>
        
      </div>
    </div>
    <ul class="navbar-nav mx-4">
          <li class="admin-login">
            <?php
            session_start();
              if (isset($_SESSION['name']) && isset($_SESSION['user_name'])) {
              
              echo "<a href='admin_dashboard.php' class='admin-login'>".$_SESSION['name']." <i class='fa-solid fa-arrow-right-to-bracket'></i></a>";
                
            } else {
                echo "<a href='admin_dashboard.php' class='admin-login'> Admin Login <i class='fa-solid fa-arrow-right-to-bracket'></i></a>";
            }
            ?>
          </li>
        </ul>
  </nav>
  <!-- telos navbar -->


  <!-- carousel -->
  <header class="header">


    <!-- div me tis eikones kai ta koubia-->
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">

      <!-- koubia karousel -->
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
      </div>


      <!-- div me eikones -->
      <div class="carousel-inner">

        <?php
        include "connect_db.php";
        // ftiaxnei array apo to 1(to id ths prwths sntaghs) mexri to id ths teleitaias(afto pou vrhka pio panw)
        $random = range(1, $entry_number);
        shuffle($random);
        // prwta echo mia eikona ektos loop gia na parei class active 
        $sql = "SELECT * FROM recipes where recipe_id = $random[0]";
        $querry = mysqli_query($conn, $sql);
        $fetch = mysqli_fetch_assoc($querry);
        echo " <div class='carousel-item active'style='background-image: url(../images/eikones_syntagwn/full_res/" . $fetch['full_res'] . ".jpg)'>
            <div class='carousel-caption'>
              <h5>Προτεινόμενες Συνταγές της Εβδομάδας</h5>
              <p class='text-capitalize'>" . $fetch['title'] . "</p>
            </div>
          </div>";

        // for loop pou kanei echo alles 2 
        for ($x = 1; $x < 3; $x++) {
          $sql = "SELECT * FROM recipes where recipe_id = $random[$x]";
          $querry = mysqli_query($conn, $sql);
          $fetch = mysqli_fetch_assoc($querry);
          echo " <div class='carousel-item 'style='background-image: url(../images/eikones_syntagwn/full_res/" . $fetch['full_res'] . ".jpg)'>
              <div class='carousel-caption'>
                <h5>Προτεινόμενες Συνταγές της Εβδομάδας</h5>
                <p class='text-capitalize'>" . $fetch['title'] . "</p>
              </div>
            </div>";
        };
        ?>

      </div>

      <!-- koubia bros pisw -->
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>


    </div>
  </header>
  <!-- telos carousel -->



  <!-- mesaio container -->
  <div class="container-fluid w-75 rounded my-5 p-5" style="background-color: #F7C566;">
    <div class="container">

      <section class="py-5">
        <div class="container main ">
          <h1 class="fw-light">Innovative Cooking</h1>
        </div>
      </section>

      <section class="" id="c-box2">


        <div class="container-fluid  c-main-cnt d-block d-sm-flex justify-content-center justify-content-around">

          <div class="card" style="width: 22%;">

            <div class="card-body overflow-hidden p-0" style="box-shadow: 2px 2px 3px 1px rgb(112, 112, 112); border-radius: 10px;">
              <img src="../images/home_cards/almira.jpg" class="card-img-top card-img-bottom" alt="...">
              <a href="faghta_kai_glyka.php?category=Αλμυρό">
                <div class="overlay">
                  <h3>Φαγητά</h3>
                  <p>Οι Συνταγές φαγητών μας</p>

                </div>
              </a>


            </div>
          </div>
          <div class="card" style="width: 22%;">

            <div class="card-body overflow-hidden p-0" style="box-shadow: 2px 2px 3px 1px rgb(112, 112, 112); border-radius: 10px;">
              <img src="../images/home_cards/glyka.jpg" class="card-img-top card-img-bottom" alt="...">
              <a href="faghta_kai_glyka.php?category=Γλυκό">
                <div class="overlay">
                  <h3>Γλυκά</h3>
                  <p>Οι Γλυκίες μας Συνταγές</p>

                </div>
              </a>


            </div>
          </div>
          <div class="card" style="width: 22%;">

            <div class="card-body overflow-hidden p-0" style="box-shadow: 2px 2px 3px 1px rgb(112, 112, 112); border-radius: 10px;">
              <img src="../images/home_cards/mail.jpg" class="card-img-top card-img-bottom" alt="...">
              <a href="mailto:dpsd19023@aegean.gr">
                <div class="overlay">
                  <h3>Ρωτήστε μας κατι</h3>
                  <p>Στείτλε μας mail</p>

                </div>
              </a>


            </div>
          </div>




        </div>




      </section>
    </div>
  </div><!-- telos mesaiou -->


  <section class="container-fluid my-5">

 <form class='container w-25' action='search_results.php' method='GET'>
      <h4 class='font-weight-light mb-4 font-italic text-center'>Search Recipes</h4>
      <div class='row mb-4 '>

        <div class='bg-light rounded rounded-pill shadow-sm mb-4 col-md-9'>
          <div class='input-group'>
            <input name='search' type='text' placeholder='See if we got your fav!' aria-describedby='button-addon1' class='form-control form-control-lg border-0 bg-light'>

          </div>
        </div>

        <div class='form-group col-md-3 p-1'>
          <button type='submit' name='submit' class='btn rounded-pill btn-block shadow-sm form-control-lg form-control' style='background-color: #DC6B19;'>Search</button>
        </div>

      </div>

    </form>



  </section>

  <!-- arxh footer -->
  <footer class="text-center text-white mt-auto" style="background-color: #6C0345; ">

    <div class="container pt-4">
      <!-- Section: Social media -->
      <section class="mb-4">
        <!-- Facebook -->
        <a class="btn btn-link btn-floating btn-lg text-dark m-1" href="#!" role="button" data-mdb-ripple-color="dark"><i class="fa-brands fa-facebook-f" style="color: #FFF8DC;"></i></a>

        <!-- Twitter -->
        <a class="btn btn-link btn-floating btn-lg text-dark m-1" href="#!" role="button" data-mdb-ripple-color="dark"><i class="fab fa-twitter" style="color: #FFF8DC;"></i></a>

        <!-- Google -->
        <a class="btn btn-link btn-floating btn-lg text-dark m-1" href="#!" role="button" data-mdb-ripple-color="dark"><i class="fab fa-google" style="color: #FFF8DC;"></i></a>

        <!-- Instagram -->
        <a class="btn btn-link btn-floating btn-lg text-dark m-1" href="#!" role="button" data-mdb-ripple-color="dark"><i class="fab fa-instagram" style="color: #FFF8DC;"></i></a>

        <!-- Linkedin -->
        <a class="btn btn-link btn-floating btn-lg text-dark m-1" href="#!" role="button" data-mdb-ripple-color="dark"><i class="fab fa-linkedin" style="color: #FFF8DC;"></i></a>
        <!-- Github -->
        <a class="btn btn-link btn-floating btn-lg text-dark m-1" href="#!" role="button" data-mdb-ripple-color="dark"><i class="fab fa-github" style="color: #FFF8DC;"></i></a>
      </section>
      <!-- Section: Social media -->
    </div>

    <div class="text-center text-dark p-3" style="background-color: rgba(255, 255, 255, 0.2);">
      © 2024 Copyright: <a class="text-dark" href="https://www.youtube.com/watch?v=V1lAZ5OQ6qI">bigmansnik</a>
    </div>

  </footer>
  <!-- telos footer -->

</body>

</html>