
<script>
var markers_idp = [];
var ships = {};
function customHeading(nilai,pembulat){
    var CustomHeading=(Math.ceil(parseInt(nilai))%parseInt(pembulat) == 0) ? Math.ceil(parseInt(nilai)) : Math.round((parseInt(nilai)+parseInt(pembulat)/2)/parseInt(pembulat))*parseInt(pembulat);
    return CustomHeading;
}
function refresh_marker(map) {
    $.getJSON("<?php echo base_url();?>index.php/monitor/refresh_marker/", function(data){
        var marker, i;
        var locations = data.locations;
        $.each(locations, function(i, location){
            var direction = new google.maps.LatLng(location.latitude_realtime, location.longitude_realtime);
            var station = new google.maps.LatLng(location.ref_latitude, location.ref_longitude);
            var heading = google.maps.geometry.spherical.computeHeading(direction,station)+180;
            var image = {
              url: '<?php echo base_url();?>assets/marker/'+customHeading(heading,10)+'.png',
              scaledSize: new google.maps.Size(30, 30),
              origin: new google.maps.Point(0,0),
              anchor: new google.maps.Point(0,0)
            }
            if(! ships[location.id_node]){
                ships[location.id_node] = {};
                ships[location.id_node]['marker'] = new google.maps.Marker({
                    map: map,
                    position: new google.maps.LatLng(location.latitude_realtime, location.longitude_realtime),
                    icon: image
                });
            }
            marker = ships[location.id_node]['marker'];
            
            marker.setPosition(new google.maps.LatLng(location.latitude_realtime, location.longitude_realtime));
            google.maps.event.addListener(marker, 'click', (function(marker, i) {
                return function() {
                  $('#exampleModal').on('show.bs.modal', function (event) {
                    var button = $(event.relatedTarget)
                    var nama_node = location.nama_node
                    var latitude = Math.round(location.latitude_realtime*100)/100
                    var longitude = Math.round(location.longitude_realtime*100)/100
                    var id_node = location.id_node
                    var foto = location.foto
                    var status = location.status
                    var lastpoll = location.status_poll
                    var speed = location.kecepatan
                    var owner = location.owner
                    var modal = $(this)
                    modal.find('.modal-title').text(nama_node)
                    modal.find('.modal-body input').val(nama_node)
                    modal.find('.latitude').text(latitude+'\xB0')
                    modal.find('.longitude').text(longitude+'\xB0')
                    modal.find('.anchor').attr("href", "index.php?action=follow_ship&id_node="+id_node)
                    modal.find('.detail').attr("href","index.php?action=detail_ship&id_node="+id_node)
                    modal.find('.follow_anchor').attr("href", "index.php?action=404")
                    modal.find('.tracking').attr("href","index.php?action=input_track&id_node="+id_node)
                    modal.find('.modal-body').attr("style", "height: 200px;background:url('<?php echo base_url();?>assets/images/"+foto+"') center center no-repeat;background-size:cover;")
                    modal.find('.status-text').html(status)
                    modal.find('.status-poll').text(lastpoll)
                    modal.find('.status-owner').text(owner)
                  })
                  $('#exampleModal').modal();
                }
            })(marker, i));
        })
        
    });
}

