<?php include("../www/header.inc.php"); ?>

<?php
/**
 * BikeStore homepage.
 *
 * This section displays the homepage of BikeStore, including a brief description and a map showing store locations.
 *
 * PHP version 7.0
 *
 * @category PHP
 * @package  BikeStores
 * @author   Axel Dos Santos
 */

?>
    <div class="container">
        <p class="lead">Ride the Adventure!</p>
        <p>At Bike Stores, cycling is our passion. Whether you're a weekend cruiser or a seasoned racer, we've got all the gear and guidance to fuel your ride. From top-notch bikes to essential accessories, our knowledgeable team is dedicated to elevating your cycling journey.</p>
    </div>
<div class="container mt-4">
    <div id="map" style="height: 500px;"></div>
</div>
<!-- JavaScript files -->
<script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js" integrity="sha512-/Nsx9X4HebavoBvEBuyp3I7od5tA0UzAxs+j83KgC8PU0kgB4XiK4Lfe4y4cgBtaRJQEIFCW+oC506aPT2L1zw==" crossorigin=""></script>
<script type="text/javascript">
    // Initialize latitude and longitude for the center of the map
    var lat = 36.963343;
    var lon = -121.968305;
    var macarte = null;
    // Function to initialize the map
    function initMap() {
        // Create the "macarte" object and insert it into the HTML element with ID "map"
        macarte = L.map('map', {
            zoomControl: false // Disable zoom in and out buttons
        }).setView([lat, lon], 3); // Larger zoom to display markers
        // Leaflet does not fetch tiles from a server by default. We need to specify where we want to fetch them from. Here, openstreetmap.fr
        L.tileLayer('https://{s}.tile.openstreetmap.fr/osmfr/{z}/{x}/{y}.png', {
            // It's always good to leave a link to the data source
            attribution: 'data © <a href="//osm.org/copyright">OpenStreetMap</a>/ODbL - rendering <a href="//openstreetmap.fr">OSM France</a>',
            minZoom: 1,
            maxZoom: 20
        }).addTo(macarte);

        // Add markers for stores
        var stores = [
            { name: 'Store 1', lat: 36.963343, lon: -121.968305 },
            { name: 'Store 2', lat: 43.0014907, lon: -83.5826126 },
            { name: 'Store 3', lat: 33.04788, lon: -97.08963 }
        ];

        stores.forEach(function(store) {
            L.marker([store.lat, store.lon]).addTo(macarte)
                .bindPopup(store.name);
        });
    }
    window.onload = function() {
        // Initialize function that runs when the DOM is loaded
        initMap();
    };
</script>

<?php include("../www/footer.inc.php"); ?>
