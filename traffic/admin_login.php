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
            <a class="nav-link" href="faghta_kai_glyka.php?category=Αλμυρό">Φαγητά</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="faghta_kai_glyka.php?category=Γλυκό">Γλυκά</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- telos navbar -->

  <section class="container  my-5">
    <h3 class="text-center">Admin Login</h3>
  </section>


  <!-- arxh midsection -->
  <section class="container-fluid  p-5">
    <div class="container-fluid syntages-container p-5">
      <h3 class="text-center mb-4">User lmao</h3>
      <div class="container p-5 admin-form rounded" style="width: 30em;">

        <form action="login.php" method="post">

        <div class="row mb-3">
            <label for="inputPassword3" class="col-sm-3 col-form-label">Username</label>
            <div class="col-sm-9">
              <input type="text" name="uname" class="form-control" id="inputPassword3">
            </div>
          </div>

          <div class="row mb-3">
            <label for="inputPassword3" class="col-sm-3 col-form-label">Password</label>
            <div class="col-sm-9">
              <input type="password" name="password" class="form-control" id="inputPassword3">
            </div>
          </div>
       
          <div class="row mb-3">
            <div class="col-sm-9">
              
            </div>
            <button type="submit" class="btn btn-primary col-auto">Sign in</button>
          </div>
          
        </form>

        <script>
          // Example starter JavaScript for disabling form submissions if there are invalid fields
          (() => {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            const forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.from(forms).forEach(form => {
              form.addEventListener('submit', event => {
                if (!form.checkValidity()) {
                  event.preventDefault()
                  event.stopPropagation()
                }

                form.classList.add('was-validated')
              }, false)
            })
          })()
        </script>

        <?php
        include "connect_db.php";
        if (isset($_POST['submit'])) {
          $recipe_title = $_POST['title'];
          $recipe_category = $_POST['category'];
          $recipe_difficulty = $_POST['difficulty'];
          $recipe_rating = $_POST['rating'];
          $recipe_description = $_POST['description'];
          $recipe_description_tiny = $_POST['tiny_description'];
          $recipe_full_res = $_POST['full_res'];
          $recipe_thumbnail = $_POST['thumbnail'];

          $sql = "INSERT INTO recipes VALUES ('','$recipe_title', '', '$recipe_category', '$recipe_difficulty', '$recipe_description', '$recipe_description_tiny', '$recipe_description_tiny', '0', '$recipe_thumbnail', '$recipe_full_res')";
          mysqli_query($conn, $sql);
          echo "<script> alert('data has been inserted')</script>";
        }

        ?>

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