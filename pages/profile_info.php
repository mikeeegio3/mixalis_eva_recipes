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


        if (isset($_SESSION['name']) && isset($_SESSION['user_name'])) {
        ?>



            <div class="container-fluid syntages-container p-5 rounded">
                <div class="container  row w-50">
                    <div class="col-4 "><img src="../images/profile_images/<?php echo $_SESSION['user_name']?>.jpg" alt="" srcset="" class="profile-image"></div>
                    <div class="col-6 ">Hello,<h1> <?php echo $_SESSION['name'];
                                                    echo " ";
                                                    echo $_SESSION['last_name']; ?></h1>
                    </div>


                </div>

                <div class="container row">
                    <div class="col-7"><a href="logout.php" class="text-decoration-none logout-button">Logout</a></div>
                    <div class="col-5"><h3 class="text-center mb-4">Last recipes you added:</h3></div>
                    
                </div>

                <div class="container-fluid row">
                    <div class="col-3 "></div>
                    <div class="col-8">
                        <div class="container  p-5 admin-form rounded">
                            <?php
                            // emfanizei tis teleutaies 3 syntages
                            require "../require/recipe_card_for_edit.php";
                            require "connect_db.php";
                            $sql = "SELECT * FROM recipes where author = '".$_SESSION['user_name']."'";
                            $querry = mysqli_query($conn, $sql);
                            while ($result = mysqli_fetch_assoc($querry)) {
                                    
                                    single_card_function($result);
                                };
                            


                            ?>


                        </div>
                    </div>
                </div>





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