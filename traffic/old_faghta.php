<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg sticky-top">
    <div class="container">
    <a class="navbar-brand fs-2" href="index.php"><i class="fa-solid fa-burger"></i> Foodini</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item active">
            <a class="nav-link" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="faghta.php">Φαγητά</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="glyka.php">Γλυκά</a>
          </li>
          
        </ul>
      </div>
    </div>
  </nav>

  <div class="container-fluid" id="midcontainer-almires">

  </div>

  <div class="textbgpic">
    <h1>Οι Αλμυρές μας Συνταγές</h1>
    <p>lorasde</p>
  </div>

  <!-- mesaio container -->
  <div class="container-fluid  rounded my-5 p-5">
    <!-- ftiaxnw ena row me 3 col -->
    <div class="container-fluid row py-3 rounded" style="background-color: #F7C566; ">
      <!-- to messaio col einai gia spacing, ta alla duo einai container gia to periexomeno -->
      <div class="col-3 p-5">
        <div class="container" style="background-color: #FFF8DC; border-radius: 2rem;" id="sex123">
          
        <?php
         $selected = 0;     
         ?>

        <form class="px-5 py-3 form-control-lg" method="post" >

          

            <div class="form-check mb-4 te">
              <h3 class="text-center mb-3">Υλικά</h3>
              <div class='form-check mb-2'>
                      <input class='form-check-input' type='radio'  name='ingredient' value='' id='0' checked>
                        <label class='form-check-label' for='0'>All Ingredients
                        </label>
                    </div>
              
              <?php
                include "connect_db.php";
                $sql = "SELECT * FROM ingredients";
                $result = mysqli_query($conn, $sql);
                
                
                while ($row = mysqli_fetch_assoc($result)) {
                  echo "
                    <div class='form-check mb-2'>
                      <input class='form-check-input' type='radio'  name='ingredient' value='".$row["ingredient_id"]."' id='".$row["ingredient_id"]."' >
                        <label class='form-check-label' for='".$row["ingredient_id"]."'>".$row["title"]."
                        </label>
                    </div> ";
                  }
              ?>


           

              <select class="form-select my-4" aria-label="Default select example" name="diff">
                <option value="0"  >Όλες</option>
                <option value="Εύκολη">Ευκολες</option>
                <option value="Μεσαία">Μετριες</option>
                <option value="Δύσκολη">Δυσκολες</option>

              </select>
              
              <button type="submit" name="submit" value="submit" class="btn">Αναζήτηση</button>

            </div>

          </form>

          <?php
                if(isset($_POST['submit'])){
                  $selected = $_POST['ingredient'];
                  echo $selected;
                  $selected_diff = $_POST['diff'];
                  echo $selected_diff;
              
                }
              
              ?>

              

        </div>
      </div>
      <div class="col-1" style="background-color: #b5b5b500;"></div>
      <div class="col-8 py-5 px-0" style="background-color: #a5202000; ">
        <!-- div me kartes -->
        <div class="container p-3 mx-0" style="background-color: #FFF8DC; border-radius: 1rem;">


          <a href="#" style="text-decoration: none;">
            <div class="card mb-3 m-3">
              <div class="row g-0">
                <div class="col-md-4">
                  <img src="images/thumbnail1.jpg" class="img-fluid rounded-start" alt="...">
                </div>
                <div class="col-md-8">
                  <div class="card-body">
                    <h3 class="card-title">Card title</h3>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
                  </div>
                </div>
              </div>
            </div>
          </a>



          <div class="card mb-3 m-3">
            <div class="row g-0">
              <div class="col-md-4">
                <img src="images/thumbnail1.jpg" class="img-fluid rounded-start" alt="...">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h3 class="card-title">Card title</h3>
                  <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                  <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
                </div>
              </div>
            </div>
          </div>


          <?php

          include "connect_db.php";

          $sql = "SELECT * FROM recipes WHERE category = 'Αλμυρό' ";

          $result = mysqli_query($conn, $sql);
          
          

          if($selected !=""){
            $sql = "SELECT * FROM recipes_ingredients WHERE ingredient_id = $selected";
            $sql3 = "SELECT * FROM ingredients WHERE ingredient_id = $selected";
            $result = mysqli_query($conn, $sql);
            $result3 = mysqli_query($conn, $sql3);
            while ($row = mysqli_fetch_assoc($result)) {
              while ($row3 = mysqli_fetch_assoc($result3)){
                echo "<h2 class='m-2'>Syntages me ".$row3['title']."</h2>";

              };
              $bam = $row["recipe_id"];
             
              $sql2 = "SELECT * FROM recipes WHERE recipe_id = $bam and category = 'Αλμυρό'";
              $result2 = mysqli_query($conn, $sql2);
              while ($row2 = mysqli_fetch_assoc($result2)){
                        echo "
                          <a href='" . $row2["page_title"] . ".php' style='text-decoration: none;'>
                          <div class='card mb-3 m-3' >
                          <div class='row g-0'>
                            <div class='col-md-4'>
                              <img src='images/" . $row2["thumbnail"] . ".jpg' class='img-fluid rounded-start' alt='...'>
                            </div>
                            <div class='col-md-8'>
                              <div class='card-body'>
                                <h3 class='card-title'>" . $row2["title"] . "</h3>
                                <p class='card-text'>" . $row2["description_tiny"] . "</p>
                                <p class='card-text'><small class='text-body-secondary'>" ."Δυσκολια: " .$row2["difficulty"] . "</small></p>
                              </div>
                            </div>
                          </div>
                        </div>
                        </a>
                          ";}
                }
              }else{
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "
                        <a href='" . $row["page_title"] . ".php' style='text-decoration: none;'>
                        <div class='card mb-3 m-3' >
                        <div class='row g-0'>
                          <div class='col-md-4'>
                            <img src='images/" . $row["thumbnail"] . ".jpg' class='img-fluid rounded-start' alt='...'>
                          </div>
                          <div class='col-md-8'>
                            <div class='card-body'>
                              <h3 class='card-title'>" . $row["title"] . "</h3>
                              <p class='card-text'>" . $row["description_tiny"] . "</p>
                              <p class='card-text'><small class='text-body-secondary'>" ."Δυσκολια: " .$row["difficulty"] . "</small></p>
                            </div>
                          </div>
                        </div>
                      </div>
                      </a>
                        ";}
          }

         
          ?>



        </div>
      </div>


    </div>


  </div>
  <!-- telos mesaiou -->

</body>

</html>