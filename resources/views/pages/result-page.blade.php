@extends('layout')

@section('content')

<nav class="navbar navbar-default sticky-nav-ad-result" data-spy="affix" data-offset-top="70">
  <ul class="nav navbar-nav">
    <li class="active"><a href="#">Basic Topnav</a></li>
    <li><a href="#">Page 1</a></li>
    <li><a href="#">Page 2</a></li>
    <li><a href="#">Page 3</a></li>
  </ul>
</nav>

<div class="center-block container-fluid main-block-ad-result">

	<div class="row row-ad-result">
		<div class="col-md-4 col-map-ad-result">
			<div id="map" style="height:550px;"></div>
		</div>
		<div class="col-md-8 col-ad-result">
			@foreach($results->annonces->annonce as $value)
				<div class="box-ad-result">
					<div class="row">
						<div class="col-md-3 image-ad-result">
							@if (isset($value->firstThumb))
								<img src="{{ $value->firstThumb }}">
							@else
								<div class="image-test-ad-result">Aucune photo disponible</div>
							@endif					
						</div>
						<div class="col-md-3 description-ad-result">
							<h4 class="libelle-ad-result">{{ $value->libelle }}</h4>

							<p>{{ $value->ville }} </p>
							<p class="surface-ad-result"> {{ $value->nbPiece }} pièce(s) 
								{{ $value->surface }}  {{ $value->surfaceUnite }} </p>
						</div>
						<div class="col-md-3 price-ad-result">
							<h3>{{ $value->prix }} €*</h3>
							<a class="btn btn-default">Voir l'offre</a>
						</div>
						<div class="col-md-3 compare-ad-result">
							<p lass="good-plans-name-ad-result">Leboncoin</p>
							<p class="good-plans-price-ad-result">261 €*</p>
							<p lass="good-plans-name-ad-result">PAP</p>
							<p class="good-plans-price-ad-result">266 €*</p>
							<p lass="good-plans-name-ad-result">Logic-Immo</p>
							<p class="good-plans-price-ad-result">254 €*</p>
							<p class="good-plans-ad-result">Afficher les 11 bons plans</p>

						</div>
					</div>
				</div>
			@endforeach
		</div>
	</div>

</div>

<!-- Google Map -->
<script src="js/result-page.js" ></script>
<script async defer
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA4PbEHid5Cpv2h2peonwutOHk9Jvr-0oY&callback=initMap">
</script>
@stop