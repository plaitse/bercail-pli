/* Init Google Map */
var map;
function initMap() {
  map = new google.maps.Map(document.getElementById('map'), {
    center: {lat: 48.85, lng: 2.34},
    zoom: 8
  });
}

/* Filter boxes */
$(function() {
	var isOpened = false;
	$('.project-filter-sticky-nav-ad-result').click(function() {
		if (isOpened == false) {
			$('.project-box-ad-result').css("display", "block");
			$('.overlay-background-ad-result').css("display", "block");
			isOpened = true;
		} else {
			$('.project-box-ad-result').css("display", "none");
			$('.overlay-background-ad-result').css("display", "none");
			isOpened = false;
		}
	});
	$('.type-filter-sticky-nav-ad-result').click(function() {
		if (isOpened == false) {
			$('.type-box-ad-result').css("display", "block");
			$('.overlay-background-ad-result').css("display", "block");
			isOpened = true;
		} else {
			$('.type-box-ad-result').css("display", "none");
			$('.overlay-background-ad-result').css("display", "none");
			isOpened = false;
		}
	});
	$('.rooms-filter-sticky-nav-ad-result').click(function() {
		if (isOpened == false) {
			$('.rooms-box-ad-result').css("display", "block");
			$('.overlay-background-ad-result').css("display", "block");
			isOpened = true;
		} else {
			$('.rooms-box-ad-result').css("display", "none");
			$('.overlay-background-ad-result').css("display", "none");
			isOpened = false;
		}
	});
	$('.surface-filter-sticky-nav-ad-result').click(function() {
		if (isOpened == false) {
			$('.surface-box-ad-result').css("display", "block");
			$('.overlay-background-ad-result').css("display", "block");
			isOpened = true;
		} else {
			$('.surface-box-ad-result').css("display", "none");
			$('.overlay-background-ad-result').css("display", "none");
			isOpened = false;
		}
	});
	$('.place-filter-sticky-nav-ad-result').click(function() {
		if (isOpened == false) {
			$('.place-box-ad-result').css("display", "block");
			$('.overlay-background-ad-result').css("display", "block");
			isOpened = true;
		} else {
			$('.place-box-ad-result').css("display", "none");
			$('.overlay-background-ad-result').css("display", "none");
			isOpened = false;
		}
	});
	$('.budget-filter-sticky-nav-ad-result').click(function() {
		if (isOpened == false) {
			$('.budget-box-ad-result').css("display", "block");
			$('.overlay-background-ad-result').css("display", "block");
			isOpened = true;
		} else {
			$('.budget-box-ad-result').css("display", "none");
			$('.overlay-background-ad-result').css("display", "none");
			isOpened = false;
		}
	});
	$('.more-filter-sticky-nav-ad-result').click(function() {
		if (isOpened == false) {
			$('.more-box-ad-result').css("display", "block");
			$('.overlay-background-ad-result').css("display", "block");
			isOpened = true;
		} else {
			$('.more-box-ad-result').css("display", "none");
			$('.overlay-background-ad-result').css("display", "none");
			isOpened = false;
		}
	});
});

