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

// Script for Filtering Parishes
var parishOptions = [];
document.querySelectorAll('#parishSelect .parish-option').forEach(function(option) {
    parishOptions.push(option); // Collect all parish options
});

function filterParishes() {
    var selectedCity = document.getElementById('citySelect').value; // Get selected city
    var parishSelect = document.getElementById('parishSelect'); // Get parish dropdown

    // Clear the parish dropdown and reset it to default
    parishSelect.innerHTML = '<option selected>Name of Parish</option>';

    // If a city is selected, filter and show relevant parishes
    if (selectedCity && selectedCity !== "Select City") {
        parishOptions.forEach(function(option) {
            if (option.getAttribute('data-city') === selectedCity) {
                parishSelect.appendChild(option); // Add matching parish options
            }
        });
    }

    // If no city is selected, the dropdown remains empty except for the default option
    if (!selectedCity || selectedCity === "Select City") {
        parishSelect.innerHTML = '<option selected>Name of Parish</option>'; // Only show default
    }
}

// Update Chart for city and parish dropdown
function updateChart() {
    var selectedCity = document.getElementById('citySelect').value;
    var selectedParish = document.getElementById('parishSelect').value;

    // Initialize variables
    var chartLabels = [];
    var registeredData = [];
    var neededData = [];

    // Filter data based on selected city and parish
    if (!selectedCity || selectedCity === "Select City") {
        chartLabels = allLabels;
        registeredData = allRegisteredData;
        neededData = allNeededData;
    } else {
        allLabels.forEach((label, index) => {
            if (allCities[index] === selectedCity) {
                if (!selectedParish || selectedParish === "Name of Parish" || selectedParish === label) {
                    chartLabels.push(label);
                    registeredData.push(allRegisteredData[index]);
                    neededData.push(allNeededData[index]);
                }
            }
        });
    }

    // Recreate chart with updated data
    var ctx = document.getElementById('myChart').getContext('2d');
    if (window.barChart) {
        window.barChart.destroy();
    }

    window.barChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: chartLabels,
            datasets: [
                {
                    label: 'Registered Volunteers',
                    data: registeredData,
                    backgroundColor: '#00A1E4',
                    borderColor: '#00A1E4',
                    borderWidth: 1,
                    barPercentage: 0.4,
                    categoryPercentage: 0.8,
                },
                {
                    label: 'Needed Registered Volunteers',
                    data: neededData,
                    backgroundColor: '#910200',
                    borderColor: '#910200',
                    borderWidth: 1,
                    barPercentage: 0.4,
                    categoryPercentage: 0.8,
                },
            ],
        },
        options: {
            responsive: true,
            indexAxis: 'y',
            scales: {
                y: {
                    beginAtZero: true,
                    grid: { display: false },
                },
                x: {
                    grid: { display: false },
                    offset: true,
                },
            },
        },
    });
}

// Initialize the chart on page load
window.onload = function () {
    filterParishes(); // Ensure Parish dropdown is properly set
    updateChart(); // Initialize chart
};


var schoolOptions = [];

// Capture all school options when the page loads
document.querySelectorAll('#schoolSelect .school-option').forEach(function(option) {
    schoolOptions.push(option);
});

// Handle Parish selection change
document.getElementById('parishSelect').addEventListener('change', function() {
    var selectedParishId = this.value; // Get selected parish ID
    var schoolSelect = document.getElementById('schoolSelect'); // School dropdown

    // Clear the school dropdown and reset it to default
    schoolSelect.innerHTML = '<option value="">Select School</option>';

    // If no parish is selected, show all schools (or keep it empty if desired)
    if (!selectedParishId) {
        schoolSelect.innerHTML = '<option value="">Select School</option>'; // Reset school options
        schoolOptions.forEach(function(option) {
            schoolSelect.appendChild(option); // Append all school options
        });
        return;
    }

    // Filter the schools based on selected parish
    schoolOptions.forEach(function(option) {
        if (option.getAttribute('data-parish-id') === selectedParishId) {
            schoolSelect.appendChild(option); // Append matching school options
        }
    });
});

// Trigger filtering when parish is selected
document.getElementById('parishSelect').addEventListener('change', filterSchools);

// Initial call to populate schools based on any pre-selected parish
filterSchools();

// Displaying SELECTED OPTION in PREVIOUS EXPERIENCE & PREFERRED ASSIGNMENT

document.addEventListener("DOMContentLoaded", function () {
    // Function to handle dropdown selection and display
    function handleDropdownSelection(dropdownId, displayContainerId, othersInputId) {
      const dropdown = document.getElementById(dropdownId);
      const selectedOptionsContainer = document.getElementById(displayContainerId);
      const othersInput = othersInputId ? document.getElementById(othersInputId) : null;
  
      dropdown.addEventListener("change", function () {
        const selectedValue = dropdown.value;
  
        // Handle enabling/disabling the "Others" input field
        if (othersInput) {
          if (selectedValue === "Others") {
            othersInput.disabled = false; // Enable "Others" input field
            othersInput.required = true; // Make it required
          } else {
            othersInput.disabled = true; // Disable "Others" input field
            othersInput.required = false; // Remove required attribute
            othersInput.value = ""; // Clear the input value
          }
        }
  
        // Skip displaying "Others" in the bottom selection container
        if (selectedValue === "Others") {
          return;
        }
  
        // Check if the selected value is already displayed
        if (
          !document.querySelector(`[data-value="${dropdownId}-${selectedValue}"]`) &&
          selectedValue !== "Select an option"
        ) {
          // Create a new div to display the selected option
          const optionDiv = document.createElement("div");
          optionDiv.className = "badge bg-primary text-white me-2 mb-2 pe-2";
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
  
    // Apply the function to both dropdowns
    handleDropdownSelection("prevExpAss", "selected-prevExpAss", "otherPrevExpAss");
    handleDropdownSelection("prefVolAss", "selected-prefVolAss", "otherPrefVolAss");
  });


  