@extends('layouts.front')

@section('header')
    <div class="page-header page-header-small">
        <div class="page-header-image" data-parallax="true"
             style="background-image: url('{{ $article->image }}'); transform: translate3d(0px, 0px, 0px);">
        </div>
        <div class="content-center">
            <div class="row">
                <div class="col-md-8 offset-md-2 text-center">
                    <h2 class="title">{!! $article->titre !!}</h2>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')

    <div class="section">
        <div class="section">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 offset-md-2">
                        {{ $article->texte }}
                    </div>
                </div>
            </div>
        </div>

        <div class="section section-comments">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 offset-md-2">
                        <hr>
                        <div class="media-area">
                            <h3 class="title text-center">3 Commentaires</h3>
                            @foreach($commentaires as $c)
                                <div class="media">
                                    <a class="pull-left" href="#pablo">
                                        <div class="avatar">
                                            <img class="media-object img-raised" src="../assets/img/james.jpg"
                                                 alt="...">
                                        </div>
                                    </a>
                                    <div class="media-body">
                                        <h5 class="media-heading">Tina Andrew
                                            <small class="text-muted">· 7 minutes ago</small>
                                        </h5>
                                        <p>Chance too good. God level bars. I'm so proud of @LifeOfDesiigner #1 song in
                                            the country. Panda! Don't be scared of the truth because we need to restart
                                            the human foundation in truth I stand with the most humility. We are so
                                            blessed!</p>
                                        <p>All praises and blessings to the families of people who never gave up on
                                            dreams. Don't forget, You're Awesome!</p>
                                        <div class="media-footer">
                                            <a href="#pablo" class="btn btn-primary btn-neutral pull-right"
                                               rel="tooltip" title="" data-original-title="Reply to Comment">
                                                <i class="now-ui-icons ui-1_send"></i> Reply
                                            </a>
                                            <a href="#pablo" class="btn btn-danger btn-neutral pull-right">
                                                <i class="now-ui-icons ui-2_favourite-28"></i> 243
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        @if(Auth::user())
                            <h3 class="title text-center">Poster votre commentaire</h3>
                            <div class="media media-post">
                                <a class="pull-left author" href="#pablo">
                                    <div class="avatar">
                                        <img class="media-object img-raised" alt="64x64"
                                             src="{{ Auth::user()->avatar }}">
                                    </div>
                                </a>
                                <div class="media-body">
                                    <textarea class="form-control" rows="4"></textarea>
                                    <div class="media-footer">
                                        <a href="#pablo" class="btn btn-primary pull-right">
                                            <i class="now-ui-icons ui-1_send"></i> Poster
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!-- end media-post -->
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

