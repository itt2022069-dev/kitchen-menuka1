<?php

session_start();

include "../includes/db.php";

$message = "";

if (isset($_GET["registered"])) {

    $message = "Registration successful. Please login.";

}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = trim($_POST["email"]);
    $password = $_POST["password"];

    $stmt = $conn->prepare(
        "SELECT id, username, password
         FROM users
         WHERE email = ?"
    );

    $stmt->bind_param("s", $email);

    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows == 1) {

        $user = $result->fetch_assoc();

        if (
            password_verify(
                $password,
                $user["password"]
            )
        ) {

            $_SESSION["user_id"] = $user["id"];
            $_SESSION["username"] = $user["username"];

            header("Location: ../dashboard.php");
            exit();

        } else {

            $message = "Invalid email or password.";

        }

    } else {

        $message = "Invalid email or password.";

    }

    $stmt->close();
}

include "../includes/header.php";

?>

<section class="container py-5">

    <div class="row">

        <div class="col-md-6 mx-auto">

            <div class="auth-box">

                <h2 class="text-center mb-4">
                    🔐 Login
                </h2>


                <?php if ($message): ?>

                    <div class="alert alert-info">

                        <?php
                        echo htmlspecialchars($message);
                        ?>

                    </div>

                <?php endif; ?>


                <form method="POST">


                    <div class="mb-3">

                        <label class="form-label">
                            Email
                        </label>

                        <input
                            type="email"
                            name="email"
                            class="form-control"
                            required>

                    </div>


                    <div class="mb-3">

                        <label class="form-label">
                            Password
                        </label>

                        <input
                            type="password"
                            name="password"
                            class="form-control"
                            required>

                    </div>


                    <button
                        type="submit"
                        class="btn btn-dark w-100">

                        Login

                    </button>


                    <p class="text-center mt-3">

                        Don't have an account?

                        <a href="register.php">
                            Register
                        </a>

                    </p>

                </form>

            </div>

        </div>

    </div>

</section>


<?php
include "../includes/footer.php";
?>