@extends('layout')

@section('content')

<div class="overlay-background-ad-result"></div>

<nav class="navbar navbar-default sticky-nav-ad-result" data-spy="affix" data-offset-top="53">
	<div class="container-fluid">
	  	<ul class="nav navbar-nav filters-sticky-nav-ad-result">
	  		<li><a href="#" class="project-filter-sticky-nav-ad-result">
	  			@if ($inputs['transaction'] == "sell")
				    Acheter
				@elseif ($inputs['transaction'] == "rent")
				    Louer
				@endif
	  		</a></li>
	    	<li><a href="#" class="type-filter-sticky-nav-ad-result">{{ ucfirst($inputs['type']) }}</a></li>
	    	<li><a href="#" class="rooms-filter-sticky-nav-ad-result">1 et +</a></li>
	    	<li><a href="#" class="surface-filter-sticky-nav-ad-result">Surface min</a></li>
	    	<li><a href="#" class="place-filter-sticky-nav-ad-result">Paris 17ème</a></li>
	    	<li><a href="#" class="budget-filter-sticky-nav-ad-result">{{ $inputs['budgetMax'] }}€ max</a></li>
	    	<li><a href="#" class="more-filter-sticky-nav-ad-result">+ de critères</a></li>
	    	<li><a href="#" class="alert-filter-sticky-nav-ad-result">
	    		<i class="fa fa-bell-o" aria-hidden="true" class="pull-left"></i> 
	    		<span class="pull-right active-alert-filter-sticky-nav-ad-result">Activer l'alerte</span>
	    	</a></li>
	 	 </ul>
	</div>
	@include('pages.filter-result-page')
</nav>

<div class="center-block container-fluid main-block-ad-result">
	<div class="row row-ad-result">
		<div class="col-md-4 col-map-ad-result">
			<div id="map" style="height:550px;"></div>
		</div>
		<div class="col-md-8 col-ad-result">
			@if ($results->nbTrouvees > 0)
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
									@if(isset($value->surface)){{ $value->surface }}  {{ $value->surfaceUnite }} @endif</p>
							</div>
							<div class="col-md-3 price-ad-result">
								<h3>{{ $value->prix }} €*</h3>
								<a class="btn btn-default" href="/detail?SelogerId={{ $value->idAnnonce }}">Voir l'offre</a>
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
			@else
				<div class="box-ad-result"><p>Désolé aucun résultat trouvé.</p></div>
			@endif
		</div>
	</div>
</div>

<script src="https://code.jquery.com/jquery-3.1.1.min.js"
        integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
<!-- Google Map & Filter Boxes -->
<script src="js/result-page.js" ></script>
<!-- Google Map -->
<script async defer
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA4PbEHid5Cpv2h2peonwutOHk9Jvr-0oY&callback=initMap">
</script>
@stop