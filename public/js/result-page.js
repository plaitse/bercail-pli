function initMap() {

	var locations = [];
	var i = 0;

  	$('.box-ad-result').each(function(){
		if (isNaN(parseFloat($(this).attr('data-latitude'))) == false) {
			// console.log($(this).find('.img-thumbnail').attr('src'));
            var html = '<div class="row"> <div class="col-md-12"> <h4>'+$(this).find('.libelle-ad-result').text()+'</h4> </div> <div class="col-md-4"> <img class="img-thumbnail" src="'+$(this).find('.img-thumbnail').attr('src')+'"> </div> <div class="col-md-6"> <p>LOCALISATION</p> <p>NB PIECE</p> <p>SURFACE</p> <p>PRIX</p> <div> </div>';
			locations.push([html, parseFloat($(this).attr('data-latitude')), parseFloat($(this).attr('data-longitude')), i]);
			i++;
		}
  	});
  	// console.log(locations);

    window.map = new google.maps.Map(document.getElementById('map'), {
        mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    var infowindow = new google.maps.InfoWindow();

    var bounds = new google.maps.LatLngBounds();

    for (i = 0; i < locations.length; i++) {
        // console.log(i);
        marker = new google.maps.Marker({
            position: new google.maps.LatLng(locations[i][1], locations[i][2]),
            map: map
        });

        bounds.extend(marker.position);

        google.maps.event.addListener(marker, 'click', (function (marker, i) {
            return function () {
                infowindow.setContent(locations[i][0]);
                infowindow.open(map, marker);
            }
        })(marker, i));
    }

    map.fitBounds(bounds);

    var listener = google.maps.event.addListener(map, "idle", function () {
        // map.setZoom(11);
        google.maps.event.removeListener(listener);
    });
}

$('.filter-link').click(function(){
	var divClass = $(this).prop("class").split('-filter-')[0]+'-box-ad-result';
	if ($('.'+divClass).css("display") == "block"){
		$('.'+divClass).hide();
		$('.overlay-background-ad-result').hide();
	}
	else{	
		$('.filter-box-ad-result').hide();
		if ($('.'+divClass).css("display") == "none"){
			$('.'+divClass).show();
			$('.overlay-background-ad-result').show();
		}
	}
});

$('#tri').change(function(){
	$('#search-form').submit();
});

