// Fetch categories from the server and populate the dropdown
window.onload = function () {
    fetch('fetch_events.php')  // Call to the new PHP endpoint for categories
        .then(response => response.json())
        .then(data => {
            const categoryDropdown = document.getElementById("categoryFilter");
            data.forEach(category => {
                const option = document.createElement("option");
                option.value = category.event_category;
                option.textContent = category.event_category;
                categoryDropdown.appendChild(option);
            });
        })
        .catch(err => console.error("Error fetching categories:", err));
};

// Flatpickr date range picker
flatpickr("#rangePicker", {
    mode: "range",
    dateFormat: "Y-m-d",
    onChange: function (selectedDates) {
        if (selectedDates.length === 2) {
            const start = selectedDates[0].toISOString().slice(0, 10);
            const end = selectedDates[1].toISOString().slice(0, 10);

            // Get selected category from the dropdown
            const category = document.getElementById("categoryFilter").value;

            console.log("Fetching events from:", start, "to:", end, "with category:", category);

            fetch(`fetch_events.php?start=${start}&end=${end}&category=${category}`)
                .then(response => response.json())
                .then(data => {
                    console.log("Received data:", data);
                    displayEvents(data);
                })
                .catch(err => console.error("Error fetching events:", err));
        }
    }
});

function displayEvents(events) {
    const container = document.getElementById("events-container");
    container.innerHTML = "";

    if (events.length === 0) {
        container.innerHTML = "<p>No events found for this range.</p>";
        return;
    }

    events.forEach(event => {
        const card = document.createElement("div");
        card.className = "col-md-4 mb-4";  // Bootstrap class to display 3 cards per row on medium screens
        card.innerHTML = `
            <div class="card shadow-sm rounded-lg">
                <div class="card-body">
                    <img src="${event.event_image}">
                    <h5 class="card-title text-primary">${event.event_name}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">${event.event_date}</h6>
                    <p class="card-text">${event.event_description}</p>
                    <p class="card-text"><small class="text-muted">Location: ${event.event_location}</small></p>
                    <p class="card-text"><small class="text-muted">Time: ${event.event_time}</small></p>
                </div>
            </div>
        `;
        container.appendChild(card);
    });


}

