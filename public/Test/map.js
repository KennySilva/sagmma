var myCenter = new google.maps.LatLng(15.09663399, -23.66804457);

function initialize() {
    var mapProp = {
        center:myCenter,
        zoom:5,
        scrollwheel:false,
        draggable:false,
        mapTypeId:google.maps.MapTypeId.ROADMAP,

    };

    var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);

    var marker = new google.maps.Marker({
        position:myCenter,
        title: "Mercado Central de Assomada, Pilourinho",
        icon: 'Test/marcador.png'
    });

    var infowindow = new google.maps.InfoWindow(), marker;

    google.maps.event.addListener(marker, 'mouseover', (function(marker, i) {
        return function() {
            infowindow.setContent("Mercado Central, Pilourinho de Assomada");
            infowindow.open(map, marker);
        }
    })(marker))

    marker.setMap(map);
}

google.maps.event.addDomListener(window, 'load', initialize);
//
//
// var map;
//
// function initialize() {
//     var latlng = new google.maps.LatLng(-15.09663399, -23.66804457);
//
//     var options = {
//         zoom: 5,
//         center: latlng,
//         mapTypeId: google.maps.MapTypeId.ROADMAP
//     };
//
//     map = new google.maps.Map(document.getElementById("mapa"), options);
// }
//
// initialize();
