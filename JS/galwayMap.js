// Initialize Map
var map = L.map('galway-map').setView([53.2724, -9.0534], 10); // Adjust zoom to fit locations

// Add Tile Layer (Base Map)
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; OpenStreetMap contributors'
}).addTo(map);

// Function to create a popup with an image
function createPopup(name, imgUrl) {
    return `<b>${name}</b><br><img src="${imgUrl}" alt="${name}" width="150" height="100" style="border-radius: 10px;">`;
}

// Add markers with updated image URLs
L.marker([53.2837, -9.0634]).addTo(map)
    .bindPopup(createPopup("University of Galway", "https://i.imgur.com/nUIWnPV.jpg"));

L.marker([53.2790, -9.011]).addTo(map)
    .bindPopup(createPopup("ATU Galway", "https://i.imgur.com/ZyKzNq8.jpg"));

L.marker([53.2721, -9.0536]).addTo(map)
    .bindPopup(createPopup("Eyre Square", "https://i.imgur.com/EhKShFl.jpg"));

L.marker([53.2692, -9.0530]).addTo(map)
    .bindPopup(createPopup("Spanish Arch", "https://i.imgur.com/F3PzN9S.jpg"));

L.marker([53.2695, -9.0567]).addTo(map)
    .bindPopup(createPopup("Galway Cathedral", "https://i.imgur.com/JXxL1FK.jpg"));

L.marker([53.2590, -9.0865]).addTo(map)
    .bindPopup(createPopup("Salthill Promenade", "https://i.imgur.com/kh2HqjH.jpg"));

L.marker([53.2711, -9.0559]).addTo(map)
    .bindPopup(createPopup("The Latin Quarter", "https://i.imgur.com/k9zEmK6.jpg"));

L.marker([53.2682, -9.0494]).addTo(map)
    .bindPopup(createPopup("Galway Docks", "https://i.imgur.com/9PYt5gS.jpg"));

L.marker([52.9715, -9.4244]).addTo(map)
    .bindPopup(createPopup("Cliffs of Moher", "https://i.imgur.com/wOWtG2e.jpg"));

L.marker([53.5616, -9.8894]).addTo(map)
    .bindPopup(createPopup("Kylemore Abbey", "https://i.imgur.com/NpGjS4d.jpg"));
