@extends('layout')

@section('content')
    <div id="loader-div">
        <p>Recherche en cours...</p>
       <div class="loader"></div>
    </div>
    <div class="row action-menu">
        <div class="center-block block-action-menu">

            <h2 class="title-action-menu">Chercher, trouver</h2>
            <p class="subtitle-action-menu">1 229 927 annonces immobilières</p>

            <!-- Nav tabs -->
            <ul class="nav nav-tabs nav-tabs-action-menu" role="tablist">
                <li role="presentation" class="buy-tab-action-menu active">
                    <a href="#buy" aria-controls="buy" role="tab" data-toggle="tab">Acheter</a>
                </li>
                <li role="presentation" class="rent-tab-action-menu">
                    <a href="#rent" aria-controls="rent" role="tab" data-toggle="tab">Louer</a>
                </li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content panel panel-default panel-action-menu">
                <div role="tabpanel" class="tab-pane active" id="buy">
                    <form method="post" id="search-form" action="/results">
                        <input type="hidden" name="transaction" value="sell">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="row first-options-action-menu">
                            <div class="col-md-6">
                                <select name="localisation[]" required class="form-control zip-select2" multiple="multiple">
                                    {{-- <option value="3620194" selected="selected">select2/select2</option> --}}
                                </select>
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" placeholder="Budget max" aria-describedby="basic-addon1" name="budgetMax" required>
                            </div>
                        </div>
                        <div class="row second-options-action-menu">
                            <div class="col-md-3">
                                <label class="checkbox-inline"><input type="checkbox" value="maison" name="type[]" >Maison</label>
                            </div>
                            <div class="col-md-3">
                                <label class="checkbox-inline"><input type="checkbox" value="appartement" name="type[]">Apartement</label>
                            </div>
                            <div class="col-md-3">
                                <span class="btn btn-default btn-critera-action-menu"><i class="fa fa-plus" aria-hidden="true"></i></span>
                            </div>
                        </div>
                        <div class="row third-options-action-menu">
                            <div class="col-md-6">
                                <span>Plus de critères <i class="fa fa-chevron-right chevron-critera-action-menu" aria-hidden="true"></i></span>
                            </div>
                        </div>
                        <div class="row search-action-menu">
                            <div class="col-md-6">
                                <input class="btn btn-default btn-block submit-btn-action-menu" type="submit" name="Rechercher" style="width: 130px;">
                            </div>
                        </div>
                    </form>
                </div>
                <div role="tabpanel" class="tab-pane" id="rent">
                    <form method="post" id="search-form" action="/results">
                        <input type="hidden" name="transaction" value="rent">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="row first-options-action-menu">
                            <div class="col-md-6">
                                <select name="localisation[]" required class="form-control zip-select2" multiple="multiple">
                                    {{-- <option value="3620194" selected="selected">select2/select2</option> --}}
                                </select>
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" placeholder="Budget max" aria-describedby="basic-addon1" name="budgetMax" required>
                            </div>
                        </div>
                        <div class="row second-options-action-menu">
                            <div class="col-md-3">
                                <label class="checkbox-inline"><input type="checkbox" value="maison" name="type[]" required>Maison</label>
                            </div>
                            <div class="col-md-3">
                                <label class="checkbox-inline"><input type="checkbox" value="appartement" name="type[]" required>Appartement</label>

                            </div>
                            <div class="col-md-3">
                                <span class="btn btn-default btn-critera-action-menu"><i class="fa fa-plus" aria-hidden="true"></i></span>
                            </div>
                        </div>
                        <div class="row third-options-action-menu">
                            <div class="col-md-6">
                                <span>Plus de critères <i class="fa fa-chevron-right chevron-critera-action-menu" aria-hidden="true"></i></span>
                            </div>
                        </div>
                        <div class="row search-action-menu">
                            <div class="col-md-6">
                                <input class="btn btn-default btn-block submit-btn-action-menu" type="submit" name="Rechercher" style="width: 130px;">
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
@stop
