// Get all the dropdown elements
const dropdowns = document.querySelectorAll(".dropdown");

// Add event listeners to each dropdown
dropdowns.forEach((dropdown) => {
    // Get the corresponding dropdown content
    const dropdownContent = dropdown.querySelector(".dropdown-content");

    // Show the dropdown content when hovering over the dropdown
    dropdown.addEventListener("mouseover", () => {
        dropdownContent.style.display = "block";
    });

    // Hide the dropdown content when the mouse leaves the dropdown
    dropdown.addEventListener("mouseout", () => {
        dropdownContent.style.display = "none";
    });
});
