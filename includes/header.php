<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($base_path)) {
    $base_path = file_exists('index.php') ? '' : (file_exists('../index.php') ? '../' : '');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Kitchen Menuka</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">

    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link rel="stylesheet" href="<?php echo $base_path; ?>css/style.css">

</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">

    <div class="container">

        <a class="navbar-brand fw-bold" href="<?php echo $base_path; ?>index.php">
            🍳 Kitchen Menuka
        </a>

        <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarNav">

            <span class="navbar-toggler-icon"></span>

        </button>

        <div class="collapse navbar-collapse" id="navbarNav">

            <ul class="navbar-nav ms-auto">

                <li class="nav-item">
                    <a class="nav-link" href="<?php echo $base_path; ?>index.php">Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="<?php echo $base_path; ?>recipes.php">Recipes</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="<?php echo $base_path; ?>contact.php">Contact</a>
                </li>

                <?php if (isset($_SESSION['user_id'])): ?>

                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo $base_path; ?>dashboard.php">
                            Dashboard
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link text-warning" href="<?php echo $base_path; ?>auth/logout.php">
                            Logout
                        </a>
                    </li>

                <?php else: ?>

                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo $base_path; ?>auth/login.php">
                            Login
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo $base_path; ?>auth/register.php">
                            Register
                        </a>
                    </li>

                <?php endif; ?>

            </ul>

        </div>

    </div>

</nav>