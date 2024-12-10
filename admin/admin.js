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

// Capture all school options when the page loads
const schoolOptions = Array.from(document.querySelectorAll('#schoolSelect .school-option'));

// Function to filter schools based on selected parish
function filterSchools() {
    const parishSelect = document.getElementById('parishSelect'); // Parish dropdown
    const selectedParishName = parishSelect.value; // Selected Parish Name
    const citySelect = document.getElementById('citySelect'); // City dropdown
    const selectedCityName = citySelect.value; // Selected City Name
    const schoolSelect = document.getElementById('schoolSelect'); // School dropdown

    // Clear the school dropdown and reset to default
    schoolSelect.innerHTML = '<option selected>Name of School</option>';

    // If a city is selected, filter the schools based on the selected parish
    schoolOptions.forEach(option => {
        // Only add schools that are linked to the selected parish
        if (option.getAttribute('data-parish') === selectedParishName) {
            schoolSelect.appendChild(option); // Add matching school options
        }
    });

    // If no parish is selected or it's set to the default, show only the default school option
    if (!selectedParishName || selectedParishName === "Name of Parish ") {
        schoolSelect.innerHTML = '<option selected>Name of School</option>'; // Reset to default
    }
    if (!selectedCityName || selectedCityName === "Select City") {
        schoolSelect.innerHTML = '<option selected>Name of School</option>'; // Reset to default
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
                    label: 'Needed Registered Volunteers',
                    data: neededData,
                    backgroundColor: '#910200',
                    borderColor: '#910200',
                    borderWidth: 1,
                    barPercentage: 0.5,
                    categoryPercentage: 0.5,
                },
                {
                    label: 'Registered Volunteers',
                    data: registeredData,
                    backgroundColor: '#00A1E4',
                    borderColor: '#00A1E4',
                    borderWidth: 1,
                    barPercentage: 0.5,
                    categoryPercentage: 0.5,
                },
            ],
        },
        options: {
            responsive: true,
            indexAxis: 'y', // Horizontal bar chart
            scales: {
                y: {
                    beginAtZero: true,
                    stacked: true,
                    ticks: {
                        padding: 1 // Adjust this to reduce the space between y-axis labels
                    }
                },
                x: {
                    stacked: true,
                    offset: true,
                    ticks: {
                        padding: 1 // Adjust this to reduce the space between x-axis labels
                    }
                }
            },
            plugins: {
                legend: {
                    labels: {
                        padding: 20 // Adjust this to change the space between legend labels
                    }
                }
            }
        }
    });
}

// Initialize the chart on page load
window.onload = function () {
    filterParishes(); // Ensure Parish dropdown is properly set
    updateChart(); // Initialize chart
    filterSchools();
    updateChart();
};

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


    // Get the search input element in submissions.php
    const searchInput = document.getElementById("searchInput");
    if (searchInput) {
        searchInput.addEventListener("keyup", function() {
            const filter = searchInput.value.toLowerCase();
            const rows = document.querySelectorAll("#tableBody .table-row");
    
            rows.forEach(function(row) {
                const name = row.querySelector("td:nth-child(2)").textContent.toLowerCase();
                const date = row.querySelector("td:nth-child(3)").textContent.toLowerCase();
    
                if (name.includes(filter) || date.includes(filter)) {
                    row.style.display = "";
                } else {
                    row.style.display = "none";
                }
            });
        });
}

