@extends('layouts.front')


@section('content')

    <div class="section section-eve">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <img class="img-responsive" src="{!! $evenement->affiche !!}">
                </div>
                <div class="col-md-6 col-sm-6">
                    <h2 class="title"> 
                        {!! $evenement->titre !!} 
                        <span class="pull-right">
                            <a href="{!! $evenement->lien_facebook !!}" class="btn btn-icon btn-facebook btn-round">
                                <i class="fa fa-facebook"> </i>
                            </a>
                        </span>
                        <br>
                        <small>{!! $evenement->dateDeb !!}</small>
                    </h2>
                    <!-- <h3 class="date-eve">{!! $evenement->dateDeb !!}</h3> -->
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

                </div>
            </div>


            <!-- <div id="app-3">
              <p v-if="seen">Comments</p>
            </div> -->

            <section id="comments-section">
              
              <div class="cmt-body" v-if="user">
                    <div class="form-group is-empty"><textarea class="form-control" placeholder="Commenter cet évenement..." rows="6" v-model="commentText"></textarea><span class="material-input"></span></div>
                    <div class="cmt-footer text-right">
                         <button class="btn btn-primary" v-on:click="postComment">Commenter</button>
                    </div>
              </div> 

              <!-- <h5 class="title text-center">Commentaires</h5> -->
              <h5 class="title text-center">@{{comments.length}} Commentaires</h5>

                <ul class="comments-list">
                    <li class="comment-container cfix user-comment" v-for="comment in comments">
                        <a target="_blank" class="rf-avatar js-mini-profile" data-id="44063465">
                          <img v-bind:src="comment.user.avatar" class="rf-avatar__image js-avatar__image">
                        </a>
                          <div class="comment-text-container left relative">
                            <div class="comment-user-date-wrap ui-corner cfix">
                              <a class="user-name-link bold js-mini-profile" data-id="44063465" href="https://www.behance.net/seb90grado8237">@{{comment.user.name}}</a>
                              <span class="comment-date js-format-timestamp" data-timestamp="1501963744">@{{comment.updated_at}}</span>
                            </div>
                            <div class="comment-text-wrap"><div class="comment-text" v-html="comment.texte">@{{comment.texte}}</div></div>
                          </div>
                          <div class="comment-actions">
                            <button class="btn btn-primary btn-simple btn-round">
                                <i class="fa fa-reply"></i> Répondre
                            </button>
                          </div>
                          <div class="comment-actions comments-to-comment">
                           <ul>
                              <li class="comment-container cfix user-comment" v-for="commentToComment in comment.comments">
                                  <a target="_blank" href="https://www.behance.net/seb90grado8237" class="rf-avatar js-mini-profile" data-id="44063465">
                                    <img v-bind:src="commentToComment.user.avatar" class="rf-avatar__image js-avatar__image">
                                  </a>
                                    <div class="comment-text-container left relative">
                                      <div class="comment-user-date-wrap ui-corner cfix">
                                        <a class="user-name-link bold js-mini-profile" data-id="44063465" href="https://www.behance.net/seb90grado8237">@{{commentToComment.user.name}}</a>
                                        <span class="comment-date js-format-timestamp" data-timestamp="1501963744">@{{commentToComment.updated_at}}</span>
                                      </div>
                                      <div class="comment-text-wrap"><div class="comment-text" v-html="commentToComment.texte">@{{commentToComment.texte}}</div></div>
                                    </div>
                                    <div class="comment-actions">
                                       <button class="btn btn-primary btn-simple btn-round">
                                            <i class="fa fa-reply"></i> Répondre
                                        </button>
                                    </div>
                              </li>
                          </ul>
                          </div>
                    </li>
                </ul>
            </section>

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

    <script>
    
    // var app3 = new Vue({
    //   el: '#app-3',
    //   data: {
    //     seen: true
    //   }
    // });

    Vue.config.devtools = true;
    Vue.config.debug = true;


    var userService = {
        currentUser : null,

      getCurrentUser () {

        var vm = this;
        return Vue.http.get('/api/user').then(function(data) {
            if(data.body != ""){
                vm.currentUser = data.body;
                console.log(data);
            }
        });
      }
    };

    var evenementService = {

        getAll () {
            return Vue.http.get('/api/admin/evenements');
        },
        getEvenements () {
            return Vue.http.get('/api/admin/evenements');
        },
        delete (id) {
            return Vue.http.delete('/api/admin/evenements/'+id);
        },
        show (id) {
            return Vue.http.get('/api/admin/evenements/'+id);
        },
        getAllCategoriesEvenement(){
            return Vue.http.get('/api/admin/getAllCategoriesEvenement/');
        },
        update(id,data){
            return Vue.http.post('/api/admin/evenements/'+id,data);
        },
        getCommentsEvenement(id){
            return Vue.http.get('/api/admin/evenements/'+id+'/comments');
        },
        postCommentEvenement(data){
            return Vue.http.post('/api/comments',data);
        }

    };

    var app = new Vue({

        el:"#comments-section",
        
        data:{
          evenement: {},
          comments:[],
          commentText:'',
          user:null
        },
  
        created: function() {
            var vm = this;
            vm.getEvenement().then(function(){
                vm.getComments();
            });

            userService.getCurrentUser().then(function(){
               vm.user = userService.currentUser;
            });

        },

      methods: {
        getEvenement(idEvenement){
             var vm = this;
             return evenementService.show({{$evenement->id}}).then(function(response) {
                  vm.evenement = response.body;
                  vm.evenement.monthBegin = moment(vm.evenement.dateDeb).format('MMMM');
                  vm.evenement.dayBegin = moment(vm.evenement.dateDeb).format('D');
                  vm.evenement.monthEnd = moment(vm.evenement.dateFin).format('MMMM');
                  vm.evenement.dayEnd = moment(vm.evenement.dateFin).format('D');
              });
        },
        getComments(){
            var vm = this;
            return evenementService.getCommentsEvenement(vm.evenement.id).then(function(response){
                vm.comments = response.body;
            });
        },
        postComment(){
              var vm = this;

              if(userService.currentUser == null){
                 $('#modalNotAuthenticated').modal('show');
              }
              else
              {
                var data = {
                  'texte' : vm.commentText,
                  'commentable_id'   : vm.evenement.id,
                  'commentable_type' : vm.evenement.commentable_type,
                };
                return evenementService.postCommentEvenement(data).then(function(response){
                    vm.commentText = '';
                    vm.getComments();
                });
              }

              
            }
        }
    });

    </script>

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


