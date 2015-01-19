function init_map() {
    var var_location = new google.maps.LatLng(47.118894, -88.547964);

    var var_mapoptions = {
      center: var_location,
      zoom: 15,
      mapTypeId: google.maps.MapTypeId.ROADMAP,
      mapTypeControl: false,
      panControl:false,
      rotateControl:false,
      streetViewControl: false,
    };
    
    

    var var_marker = new google.maps.Marker({
        position: var_location,
        map: var_map,
        title:"MTU Library"});

    var var_map = new google.maps.Map(document.getElementById("map-container"),
        var_mapoptions);

    
    var_marker.setMap(var_map);	

    
}

google.maps.event.addDomListener(window, 'load', init_map);
