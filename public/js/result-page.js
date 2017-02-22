/* Init Google Map */
var map;
function initMap() {
  map = new google.maps.Map(document.getElementById('map'), {
    center: {lat: 48.85, lng: 2.34},
    zoom: 8
  });
}

/* Sticky navbar */
