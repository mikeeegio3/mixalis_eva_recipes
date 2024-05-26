<div class="container-fluid syntages-container p-5 rounded">

  <h1>Hello, <?php echo $_SESSION['name']; ?></h1>
  <a href="logout.php" class="text-decoration-none logout-button">Logout</a>

  <h3 class="text-center mb-4">Add a recipe:</h3>
  <div class="container w-50 p-5 admin-form rounded">

    <form class="row g-3 needs-validation" method="post" novalidate enctype="multipart/form-data">

      <div class="col-md-12">
        <label for="inputEmail4" class="form-label">Recipe Name</label>
        <input name="title" type="text" class="form-control" id="inputEmail4" required>
      </div>

      <div class="col-md-3">
        <label for="inputPassword4" class="form-label">Category</label>
        <select name="category" id="inputState" class="form-select" required>
          <option value="Αλμυρό" selected>Φαγητό</option>
          <option value="Γλυκό">Γλυκό</option>
        </select>
      </div>

      <div class="col-4">
        <label for="inputAddress" class="form-label">Difficulty</label>
        <select name="difficulty" id="inputState" class="form-select" required>
          <option value="Εύκολη" selected>Εύκολη</option>
          <option value="Μεσαία">Μεσαία</option>
          <option value="Δύσκολη">Δύσκολη</option>
        </select>
      </div>

      <div class="col-5 pt-5">
        <label for="" class="">Stars </label>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="rating" id="rating_radio1" value="1" required>
          <label class="form-check-label" for="rating_radio1">1</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="rating" id="rating_radio2" value="2" required>
          <label class="form-check-label" for="rating_radio2">2</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="rating" id="rating_radio3" value="3" required>
          <label class="form-check-label" for="rating_radio3">3</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="rating" id="rating_radio4" value="4" required>
          <label class="form-check-label" for="rating_radio4">4</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="rating" id="rating_radio5" value="5" required>
          <label class="form-check-label" for="rating_radio5">5</label>
        </div>
      </div>



      <div class="col-md-12">
        <span class="input-group-text">Description</span>
        <textarea name="description" class="form-control" aria-label="With textarea" required></textarea>
      </div>

      <div class="col-md-8">
        <span class="input-group-text">Tiny Description</span>
        <textarea name="tiny_description" class="form-control" aria-label="With textarea" required></textarea>
        </select>
      </div>

      <div class="col-md-2">
        <label for="inputZip" class="form-label">Image</label>
        <input name="full_res" type="file" class="form-control" id="inputZip" required>
      </div>

      <div class="col-2">
        <label for="inputZip" class="form-label">Thumbnail</label>
        <input name="thumbnail" type="text" class="form-control" id="inputZip" required>
      </div>

      




      <h3 class="text-center mb-4 mt-5">Select the ingredients:</h3>
      <div class="container-fluid mt-2 d-flex flex-wrap">

        <!--php pou printarei ola ta ylika kai ta id tous gia id twn radio  -->
        <?php
        include "connect_db.php";
        $sql_ingredients = "SELECT * FROM ingredients";
        $result_ingredients = mysqli_query($conn, $sql_ingredients);


        while ($row_ingredients = mysqli_fetch_assoc($result_ingredients)) {
          echo "<div class='form-check m-2'>
                                <input class='form-check-input' type='checkbox' name='ingredients[]' value='" . $row_ingredients["ingredient_id"] . "' id='" . $row_ingredients['ingredient_id'] . "'>
                                <label class='form-check-label' for='" . $row_ingredients['ingredient_id'] . "'>
                                  " . $row_ingredients['title'] . "
                                </label>
                            </div>
                              ";
        }

        ?>



      </div>
      <div class="col-12 mt-5 text-center">
        <button name="submit" type="submit" class="btn btn-lg" style='background-color: #DC6B19;'>Submit the Recipe</button>
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

        // photografia stuff
        $img_name = $_FILES['full_res']['name'];
        $img_temp_name = $_FILES['full_res']['tmp_name'];
        $img_type = $_FILES['full_res']['type'];
        $find_extention = explode('.', $img_name);
        $img_extention = end($find_extention);
        
        reset($find_extention);
        $img_only_name = current($find_extention);
        
        $allowed = array('jpg');
        if(in_array($img_extention, $allowed)){
          $img_destination = '../images/eikones_syntagwn/full_res/'. $img_name;
          move_uploaded_file($img_temp_name, $img_destination);
        }
        // telos fotografia stuff


      // xwris afto to id auto increment den tha lavmane upopshn an exei svhstei kati kai tha synexize me id megalutero apo to prwhgoumeno syn 1
      $sql_reset_ai = "ALTER TABLE recipes AUTO_INCREMENT = 1";
      mysqli_query($conn, $sql_reset_ai);
      if (!$recipe_title = '' && !$recipe_category = '' && !$recipe_description = '' && !$recipe_description_tiny = '' && !$recipe_difficulty = '' && !$recipe_thumbnail = '' && !$recipe_full_res = '' && !$recipe_rating = '') {
        $recipe_title = $_POST['title'];
        $recipe_category = $_POST['category'];
        $recipe_difficulty = $_POST['difficulty'];
        $recipe_rating = $_POST['rating'];
        $recipe_description = $_POST['description'];
        $recipe_description_tiny = $_POST['tiny_description'];
        $recipe_full_res = $img_only_name;

        $recipe_thumbnail = $_POST['thumbnail'];
        $recipe_author = 0;

        $sql = "INSERT INTO recipes VALUES ('','$recipe_title', '', '$recipe_category', '$recipe_difficulty', '$recipe_description', '$recipe_description_tiny', '$recipe_description_tiny', '0', '$recipe_thumbnail', '$recipe_full_res', '$recipe_author')";
        mysqli_query($conn, $sql);
        echo "<script> alert('data has been inserted')</script>";



      


        $entry_number_sql = "SELECT * FROM recipes";
        $entry_number_querry = mysqli_query($conn, $entry_number_sql);
        $last_recipe_added = mysqli_num_rows($entry_number_querry);
        


        $selected_ingredients_to_add = $_POST['ingredients'];
        foreach ($selected_ingredients_to_add as $selected_one) {
          
          $sql = "INSERT INTO recipes_ingredients(`recipe_id`, `ingredient_id`) VALUES ('$last_recipe_added','$selected_one')";
          mysqli_query($conn, $sql);
        }
      }
    }

    ?>

    

  </div>

  <div class="col=12 text-center my-5"><a class="last-added-button" href="latest_recipes.php">See last added recipes</a></div>
  </div>