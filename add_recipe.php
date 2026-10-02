<?php

session_start();

if (!isset($_SESSION["user_id"])) {
    header("Location: auth/login.php");
    exit();
}

include "includes/db.php";

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $title = trim($_POST["title"]);
    $category = trim($_POST["category"]);
    $ingredients = trim($_POST["ingredients"]);
    $instructions = trim($_POST["instructions"]);

    if (
        empty($title) ||
        empty($category) ||
        empty($ingredients) ||
        empty($instructions)
    ) {

        $message = "Please fill in all fields.";

    } elseif (!isset($_FILES["recipe_image"]) ||
              $_FILES["recipe_image"]["error"] != 0) {

        $message = "Please select a recipe image.";

    } else {

        $image = $_FILES["recipe_image"];

        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mime_type = finfo_file($finfo, $image["tmp_name"]);
        finfo_close($finfo);

        $allowed_types = [
            "image/jpeg",
            "image/png",
            "image/webp"
        ];

        if (!in_array($mime_type, $allowed_types)) {

            $message = "Only JPG, PNG and WEBP images are allowed.";

        } elseif ($image["size"] > 5 * 1024 * 1024) {

            $message = "Image must be smaller than 5MB.";

        } else {

            $extension =
                strtolower(
                    pathinfo(
                        $image["name"],
                        PATHINFO_EXTENSION
                    )
                );

            $new_filename =
                uniqid("recipe_", true) . "." . $extension;

            $upload_folder = "images/recipes/";

            if (!is_dir($upload_folder)) {
                mkdir($upload_folder, 0777, true);
            }

            $upload_path =
                $upload_folder . $new_filename;

            if (move_uploaded_file(
                $image["tmp_name"],
                $upload_path
            )) {

                $stmt = $conn->prepare(
                    "INSERT INTO recipes
                    (title, category, ingredients, instructions, image, user_id)
                    VALUES (?, ?, ?, ?, ?, ?)"
                );

                $stmt->bind_param(
                    "sssssi",
                    $title,
                    $category,
                    $ingredients,
                    $instructions,
                    $new_filename,
                    $_SESSION["user_id"]
                );

                if ($stmt->execute()) {

                    $message =
                        "Recipe added successfully! 🍳";

                } else {

                    $message =
                        "Database error. Recipe was not added.";

                    unlink($upload_path);
                }

                $stmt->close();

            } else {

                $message =
                    "Failed to upload the image.";

            }
        }
    }
}

include "includes/header.php";

?>

<section class="container py-5">

    <div class="row">

        <div class="col-md-8 mx-auto">

            <div class="auth-box">

                <h2 class="text-center mb-4">
                    🍳 Add New Recipe
                </h2>

                <?php if ($message != ""): ?>

                    <div class="alert alert-info">
                        <?php echo htmlspecialchars($message); ?>
                    </div>

                <?php endif; ?>


                <form
                    method="POST"
                    enctype="multipart/form-data"
                    id="recipeForm">


                    <!-- RECIPE TITLE -->

                    <div class="mb-3">

                        <label class="form-label">
                            Recipe Name
                        </label>

                        <input
                            type="text"
                            name="title"
                            class="form-control"
                            placeholder="Example: Chicken Kottu"
                            required>

                    </div>


                    <!-- CATEGORY -->

                    <div class="mb-3">

                        <label class="form-label">
                            Category
                        </label>

                        <select
                            name="category"
                            class="form-select"
                            required>

                            <option value="">
                                Select Category
                            </option>

                            <option value="breakfast">
                                Breakfast
                            </option>

                            <option value="main">
                                Main Meal
                            </option>

                            <option value="dessert">
                                Dessert
                            </option>

                            <option value="snack">
                                Snack
                            </option>

                            <option value="drink">
                                Drink
                            </option>

                        </select>

                    </div>


                    <!-- INGREDIENTS -->

                    <div class="mb-3">

                        <label class="form-label">
                            Ingredients
                        </label>

                        <textarea
                            name="ingredients"
                            class="form-control"
                            rows="6"
                            placeholder="Enter each ingredient on a new line..."
                            required></textarea>

                    </div>


                    <!-- INSTRUCTIONS -->

                    <div class="mb-3">

                        <label class="form-label">
                            Cooking Instructions
                        </label>

                        <textarea
                            name="instructions"
                            class="form-control"
                            rows="8"
                            placeholder="Enter the cooking steps..."
                            required></textarea>

                    </div>


                    <!-- IMAGE -->

                    <div class="mb-3">

                        <label class="form-label">
                            Recipe Image
                        </label>

                        <input
                            type="file"
                            name="recipe_image"
                            id="recipeImage"
                            class="form-control"
                            accept="image/jpeg,image/png,image/webp"
                            required>

                        <small class="text-muted">
                            JPG, PNG or WEBP. Maximum 5MB.
                        </small>

                    </div>


                    <!-- IMAGE PREVIEW -->

                    <div
                        id="imagePreview"
                        class="text-center mb-3">
                    </div>


                    <button
                        type="submit"
                        class="btn btn-warning w-100">

                        <i class="bi bi-plus-circle"></i>

                        Add Recipe

                    </button>

                </form>

            </div>

        </div>

    </div>

</section>


<?php

include "includes/footer.php";

?>