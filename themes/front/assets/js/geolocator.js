function success(position) {

  var mapcanvas = [
    {
      lat: position.coords.latitude,
      lon: position.coords.longitude,
      zoom: 16,
      html: '<p><strong>Lokasi toko anda (geser untuk menyesuaikan)</strong></p>',
      animation: google.maps.Animation.DROP,
      draggable: true
    }
  ];
  $(document).ready(function() {
    new Maplace({
      locations: mapcanvas,
      map_div: '.mapcanvas'
    }).Load();  
  });

}

function error(msg) {  
  $('.mapcanvas').remove();
}

if (navigator.geolocation) {
  navigator.geolocation.getCurrentPosition(success, error);
} else {
  error('not supported');
}

;
