<!-- Partie "Informations" -->
<div class="tab-pane" id="infos">
    <div class="infos-asso">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 text-center">
                <h2 class="title">L'équipe</h2>
                <h5 class="description">This is the paragraph where you can write more details about your team. Keep you user engaged by providing meaningful information.</h5>
            </div>
        </div>

        <div class="row">
            <?php
            include('requetes/requeteInfosAsso.php');

            foreach ($membresAsso as $m) {
                echo '
                                    <div class="col-md-3">
                                        <div class="card card-profile card-plain">
                                            <div class="card-avatar">
                                            <a href="#">
                                                    <img class="img" src="'.$m->equi_photo.'">
                                                </a>
                                            </div>

                                            <div class="content">
                                                <h4 class="card-title">'.$m->equi_prenom.' '.$m->equi_nom.'</h4>
                                                <h6 class="category text-muted">'.$m->equi_poste.'</h6>

                                                <p class="card-description">'.$m->equi_description.'</p>
                                                <div class="footer">';
                if(isset($m->equi_lien_facebook))
                    echo '<a href="'.$m->equi_lien_facebook.'" class="btn btn-just-icon btn-simple btn-facebook"><i class="fa fa-facebook-square"></i></a>';
                echo '<a class="btn btn-just-icon btn-simple btn-google" data-toggle="popover" data-placement="top" data-content="'.$m->equi_mail.'"><i class="fa fa-envelope"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>';
            }
            ?>
        </div>
    </div>
</div>
