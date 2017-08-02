@extends('layouts.front')

@section('css')
    @include('includes.couleurPerso')
@endsection

@section('header')

    <!-- Quand il y aura les images des assos il faudra mettre la div en dessous -->
    <!--<div class="page-header header-filter header-small" data-parallax="true" style="background-image: url('{{ $association->logo }}'); transform: translate3d(0px, 0px, 0px);"> -->
    <div class="page-header header-filter header-small" data-parallax="true" style="background-image: url('/images/beer.jpg'); transform: translate3d(0px, 0px, 0px);">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 text-center">
                    <h1 class="title">{{ $evenement->titre }}</h1>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('content')

    <div class="main main-raised main-product">
        <div class="row">
            <div class="col-md-6 col-sm-6">
                <img class="img-responsive" src="{{ $evenement->affiche }}">
            </div>
            <div class="col-md-6 col-sm-6">
                <h2 class="title"> {{ $evenement->titre }} </h2>
                <h3 class="main-price">{{ $evenement->prix }} €</h3>
                <div id="acordeon">
                    <div class="panel-group" id="accordion">
                        <div class="panel panel-border panel-default">
                            <div class="panel-heading" role="tab" id="headingOne">
                                <a role="button" data-toggle="collapse" href="#collapseOne" aria-expanded="true">
                                    <h4 class="panel-title">
                                        Description
                                        <i class="material-icons">keyboard_arrow_down</i>
                                    </h4>
                                </a>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse in">
                                <div class="panel-body">
                                    {{ $evenement->description }}
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-border panel-default">
                            <div class="panel-heading" role="tab" id="headingOne">
                                <a role="button" data-toggle="collapse" href="#collapseTwo" aria-expanded="true">
                                    <h4 class="panel-title">
                                        Tarifs
                                        <i class="material-icons">keyboard_arrow_down</i>
                                    </h4>
                                </a>
                            </div>
                            <div id="collapseTwo" class="panel-collapse collapse in">
                                <div class="panel-body">
                                    {{ $evenement->tarifs }}
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-border panel-default">
                            <div class="panel-heading" role="tab" id="headingOne">
                                <a role="button" data-toggle="collapse" href="#collapseThree" aria-expanded="true">
                                    <h4 class="panel-title">
                                        Infos pratiques
                                        <i class="material-icons">keyboard_arrow_down</i>
                                    </h4>
                                </a>
                            </div>
                            <div id="collapseThree" class="panel-collapse collapse in">
                                <div class="panel-body">
                                    <ul>
                                        <li>Lieu : {{ $evenement->lieu }}</li>
                                        <li>Notch lapels, functioning buttoned cuffs, two front flap pockets, single vent, internal pocket</li>
                                        <li>Two button fastening</li>
                                        <li>84% cotton, 14% nylon, 2% elastane</li>
                                        <li>Dry clean</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>
                </div><!--  end acordeon -->

                <div class="row text-right">
                    <button class="btn btn-success btn-inscription btn-round" data-id="{{ $evenement->id }}" data-token="{{ csrf_token() }}">Participer &nbsp;<i class="material-icons">done</i></button>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script type="text/javascript">
        // Evenement déclenché lors du clic sur le bouton participer ou ne plus participer
        $(".btn-inscription").click(function(){
            var click = $(this);
            var token = $(this).data("token");
            var id = $(this).data("id");

            if($(this).hasClass('btn-success')) {
                // Envoie de requêtes AJAX pour mettre à jour la base de données
                $.ajax({
                    url: "/api/inscription",
                    headers: { 'csrftoken' : '{{ csrf_token() }}' },
                    type: 'POST',
                    data: {
                        "user_id": '{{ Auth::user()->id }}',
                        "evenement_id": id
                    },
                    success: function () {
                        click.removeClass('btn-success');
                        click.addClass('btn-danger');
                        click.html('Ne plus participer &nbsp;<i class="material-icons">clear</i>');
//                        $.notify({
//                            icon: "done",
//                            message: "Inscription bien enregistrée !"
//
//                        },{
//                            type: "success",
//                            timer: 2000,
//                            placement: {
//                                from: 'top',
//                                align: 'right'
//                            }
//                        });
                    },
                    fail: function () {
                        $.notify({
                            icon: "danger",
                            message: "Erreur : l'inscription n'a pas été prise en compte !"

                        },{
                            type: "danger",
                            timer: 2000,
                            placement: {
                                from: 'top',
                                align: 'right'
                            }
                        });
                    }
                });
            } else {
                // Envoie de requêtes AJAX pour mettre à jour la base de données
                $.ajax({
                    url: "/api/inscription",
                    headers: { 'csrftoken' : '{{ csrf_token() }}' },
                    type: 'POST',
                    data: {
                        "user_id": '{{ Auth::user()->id }}',
                        "evenement_id": id
                    },
                    success: function () {
                        click.removeClass('btn-danger');
                        click.addClass('btn-success');
                        click.html('Participer &nbsp;<i class="material-icons">done</i>');
                        e.preventDefault();
                        $.notify({
                            icon: "done",
                            message: "Désinscription bien enregistrée !"

                        },{
                            type: "success",
                            timer: 2000,
                            placement: {
                                from: 'top',
                                align: 'right'
                            }
                        });
                    },
                    fail: function () {
                        $.notify({
                            icon: "danger",
                            message: "Erreur : la désinscription n'a pas été prise en compte !"

                        },{
                            type: "danger",
                            timer: 2000,
                            placement: {
                                from: 'top',
                                align: 'right'
                            }
                        });
                    }
                });
            }

        });
    </script>
@endsection