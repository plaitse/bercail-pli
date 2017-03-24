/* Init Google Map */
var map;
function initMap() {
  map = new google.maps.Map(document.getElementById('map'), {
    center: {lat: 48.85661400000001, lng: 2.3522219000000177},
    zoom: 11
  });


  // 	$('.box-ad-result').each(function(){	
		// var myLatLng = {lat: parseInt($(this).prop('data-latitude')), lng: parseInt($(this).prop('data-longitude'))};
		// var marker = new google.maps.Marker({
		// 	position: myLatLng,
		// 	map: map,
		// 	title: 'Hello World!'
		// });
  // 	});
}


// /* Filter boxes */
// $(function() {
// 	var isOpened = false;
// 	$('.project-filter-sticky-nav-ad-result').click(function() {
// 		if (isOpened == false) {
// 			$('.project-box-ad-result').css("display", "block");
// 			$('.overlay-background-ad-result').css("display", "block");
// 			isOpened = true;
// 		} else {
// 			$('.project-box-ad-result').css("display", "none");
// 			$('.overlay-background-ad-result').css("display", "none");
// 			isOpened = false;
// 		}
// 	});
// 	$('.type-filter-sticky-nav-ad-result').click(function() {
// 		if (isOpened == false) {
// 			$('.type-box-ad-result').css("display", "block");
// 			$('.overlay-background-ad-result').css("display", "block");
// 			isOpened = true;
// 		} else {
// 			$('.type-box-ad-result').css("display", "none");
// 			$('.overlay-background-ad-result').css("display", "none");
// 			isOpened = false;
// 		}
// 	});
// 	$('.rooms-filter-sticky-nav-ad-result').click(function() {
// 		if (isOpened == false) {
// 			$('.rooms-box-ad-result').css("display", "block");
// 			$('.overlay-background-ad-result').css("display", "block");
// 			isOpened = true;
// 		} else {
// 			$('.rooms-box-ad-result').css("display", "none");
// 			$('.overlay-background-ad-result').css("display", "none");
// 			isOpened = false;
// 		}
// 	});
// 	$('.surface-filter-sticky-nav-ad-result').click(function() {
// 		if (isOpened == false) {
// 			$('.surface-box-ad-result').css("display", "block");
// 			$('.overlay-background-ad-result').css("display", "block");
// 			isOpened = true;
// 		} else {
// 			$('.surface-box-ad-result').css("display", "none");
// 			$('.overlay-background-ad-result').css("display", "none");
// 			isOpened = false;
// 		}
// 	});
// 	$('.place-filter-sticky-nav-ad-result').click(function() {
// 		if (isOpened == false) {
// 			$('.place-box-ad-result').css("display", "block");
// 			$('.overlay-background-ad-result').css("display", "block");
// 			isOpened = true;
// 		} else {
// 			$('.place-box-ad-result').css("display", "none");
// 			$('.overlay-background-ad-result').css("display", "none");
// 			isOpened = false;
// 		}
// 	});
// 	$('.budget-filter-sticky-nav-ad-result').click(function() {
// 		if (isOpened == false) {
// 			$('.budget-box-ad-result').css("display", "block");
// 			$('.overlay-background-ad-result').css("display", "block");
// 			isOpened = true;
// 		} else {
// 			$('.budget-box-ad-result').css("display", "none");
// 			$('.overlay-background-ad-result').css("display", "none");
// 			isOpened = false;
// 		}
// 	});
// 	$('.more-filter-sticky-nav-ad-result').click(function() {
// 		if (isOpened == false) {
// 			$('.more-box-ad-result').css("display", "block");
// 			$('.overlay-background-ad-result').css("display", "block");
// 			isOpened = true;
// 		} else {
// 			$('.more-box-ad-result').css("display", "none");
// 			$('.overlay-background-ad-result').css("display", "none");
// 			isOpened = false;
// 		}
// 	});
// });

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

