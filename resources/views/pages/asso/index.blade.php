@extends('layouts.asso')

@section('content')
    <div class="card card-nav-tabs">
        <div class="header">
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
        <div class="content">
            <div class="tab-content">

            @include('pages.asso.articles');
            @include('pages.asso.evenements');
            {{--@include('pages.asso.informations');--}}
                {{--@include('pages.asso.contact');--}}

            </div>
        </div>
    </div>
@endsection