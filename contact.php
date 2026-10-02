<?php

include "includes/db.php";

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $user_message = trim($_POST["message"]);

    if (
        empty($name) ||
        empty($email) ||
        empty($user_message)
    ) {

        $message = "Please fill in all fields.";

    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

        $message = "Please enter a valid email address.";

    } else {

        $stmt = $conn->prepare(
            "INSERT INTO messages (name, email, message)
             VALUES (?, ?, ?)"
        );

        $stmt->bind_param(
            "sss",
            $name,
            $email,
            $user_message
        );

        if ($stmt->execute()) {

            $message = "Your message has been sent successfully!";

        } else {

            $message = "Something went wrong.";

        }

        $stmt->close();
    }
}

include "includes/header.php";

?>

<section class="container py-5">

    <div class="row">

        <div class="col-md-6 mx-auto">

            <div class="contact-box">

                <h1 class="text-center mb-4">
                    📩 Contact Kitchen Menuka
                </h1>

                <?php if ($message != ""): ?>

                    <div class="alert alert-info">
                        <?php echo htmlspecialchars($message); ?>
                    </div>

                <?php endif; ?>


                <form
                    id="contactForm"
                    method="POST"
                    action="contact.php"
                    onsubmit="return validateContactForm()">


                    <div class="mb-3">

                        <label class="form-label">
                            Name
                        </label>

                        <input
                            type="text"
                            name="name"
                            id="contactName"
                            class="form-control"
                            placeholder="Enter your name">

                    </div>


                    <div class="mb-3">

                        <label class="form-label">
                            Email
                        </label>

                        <input
                            type="email"
                            name="email"
                            id="contactEmail"
                            class="form-control"
                            placeholder="Enter your email">

                    </div>


                    <div class="mb-3">

                        <label class="form-label">
                            Message
                        </label>

                        <textarea
                            name="message"
                            id="contactMessage"
                            class="form-control"
                            rows="5"
                            placeholder="Write your message"></textarea>

                    </div>


                    <button
                        type="submit"
                        class="btn btn-dark w-100">

                        Send Message

                    </button>

                </form>

            </div>

        </div>

    </div>

</section>


<?php
include "includes/footer.php";
?>