<template>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header card-header-text" data-background-color="purple">
                    <!-- <i class="material-icons">event_note</i> -->
                    <h4 class="card-title">Evenement n° {{evenement.id}} - {{evenement.titre}}</h4>
                </div>
                <form id="formEditArticle" class="form-horizontal" v-on:submit.prevent="updateEvenement">
                    <input name="_method" type="hidden" value="PUT"> 
                    <div class="card-content">
                        <div class="row">
                            <div class="col-md-6 text-center">
                                <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                    <div class="fileinput-new thumbnail">
                                        <img v-bind:src="evenement.affiche" alt="...">
                                    </div>
                                    <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                    <div>
                                        <span class="btn btn-primary btn-round btn-file">
                                            <span class="fileinput-new">Selectionner une affiche</span>
                                            <span class="fileinput-exists">Changer</span>
                                            <input type="file" name="affiche">
                                        </span>
                                        <a href="#pablo" class="btn btn-danger btn-round fileinput-exists"
                                           data-dismiss="fileinput"><i class="fa fa-times"></i> Supprimer</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">Titre</label>
                                    <input input class="form-control" type="text" name="titre" v-model="evenement.titre" required>
                                </div>
                            </div>
                             <div class="col-md-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">Lieu</label>
                                    <input class="form-control" type="text" name="lieu" v-model="evenement.lieu" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">Date de début</label>
                                    <input id="dtPickerBegin" name="dateDeb" type="text" class="form-control datetimepicker" v-model="evenement.dateDeb">
                                    </div>
                            </div>
                            <!-- <label class="col-sm-2 label-on-left"></label> -->
                            <div class="col-md-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">Date de fin</label>
                                    <input id="dtPickerEnd" name="dateFin" type="text" class="form-control datetimepicker" v-model="evenement.dateFin">
                                    </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group label-floating">
                                    <label class="control-label">Prix</label>
                                    <input class="form-control" type="number" name="prix" v-model="evenement.prix" required>
                                </div>
                            </div>
                            <div id="categorieControl" class="col-md-3">
                                <div class="form-group label-floating">
                                    <label id="categorieLabel" class="control-label">Catégorie</label>
                                    <select name="categorie_id" class="selectpicker form-control" data-style="btn btn-primary btn-round"
                                            title="">
                                            <option v-for="categorie in categories" v-bind:key="categorie.id" v-bind:value="categorie.id">{{ categorie.nom }}</option>
                                    </select>
                                </div>
                            </div>
                             <div class="col-md-12">
                                <div class="form-group label-floating">
                                    <label class="control-label">Tarifs</label>
                                    <input class="form-control" name="tarifs" v-model="evenement.tarifs">
                                    </div>
                            </div>
                            
                        </div>
                        <div class="row">
                            <!-- <div class="col-md-12">
                                <div class="form-group label-floating">
                                    <label class="control-label">Titre</label>
                                    <input input class="form-control" type="text" name="titre" v-model="evenement.titre" required>
                                </div>
                            </div> -->
                        </div>
                        <div class="row">
                           <!--  <div class="col-md-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">Lieu</label>
                                    <input class="form-control" type="text" name="lieu" v-model="evenement.lieu" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">Prix</label>
                                    <input class="form-control" type="number" name="prix" v-model="evenement.prix" required>
                                    
                                </div>
                            </div> -->
                        </div>
                        <div class="row">
                            <!-- <div id="categorieControl" class="col-md-6">
                                <div class="form-group label-floating">
                                    <label id="categorieLabel" class="control-label">Catégorie</label>
                                    <select name="categorie_id" class="selectpicker form-control" data-style="btn btn-primary btn-round"
                                            title="">
                                            <option v-for="categorie in categories" v-bind:key="categorie.id" v-bind:value="categorie.id">{{ categorie.nom }}</option>
                                    </select>
                                </div>
                            </div> -->
                           
                        </div>
                        <div class="row">
                            <!-- <label class="col-sm-2 label-on-left"></label> -->
                            
                        </div>
                        <div class="row">
                            <!-- <label class="col-sm-2 label-on-left">Description</label> -->
                            <div class="col-md-12">
                                <div class="form-group label-floating">
                                    <label class="control-label">Description</label>
                                    <textarea class="form-control" name="description" rows="6" cols="50">{{evenement.description}}</textarea>
                                    </div>
                            </div>
                        </div>
                        <div class="row">
                            <!-- <label class="col-sm-2 label-on-left">Description</label> -->
                           <!--  <div class="col-md-12">
                                <div class="form-group label-floating">
                                    <label class="control-label">Description</label>
                                    <textarea class="form-control" name="description" rows="6" cols="50">evenement.description</textarea>
                                    </div>
                            </div> -->
                            <!-- <div class="quill-editor" 
                               v-model="content"
                               v-quill:myQuillEditor="editorOption">
                            </div> -->
                        </div>

                      

                    </div>
                    <div class="card-footer text-right">
                        <button type="submit" class="btn btn-success btn-fill"><i class="material-icons">edit</i> Sauvegarder</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header card-header-text" data-background-color="purple">
                    <h4 class="card-title">Commentaires</h4>
                </div>
                <div class="">
                    <ul class="js-comments-list comments-list">
                        <li class="comment-container cfix user-comment" v-for="comment in comments">
                            <a target="_blank" href="https://www.behance.net/seb90grado8237" class="rf-avatar js-mini-profile" data-id="44063465">
                              <img v-bind:src="comment.user.avatar" class="rf-avatar__image js-avatar__image">
                            </a>
                              <div class="comment-text-container left relative">
                                <div class="comment-user-date-wrap ui-corner cfix">
                                  <a class="user-name-link bold js-mini-profile" data-id="44063465" href="https://www.behance.net/seb90grado8237">{{comment.user.name}}</a>
                                  <span class="comment-date js-format-timestamp" data-timestamp="1501963744">{{comment.updated_at}}</span>
                                </div>
                                <div class="comment-text-wrap"><div class="comment-text">{{comment.texte}}</div></div>
                              </div>
                              <div class="comment-actions">
                                <a href="#pablo" class="btn btn-danger btn-simple comment-likes">
                                    <i class="material-icons">favorite_border</i> 243
                                </a>
                              </div>
                        </li>
                    </ul>
                </div>
                <!-- <div class="media-area">
                    <div class="media" v-for="comment in comments">
                        <a class="pull-left" href="#pablo">
                            <div class="avatar">
                                <img class="media-object" v-bind:src="comment.user.avatar" alt="...">
                            </div>
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading">{{comment.user.name}}<small>· {{comment.updated_at}}</small></h4>
                            <h6 class="text-muted"></h6>
                            <p>{{comment.texte}}</p>
                            <div class="media-footer">
                                <a href="#pablo" class="btn btn-danger btn-simple pull-right">
                                    <i class="material-icons">favorite</i> 243
                                </a>
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
</template>

