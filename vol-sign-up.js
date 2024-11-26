$(document).ready(function () {
    var currentGfgStep, nextGfgStep, previousGfgStep;
    var opacity;
    var current = 1;
    var steps = $("fieldset").length;

    setProgressBar(current);

    $(".next-step").click(function () {
        currentGfgStep = $(this).parent();
        let isValid = true;

        // Validate required fields
        currentGfgStep.find("input, select").each(function () {
            const $this = $(this);

            if ($this.attr("type") === "radio") {
                let name = $this.attr("name");

                // Check if at least one radio button in the group is checked
                if ($(`input[name="${name}"]:checked`).length === 0) {
                    isValid = false;
                    $this.closest(".form-check").addClass("is-invalid");
                } else {
                    $this.closest(".form-check").removeClass("is-invalid");
                }
            } else if ($this.attr("type") === "file" && !$this.val()) {
                isValid = false;
                $this.addClass("is-invalid");
            } else if ($this.is("select")) {
                // Check if a dropdown has a valid value
                if ($this.val() === "" || $this.val() === null) {
                    isValid = false;
                    $this.addClass("is-invalid");
                } else {
                    $this.removeClass("is-invalid");
                }
            } else if ($this.is(":enabled") && !$this.val()) {
                // Only validate enabled inputs
                isValid = false;
                $this.addClass("is-invalid");
            } else {
                $this.removeClass("is-invalid");
            }
        });

        // Handle "Others" input validation dynamically
        const othersDropdown = $("#prefVolAss");
        const othersInput = $("#otherPrefVolAss");
        if (othersDropdown.val() === "Others" && !othersInput.val()) {
            isValid = false;
            othersInput.addClass("is-invalid");
        } else {
            othersInput.removeClass("is-invalid");
        }

        // Proceed to the next step if all validations pass
        if (isValid) {
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
        } else {
            alert("Please fill out all required fields before proceeding.");
        }
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
  
  

