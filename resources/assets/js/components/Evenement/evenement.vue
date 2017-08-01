<template>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-icon" data-background-color="purple">
                <i class="material-icons">assignment</i>
            </div>
            <div class="card-content">
                <h4 class="card-title">Gestion des évènements</h4>
                <div class="toolbar">
                    <!--        Here you can write extra buttons/actions for the toolbar              -->
                </div>
                <div class="material-datatables">
                    <div id="datatables_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                        <div class="row">
                            <div class="col-sm-12">
                                <table id="datatables"
                                       class="table table-striped table-no-bordered table-hover dataTable dtr-inline">
                                    <thead>
                                    <tr>
                                        <th class="disabled-sorting">Affiche</th>
                                        <th class="sorting">Titre</th>
                                        <th class="sorting">Categorie</th>
                                        <th class="sorting">Lieu</th>
                                        <th class="sorting">Prix</th>
                                        <th class="sorting">Date</th>
                                        <th class="sorting">Dernière modifs</th>
                                        <th class="disabled-sorting text-right sorting">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <!-- @foreach($evenements as $evenement) -->
                                        <tr>
                                            <td><img class="img img-responsive" src=" $evenement->affiche "/></td>
                                            <td> $evenement->titre </td>
                                            <td> $evenement->categorie->nom </td>
                                            <td> $evenement->lieu </td>
                                            <td> $evenement->prix </td>
                                            <td> $evenement->dateDeb </td>
                                            <td> $evenement->updated_at </td>
                                            <td class="text-right">
                                                <a href="#" class="btn btn-simple btn-info btn-icon like"><i
                                                            class="material-icons">edit</i></a>
                                                <a href="#" class="btn btn-simple btn-danger btn-icon remove"><i
                                                            class="material-icons">close</i></a>
                                            </td>
                                        </tr>
                                    <!-- @endforeach -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end content-->
        </div>
        <!--  end card  -->
    </div>
    <!-- end col-md-12 -->
</div>
</template>

<script>

import evenementService from './evenement.services.js';

export default {

  data () {
    return {
      evenements: [],
    }
  },

  methods: {
  },

  events: {
  },

  watch: {
  },

  route: {
    data ({ to }) {
      return evenementService.getAll().then(function(response) {
          return {
            evenements : response.body
          }
      });
    }
  }
}
</script>

<style lang="stylus">
  #articleAdminTable
      .img-article
          img{
              max-width: 100px;
          }
      .content-article
          p{
              white-space: nowrap;
              text-overflow: ellipsis;
              overflow: hidden;
              max-width: 200px;
          }
</style>