<script>

import evenementService from './evenement.services.js';


export default {

  data () {
    return {
      evenement: {},
      comments:{},
      categories: [],
      categorieSelected:{}
    }
  },
  
  created: function() {
    var vm = this;
    vm.getEvenement().then(function(){
        vm.getComments();
    });
  
  },

  methods: {
    updateEvenement(){
        var form = document.getElementById('formEditArticle');
        var dataForm = new FormData(form);
        console.log(dataForm,form);
        evenementService.update(this.evenement.id,dataForm)
            .then(function(data){
                $.notify({
                    message: "Modifications enregistrée"
                    },
                    {
                        type: "success",
                        timer: 2000,
                        placement: {
                            from: 'top',
                            align: 'right'
                         }
                });
            })
            .catch(function(data){
               
          })
    },
    getEvenement(idEvenement){
         var vm = this;
         return evenementService.show(this.$route.params.id).then(function(response) {
              vm.evenement = response.body;
              evenementService.getAllCategoriesEvenement()
                .then(function(response) {
                    vm.categories = response.body;
                    for (var i = 0; i < vm.categories.length; i++) {
                        if(vm.categories[i].id == vm.evenement.categorie_id){
                            vm.categorieSelected = vm.categories[i];
                        }
                    }
                });
          });
    },
    getComments(){
        var vm = this;
        return evenementService.getCommentsEvenement(this.evenement.id).then(function(response){
            vm.comments = response.body;
        });
    }
  },

  events: {
  },

  updated: function() {
    $(".selectpicker").selectpicker('refresh').selectpicker('render');
    $('.selectpicker').selectpicker('val', this.categorieSelected.id);

    $("#dtPickerBegin.datetimepicker").datetimepicker({date:new Date(this.evenement.dateDeb),format:'YYYY-MM-DD hh:mm:ss'});
    $("#dtPickerEnd.datetimepicker").datetimepicker({date:new Date(this.evenement.dateFin),format:'YYYY-MM-DD hh:mm:ss'});
  }

}
</script>

