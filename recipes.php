<?php

include "includes/db.php";
include "includes/header.php";

$sql = "SELECT * FROM recipes ORDER BY created_at DESC";

$result = $conn->query($sql);

?>

<section class="container py-5">

    <div class="text-center mb-5">

        <h1>🍽️ Recipe Collection</h1>

        <p class="text-muted">
            Find your favourite recipe
        </p>

    </div>


    <!-- SEARCH -->

    <div class="row mb-4">

        <div class="col-md-8 mx-auto">

            <input
                type="text"
                id="recipeSearch"
                class="form-control form-control-lg"
                placeholder="🔍 Search recipes...">

        </div>

    </div>


    <!-- CATEGORY BUTTONS -->

    <div class="text-center mb-4">

        <button class="btn btn-dark category-btn"
                data-category="all">
            All
        </button>

        <button class="btn btn-outline-dark category-btn"
                data-category="main">
            Main Meals
        </button>

        <button class="btn btn-outline-dark category-btn"
                data-category="dessert">
            Desserts
        </button>

        <button class="btn btn-outline-dark category-btn"
                data-category="breakfast">
            Breakfast
        </button>

    </div>


    <div class="row g-4" id="recipeContainer">

        <?php if ($result->num_rows > 0): ?>

            <?php while ($recipe = $result->fetch_assoc()): ?>

                <div
                    class="col-md-4 recipe-item"
                    data-category="<?php echo htmlspecialchars($recipe['category']); ?>">

                    <div class="card recipe-card h-100">

                        <?php if (!empty($recipe['image'])): ?>
                            <?php 
                            $image_file = $recipe['image'];
                            $image_path = "images/" . $image_file;
                            if (file_exists("images/recipes/" . $image_file)) {
                                $image_path = "images/recipes/" . $image_file;
                            }
                            ?>
                            <img
                                src="<?php echo htmlspecialchars($image_path); ?>"
                                class="card-img-top"
                                alt="<?php echo htmlspecialchars($recipe['title']); ?>">

                        <?php endif; ?>


                        <div class="card-body">

                            <span class="badge bg-warning text-dark">

                                <?php
                                echo htmlspecialchars($recipe['category']);
                                ?>

                            </span>

                            <h4 class="card-title mt-2">

                                <?php
                                echo htmlspecialchars($recipe['title']);
                                ?>

                            </h4>


                            <p>

                                <?php
                                echo nl2br(
                                    htmlspecialchars(
                                        $recipe['ingredients']
                                    )
                                );
                                ?>

                            </p>


                            <button
                                class="btn btn-dark"
                                data-bs-toggle="modal"
                                data-bs-target="#recipeModal<?php echo $recipe['id']; ?>">

                                View Instructions

                            </button>

                        </div>

                    </div>

                </div>


                <!-- MODAL -->

                <div
                    class="modal fade"
                    id="recipeModal<?php echo $recipe['id']; ?>">

                    <div class="modal-dialog modal-lg">

                        <div class="modal-content">

                            <div class="modal-header">

                                <h5 class="modal-title">

                                    <?php
                                    echo htmlspecialchars($recipe['title']);
                                    ?>

                                </h5>

                                <button
                                    type="button"
                                    class="btn-close"
                                    data-bs-dismiss="modal">
                                </button>

                            </div>


                            <div class="modal-body">

                                <h5>Ingredients</h5>

                                <p>
                                    <?php
                                    echo nl2br(
                                        htmlspecialchars(
                                            $recipe['ingredients']
                                        )
                                    );
                                    ?>
                                </p>


                                <h5>Instructions</h5>

                                <p>
                                    <?php
                                    echo nl2br(
                                        htmlspecialchars(
                                            $recipe['instructions']
                                        )
                                    );
                                    ?>
                                </p>

                            </div>


                            <div class="modal-footer">

                                <button
                                    class="btn btn-secondary"
                                    data-bs-dismiss="modal">

                                    Close

                                </button>

                            </div>

                        </div>

                    </div>

                </div>

            <?php endwhile; ?>

        <?php else: ?>

            <div class="text-center">

                <h4>No recipes found.</h4>

            </div>

        <?php endif; ?>

    </div>

</section>


<?php
include "includes/footer.php";
?>