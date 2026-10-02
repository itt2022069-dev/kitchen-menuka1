document.addEventListener("DOMContentLoaded", function () {

    console.log("Kitchen Menuka JavaScript Loaded");


    // ============================
    // RECIPE SEARCH
    // ============================

    const searchInput =
        document.getElementById("recipeSearch");

    if (searchInput) {

        searchInput.addEventListener("keyup", function () {

            const searchText =
                searchInput.value.toLowerCase();

            const recipes =
                document.querySelectorAll(".recipe-item");


            recipes.forEach(function (recipe) {

                const title =
                    recipe
                    .querySelector(".card-title")
                    .textContent
                    .toLowerCase();


                if (title.includes(searchText)) {

                    recipe.style.display = "block";

                } else {

                    recipe.style.display = "none";

                }

            });

        });

    }


    // ============================
    // CATEGORY FILTER
    // ============================

    const categoryButtons =
        document.querySelectorAll(".category-btn");


    categoryButtons.forEach(function (button) {

        button.addEventListener("click", function () {

            const category =
                button.getAttribute("data-category");


            const recipes =
                document.querySelectorAll(".recipe-item");


            categoryButtons.forEach(function (btn) {

                btn.classList.remove("btn-dark");

                btn.classList.add("btn-outline-dark");

            });


            button.classList.remove("btn-outline-dark");

            button.classList.add("btn-dark");


            recipes.forEach(function (recipe) {

                const recipeCategory =
                    recipe.getAttribute("data-category");


                if (
                    category === "all" ||
                    recipeCategory === category
                ) {

                    recipe.style.display = "block";

                } else {

                    recipe.style.display = "none";

                }

            });

        });

    });

    // ============================
    // RECIPE IMAGE PREVIEW
    // ============================

    const recipeImageInput = document.getElementById("recipeImage");
    const imagePreviewContainer = document.getElementById("imagePreview");

    if (recipeImageInput && imagePreviewContainer) {
        recipeImageInput.addEventListener("change", function () {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    imagePreviewContainer.innerHTML = `<img src="${e.target.result}" class="img-fluid rounded shadow-sm mt-2" style="max-height: 250px;" alt="Recipe Preview">`;
                };
                reader.readAsDataURL(file);
            } else {
                imagePreviewContainer.innerHTML = "";
            }
        });
    }

});


// ============================
// CONTACT FORM VALIDATION
// ============================

function validateContactForm() {

    const name =
        document.getElementById("contactName").value.trim();

    const email =
        document.getElementById("contactEmail").value.trim();

    const message =
        document.getElementById("contactMessage").value.trim();


    if (name === "") {

        alert("Please enter your name.");

        return false;

    }


    if (email === "") {

        alert("Please enter your email.");

        return false;

    }


    const emailPattern =
        /^[^\s@]+@[^\s@]+\.[^\s@]+$/;


    if (!emailPattern.test(email)) {

        alert("Please enter a valid email address.");

        return false;

    }


    if (message === "") {

        alert("Please enter your message.");

        return false;

    }

    return true;
}


// ============================
// REGISTER FORM VALIDATION
// ============================

const registerForm =
    document.getElementById("registerForm");


if (registerForm) {

    registerForm.addEventListener(
        "submit",
        function (event) {

            const password =
                document.getElementById("password").value;


            if (password.length < 6) {

                alert(
                    "Password must contain at least 6 characters."
                );

                event.preventDefault();

            }

        }
    );

}