<style lang="scss">

 #categorieLabel{
        top: -28px;
        left: 0;
        font-size: 11px;
        line-height: 1.07143;
    }

#categorieControl{
    .form-group{
        .bootstrap-select.btn-group{
            margin-top: 0px;
            margin-bottom: 5px;
            background-image: none;
        }
    }
    
    span.material-input{
        display: none;
    }
}

.img-thumbnail {
    border-radius: 16px
}

.img-raised {
    box-shadow: 0 5px 15px -8px rgba(0,0,0,.24),0 8px 10px -5px rgba(0,0,0,.2)
}

.media .avatar {
    margin: 0 15px 0 auto;
}

.media .avatar img {
    width: 64px;
    height: 64px;
    border-radius: 50%;
    box-shadow: 0 6px 10px 0 rgba(0,0,0,.14),0 1px 18px 0 rgba(0,0,0,.12),0 3px 5px -1px rgba(0,0,0,.2);
    /*width: 100%*/
}

.media .media-heading small {
    font-family: Roboto,Helvetica,Arial,sans-serif
}

.media .media-body {
    padding-right: 10px
}

.media .media-body .media .media-body {
    padding-right: 0
}

.media .media-footer .btn {
    margin-bottom: 20px
}

.media .media-footer:after {
    display: table;
    content: " ";
    clear: both
}

.media p {
    font-size: 16px;
    line-height: 1.6em
}

.media-left,.media>.pull-left {
    padding: 10px
}

.info {
    max-width: 360px;
    margin: 0 auto;
    padding: 70px 0 30px
}

.info .icon>i {
    font-size: 4.4em
}

.info .info-title {
    color: #3C4858;
    margin: 30px 0 15px
}

.info p {
    color: #999
}

.info-horizontal .icon {
    float: left;
    margin-top: 24px;
    margin-right: 10px
}

.info-horizontal .icon>i {
    font-size: 2.6em
}

.card-title, .footer-big h4, .footer-big h5, .footer-brand, .info-title, .media .media-heading, .title {
    font-weight: 700;
    /*font-family: "Roboto Slab","Times New Roman",serif;*/
}


@media (max-width: 991px) {
    .card .form-horizontal .form-group {
         margin-top: 20px; 
    }
}

/*------------------------Behance---------------------------*/

.comment-container {
    margin-bottom: 25px;
    overflow: hidden; 
    position: relative; 
}

.rf-avatar {
    float: left;
    height: 50px;
    margin-right: 20px;
    min-height: 50px;
    min-width: 50px;
    width: 50px;
    img{
        border-radius: 50%;
    }
}

.comment-text-container {
    width: calc(100% - 70px);

}
.comment-text-container {
    float: left;
    position: relative;
}

.comment-container .user-name-link {
    color: #3c3c3c;
    font-size: 14px;
    font-weight: bold;
}

.comment-date {
    color: #a9a9a9;
    font-size: 11px;
}

.comments-list{
    padding: 0 20px;
    margin-top: 20px;
}

.comment-date::before {
    content: '\2022';
    margin: 0 4px 0 2px;
}

.comment-actions{
    float: left;
    width: calc(100% - 70px);
    margin-left: 70px;
    .comment-likes{
        /*margin-left: 70px;*/
        padding: 0px;
        margin: 0px;
    }
}

</style>