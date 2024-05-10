<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="style_reb.css">
  <script src="https://kit.fontawesome.com/51a1469d66.js" crossorigin="anonymous"></script>
</head>

<body class="d-flex flex-column ">
<!-- arxikopoiw times wste otan fortwsei h selida prwth fora na mhn vgazei error -->
<?php
  $selected_ingredient = 0;
  $selected_difficulty = 0;
?>


  <!-- arxh navbar -->
  <nav class="navbar navbar-expand-sm sticky-top navbar-dark">
    <div class="container">
      <a class="navbar-brand fs-2" href="#"><i class="fa-solid fa-burger"></i> Foodini</a>
      <!-- koubi gia dropdown otan mikrainei to parathuro -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Φαγητά</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Γλυκά</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- telos navbar -->

  <!-- grammata panw se bg me maska -->
  <div class="container-fluid photo-bg-syntages"></div>
  <div class="text-bg-syntages">
    <h1>Οι Γλυκιές μας Συνταγές</h1>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis aut laboriosam placeat doloribus excepturi assumenda recusandae doloremque! Perspiciatis error quod omnis aspernatur quam nemo, molestiae quae id adipisci a assumenda!</p>
  </div>
  <!-- telos grammata panw se bg me maska -->



  <!-- arxh midsection -->
  <section class="container-fluid  p-5">
    <div class="container-fluid syntages-container">
      <div class="row">







        <div class="col-lg-3 p-4">
          <!-- div me olo to section epilogwn -->
          <form class="container rounded syntages-midsection-epiloges p-4" method="post">
            <h6>Επιλογή δυσκολίας:</h6>
            <div class="d-flex">
              <select class="form-select w-50" name="difficulty">
                <option value=0>Κάθε Δυσκολία</option>
                <option value="'Εύκολη'">Ευκολες</option>
                <option value="'Μεσαία'">Μεσαίες</option>
                <option value="'Δύσκολη'">Δυσκολες</option>
              </select>
              <button type="submit" name="submit" value="submit" class="btn mx-3">Αναζήτηση</button>
            </div>

            <h6 class="mt-3">epilogh ylikwn</h6>


            <!-- div me ola ta radio koublia -->
            <div class="container-fluid mt-2 d-flex flex-wrap">
              <div class='form-check m-2'>
                <input class='form-check-input' type='radio' name='ingredient' value="" id='0' checked>
                <label class='form-check-label' for='0'>All Ingredients</label>
              </div>
              <!--php pou printarei ola ta ylika kai ta id tous gia id twn radio  -->
              <?php
                include "connect_db.php";
                $sql_ingredients = "SELECT * FROM ingredients";
                $result_ingredients = mysqli_query($conn, $sql_ingredients);


                while ($row_ingredients = mysqli_fetch_assoc($result_ingredients)) {
                  echo "<div class='form-check m-2'>
                                <input class='form-check-input' type='radio' name='ingredient' value='" . $row_ingredients["ingredient_id"] . "' id='" . $row_ingredients['ingredient_id'] . "'>
                                <label class='form-check-label' for='" . $row_ingredients['ingredient_id'] . "'>
                                  " . $row_ingredients['title'] . "
                                </label>
                            </div>
                              ";
                }
              ?>



            </div>
          </form>

          <?php
            if(isset($_POST['submit'])){
              $selected_ingredient = $_POST['ingredient'];
              $selected_difficulty = $_POST['difficulty'];
              
            }
          ?>      


        </div>



        <!-- col gia spacing -->
        <div class="col-sm-1"></div>
        <!-- col me kartes syntagwn -->
        <div class="col-sm-8 p-4">
          <!-- div me kartes syntagwn -->
          <div class="container rounded syntages-midsection p-4">



            <?php


            //o php kodikas einai copy paste me afton twn almurwn syntagwn, opote sta comments edw kai ekei den anaferetai 
            // oti uparxei kai to filtro - category = almuro kai antistoixa category = glyko, pou mpainei mesa sthn entolh se kathe senario 


            include "connect_db.php";
            if($selected_difficulty !=0 && $selected_ingredient > 0){
              // prwto senario - exoume epilegmeno kai uliko kai dyskolia


              //apo ton pinaka pou ennwnei recipes kai ingredients, dialegoume ta recipe id's pou exoun sysxetistei me to ingredient id
              $find_recipe_ingredient = "SELECT * FROM recipes_ingredients WHERE ingredient_id = $selected_ingredient";

              //edw vrhskoume to onoma tou ignredient gia na to tuposoume
              $find_ingredient_name = "SELECT * FROM ingredients WHERE ingredient_id = $selected_ingredient";

              //to querry pou tha vrei ta recipe id pou exoun to igredient
              $recipes_with_ingredient_querry = mysqli_query($conn, $find_recipe_ingredient);

              //to querry pou tha vrei to onoma tou ingredient me to id tou
              $ingredient_name_sql = mysqli_query($conn, $find_ingredient_name);

              //to ingredient name
              $ingredient_name = mysqli_fetch_assoc($ingredient_name_sql);

              // print to ingredient name kai thn dyskolia
              echo "<h5 class='m-2'>Συνταγές με:  ".$ingredient_name['title']." και βαθμό δυσκολίας: ".$selected_difficulty."</h5>";


              //while loop pou tha trexei gia kathe recepie pou exei mesa to ingredient
              while($row_recipes_with_ingredient = mysqli_fetch_assoc($recipes_with_ingredient_querry)){


                //apomononoume apo to row mono to recepie id se mia metavlhth
                $recipe_id = $row_recipes_with_ingredient['recipe_id'];

                //entolh pou tha vrei apo ton pinaka twn recipes afto me to id pou vrhkame apo panw
                $find_recipe_with_id_sql = "SELECT * FROM recipes WHERE recipe_id = $recipe_id and difficulty = $selected_difficulty and category = 'Αλμυρό'";
                //querry gia thn apo panw entolh
                $recipe = mysqli_query($conn, $find_recipe_with_id_sql);
                


                 // while loop pou tha trexei gia kathe recipe me to id pou vrhkame parapanw (mono mia fora dld alla to evala se loop gt alliws evgaze error)
                while($recipe_fetch = mysqli_fetch_assoc($recipe)){

                  echo "
                  <a href='recepie_info.php?recipe_id=".$recipe_fetch['recipe_id']."' style='text-decoration: none;'>
                  <div class='card mb-3 m-3'>
                    <div class='row g-0'> 
                      <div class='col-md-4'>
                        <img src='images/".$recipe_fetch['thumbnail'].".jpg' class='img-fluid rounded-start' alt='...'>
                      </div>
                      <div class='col-md-8'>
                        <div class='card-body'>
                          <h3 class='card-title'>".$recipe_fetch['title']."</h3>
                          <p class='card-text'>" . $recipe_fetch["description_tiny"] . "</p>
                          <p class='card-text'><small class='text-body-secondary'>" ."Δυσκολια: " .$recipe_fetch["difficulty"] . "</small></p>
                        </div>
                      </div>
                    </div>
                  </div>
                </a>
                  ";
                };
              };
              
            }


            
            elseif($selected_ingredient > 0){
              //deftero senario - exoume epilegmeno mono uliko

              //apo ton pinaka pou ennwnei recipes kai ingredients, dialegoume ta recipe id's pou exoun sysxetistei me to ingredient id
              $find_recipe_ingredient = "SELECT * FROM recipes_ingredients WHERE ingredient_id = $selected_ingredient";

              //edw vrhskoume to onoma tou ignredient gia na to tuposoume
              $find_ingredient_name = "SELECT * FROM ingredients WHERE ingredient_id = $selected_ingredient";

              //to querry pou tha vrei ta recipe id pou exoun to igredient
              $recipes_with_ingredient_querry = mysqli_query($conn, $find_recipe_ingredient);

              //to querry pou tha vrei to onoma tou ingredient me to id tou
              $ingredient_name_sql = mysqli_query($conn, $find_ingredient_name);


              //to ingredient name
              $ingredient_name = mysqli_fetch_assoc($ingredient_name_sql);


              // print to ingredient name
              echo "<h5 class='m-2'>Συνταγές με: ".$ingredient_name['title']."</h5>";



              //while loop pou tha trexei gia kathe recepie pou exei mesa to ingredient
              while($row_recipes_with_ingredient = mysqli_fetch_assoc($recipes_with_ingredient_querry)){


                //apomononoume apo to row mono to recepie id se mia metavlhth
                $recipe_id = $row_recipes_with_ingredient['recipe_id'];


                //entolh pou tha vrei apo ton pinaka twn recipes afto me to id pou vrhkame apo panw
                $find_recipe_with_id_sql = "SELECT * FROM recipes WHERE recipe_id = $recipe_id and category = 'Αλμυρό'";

                //to querry gia thn apo panw entolh
                $recipe = mysqli_query($conn, $find_recipe_with_id_sql);
                
                


                // while loop pou tha trexei gia kathe recipe me to id pou vrhkame parapanw (mono mia fora dld alla to evala se loop gt alliws evgaze error)
                while($recipe_fetch = mysqli_fetch_assoc($recipe)){

                  echo "
                  <a href='recepie_info.php?recipe_id=".$recipe_fetch['recipe_id']."' style='text-decoration: none;'>
                <div class='card mb-3 m-3'>
                  <div class='row g-0'> 
                    <div class='col-md-4'>
                      <img src='images/".$recipe_fetch['thumbnail'].".jpg' class='img-fluid rounded-start' alt='...'>
                    </div>
                    <div class='col-md-8'>
                      <div class='card-body'>
                        <h3 class='card-title'>".$recipe_fetch['title']."</h3>
                        <p class='card-text'>" . $recipe_fetch["description_tiny"] . "</p>
                        <p class='card-text'><small class='text-body-secondary'>" ."Δυσκολια: " .$recipe_fetch["difficulty"] . "</small></p>
                      </div>
                    </div>
                  </div>
                </div>
              </a>
                  ";
                };
              };
            }
            
            
            elseif($selected_difficulty != 0){
              // trito senario - exoume epilegmenh mono dyskolia

              //entolh gia na vrei ta recipes me afthn thn dyskolia
              $find_recipe_with_id_sql = "SELECT * FROM recipes WHERE difficulty = $selected_difficulty and category = 'Αλμυρό'";

              //to querry gia thn entolh
              $recipe = mysqli_query($conn, $find_recipe_with_id_sql);

              //print thn dyskolia
              echo "<h5 class='m-2'>Συνταγές με βαθμό δυσκολίας: ".$selected_difficulty."</h5>";


              //while loop pou tha printarei oles ta recipes me thn epilegmenh dyskolia
              while($recipe_fetch = mysqli_fetch_assoc($recipe)){

                echo "
                <a href='recepie_info.php?recipe_id=".$recipe_fetch['recipe_id']."' style='text-decoration: none;'>
                <div class='card mb-3 m-3'>
                  <div class='row g-0'> 
                    <div class='col-md-4'>
                      <img src='images/".$recipe_fetch['thumbnail'].".jpg' class='img-fluid rounded-start' alt='...'>
                    </div>
                    <div class='col-md-8'>
                      <div class='card-body'>
                        <h3 class='card-title'>".$recipe_fetch['title']."</h3>
                        <p class='card-text'>" . $recipe_fetch["description_tiny"] . "</p>
                        <p class='card-text'><small class='text-body-secondary'>" ."Δυσκολια: " .$recipe_fetch["difficulty"] . "</small></p>
                      </div>
                    </div>
                  </div>
                </div>
              </a>
                ";
              };
            }
            
            else{
              //teleutaio senario - den exoume kanena filtro epilegmeno

              //entolh..
              $find_recipe_with_id_sql = "SELECT * FROM recipes WHERE category = 'Αλμυρό'";

              //querry
              $recipe = mysqli_query($conn, $find_recipe_with_id_sql);

              //while loop while loop pou tha printarei oles ta recipes
              while($recipe_fetch = mysqli_fetch_assoc($recipe)){

                echo "
                <a href='recepie_info.php?recipe_id=".$recipe_fetch['recipe_id']."' style='text-decoration: none;'>
                <div class='card mb-3 m-3'>
                  <div class='row g-0'> 
                    <div class='col-md-4'>
                      <img src='images/".$recipe_fetch['thumbnail'].".jpg' class='img-fluid rounded-start' alt='...'>
                    </div>
                    <div class='col-md-8'>
                      <div class='card-body'>
                        <h3 class='card-title'>".$recipe_fetch['title']."</h3>
                        <p class='card-text'>" . $recipe_fetch["description_tiny"] . "</p>
                        <p class='card-text'><small class='text-body-secondary'>" ."Δυσκολια: " .$recipe_fetch["difficulty"] . "</small></p>
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