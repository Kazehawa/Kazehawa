<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>;

$(document).ready(function () {
    // Handle form submission
    $("#search-form").submit(function (event) {
        event.preventDefault(); // Prevent the default form submission

        var searchInput = $("#search-bar").val(); // Get the search input value

        // Perform the search operation
        performSearch(searchInput);
    });

    // Function to perform the search operation
    function performSearch(query) {
        // You can customize this part to fit your search logic
        // Here, we're just displaying an alert with the search query
        alert("Searching for: " + query);
    }
});
