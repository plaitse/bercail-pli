@extends('layout')

@section('content')
    <div class="row action-menu">
        <div class="center-block block-action-menu">

            <h2 class="title-action-menu">Chercher, trouver</h2>
            <p class="subtitle-action-menu">1 229 927 annonces immobilières</p>

            <!-- Nav tabs -->
            <ul class="nav nav-tabs nav-tabs-action-menu" role="tablist">
                <li role="presentation" class="active">
                    <a href="#buy" aria-controls="buy" role="tab" data-toggle="tab">Acheter</a>
                </li>
                <li role="presentation">
                    <a href="#rent" aria-controls="rent" role="tab" data-toggle="tab">Louer</a>
                </li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content panel panel-default panel-action-menu">
                <div role="tabpanel" class="tab-pane active" id="buy">
                    <form method="GET" id="search-form" action="/results">
                        <input type="hidden" name="transaction" value="selling">
                        <div class="row first-options-action-menu">
                            <div class="col-md-6">
                                <input type="text" class="form-control" placeholder="Saisissez une ville, un quartier..." 
                                aria-describedby="basic-addon1" name="localisation">
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" placeholder="Budget max" aria-describedby="basic-addon1" name="budgetMax">
                            </div>
                        </div>
                        <div class="row second-options-action-menu">
                            <div class="col-md-3">
                                <label class="checkbox-inline"><input type="checkbox" value="maison" name="type">Maison</label>
                            </div>
                            <div class="col-md-3">
                                <label class="checkbox-inline"><input type="checkbox" value="appartement" name="type">Appartement</label>
                            </div>
                            <div class="col-md-3">
                                <span class="btn btn-default"><i class="fa fa-plus" aria-hidden="true"></i></span>
                            </div>
                        </div>
                        <div class="row third-options-action-menu">
                            <div class="col-md-6">
                                <span>Plus de critères <i class="fa fa-chevron-right chevron-critera-action-menu" aria-hidden="true"></i></span>
                            </div>
                        </div>
                        <div class="row search-action-menu">
                            <div class="col-md-6">
                                <input class="btn btn-default btn-block btnValidate" type="submit" name="Rechercher">
                            </div>
                        </div>
                    </form>
                </div>
                <div role="tabpanel" class="tab-pane" id="rent">
                    <form method="GET" id="search-form" action="/results">
                        <input type="hidden" name="transaction" value="rent">
                        <div class="row first-options-action-menu">
                            <div class="col-md-6">
                                <input type="text" class="form-control" placeholder="Saisissez une ville, un quartier..." 
                                aria-describedby="basic-addon1" name="localisation">
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" placeholder="Budget max" aria-describedby="basic-addon1" name="budgetMax">
                            </div>
                        </div>
                        <div class="row second-options-action-menu">
                            <div class="col-md-4">
                                <label class="checkbox-inline"><input type="checkbox" value="maison" name="type">Maison</label>
                            </div>
                            <div class="col-md-4">
                                <label class="checkbox-inline"><input type="checkbox" value="appartement" name="type">Appartement</label>
                            </div>
                            <div class="col-md-4">
                                <span class="btn btn-default"><i class="fa fa-plus" aria-hidden="true"></i></span>
                            </div>
                        </div>
                        <div class="row third-options-action-menu">
                            <div class="col-md-6">
                                <span>Plus de critères <i class="fa fa-chevron-right chevron-critera-action-menu" aria-hidden="true"></i></span>
                            </div>
                        </div>
                        <div class="row search-action-menu">
                            <div class="col-md-6">
                                <input class="btn btn-default btn-block btnValidate" type="submit" name="Rechercher">
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
@stop
