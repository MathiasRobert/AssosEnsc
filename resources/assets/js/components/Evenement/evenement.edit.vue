<template>
    <div class="col-md-12">
    <div class="alert alert-danger">
        <ul>
        <!-- @foreach ($errors->all() as $error) -->
            <li>{{ $error }}</li>
        <!-- @endforeach -->
        </ul>
    </div>
        <div class="card">
            <form id="TypeValidation" class="form-horizontal" method="post" enctype="multipart/form-data">
                <!-- {!! csrf_field() !!}
                {{ method_field('PUT') }} -->
                <div class="card-header" data-background-color="purple">
                    <h4 class="card-title">Editer un évènement</h4>
                </div>
                <div class="card-content">
                    <div class="row">
                        <div class="col-sm-12 text-center">
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
                    </div>
                    <div class="row">
                        <label class="col-sm-2 label-on-left">Titre</label>
                        <div class="col-sm-7">
                            <div class="form-group label-floating is-empty">
                                <label class="control-label"></label>
                                <input class="form-control" type="text" name="titre" value="{{ evenement.titre }}" required>
                                <span class="material-input"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 label-on-left">Lieu</label>
                        <div class="col-sm-7">
                            <div class="form-group label-floating is-empty">
                                <label class="control-label"></label>
                                <input class="form-control" type="text" name="lieu" value="{{ evenement.lieu }}" required>
                                <span class="material-input"></span></div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 label-on-left">Catégorie</label>
                        <div class="col-lg-5 col-md-6 col-sm-3">
                            <div class="btn-group bootstrap-select">
                                <select name="categorie_id" class="selectpicker" data-style="btn btn-primary btn-round"
                                        title="">
                                        <option v-for="categorie in categories" v-bind:key="categorie.id" v-bind:value="categorie.id">{{ categorie.nom }}</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 label-on-left">Date de début</label>
                        <div class="col-sm-2">
                            <div class="form-group label-floating is-empty">
                                <label class="control-label"></label>
                                <input name="dateDeb" type="text" class="form-control datetimepicker" value="{{ evenement.dateDeb }}">
                                <span class="material-input"></span></div>
                        </div>
                        <label class="col-sm-2 label-on-left">Date de fin</label>
                        <div class="col-sm-2">
                            <div class="form-group label-floating is-empty">
                                <label class="control-label"></label>
                                <input name="dateFin" type="text" class="form-control datetimepicker" value="{{ evenement.dateFin }}">
                                <span class="material-input"></span></div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 label-on-left">Prix</label>
                        <div class="col-sm-7">
                            <div class="form-group label-floating is-empty">
                                <label class="control-label"></label>
                                <input class="form-control" type="number" name="prix" v-model="evenement.prix" required>
                                <span class="material-input"></span></div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 label-on-left">Tarifs</label>
                        <div class="col-sm-7">
                            <div class="form-group label-floating is-empty">
                                <label class="control-label"></label>
                                <textarea class="form-control" name="tarifs" rows="2" cols="50" v-model="evenement.tarifs"></textarea>
                                <span class="material-input"></span></div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 label-on-left">Description</label>
                        <div class="col-sm-7">
                            <div class="form-group label-floating is-empty">
                                <label class="control-label"></label>
                                <textarea class="form-control" name="description" rows="6" cols="50">evenement.description</textarea>
                                <span class="material-input"></span></div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <button type="submit" class="btn btn-success btn-fill"><i class="material-icons">edit</i> Sauvegarder</button>
                </div>
            </form>
        </div>
    </div>
</template>

<script>

import evenementService from './evenement.services.js';

export default {

  data () {
    return {
      evenement: {},
      categories: [],
      categorieSelected:{}
    }
  },

  methods: {
    addEvenement(evenementToDelete,indexEvenement){
        
        evenementService.add(data)
            .then(function(data){
                // vm.evenements.splice(indexEvenement, 1);
            })
            .catch(function(data){
                console.log(data);
                $.notify({
                    icon: "danger",
                    message: "Erreur : article non créé"
                },{
                    type: "danger",
                    timer: 2000,
                    placement: {
                        from: 'top',
                        align: 'right'
                    }
                });
          })
    }
  },

  events: {
  },

  updated: function() {
    //    categories:function(){
            console.log(this.categories);
            $(".selectpicker").selectpicker();
        // }
  },
  beforeUpdate: function() {
    //    categories:function(){
            console.log(this.categories);
            $(".selectpicker").selectpicker();
        // }
  },
  created: function() {
    //    categories:function(){
            console.log(this.categories);
            $(".selectpicker").selectpicker();
        // }
  },

  route: {
    data ({ to }) {
    //   console.log(this);
      var vm = this;
      evenementService.show(to.params.id).then(function(response) {
          vm.evenement = response.body;
          vm.$set('evenement',response.body);
          evenementService.getAllCategoriesEvenement()
            .then(function(response) {
                
                // $('#formNewArticle .fileinput').fileinput('clear');
                // vm.categories = response.body;
                vm.$set('categories',response.body);
                // console.log(vm);
                // console.log(vm.categories);

                for (var i = 0; i < vm.categories.length; i++) {
                    if(vm.categories[i].id == vm.evenement.categorie_id){
                        vm.categorieSelected = vm.categories[i];
                    }
                    
                }
                // $(".selectpicker").selectpicker();
                    // categories : response.body
                
            });

          
      });

      

    

    }
  }
}
</script>

<style lang="scss">
  #evenementAdminTable
      .img-evenement
          img{
              max-width: 100px;
          }
      .content-evenement
          p{
              white-space: nowrap;
              text-overflow: ellipsis;
              overflow: hidden;
              max-width: 200px;
          }
</style>

    