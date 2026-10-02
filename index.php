<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<?php
include "includes/header.php";
?>

<!-- HERO SECTION -->

<section class="hero-section">

    <div class="container text-center">

        <h1 class="display-3 fw-bold">
            Welcome to Kitchen Menuka
        </h1>

        <p class="lead">
            Your personal digital recipe book
        </p>

        <p>
            Discover simple, delicious and creative recipes
            for every occasion.
        </p>

        <a href="recipes.php" class="btn btn-warning btn-lg mt-3">
            Explore Recipes
        </a>

    </div>

</section>


<!-- ABOUT -->

<section class="container py-5">

    <div class="text-center mb-5">

        <h2>Why Kitchen Menuka?</h2>

        <p class="text-muted">
            Everything you need to discover and enjoy great recipes.
        </p>

    </div>

    <div class="row g-4">

        <div class="col-md-4">

            <div class="feature-card text-center">

                <i class="bi bi-search display-4"></i>

                <h4 class="mt-3">
                    Easy Recipe Search
                </h4>

                <p>
                    Quickly search for your favourite recipes.
                </p>

            </div>

        </div>


        <div class="col-md-4">

            <div class="feature-card text-center">

                <i class="bi bi-book display-4"></i>

                <h4 class="mt-3">
                    Recipe Collection
                </h4>

                <p>
                    Explore different meals, desserts and special dishes.
                </p>

            </div>

        </div>


        <div class="col-md-4">

            <div class="feature-card text-center">

                <i class="bi bi-person-check display-4"></i>

                <h4 class="mt-3">
                    Personal Account
                </h4>

                <p>
                    Create an account and manage your recipes.
                </p>

            </div>

        </div>

    </div>

</section>


<!-- POPULAR RECIPES -->

<section class="bg-light py-5">

    <div class="container">

        <h2 class="text-center mb-4">
            Popular Recipes
        </h2>

        <div class="row g-4">

            <div class="col-md-4">

                <div class="card recipe-card">

                    <img src="images/pasta.jpg"
                         class="card-img-top"
                         alt="Pasta">

                    <div class="card-body">

                        <h5 class="card-title">
                            Creamy Pasta
                        </h5>

                        <p class="card-text">
                            A simple and delicious creamy pasta.
                        </p>

                        <a href="recipes.php"
                           class="btn btn-dark">
                            View Recipe
                        </a>

                    </div>

                </div>

            </div>


            <div class="col-md-4">

                <div class="card recipe-card">

                    <img src="images/rice.jpg"
                         class="card-img-top"
                         alt="Rice">

                    <div class="card-body">

                        <h5 class="card-title">
                            Fried Rice
                        </h5>

                        <p class="card-text">
                            Quick and tasty homemade fried rice.
                        </p>

                        <a href="recipes.php"
                           class="btn btn-dark">
                            View Recipe
                        </a>

                    </div>

                </div>

            </div>


            <div class="col-md-4">

                <div class="card recipe-card">

                    <img src="images/cake.jpg"
                         class="card-img-top"
                         alt="Cake">

                    <div class="card-body">

                        <h5 class="card-title">
                            Chocolate Cake
                        </h5>

                        <p class="card-text">
                            Soft and delicious chocolate cake.
                        </p>

                        <a href="recipes.php"
                           class="btn btn-dark">
                            View Recipe
                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


<?php
include "includes/footer.php";
?>