@section('css')

<style type="text/css">

#comments-section{
  max-width: 800px;
  margin: 0 auto;
}



.event-post {
  width: 900px;
  max-width: 100%;
  margin: 0 auto;
  background: white;
  /*padding: 20px 0px;*/
  margin-top: 30px;
}
.event-post .header {
  padding: 20px;
  text-align: center;
  position: relative;
  /*min-height: 100px;*/
}
.event-post .header .title {
  /*max-width: 350px;*/
  font-size: 27px;
  font-weight: 600;
  line-height: 1.4;
  /*margin: 20px;*/
  text-transform: uppercase;
  display: inline-block;
  /*  .line{
      border-bottom: 2px solid $mainColor;
    }*/
}
.event-post .header .time {
  position: absolute;
  /*right: 25px;*/
  right: 25px;
  margin-left: 10px;
  margin-right: 10px;
  display: block;
  font-size: 17px;
  font-weight: 600;
  font-style: italic;
  text-align: center;
  margin-bottom: 10px;
}
.event-post .header .time.right {
  left: initial;
  right: 25px;
}
.event-post .header .time .month {
  color: #e96656;
  text-transform: uppercase;
}
.event-post .event-img-container img {
  width: 100%;
}
.event-post .event-content {
  margin: 35px auto 0 auto;
  width: 70%;
}
.event-post .event-description {
  margin-top: 20px;
  text-align: justify;
}

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
}
.rf-avatar img {
  border-radius: 50%;
  width: 100%;
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

.comments-list {
  padding: 0 20px;
  margin-top: 20px;
}

.comment-date::before {
  content: '\2022';
  margin: 0 4px 0 2px;
}

.comment-actions {
  float: left;
  width: calc(100% - 70px);
  margin-left: 70px;
}
.comment-actions .comment-likes {
  padding: 0px;
  /*margin: 0px;*/
}

.comments-to-comment {
  float: left;
  width: calc(100% - 70px);
  margin-left: 70px;
}
.comments-to-comment .comment-container {
  margin-bottom: 5px;
}
.comments-to-comment .comment-likes {
  padding: 0px;
  /*margin: 0px;*/
}

.btn-icon {
  background: none;
  color: #e96656;
  vertical-align: top;
  margin-right: 10px;
}

.event-img-container {
  position: relative;
}
.event-img-container .event-actions {
  /*margin-top: 10px;*/
  position: absolute;
  bottom: 17px;
  background: white;
  padding: 20px;
  right: 0px;
  border-radius: 4px 0px 0px 4px;
}

</style>
@endsection