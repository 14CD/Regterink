function myMap() {
    var myLatlng = new google.maps.LatLng(52.4953108, 5.4548488);

    var mapOptions = {
        center: new google.maps.LatLng(52.4950881, 5.4541129),
        zoom: 17,
    };

    var marker = new google.maps.Marker({
        position: myLatlng,
        title: "Gezinshuis Regterink",
        mapTypeControl: false,
    });

    var map = new google.maps.Map(document.getElementById("map"), mapOptions);

    marker.setMap(map);
}