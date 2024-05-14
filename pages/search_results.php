<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="../css/style_reb.css">
  <script src="https://kit.fontawesome.com/51a1469d66.js" crossorigin="anonymous"></script>
</head>

<body class="d-flex flex-column ">
  


  <!-- arxh navbar -->
  <nav class="navbar navbar-expand-sm sticky-top navbar-dark">
    <div class="container">
      <a class="navbar-brand fs-2" href="index.php"><i class="fa-solid fa-burger"></i> Foodini</a>
      <!-- koubi gia dropdown otan mikrainei to parathuro -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item ">
            <a class="nav-link" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="faghta.php">Φαγητά</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="glyka.php">Γλυκά</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- telos navbar -->

  <!-- grammata panw se bg me maska -->
  <div class="container-fluid photo-bg-syntages"></div>
  <div class="text-bg-syntages">
    <?php
    $search_thing = $_GET["search"];
    echo "<h1 class='mb-3'>Αποτελέσματα αναζήτησης</h1>";
    ?>
  
    
    <p>Πόνος μη μας έρθει μακάρι. Πέφτω και κυλιέμαι σα ζάρι. Κάνω πως ξεχνάω τ' όνομα σου. Κι όλα αλλάζουν γύρω μου απότομα. Ο άνεμος για πού θα μας πάρει;
      Πέφτω και κυλιέμαι σα ζάρι. Κάνω πως ξεχνάω τ' άρωμα σου. Κι όλα αλλάζουν γύρω μου
    </p>
  </div>
  <!-- telos grammata panw se bg me maska -->



  <!-- arxh midsection -->
  <section class="container-fluid  p-5">

  <?php
    $search_thing = $_GET["search"];
    echo "<h2 class='text-center my-5'>Συνταγές με: ".$search_thing."</h1>";
    ?>
    
    <div class="container rounded syntages-container">
      <div class="row">
        <div class="col-lg-12 p-4">
          <!-- div me kartes syntagwn -->
          <div class="container-fluid ml-4 rounded syntages-midsection p-4">



            <?php
              include "connect_db.php";
              $search_thing = $_GET["search"];

              $find_recipe_with_id_sql = "SELECT * FROM recipes WHERE title LIKE '%$search_thing%'";
              
              
              $recipe = mysqli_query($conn, $find_recipe_with_id_sql);
              $result_number = mysqli_num_rows($recipe);

              if($result_number==0){
                echo "<h5>Δεν υπαρχουν συνταγές με: " . $search_thing . "</h5>";
              }else{
                while ($recipe_fetch = mysqli_fetch_assoc($recipe)) {

                echo "
                <a href='recepie_info.php?recipe_id=" . $recipe_fetch['recipe_id'] . "' style='text-decoration: none;'>
                  <div class='card mb-3 m-3'>
                    <div class='row g-0'> 
                      <div class='col-md-4'>
                        <img src='../images/eikones_syntagwn/thumbnail/" . $recipe_fetch['thumbnail'] . ".jpg' class='img-fluid rounded-start' alt='...'>
                      </div>
                      <div class='col-md-8'>
                        <div class='card-body'>
                          <h3 class='card-title text-capitalize'>" . $recipe_fetch['title'] . "</h3>
                          <p class='card-text'>" . $recipe_fetch["description_tiny"] . "</p>
                          <p class='card-text'><small class='text-body-secondary'>" . "Δυσκολια: " . $recipe_fetch["difficulty"] . "</small></p>
                        </div>
                      </div>
                    </div>
                  </div>
                </a>
                ";
              };
              }
             
              
            

            ?>










          </div>
        </div>
      </div>
    </div>

  </section>
  <!-- telos midsection -->



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
      © 2024 Copyright:
      <a class="text-dark" href="https://www.youtube.com/watch?v=V1lAZ5OQ6qI">bigmansnik</a>
    </div>

  </footer>
  <!-- telos footer -->


</body>

</html>