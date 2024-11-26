const toggler = document.querySelector(".toggle-btn");
const sidebar = document.querySelector("#sidebar");
const content = document.querySelector(".content");

toggler.addEventListener("click", function() {
    sidebar.classList.toggle("collapsed");
    content.classList.toggle("overlay-active");
});

// Close sidebar when pressing the Esc key
document.addEventListener("keydown", function(e) {
    if (e.key === "Escape" && sidebar.classList.contains("collapsed")) {
        sidebar.classList.remove("collapsed");
        content.classList.remove("overlay-active");
    }
});

// Close sidebar when clicking outside of it on smaller screens
document.addEventListener("click", function(event) {
    if (window.innerWidth <= 768) { // Adjust as needed for your responsive breakpoint
        if (!sidebar.contains(event.target) && !toggler.contains(event.target) && sidebar.classList.contains("collapsed")) {
            sidebar.classList.remove("collapsed");
            content.classList.remove("overlay-active");
        }
    }
});



//Script to displays the selected file name
   
const uploadNewImg = document.getElementById('uploadNewImg');
const uploadNewImgName = document.getElementById('uploadNewImgName');

// Upload new img
uploadNewImg.addEventListener('change', (event) => {
    const uploadNewImg = event.target.files[0]?.name || "No file selected";
    uploadNewImgName.textContent = uploadNewImg;
});


// Show password by clicking eye btn

function togglePassword(inputId, iconId) {
    const passwordField = document.getElementById(inputId);
    const icon = document.getElementById(iconId);

    // Toggle the password field's type between "password" and "text"
    if (passwordField.type === "password") {
        passwordField.type = "text";
        icon.classList.remove("bi-eye-slash");
        icon.classList.add("bi-eye"); // Change icon to open eye
    } else {
        passwordField.type = "password";
        icon.classList.remove("bi-eye");
        icon.classList.add("bi-eye-slash"); // Change icon to eye with slash
    }
}


// Notification on/off btn

function toggleOnOff() {
    const icon = document.getElementById("toggleIcon");

    // Toggle the icon between "on" and "off"
    if (icon.classList.contains("bi-toggle-on")) {
        icon.classList.remove("bi-toggle-on");
        icon.classList.add("bi-toggle-off");
    } else {
        icon.classList.remove("bi-toggle-off");
        icon.classList.add("bi-toggle-on");
    }
}





