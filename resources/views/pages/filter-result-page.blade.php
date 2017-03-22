<form method="post" id="search-form" action="/results">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<div class="filter-box-ad-result project-box-ad-result">
		<p class="filter-title-box-ad-result">Quel est votre projet ?</p>
			<ul class="nav navbar-nav filter-change-box-ad-result">
			    <li><a href="#">
			    	<input class="radiobtn-ad-result" type="radio" name="transaction" value="sell" @if ($inputs['transaction'] == "sell") checked @endif>Acheter</a></li>
			    <li><a href="#">
			    	<input class="radiobtn-ad-result" type="radio" name="transaction" value="rent" @if ($inputs['transaction'] == "rent") checked @endif>Louer</a></li>
			    <li><a href="#">
			    	<input class="radiobtn-ad-result" type="radio" name="transaction" value="annuity">Viager</a></li>
		  	</ul>
		  	<div class="separation-result-box-ad-result"></div>
		  	<input class="btn filter-change-box-ad-result result-filter-ad-result" type="submit" value="Rechercher">
			{{-- <input class="btn filter-change-box-ad-result result-filter-ad-result" type="submit" name="Rechercher" style="width: 130px;"> --}}
		{{-- </form> --}}
	</div>
	<div class="filter-box-ad-result type-box-ad-result">
		{{-- <form action=""> --}}
			<p class="filter-title-box-ad-result">Quel type de bien cherchez-vous ?</p>
{{-- 			<ul class="nav navbar-nav filter-change-box-ad-result">
			    <li><a href="#" class="round-filter-ad-result">
			    	<input class="radiobtn-ad-result" type="radio" name="type" value="residence" checked>Habitation</a></li>
			    <li><a href="#" class="round-filter-ad-result">
			    	<input class="radiobtn-ad-result" type="radio" name="type" value="office">Bureaux et commerces</a></li>
			    <li><a href="#" class="round-filter-ad-result">
			    	<input class="radiobtn-ad-result" type="radio" name="type" value="other">Autres</a></li>
		  	</ul> --}}
			{{-- <div class="separation-change-box-ad-result"></div> --}}
			<ul class="nav navbar-nav filter-change-box-ad-result">
			    <li><a href="#">
			    	<input class="radiobtn-ad-result" type="radio" name="type" value="appartement" @if ($inputs['type'] == "appartement") checked @endif>Appartement</a>
		    	</li>
			    <li><a href="#">
			    	<input class="radiobtn-ad-result" type="radio" name="type" value="maison" @if ($inputs['type'] == "maison") checked @endif>Maison et Villa</a>
		    	</li>
{{-- 			    <li><a href="#">
			    	<input class="radiobtn-ad-result" type="radio" name="type" value="loft">Loft / Atelier / Surface</a></li>
			    <li><a href="#">
			    	<input class="radiobtn-ad-result" type="radio" name="type" value="hotel">Hôtel particulier</a></li>
			    <li><a href="#">
			    	<input class="radiobtn-ad-result" type="radio" name="type" value="castle">Château</a></li> --}}
		  	</ul>
		  	<div class="separation-result-box-ad-result"></div>
		  	<input class="btn filter-change-box-ad-result result-filter-ad-result" type="submit" value="Rechercher">
		{{-- </form> --}}
	</div>
	<div class="filter-box-ad-result rooms-box-ad-result">
		<p class="filter-title-box-ad-result">De combien de pièces ?</p>
		{{-- <form action=""> --}}
			<div class="row">
				<div class="col-md-12">
					<p class="rooms-criteria-ad-result">Nombre de pièces</p>
					<ul class="nav navbar-nav filter-change-box-ad-result">
					    <li><a href="#">
					    	<input class="radiobtn-ad-result" type="checkbox" name="room[]" value="1" checked>1</a></li>
					    <li><a href="#">
					    	<input class="radiobtn-ad-result" type="checkbox" name="room[]" value="2">2</a></li>
					    <li><a href="#">
					    	<input class="radiobtn-ad-result" type="checkbox" name="room[]" value="3">3</a></li>
					    <li><a href="#">
					    	<input class="radiobtn-ad-result" type="checkbox" name="room[]" value="4">4</a></li>
					    <li><a href="#">
					    	<input class="radiobtn-ad-result" type="checkbox" name="room[]" value="5">5 et plus</a></li>
				  	</ul>
				</div>
			 </div>
		  	<input class="btn filter-change-box-ad-result result-filter-ad-result" type="submit" value="Rechercher">
		{{-- </form> --}}
	</div>
	<div class="filter-box-ad-result surface-box-ad-result">
		<p class="filter-title-box-ad-result">De quelle surface ?</p>
		{{-- <form action=""> --}}
			De minimum <input class="text-input-ad-result" type="text" name="surface-min" @if (isset($input['surface-min'])) value="{{ $input['surface-min'] }}" @else value="0" @endif> m2
			juqu'à <input class="text-input-ad-result" type="text" name="surface-max" @if (isset($input['surface-max'])) value="{{ $input['surface-max'] }}" @else placeholder="Surface max" @endif> m2
			<div class="separation-result-box-ad-result"></div>
			<input class="btn filter-change-box-ad-result result-filter-ad-result" type="submit" name="surface" value="Voir les 448 annonces">
		{{-- </form> --}}
	</div>
	<div class="filter-box-ad-result place-box-ad-result">
		<p class="filter-title-box-ad-result">Où souhaitez-vous vivre ?</p>
		<ul class="nav navbar-nav filter-change-box-ad-result">
		    <li>
				<div class="form-group">
					<label for="localisation">Saisissez une ville, un quartier...</label>
					<input type="text" class="form-control" id="localisation" value="{{ $inputs['localisation'] }}" name="localisation">
				</div>
		    </li>
		    <li>
		    	<div class="form-group">
		  			<input class="btn filter-change-box-ad-result result-filter-ad-result" type="submit" value="Rechercher">
			  	</div>
		    </li>
	  	</ul>
	</div>
	<div class="filter-box-ad-result budget-box-ad-result">
		<p class="filter-title-box-ad-result">Quel est votre budget ?</p>
		{{-- <form action=""> --}}
			De <input class"text-input-ad-result" type="text" name="budgetMin" value="0"> €
			juqu'à <input class"text-input-ad-result" type="text" name="budgetMax" value="{{ $inputs["budgetMax"] }}" placeholder="Budget max"> €
			<div class="separation-result-box-ad-result"></div>
		  	<input class="btn filter-change-box-ad-result result-filter-ad-result" type="submit" value="Rechercher">
		{{-- </form> --}}
	</div>
	<div class="filter-box-ad-result more-box-ad-result">
		<p class="filter-title-box-ad-result">Surface du terrain</p>
		<ul class="nav navbar-nav filter-change-box-ad-result">
		    <li>À venir...</li>
	  	</ul>
	</div>
</form>