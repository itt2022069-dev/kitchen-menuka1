<?php

session_start();

if (!isset($_SESSION["user_id"])) {

    header("Location: auth/login.php");

    exit();

}

include "includes/header.php";

?>

<section class="container py-5">

    <div class="dashboard-box text-center">

        <h1>
            Welcome, <?php echo htmlspecialchars($_SESSION["username"]); ?>! 👋
        </h1>

        <p class="lead mt-3">
            Welcome to your Kitchen Menuka dashboard.
        </p>


        <div class="row mt-5 g-4">


            <div class="col-md-4">

                <div class="dashboard-card">

                    <i class="bi bi-book display-4"></i>

                    <h4 class="mt-3">
                        Browse Recipes
                    </h4>

                    <a
                        href="recipes.php"
                        class="btn btn-dark">

                        View Recipes

                    </a>

                </div>

            </div>


            <div class="col-md-4">

                <div class="dashboard-card">

                    <i class="bi bi-envelope display-4"></i>

                    <h4 class="mt-3">
                        Contact Us
                    </h4>

                    <a
                        href="contact.php"
                        class="btn btn-dark">

                        Send Message

                    </a>

                </div>

            </div>


            <div class="col-md-4">

                <div class="dashboard-card">

                    <i class="bi bi-box-arrow-right display-4"></i>

                    <h4 class="mt-3">
                        Logout
                    </h4>

                    <a
                        href="auth/logout.php"
                        class="btn btn-danger">

                        Logout

                    </a>

                </div>

            </div>


        </div>

    </div>

</section>


<?php
include "includes/footer.php";
?>