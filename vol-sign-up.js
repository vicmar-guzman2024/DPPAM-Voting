$(document).ready(function () {
    var currentGfgStep, nextGfgStep, previousGfgStep;
    var opacity;
    var current = 1;
    var steps = $("fieldset").length;

    setProgressBar(current);

    $(".next-step").click(function () {
        currentGfgStep = $(this).parent();

        // Proceed to the next step
        nextGfgStep = currentGfgStep.next();

        $("#progressbar li").eq($("fieldset").index(nextGfgStep)).addClass("active");

        nextGfgStep.show();
        currentGfgStep.animate({ opacity: 0 }, {
            step: function (now) {
                opacity = 1 - now;
                currentGfgStep.css({
                    display: "none",
                    position: "relative",
                });
                nextGfgStep.css({ opacity: opacity });
            },
            duration: 500,
        });
        setProgressBar(++current);
    });

    $(".previous-step").click(function () {
        currentGfgStep = $(this).parent();
        previousGfgStep = currentGfgStep.prev();

        $("#progressbar li").eq($("fieldset").index(currentGfgStep)).removeClass("active");

        previousGfgStep.show();
        currentGfgStep.animate({ opacity: 0 }, {
            step: function (now) {
                opacity = 1 - now;

                currentGfgStep.css({
                    display: "none",
                    position: "relative",
                });
                previousGfgStep.css({ opacity: opacity });
            },
            duration: 500,
        });
        setProgressBar(--current);
    });

    function setProgressBar(currentStep) {
        var percent = parseFloat(100 / steps) * current;
        percent = percent.toFixed();
        $(".progress-bar").css("width", percent + "%");
    }

    $(".submit").click(function () {
        return false;
    });

    // Enable or disable "Others" input dynamically
    $("#prefVolAss").on("change", function () {
        const othersInput = $("#otherPrefVolAss");
        if ($(this).val() === "Others") {
            othersInput.prop("disabled", false);
        } else {
            othersInput.prop("disabled", true).val("").removeClass("is-invalid");
        }
    });

    // Add real-time validation for text, date, and file inputs
    $("input[type='text'], input[type='date'], input[type='file']").on("input change", function () {
        if ($(this).val()) {
            $(this).removeClass("is-invalid");
        }
    });
    $("select").on("change", function () {
        if ($(this).val()) {
            $(this).removeClass("is-invalid");
        }
    });
});






//Script for 1x1 and valid ID displays the selected file name
   
const oneXoneID = document.getElementById('oneXoneID');
const oneXoneIDfileName = document.getElementById('oneXoneIDfileName');
const validID = document.getElementById('validID');
const validIDfileName = document.getElementById('validIDfileName');

// 1x1 ID
oneXoneID.addEventListener('change', (event) => {
    const oneXoneID = event.target.files[0]?.name || "No file selected";
    oneXoneIDfileName.textContent = oneXoneID;
});

// Valid ID
validID.addEventListener('change', (event) => {
    const validID = event.target.files[0]?.name || "No file selected";
    validIDfileName.textContent = validID;
});





// Displaying SELECTED OPTION in PREVIOUS EXPERIENCE & PREFERRED ASSIGNMENT

document.addEventListener("DOMContentLoaded", function () {
    function setupDropdown(dropdownId, selectedContainerId, otherInputId) {
      const dropdown = document.getElementById(dropdownId);
      const selectedOptionsContainer = document.getElementById(selectedContainerId);
      const otherInput = document.getElementById(otherInputId);
  
      dropdown.addEventListener("change", function () {
        const selectedValue = dropdown.value;
  
        // Handle "Others" option separately
        if (selectedValue === "Others") {
          otherInput.disabled = false; // Enable the input field
          return; // Do not add "Others" to the selected options
        } else {
          otherInput.disabled = true; // Disable the input field if another option is selected
          otherInput.value = ""; // Clear the input field
        }
  
        // Check if the selected value is already displayed
        if (!document.querySelector(`[data-value="${dropdownId}-${selectedValue}"]`) && selectedValue !== "Select options") {
          // Create a new div to display the selected option
          const optionDiv = document.createElement("div");
          optionDiv.className = "badge bg-primary text-white me-2 mb-2";
          optionDiv.setAttribute("data-value", `${dropdownId}-${selectedValue}`);
          optionDiv.style.display = "inline-block";
  
          // Add text and close button to the div
          optionDiv.innerHTML = `
            ${selectedValue}
            <button type="button" class="btn-close btn-close-white ms-2" aria-label="Remove"></button>
          `;
  
          // Append the div to the container
          selectedOptionsContainer.appendChild(optionDiv);
        }
      });
  
      // Event listener for removing selected options
      selectedOptionsContainer.addEventListener("click", function (event) {
        if (event.target.classList.contains("btn-close")) {
          const optionDiv = event.target.parentElement;
          selectedOptionsContainer.removeChild(optionDiv);
        }
      });
    }
  
    // Initialize functionality for both dropdowns
    setupDropdown("prevExpAss", "selected-prevExpAss", "otherPrevExpAss");
    setupDropdown("prefVolAss", "selected-prefVolAss", "otherPrefVolAss");
  });





  //ABLING AND DISABLING IN "ARE YOU A REGISTERED VOTER"

  document.addEventListener("DOMContentLoaded", function () {
  const yesRadio = document.getElementById("yes");
  const noRadio = document.getElementById("no");
  const precinctNoField = document.getElementById("precinctNo");
  const pollingPlaceField = document.getElementById("pollingPlace");
  const noReasonField = document.getElementById("no_reason");

  // Function to toggle field states
  function toggleFields() {
    if (yesRadio.checked) {
      // Enable "Precinct No." and "Polling Place", disable "Reason Why"
      precinctNoField.disabled = false;
      pollingPlaceField.disabled = false;
      noReasonField.disabled = true;
      noReasonField.value = ""; // Clear the "Reason Why" field
    } else if (noRadio.checked) {
      // Enable "Reason Why", disable "Precinct No." and "Polling Place"
      precinctNoField.disabled = true;
      pollingPlaceField.disabled = true;
      noReasonField.disabled = false;
      precinctNoField.value = ""; // Clear the "Precinct No." field
      pollingPlaceField.value = ""; // Clear the "Polling Place" field
    }
  }

  // Disable all fields by default
  function initializeFields() {
    precinctNoField.disabled = true;
    pollingPlaceField.disabled = true;
    noReasonField.disabled = true;
  }

  // Attach event listeners to radio buttons
  yesRadio.addEventListener("change", toggleFields);
  noRadio.addEventListener("change", toggleFields);

  // Initialize the fields on page load
  initializeFields();
});


  
  

