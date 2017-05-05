<form method="post" id="search-form" action="/results">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
<!-- 	<div class="tri">
		<p class="filter-sort-ad-result">
			Trier par :
		    <select name="tri" id="tri">
				<option value="date_asc">Date asc</option>
				<option value="date_desc">Date dsc</option>
				<option value="price_asc">Prix asc</option>
				<option value="price_desc">Prix dsc</option>
				<option value="surface_asc">Surf asc</option>
				<option value="surface_desc">Surf dsc</option>
		    </select>
		</p>
	</div> -->
	<div class="filter-box-ad-result project-box-ad-result">
		<p class="filter-title-box-ad-result">Quel est votre projet ?</p>
			<ul class="nav navbar-nav filter-change-box-ad-result">
			    <li><a href="#">
			    	<input class="radiobtn-ad-result" type="radio" name="transaction" value="sell" @if ($inputs['transaction'] == "sell") checked @endif>Acheter</a></li>
			    <li><a href="#">
			    	<input class="radiobtn-ad-result" type="radio" name="transaction" value="rent" @if ($inputs['transaction'] == "rent") checked @endif>Louer</a></li>
		  	</ul>
		  	<div class="separation-result-box-ad-result"></div>
		  	<input class="btn filter-change-box-ad-result result-filter-ad-result" type="submit" value="Rechercher">
	</div>
	<div class="filter-box-ad-result type-box-ad-result">
			<p class="filter-title-box-ad-result">Quel type de bien cherchez-vous ?</p>
			<ul class="nav navbar-nav filter-change-box-ad-result">
			    <li><a href="#">
			    	<input class="radiobtn-ad-result" type="checkbox" name="type[]" value="appartement" @if (in_array("appartement", $inputs['type'])) checked @endif>Appartement</a>
		    	</li>
			    <li><a href="#">
			    	<input class="radiobtn-ad-result" type="checkbox" name="type[]" value="maison" @if (in_array("maison", $inputs['type'])) checked @endif>Maison et Villa</a>
		    	</li>
		  	</ul>
		  	<div class="separation-result-box-ad-result"></div>
		  	<input class="btn filter-change-box-ad-result result-filter-ad-result" type="submit" value="Rechercher">
	</div>
	<div class="filter-box-ad-result rooms-box-ad-result">
		<p class="filter-title-box-ad-result">De combien de pièces ?</p>
			<div class="row">
				<div class="col-md-12">
					<p class="rooms-criteria-ad-result">Nombre de pièces</p>
					<ul class="nav navbar-nav filter-change-box-ad-result">
					    <li><a href="#">
					    	<input class="radiobtn-ad-result" type="checkbox" name="room[]" value="1" @if (isset($inputs['room']) && in_array("1", $inputs['room'])) checked @endif>1</a></li>
					    <li><a href="#">
					    	<input class="radiobtn-ad-result" type="checkbox" name="room[]" value="2" @if (isset($inputs['room']) && in_array("2", $inputs['room'])) checked @endif>2</a></li>
					    <li><a href="#">
					    	<input class="radiobtn-ad-result" type="checkbox" name="room[]" value="3" @if (isset($inputs['room']) && in_array("3", $inputs['room'])) checked @endif>3</a></li>
					    <li><a href="#">
					    	<input class="radiobtn-ad-result" type="checkbox" name="room[]" value="4" @if (isset($inputs['room']) && in_array("4", $inputs['room'])) checked @endif>4</a></li>
					    <li><a href="#">
					    	<input class="radiobtn-ad-result" type="checkbox" name="room[]" value="5" @if (isset($inputs['room']) && in_array("5+", $inputs['room'])) checked @endif>5 et plus</a></li>
				  	</ul>
				</div>
			 </div>
		  	<input class="btn filter-change-box-ad-result result-filter-ad-result" type="submit" value="Rechercher">
	</div>
	<div class="filter-box-ad-result surface-box-ad-result">
		<p class="filter-title-box-ad-result">De quelle surface ?</p>
			De minimum <input class="text-input-ad-result" type="text" name="surface-min" @if (isset($inputs['surface-min'])) value="{{ $inputs['surface-min'] }}" @else value="0" @endif> m2
			juqu'à <input class="text-input-ad-result" type="text" name="surface-max" @if (isset($inputs['surface-max'])) value="{{ $inputs['surface-max'] }}" @else placeholder="Surface max" @endif> m2
			<div class="separation-result-box-ad-result"></div>
			<input class="btn filter-change-box-ad-result result-filter-ad-result" type="submit" name="surface" value="Rechercher">
	</div>
	<div class="filter-box-ad-result place-box-ad-result">
		<p class="filter-title-box-ad-result">Où souhaitez-vous vivre ?</p>
		<ul class="nav navbar-nav filter-change-box-ad-result">
		    <li>
				<div class="form-group">
					<label for="localisation">Saisissez une ville, un quartier...</label>
                    <select name="localisation[]" required class="form-control zip-select2" multiple="multiple">
                    	@if (count($inputs['localisation']) > 0) 
                    		@foreach ($inputs['localisation'] as $zipId)
                    			<option value="{{ $zipId }}" selected="selected">ZIP</option>
                    		@endforeach 
                    	@endif
                    </select>
				</div>
		    </li>
		    <div class="separation-result-box-ad-result"></div>
		    <li>
		    	<div class="form-group">
		  			<input class="btn filter-change-box-ad-result result-filter-ad-result" type="submit" value="Rechercher">
			  	</div>
		    </li>
	  	</ul>
	</div>
	<div class="filter-box-ad-result budget-box-ad-result">
		<p class="filter-title-box-ad-result">Quel est votre budget ?</p>
			De <input class"text-input-ad-result" type="text" name="budgetMin" value="0"> €
			juqu'à <input class"text-input-ad-result" type="text" name="budgetMax" value="{{ $inputs["budgetMax"] }}" placeholder="Budget max"> €
			<div class="separation-result-box-ad-result"></div>
		  	<input class="btn filter-change-box-ad-result result-filter-ad-result" type="submit" value="Rechercher">
	</div>
	<div class="filter-box-ad-result more-box-ad-result">
		<p class="filter-title-box-ad-result">Surface du terrain</p>
		<ul class="nav navbar-nav filter-change-box-ad-result">
		    <li>À venir...</li>
	  	</ul>
	</div>
</form>