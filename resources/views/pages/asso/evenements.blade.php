<!-- Partie "Evenments" -->
<div class="tab-pane" id="evenements">
    <div class="col-md-10 col-md-offset-1">
        <!-- Boutons de tri -->
        <ul class="tri nav nav-pills nav-pills-color">
            <li class="active" onclick="tousLesEve()"><a href="#" data-toggle="tab" aria-expanded="true">Tous</a>
            </li>
            <li class="" onclick="eveAVenir('<?php date_default_timezone_set('Europe/Paris'); echo date('Y-m-d h:i:s');?>')"><a href="#" data-toggle="tab" aria-expanded="false">A venir</a>
            </li>
            <li class="" onclick="evePasse('<?php date_default_timezone_set('Europe/Paris'); echo date('Y-m-d h:i:s');?>')"><a href="#" data-toggle="tab" aria-expanded="false">Passé</a>
            </li>
        </ul>
        <ul class="triDate nav nav-pills nav-pills-color">
            <li class="active" onclick="triDateCroissant()"><a href="#" data-toggle="tab" aria-expanded="false">Tri date <i class="material-icons">arrow_downward</i></a>
            </li>
        </ul>
        <div class="table-responsive">
            <table class="table table-evenements">
                <thead>
                <tr>
                    <th class="text-center"></th>
                    <th>Évenement</th>
                    <th class="text-center">Date</th>
                    <th class="text-center">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($evenements as $e)

                    list($annee, $mois, $jour) = explode("-", $e->even_dateDeb);
                    list($heuresD, $minutesD) = explode(":", $e->even_heureDeb);
                    list($heuresF, $minutesF) = explode(":", $e->even_heureFin);
                    <tr data-date="{!! $e->dateDeb !!} {!! $e->heureDeb !!}">
                        <td>
                            <div class="img-container">
                                <img src="{!! $e->affiche !!}" alt="affiche">
                            </div>
                        </td>
                        <td class="td-name">
                            <a href="">{!! $e->titre !!}</a>
                            <br>
                            <small>{!! $e->lieu !!}</small>
                        </td>
                        <td class="td-number">
                            {!! $e->dateDeb !!}
                            <br>
                            <small>{!! $e->dateDeb !!}</small>
                        </td>
                        <td class="td-actions text-right">
                            <div class="btn-group-lg btn-group-vertical">
                                <a href="" role="button" class="btn btn-block">
                                    En savoir plus <i class="material-icons">info</i>
                                </a>';

                    // On recupère la date actuelle
                    date_default_timezone_set('Europe/Paris');
                    $dateActuelle = date('Y-m-d H:i:s');
                    $dateEven = $e->even_dateDeb.' '.$e->even_heureDeb;

                    // On affiche le bouton de participation si l'événement n'est pas dépassé et que l'utilisateur est connecté
                    if(isset($_SESSION['ID_USER']) && $dateEven > $dateActuelle)
                    {
                        $even_id = $e->even_id;
                        include('requetes/requeteVerifInscrit.php');

                        echo '<a id="'.$e->even_id.'" role="button" class="btn-inscription btn ';
                        if($estInscrit)
                            echo 'btn-danger';
                        else
                            echo 'btn-success';
                        echo ' btn-block">';
                        if($estInscrit)
                            echo 'Ne plus participer &nbsp;';
                        else
                            echo 'Participer &nbsp;';
                        echo '<i class="material-icons">';
                        if($estInscrit)
                            echo 'clear';
                        else
                            echo 'done';
                        echo '</i>
                                                        <div class="ripple-container"></div>
                                                    </a>';
                    }
                    echo '</div>
                                                </td>
                                            </tr>';
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>