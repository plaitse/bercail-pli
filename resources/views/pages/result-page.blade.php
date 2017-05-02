@extends('layout')

@section('content')

<div class="overlay-background-ad-result"></div>

<nav class="navbar navbar-default sticky-nav-ad-result" data-spy="affix" data-offset-top="53">
	<div class="container-fluid">
	  	<ul class="nav navbar-nav filters-sticky-nav-ad-result">
	  		<li><a href="#" class="project-filter-sticky-nav-ad-result filter-link" data-link="project-box-ad-result">Projet immo</a></li>
	    	<li><a href="#" class="type-filter-sticky-nav-ad-result filter-link">Type de bien</a></li>
	    	<li><a href="#" class="rooms-filter-sticky-nav-ad-result filter-link">Nombre de pièce(s)</a></li>
	    	<li><a href="#" class="surface-filter-sticky-nav-ad-result filter-link filter-link">Surface</a></li>
	    	<li><a href="#" class="place-filter-sticky-nav-ad-result filter-link">Localisation</a></li>
	    	<li><a href="#" class="budget-filter-sticky-nav-ad-result filter-link">Budget</a></li>
	    	<li><a href="#" class="more-filter-sticky-nav-ad-result filter-link">+ de critères</a></li>
	    	<li><a href="#" class="alert-filter-sticky-nav-ad-result filter-link">
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
			@if ($results->nbTrouvees > 1)
				@foreach($results->annonces->annonce as $value)
					<div class="box-ad-result" @if(isset($value[0]->latitude) && isset($value[0]->longitude)) data-latitude="{{ $value[0]->latitude }}" data-longitude="{{ $value[0]->longitude }}@endif">
						<div class="row">
							<div class="col-md-3 image-ad-result">
								<div class="row">
									<div class="col-md-6">									
										@if ($value[0]->origin == "sl") <img class="img-mini" src="img/se-loger.png">@endif
										@if ($value[0]->origin == "li") <img class="img-mini" src="img/logic-immo.png">@endif
									</div>
									<div class="col-md-6">	
										@if (isset($value[0]->firstThumb))
											<a href="/detail?SelogerId=@if(isset($value[0]->idAnnonce)){{ $value[0]->idAnnonce }}@endif"><img class="img-thumbnail" src="{{ $value[0]->firstThumb }}"></a>
										@else
											<div class="image-test-ad-result">Aucune photo disponible</div>
										@endif
									</div>
								</div>		
							</div>
							<div class="col-md-3 description-ad-result">								
								<h4 class="libelle-ad-result">{{ $value[0]->libelle }}</h4>
								<p>@if(isset($value[0]->ville)){{ $value[0]->ville }}@endif</p>
								<p class="surface-ad-result"> @if(isset($value[0]->nbPiece)){{ $value[0]->nbPiece }} pièce(s) @endif
								@if(isset($value[0]->surface)){{ $value[0]->surface }}@endif  @if(isset($value[0]->surfaceUnite)){{ $value[0]->surfaceUnite }}@endif </p>
							</div>
							<div class="col-md-3 price-ad-result">
								<h3>@if(isset($value[0]->prix)){{ $value[0]->prix }} €*@endif</h3>
								<a class="btn btn-default" target="_blank" href="{{ $value[0]->permaLien }}">Voir l'offre</a>
							</div>

							@if(count($value) > 1)
							<div class="col-md-3 compare-ad-result">
								<h5>Doublons trouvés</h5>
								@foreach($value as $doublons)
									<p>
										@if ($doublons->origin == "sl")
											<img class="img-mini-mini" src="img/se-loger.png">
										@endif
										@if ($doublons->origin == "li")
											<img class="img-mini-mini" src="img/logic-immo.png">
										@endif
										@if(isset($doublons->prix))
											<a href="#" class="doublon-modal-open" data-toggle="modal" data-target="#Modal-{{ $doublons->uuid }}">{{ $doublons->prix }} €</a>
										@endif
									</p>
									<!-- Modal -->
									<div class="modal fade" id="Modal-{{ $doublons->uuid }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
									 	<div class="modal-dialog" role="document">
									   		<div class="modal-content">
									      		<div class="modal-header">
									        		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									        		<h4 class="modal-title" id="myModalLabel">Annonce n°{{ $doublons->uuid }}</h4>
									      		</div>
									      		<div class="modal-body">
										      		<div class="row">
			        									<div class="col-md-3">
															<div class="row">
																<div class="col-md-6">									
																	@if ($doublons->origin == "sl") <img class="img-mini" src="img/se-loger.png">@endif
																	@if ($doublons->origin == "li") <img class="img-mini" src="img/logic-immo.png">@endif
																</div>
																<div class="col-md-6">	
																	@if (isset($doublons->firstThumb))
																		<a href="/detail?SelogerId=@if(isset($doublons->idAnnonce)){{ $doublons->idAnnonce }}@endif"><img class="img-thumbnail" src="{{ $doublons->firstThumb }}"></a>
																	@else
																		<div class="image-test-ad-result">Aucune photo disponible</div>
																	@endif
																</div>
															</div>		
														</div>
														<div class="col-md-3">								
															<h4 class="">{{ $doublons->libelle }}</h4>
															<p>@if(isset($doublons->ville)){{ $doublons->ville }}@endif</p>
															<p class=""> @if(isset($doublons->nbPiece)){{ $doublons->nbPiece }} pièce(s) @endif
															@if(isset($doublons->surface)){{ $doublons->surface }}@endif  @if(isset($doublons->surfaceUnite)){{ $doublons->surfaceUnite }}@endif </p>
														</div>
														<div class="col-md-3">
															<h3>@if(isset($doublons->prix)){{ $doublons->prix }} €*@endif</h3>
															<a class="btn btn-default" target="_blank" href="{{ $doublons->permaLien }}">Voir l'offre</a>
														</div>
									      			</div>
{{-- 										      	<div class="modal-footer">
									        			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
									        			<button type="button" class="btn btn-primary">Save changes</button>
									      			</div> --}}
									    		</div>
									 		</div>
									 	</div>
									</div>
									<!-- END Modal -->
								@endforeach
{{-- 								<p class="good-plans-name-ad-result">Leboncoin</p>
								<p class="good-plans-price-ad-result">261 €*</p>
								<p class="good-plans-name-ad-result">PAP</p>
								<p class="good-plans-price-ad-result">266 €*</p>
								<p class="good-plans-name-ad-result">Logic-Immo</p>
								<p class="good-plans-price-ad-result">254 €*</p>
								<p class="good-plans-ad-result">Afficher les 11 bons plans</p> --}}
							</div>
							@endif
						</div>
					</div>
				@endforeach
			@else
				<div class="box-ad-result"><p>Désolé aucun résultat trouvé.</p></div>
			@endif
		</div>
	</div>
</div>
@stop