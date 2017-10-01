@extends('layouts.front')

@section('css')
@endsection


@section('content')

    <div class="section section-eve">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <img class="img-responsive" src="{!! $evenement->affiche !!}">
                </div>
                <div class="col-md-6 col-sm-6">
                    <h2 class="title"> {!! $evenement->titre !!} </h2>
                    <h5 class="category">{!! $evenement->lieu !!}</h5>
                    <h2 class="main-price">
                        @if ($evenement->prix == 0)
                            Gratuit
                        @else
                            {!! $evenement->prix !!}€
                        @endif
                    </h2>
                    <div id="acordeon" class="accordeon">
                        <div class="card card-plain">
                            <div class="card-header" role="tab" id="headingOne">
                                <h6 class="mb-0">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" class="collapsed">
                                        Description
                                        <i class="now-ui-icons arrows-1_minimal-down"></i>
                                    </a>
                                </h6>
                            </div>
                            <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne">
                                <div class="card-block">
                                    <p>{{ $evenement->description }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--  end acordeon -->
                    <div>
                        <h3 class="date-eve">{!! $evenement->dateDeb !!}
                        <span class="pull-right">
                            <a href="{!! $evenement->lien_facebook !!}" class="btn btn-primary btn-icon  btn-round">
                                <i class="fa fa-facebook-square"></i>
                            </a>
                        </span>
                        </h3>
                    </div>

                </div>
            </div>
        </div>
    </div>


    {{--@if(Auth::check())--}}
        {{--<div class="row text-right">--}}
            {{--@if(!Auth::user()->estInscrit($evenement->id))--}}
                {{--<button class="btn btn-success btn-inscription btn-round" data-id="{{ $evenement->id }}"--}}
                        {{--data-token="{{ csrf_token() }}">Participer &nbsp;<i--}}
                            {{--class="material-icons">done</i>--}}
                {{--</button>--}}
            {{--@else--}}
                {{--<button class="btn btn-danger btn-inscription btn-round" data-id="{{ $evenement->id }}"--}}
                        {{--data-token="{{ csrf_token() }}">Ne plus participer &nbsp;<i--}}
                            {{--class="material-icons">clear</i>--}}
                {{--</button>--}}
            {{--@endif--}}
        {{--</div>--}}
    {{--@endif--}}
    <!-- MODAL PAIEMENT -->
    <div class="modal fade" id="paiementModale">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="card card-signup card-plain">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i
                                    class="material-icons">clear</i></button>

                        <div class="header header-primary text-center">
                            <h4 class="card-title">Log in</h4>
                            <div class="social-line">
                                <a href="#pablo" class="btn btn-just-icon btn-simple">
                                    <i class="fa fa-facebook-square"></i>
                                </a>
                                <a href="#pablo" class="btn btn-just-icon btn-simple">
                                    <i class="fa fa-twitter"></i>
                                </a>
                                <a href="#pablo" class="btn btn-just-icon btn-simple">
                                    <i class="fa fa-google-plus"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="modal-body">
                        <form class="form" method="" action="">
                            <p class="description text-center">Or Be Classical</p>
                            <div class="card-content">

                                <div class="input-group">
								<span class="input-group-addon">
									<i class="material-icons">face</i>
								</span>
                                    <div class="form-group is-empty"><input type="text" class="form-control"
                                                                            placeholder="First Name..."><span
                                                class="material-input"></span></div>
                                </div>

                                <div class="input-group">
								<span class="input-group-addon">
									<i class="material-icons">email</i>
								</span>
                                    <div class="form-group is-empty"><input type="text" class="form-control"
                                                                            placeholder="Email..."><span
                                                class="material-input"></span></div>
                                </div>

                                <div class="input-group">
								<span class="input-group-addon">
									<i class="material-icons">lock_outline</i>
								</span>
                                    <div class="form-group is-empty"><input type="password" placeholder="Password..."
                                                                            class="form-control"><span
                                                class="material-input"></span></div>
                                </div>

                                <!-- If you want to add a checkbox to this form, uncomment this code

                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="optionsCheckboxes" checked>
                                        Subscribe to newsletter
                                    </label>
                                </div> -->
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer text-center">
                        <a href="#pablo" class="btn btn-primary btn-simple btn-wd btn-lg">Get Started</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="paiementModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="card card-signup card-plain">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i
                                    class="material-icons">clear</i></button>
                        <h3 class="modal-title card-title text-center">Payer directement en ligne ?</h3>
                    </div>
                    <div class="modal-footer text-center">
                        <button type="button" class="btn btn-success">Payer</button>
                        <button type="button" class="btn btn-simple" data-dismiss="modal">Remettre à plus tard/Payer à
                            l'ancienne
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @if(Auth::check())
        <script type="text/javascript">
            // Evenement déclenché lors du clic sur le bouton participer ou ne plus participer
            $(".btn-inscription").click(function () {
                var click = $(this);
                var token = $(this).data("token");
                var id = $(this).data("id");

                if ($(this).hasClass('btn-success')) {
                    // Envoie de requêtes AJAX pour mettre à jour la base de données
                    $.ajax({
                        url: "/inscription",
                        method: 'POST',
                        data: {
                            "user_id": '{{ Auth::user()->id }}',
                            "evenement_id": id,
                            "_method": 'POST',
                            "_token": token,
                        },
                        success: function () {
                            click.removeClass('btn-success');
                            click.addClass('btn-danger');
                            click.html('Ne plus participer &nbsp;<i class="material-icons">clear</i>');
                            $('#paiementModal').modal('show');
                        },
                        fail: function () {
                            $.notify({
                                icon: "danger",
                                message: "Erreur : l'inscription n'a pas été prise en compte !"

                            }, {
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
                        url: "/desinscription",
                        method: 'POST',
                        data: {
                            "user_id": '{{ Auth::user()->id }}',
                            "evenement_id": id,
                            "_method": 'POST',
                            "_token": token,
                        },
                        success: function () {
                            click.removeClass('btn-danger');
                            click.addClass('btn-success');
                            click.html('Participer &nbsp;<i class="material-icons">done</i>');
                            $.notify({
                                icon: "done",
                                message: "Désinscription bien enregistrée !"

                            }, {
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

                            }, {
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
    @endif
@endsection