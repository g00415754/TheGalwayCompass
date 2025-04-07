flatpickr("#rangePicker", {
    mode: "range",
    dateFormat: "Y-m-d",
    onChange: function(selectedDates) {
        if (selectedDates.length === 2) {
            const start = selectedDates[0].toISOString().slice(0, 10);
            const end = selectedDates[1].toISOString().slice(0, 10);

            console.log("Fetching events from:", start, "to:", end);

            fetch(`fetch_events.php?start=${start}&end=${end}`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error("Network response was not ok");
                    }
                    return response.json();
                })
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

