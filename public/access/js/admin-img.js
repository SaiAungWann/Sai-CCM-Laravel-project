// JavaScript code to handle image display
document
    .getElementById("fileInput1")
    .addEventListener("change", function (event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                const imgElement = document.getElementById("imagePreview1");
                imgElement.src = e.target.result;
                imgElement.style.display = "block"; // Show the image
            };
            reader.readAsDataURL(file); // Convert the image file to a data URL
        }
    });
// JavaScript code to handle image display
document
    .getElementById("fileInput2")
    .addEventListener("change", function (event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                const imgElement = document.getElementById("imagePreview2");
                imgElement.src = e.target.result;
                imgElement.style.display = "block"; // Show the image
            };
            reader.readAsDataURL(file); // Convert the image file to a data URL
        }
    });
// JavaScript code to handle image display
document
    .getElementById("fileInput3")
    .addEventListener("change", function (event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                const imgElement = document.getElementById("imagePreview3");
                imgElement.src = e.target.result;
                imgElement.style.display = "block"; // Show the image
            };
            reader.readAsDataURL(file); // Convert the image file to a data URL
        }
    });
// JavaScript code to handle image display
document
    .getElementById("fileInput4")
    .addEventListener("change", function (event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                const imgElement = document.getElementById("imagePreview4");
                imgElement.src = e.target.result;
                imgElement.style.display = "block"; // Show the image
            };
            reader.readAsDataURL(file); // Convert the image file to a data URL
        }
    });
