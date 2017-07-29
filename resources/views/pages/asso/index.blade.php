@extends('layouts.front')

@section('css')
    @include('includes.couleurPerso')
@endsection

@section('header')

<!-- Quand il y aura les images des assos il faudra mettre la div en dessous -->
<!-- <div class="page-header header-filter header-small" data-parallax="true" style="background-image: url('{{asset($association->logo)}}'); transform: translate3d(0px, 0px, 0px);"> -->
<div class="page-header header-filter header-small" data-parallax="true" style="background-image: url('/images/beer.jpg'); transform: translate3d(0px, 0px, 0px);">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 text-center">
                <h1 class="title">{{ $association->nom }}</h1>
            </div>
        </div>
    </div>
</div>

@endsection

@section('content')
 <div class="main main-raised">
    <div class="card card-nav-tabs card-plain">
        <div class="header" style="margin-left: 20px;margin-right: 20px;">
            <div class="nav-tabs-navigation">
                <div class="nav-tabs-wrapper">
                    <ul class="nav nav-tabs" data-tabs="tabs">
                        <li class="active">
                            <a href="#articles" data-toggle="tab">
                                <i class="material-icons">subject</i>
                                Articles
                            </a>
                        </li>
                        <li>
                            <a href="#evenements" data-toggle="tab">
                                <i class="material-icons">event_note</i>
                                Événements
                            </a>
                        </li>
                        <li class="pull-right">
                            <a href="#infos" data-toggle="tab">
                                <i class="material-icons">supervisor_account</i>
                                Informations
                            </a>

                        </li>
                        <li class="pull-right">
                            <a href="#contact" data-toggle="tab">
                                <i class="material-icons">email</i>
                                Contact
                            </a>

                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="card-content">
            <div class="tab-content">

                @include('pages.asso.articles')
                @include('pages.asso.evenements')
                {{--@include('pages.asso.informations');--}}
                @include('pages.asso.contact')

            </div>
        </div>
    </div>
</div>
  
@endsection