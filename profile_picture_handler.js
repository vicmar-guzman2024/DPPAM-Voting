// UPDATING USERS' PROFILE PICTURE

const profilePictureContainer = document.getElementById("profilePictureContainer");
const profilePictureInput = document.getElementById("profilePicture");
const currentProfilePicture = document.getElementById("currentProfilePicture");
const cropControls = document.getElementById("cropControls");
const cropButton = document.getElementById("cropButton");
const doneButton = document.getElementById("doneButton");
const saveChangesButton = document.getElementById("saveChangesButton");
let cropper;
let croppedImage = null;
let originalImageDataURL = null; // Store the original image

// Handle file input change event
profilePictureInput.addEventListener("change", (event) => {
  const file = event.target.files[0];
  if (file) {
    const reader = new FileReader();
    reader.onload = (e) => {
      // Save the original image data URL
      originalImageDataURL = e.target.result;

      // Replace the current profile picture with the selected image
      currentProfilePicture.src = originalImageDataURL;
      cropControls.style.display = "inline-block"; // Show crop controls
      doneButton.style.display = "none"; // Hide the DONE button initially
      croppedImage = null; // Reset the cropped image

      // Destroy any previous cropper instance if it exists
      if (cropper) {
        cropper.destroy();
        cropper = null;
      }
    };
    reader.readAsDataURL(file);
  }
});

// Handle CROP button click
cropButton.addEventListener("click", () => {
  // Reset the image to the original image before initializing cropper
  if (originalImageDataURL) {
    currentProfilePicture.src = originalImageDataURL;
  }

  // Initialize the cropper
  if (!cropper) {
    cropper = new Cropper(currentProfilePicture, {
      aspectRatio: 1,
      viewMode: 2,
      autoCropArea: 1,
      responsive: true,
    });
  }

  // Show the DONE button when cropper is active
  doneButton.style.display = "inline-block";
  cropButton.style.display = "none"; // Hide the CROP button after starting cropping
});

// Handle DONE button click
doneButton.addEventListener("click", () => {
  // Get the cropped image and update the preview
  const canvas = cropper.getCroppedCanvas({
    width: 250, // Adjust the output image size if necessary
    height: 250,
  });

  // Convert canvas to data URL
  croppedImage = canvas.toDataURL();
  currentProfilePicture.src = croppedImage;

  // Destroy the cropper to stop further cropping unless reactivated
  cropper.destroy();
  cropper = null; // Reset cropper instance

  // Show the CROP button again for re-cropping if needed
  cropButton.style.display = "inline-block";
  doneButton.style.display = "none"; // Hide DONE button
});

// Handle Save Changes (Submit the form)
saveChangesButton.addEventListener("click", () => {
  if (croppedImage) {
    // Submit the form with the cropped image
    // Convert the cropped image (DataURL) to a Blob for form submission
    const blob = dataURLToBlob(croppedImage);

    // Create a new file from the Blob
    const file = new File([blob], "cropped_image.jpg", { type: "image/jpeg" });

    // Add the cropped file to the form input
    const dataTransfer = new DataTransfer();
    dataTransfer.items.add(file);
    profilePictureInput.files = dataTransfer.files;
  }
  // If no cropping was done, it will submit the original image
});

// Convert data URL to Blob
function dataURLToBlob(dataURL) {
  const byteString = atob(dataURL.split(",")[1]);
  const mimeString = dataURL.split(",")[0].split(":")[1].split(";")[0];

  const ab = new ArrayBuffer(byteString.length);
  const ia = new Uint8Array(ab);

  for (let i = 0; i < byteString.length; i++) {
    ia[i] = byteString.charCodeAt(i);
  }

  return new Blob([ab], { type: mimeString });
}

// DISPALY USER PROFILE PICTURE WHEN CLICKED "SEE PROFILE"

document.addEventListener("DOMContentLoaded", function () {
  const seeProfileBtn = document.querySelector("#seeProfileBtn"); // Button to see profile
  const profileImgModal = document.querySelector(".profileImgModal"); // Modal image

  // Event to set modal image dynamically
  seeProfileBtn.addEventListener("click", function () {
    const profileImg = document.querySelector(".profileImg"); // Original profile image
    profileImgModal.src = profileImg.src; // Set modal image src
  });
});
