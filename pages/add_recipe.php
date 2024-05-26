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
    <link rel="icon" type="image/x-icon" href="../images/logo/icon/favicon.ico">
</head>

<body class="d-flex flex-column ">



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

                    echo "<a href='admin_dashboard.php' class='admin-login'>" . $_SESSION['name'] . " <i class='fa-solid fa-arrow-right-to-bracket'></i></a>";
                } else {
                    echo "<a href='admin_dashboard.php' class='admin-login'> Admin Login <i class='fa-solid fa-arrow-right-to-bracket'></i></a>";
                }
                ?>
            </li>
        </ul>
    </nav>
    <!-- telos navbar -->

    <section class="container  my-5">
        <h3 class="text-center">Admin Dashboard</h3>


    </section>

    <section class="container-fluid  p-5">


        <?php
        $now_ing = false;

        if (isset($_SESSION['name']) && isset($_SESSION['user_name'])) {
        ?>

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
                        if (in_array($img_extention, $allowed)) {
                            $img_destination = '../images/eikones_syntagwn/full_res/' . $img_name;
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

                            $recipe_thumbnail = $img_only_name."-mikro";
                            $recipe_author = 0;

                            $sql = "INSERT INTO recipes VALUES ('','$recipe_title', '$recipe_category', '$recipe_difficulty', '$recipe_description', '$recipe_description_tiny', '$recipe_rating', '$img_only_name', '$recipe_thumbnail', '$recipe_full_res', '$recipe_author')";
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

        <?php
        } else {
            require "../require/login_form.php";
        }
        ?>

        <!-- gia na mhn kanei resubmit me kathe refresh -->
        <script>
            if (window.history.replaceState) {
                window.history.replaceState(null, null, window.location.href);
            }
        </script>



    </section>


    <!-- arxh midsection -->
    <section class="container-fluid  p-5">


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