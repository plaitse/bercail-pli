@extends('layout')

@section('content')
    <div class="row action-menu">
        <div class="center-block block-action-menu">

            <h2 class="title-action-menu">Chercher, trouver</h2>
            <p class="subtitle-action-menu">1 229 927 annonces immobilières</p>

            <!-- Nav tabs -->
            <ul class="nav nav-tabs nav-tabs-action-menu" role="tablist">
                <li role="presentation">
                    <a href="#buy" aria-controls="buy" role="tab" data-toggle="tab">Acheter</a>
                </li>
                <li role="presentation" class="active">
                    <a href="#rent" aria-controls="rent" role="tab" data-toggle="tab">Louer</a>
                </li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content panel panel-default panel-action-menu">
                <div role="tabpanel" class="tab-pane" id="buy">
                    <form>
                        <div class="row first-options-action-menu">
                            <div class="col-md-6">
                                <input type="text" class="form-control" placeholder="Saisissez une ville, un quartier..." 
                                aria-describedby="basic-addon1">
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" placeholder="Budget max" aria-describedby="basic-addon1">
                            </div>
                        </div>
                        <div class="row second-options-action-menu">
                            <div class="col-md-3">
                                <label class="checkbox-inline"><input type="checkbox" value="">Maison</label>
                            </div>
                            <div class="col-md-3">
                                <label class="checkbox-inline"><input type="checkbox" value="">Appartement</label>
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
                                <a class="btn btn-default" type="submit">Rechercher</a>
                            </div>
                        </div>
                    </form>
                </div>
                <div role="tabpanel" class="tab-pane active" id="rent">
                    <form>
                        <div class="row first-options-action-menu">
                            <div class="col-md-6">
                                <input type="text" class="form-control" placeholder="Saisissez une ville, un quartier..." 
                                aria-describedby="basic-addon1">
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" placeholder="Budget max" aria-describedby="basic-addon1">
                            </div>
                        </div>
                        <div class="row second-options-action-menu">
                            <div class="col-md-4">
                                <label class="checkbox-inline"><input type="checkbox" value="">Maison</label>
                            </div>
                            <div class="col-md-4">
                                <label class="checkbox-inline"><input type="checkbox" value="">Appartement</label>
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
                                <a class="btn btn-default" type="submit">Rechercher</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
@stop
