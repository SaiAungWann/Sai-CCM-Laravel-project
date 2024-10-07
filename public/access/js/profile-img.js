// JavaScript code to handle image display
document
    .getElementById("fileInput")
    .addEventListener("change", function (event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                const imgElement = document.getElementById("profile-img");
                imgElement.src = e.target.result;
                imgElement.style.display = "block"; // Show the image
            };
            reader.readAsDataURL(file); // Convert the image file to a data URL
        }
    });
