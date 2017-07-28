<!-- Partie "Contact" -->
<div class="tab-pane" id="contact">
    <div class="content">
        <div class="row">
            <div class="col-md-6">
                <div class="card card-contact card-raised">
                    <form role="form" id="contact-form" method="post">
                        <div class="header header-raised text-center">
                            <h4 class="card-title">Par Email</h4>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group label-floating <?php if(!isset($_SESSION['NOM_USER'])) echo "is-empty";?>">
                                    <label class="control-label">Prénom Nom</label>
                                    <input type="text" name="name" class="form-control" value="<?php if(isset($_SESSION['NOM_USER'])) echo $_SESSION['NOM_USER'];?>">
                                    <span class="material-input"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group label-floating <?php if(!isset($_SESSION['EMAIL_USER'])) echo "is-empty";?>">
                                    <label class="control-label">Email</label>
                                    <input type="email" name="email" class="form-control" value="<?php if(isset($_SESSION['EMAIL_USER'])) echo $_SESSION['EMAIL_USER'];?>">
                                    <span class="material-input"></span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group label-floating is-empty">
                            <label class="control-label">Votre message</label>
                            <textarea name="message" class="form-control" id="message" rows="8"></textarea>
                            <span class="material-input"></span>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <button type="submit" class="btn pull-right">Envoyer</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-md-6">
                <iframe width="100%" height="400" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?q=ensc&key=AIzaSyDfrPJouGTqI-bxkH5S7dqrhzHHXfdJOx4" allowfullscreen></iframe>
            </div>
        </div>


    </div>
</div>