// Get the search input element in list_of_volunteers.php
const searchVol = document.getElementById("searchVol");

    // Get the dropdown filter table in list_of_volunteers.php
    const missionsSelect = document.getElementById("missions");
    const precinctsSelect = document.getElementById("precincts");
    const statusSelect = document.getElementById("allStatus");
    const parishSelect = document.getElementById("parishSelect");

    function filterTable() {
        const filterText = searchVol ? searchVol.value.toLowerCase() : ""; // If searchVol is available, get its value
        const selectedMission = missionsSelect.value.toLowerCase();
        const selectedPrecinct = precinctsSelect.value.toLowerCase();
        const selectedStatus = statusSelect.value.toLowerCase();
        const selectedParish = parishSelect ? parishSelect.value.toLowerCase() : "name of parish"; // Default to "name of parish"

        const rows = document.querySelectorAll("#listtable .listrow");

        rows.forEach(row => {
            const volunteerId = row.cells[0].textContent.toLowerCase();
            const volunteerName = row.cells[2].textContent.toLowerCase();
            const precinct = row.cells[1].textContent.toLowerCase(); // Assuming precinct is in the 2nd column
            const mission = row.cells[4].textContent.toLowerCase(); // Assuming mission is in the 5th column
            const status = row.cells[5].textContent.toLowerCase(); // Assuming status is in the 6th column
            const parish = row.cells[3].textContent.toLowerCase(); // Assuming parish is in the 4th column

            // Check if row matches search text, selected Mission, Precinct, Status, and Parish
            const matchesSearch = volunteerId.includes(filterText) || volunteerName.includes(filterText);
            const matchesMission = selectedMission === "select mission" || mission.includes(selectedMission);
            const matchesPrecinct = selectedPrecinct === "select precincts" || precinct.includes(selectedPrecinct);
            const matchesStatus = selectedStatus === "all status" || status.includes(selectedStatus);
            
            // If parish is "name of parish", don't filter based on parish column, show all rows
            const matchesParish = selectedParish === "name of parish" || parish.includes(selectedParish);

            // Show row if all conditions match
            if (matchesSearch && matchesMission && matchesPrecinct && matchesStatus && matchesParish) {
                row.style.display = "";
            } else {
                row.style.display = "none";
            }
        });
    }

// Add event listeners for the search input and dropdowns
if (searchVol) {
        searchVol.addEventListener("input", filterTable);
    }

if (missionsSelect || precinctsSelect || statusSelect || parishSelect) {
        missionsSelect.addEventListener("change", filterTable);
        precinctsSelect.addEventListener("change", filterTable);
        statusSelect.addEventListener("change", filterTable);
        parishSelect.addEventListener("change", filterTable);
}

    // Function to update chart data when a school is selected
    function updateChartData() {
        const selectedSchool = document.getElementById('schoolSelect').value;

        if (selectedSchool) {
            // Find the index of the selected school
            const index = assignedSchools.indexOf(selectedSchool);
            if (index !== -1) {
                // Update the chart with the selected school's data
                pieData.datasets[0].data = [
                    totalRV[index],  // Registered volunteers
                    neededRV[index]   // Needed volunteers
                ];
                console.log('Selected school data updated:', totalRV[index], neededRV[index]);
            }
        } else {
            // If no school is selected, show the default data (first school)
            pieData.datasets[0].data = [
                totalRV[0], // Default to the first school's registered volunteers
                neededRV[0] // Default to the first school's needed volunteers
            ];
            console.log('No school selected, showing default data:', totalRV[0], neededRV[0]);
        }

        // Update the chart with the new data
        pieChart.update();
    }

    // Call the function initially to display the default chart data
    updateChartData();

    function getTotalRegistered() {
        // Get selected location
        var location = document.getElementById('schoolSelect').value;
    
        if (location) {
            // Send AJAX request
            $.ajax({
                url: 'php/dashboard.php', // PHP script to handle the request
                method: 'POST',
                data: { location: location },
                success: function(response) {
                    // Parse the response if multiple data points are returned as JSON
                    try {
                        var data = JSON.parse(response);
    
                        // Update the respective elements with the result
                        document.getElementById('total_registered').innerHTML = data.total_registered || 0;
                        document.getElementById('total_volunteers').innerHTML = data.total_volunteers || 0;
                        document.getElementById('needed_volunteers').innerHTML = data.needed_volunteers || 0;
                    } catch (e) {
                        console.error('Error parsing response:', response);
                    }
                },
                error: function(xhr, status, error) {
                    console.error('AJAX Error:', error);
                }
            });
        } else {
            // Reset the display if no location is selected
            document.getElementById('total_registered').innerHTML = 0;
            document.getElementById('total_volunteers').innerHTML = 0;
            document.getElementById('needed_volunteers').innerHTML = 0;
        }
    }
    

    

    
    
    
    


    
  