<?php

include "../includes/db.php";

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = trim($_POST["username"]);
    $email = trim($_POST["email"]);
    $password = $_POST["password"];

    if (
        empty($username) ||
        empty($email) ||
        empty($password)
    ) {

        $message = "Please fill in all fields.";

    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

        $message = "Invalid email address.";

    } elseif (strlen($password) < 6) {

        $message = "Password must contain at least 6 characters.";

    } else {

        $check = $conn->prepare(
            "SELECT id FROM users WHERE email = ?"
        );

        $check->bind_param("s", $email);

        $check->execute();

        $check->store_result();

        if ($check->num_rows > 0) {

            $message = "Email already registered.";

        } else {

            $hashed_password = password_hash(
                $password,
                PASSWORD_DEFAULT
            );

            $stmt = $conn->prepare(
                "INSERT INTO users
                (username, email, password)
                VALUES (?, ?, ?)"
            );

            $stmt->bind_param(
                "sss",
                $username,
                $email,
                $hashed_password
            );

            if ($stmt->execute()) {

                header("Location: login.php?registered=1");
                exit();

            } else {

                $message = "Registration failed.";

            }

            $stmt->close();
        }

        $check->close();
    }
}

include "../includes/header.php";

?>

<section class="container py-5">

    <div class="row">

        <div class="col-md-6 mx-auto">

            <div class="auth-box">

                <h2 class="text-center mb-4">
                    Create Account
                </h2>


                <?php if ($message): ?>

                    <div class="alert alert-danger">

                        <?php
                        echo htmlspecialchars($message);
                        ?>

                    </div>

                <?php endif; ?>


                <form method="POST" id="registerForm">


                    <div class="mb-3">

                        <label class="form-label">
                            Username
                        </label>

                        <input
                            type="text"
                            name="username"
                            id="username"
                            class="form-control"
                            required>

                    </div>


                    <div class="mb-3">

                        <label class="form-label">
                            Email
                        </label>

                        <input
                            type="email"
                            name="email"
                            id="email"
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
                            id="password"
                            class="form-control"
                            required>

                    </div>


                    <button
                        type="submit"
                        class="btn btn-warning w-100">

                        Register

                    </button>


                    <p class="text-center mt-3">

                        Already have an account?

                        <a href="login.php">
                            Login
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