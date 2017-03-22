@extends('layout')

@section('content')

<div class="center-block container-fluid">
	<div class="col-md-4 return-back-detail"><a href="#" class="link-return-back-detail">
		<i class="fa fa-long-arrow-left" aria-hidden="true"></i>Retour à la liste</a>
	</div>
	<div class="col-md-8 title-ad-detail">
		<h4> {{ $results->titre }} {{ $results->nbPieces }} pièces {{ $results->surface }} 
				{{ $results->surfaceUnite}} {{ $results->ville}}</h4>
	</div>
	<div class="row row-ad-detail">
		<div class="col-md-4">
			<div id="map" style="height:550px;"></div>
		</div>
		<div class="col-md-8 col-ad-detail">
			<h4 class="price-ad-detail">{{ $results->prix }} {{ $results->prixUnite }}</h4>
			@if (isset($results->firstThumb))
				<img src="{{ $value->firstThumb }}">
			@else
				<div class="image-test-ad-detail">Aucune photo disponible</div>
			@endif
			<div class="description-ad-detail">
				<p>
					<span class="description-title-ad-detail">Description de Appartement</span> 
					à {{ $results->ville }}</p>
				<p>{{ $results->descriptif }}</p>
			</div>
		</div>
	</div>
</div>

<script src="https://code.jquery.com/jquery-3.1.1.min.js"
        integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
<!-- Return to result page -->
<script src="js/detail-page.js" ></script>
<!-- Google Map & Filter Boxes -->
<script src="js/result-page.js" ></script>
<!-- Google Map -->
<script async defer
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA4PbEHid5Cpv2h2peonwutOHk9Jvr-0oY&callback=initMap">
</script>

@stop