function initialize(){
    var map;
    var options = {
        zoom: 5,
        center: new google.maps.LatLng(-2.054689, 116.806152),
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        mapTypeControl:false,
        streetViewControl:false,
        fullScreenControl:false,
        styles:
      [
      {
        "featureType": "all",
        "elementType": "labels.text.fill",
        "stylers": [
            {
                "saturation": 36
            },
            {
                "color": "#000000"
            },
            {
                "lightness": 40
            }
        ]
      },
      {
        "featureType": "all",
        "elementType": "labels.text.stroke",
        "stylers": [
            {
                "visibility": "on"
            },
            {
                "color": "#000000"
            },
            {
                "lightness": 16
            }
        ]
      },
      {
        "featureType": "all",
        "elementType": "labels.icon",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
      },
      {
        "featureType": "administrative",
        "elementType": "geometry.fill",
        "stylers": [
            {
                "color": "#000000"
            },
            {
                "lightness": 20
            }
        ]
      },
      {
        "featureType": "administrative",
        "elementType": "geometry.stroke",
        "stylers": [
            {
                "color": "#000000"
            },
            {
                "lightness": 17
            },
            {
                "weight": 1.2
            }
        ]
      },
      {
        "featureType": "administrative.locality",
        "elementType": "geometry",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
      },
      {
        "featureType": "landscape",
        "elementType": "geometry",
        "stylers": [
            {
                "color": "#000000"
            },
            {
                "lightness": 20
            }
        ]
      },
      {
        "featureType": "poi",
        "elementType": "geometry",
        "stylers": [
            {
                "color": "#000000"
            },
            {
                "lightness": 21
            }
        ]
      },
      {
        "featureType": "poi.attraction",
        "elementType": "geometry",
        "stylers": [
            {
                "visibility": "on"
            },
            {
                "saturation": "100"
            }
        ]
      },
      {
        "featureType": "poi.business",
        "elementType": "geometry.fill",
        "stylers": [
            {
                "visibility": "on"
            },
            {
                "saturation": "100"
            }
        ]
      },
      {
        "featureType": "poi.park",
        "elementType": "geometry.fill",
        "stylers": [
            {
                "visibility": "on"
            }
        ]
      },
      {
        "featureType": "poi.park",
        "elementType": "geometry.stroke",
        "stylers": [
            {
                "visibility": "on"
            }
        ]
      },
      {
        "featureType": "poi.place_of_worship",
        "elementType": "geometry",
        "stylers": [
            {
                "visibility": "on"
            },
            {
                "saturation": "100"
            }
        ]
      },
      {
        "featureType": "poi.school",
        "elementType": "geometry.fill",
        "stylers": [
            {
                "visibility": "on"
            }
        ]
      },
      {
        "featureType": "poi.sports_complex",
        "elementType": "geometry.fill",
        "stylers": [
            {
                "visibility": "on"
            },
            {
                "saturation": "100"
            }
        ]
      },
      {
        "featureType": "poi.sports_complex",
        "elementType": "labels.text.fill",
        "stylers": [
            {
                "visibility": "on"
            }
        ]
      },
      {
        "featureType": "road.highway",
        "elementType": "geometry",
        "stylers": [
            {
                "visibility": "on"
            }
        ]
      },
      {
        "featureType": "road.highway",
        "elementType": "geometry.fill",
        "stylers": [
            {
                "color": "#000000"
            },
            {
                "lightness": 17
            }
        ]
      },
      {
        "featureType": "road.highway",
        "elementType": "geometry.stroke",
        "stylers": [
            {
                "color": "#000000"
            },
            {
                "lightness": 29
            },
            {
                "weight": 0.2
            }
        ]
      },
      {
        "featureType": "road.arterial",
        "elementType": "geometry",
        "stylers": [
            {
                "color": "#000000"
            },
            {
                "lightness": 18
            }
        ]
      },
      {
        "featureType": "road.local",
        "elementType": "geometry",
        "stylers": [
            {
                "color": "#000000"
            },
            {
                "lightness": 16
            }
        ]
      },
      {
        "featureType": "transit",
        "elementType": "geometry",
        "stylers": [
            {
                "color": "#000000"
            },
            {
                "lightness": 19
            }
        ]
      },
      {
        "featureType": "transit.station.airport",
        "elementType": "geometry.fill",
        "stylers": [
            {
                "visibility": "on"
            }
        ]
      },
      {
        "featureType": "transit.station.bus",
        "elementType": "geometry.fill",
        "stylers": [
            {
                "visibility": "on"
            }
        ]
      },
      {
        "featureType": "transit.station.rail",
        "elementType": "geometry.fill",
        "stylers": [
            {
                "visibility": "on"
            }
        ]
      },
      {
        "featureType": "water",
        "elementType": "geometry",
        "stylers": [
            {
                "color": "#15556f"
            },
            {
                "lightness": 17
            }
        ]
      }
    ]
  
    };

    var map = new google.maps.Map(document.getElementById('peta'), options);
    
    
    refresh_marker(map);
    setInterval(function(){
        refresh_marker(map);
    }, 60*3000);
}
//});
</script>