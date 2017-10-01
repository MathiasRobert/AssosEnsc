@extends('layouts.front')


@section('header')

    <div class="page-header page-header-small">
        <div class="page-header-image" data-parallax="true" style="background-image: url('/images/bdeCouv.jpg');">
        </div>
        <div class="content-center">
            <h1 class="title">Bureau des Élèves</h1>
            <div class="text-center">
                <a href="#pablo" class="btn btn-primary btn-icon  btn-round">
                    <i class="fa fa-facebook-square"></i>
                </a>
            </div>
        </div>
    </div>

@endsection

@section('content')

        <div class="section">
            <div class="container">
                <div class="title">
                    <h4>Navigation Tabs</h4>
                </div>
                <div class="row">
                    <div class="col-md-10 offset-md-1 col-xl-6 offset-xl-0">
                        <p class="category">Tabs with Icons on Card</p>
                        <!-- Nav tabs -->
                        <div class="card">
                            <ul class="nav nav-tabs justify-content-center" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#home" role="tab" aria-expanded="true">
                                        <i class="now-ui-icons objects_umbrella-13"></i> Home
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#profile" role="tab" aria-expanded="false">
                                        <i class="now-ui-icons shopping_cart-simple"></i> Profile
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#messages" role="tab" aria-expanded="false">
                                        <i class="now-ui-icons shopping_shop"></i> Messages
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#settings" role="tab" aria-expanded="false">
                                        <i class="now-ui-icons ui-2_settings-90"></i> Settings
                                    </a>
                                </li>
                            </ul>
                            <div class="card-block">
                                <!-- Tab panes -->
                                <div class="tab-content text-center">
                                    <div class="tab-pane active" id="home" role="tabpanel" aria-expanded="true">
                                        <p>I think that’s a responsibility that I have, to push possibilities, to show people, this is the level that things could be at. So when you get something that has the name Kanye West on it, it’s supposed to be pushing the furthest possibilities. I will be the leader of a company that ends up being worth billions of dollars, because I got the answers. I understand culture. I am the nucleus.</p>
                                    </div>
                                    <div class="tab-pane" id="profile" role="tabpanel" aria-expanded="false">
                                        <p> I will be the leader of a company that ends up being worth billions of dollars, because I got the answers. I understand culture. I am the nucleus. I think that’s a responsibility that I have, to push possibilities, to show people, this is the level that things could be at. I think that’s a responsibility that I have, to push possibilities, to show people, this is the level that things could be at. </p>
                                    </div>
                                    <div class="tab-pane" id="messages" role="tabpanel" aria-expanded="false">
                                        <p>I think that’s a responsibility that I have, to push possibilities, to show people, this is the level that things could be at. So when you get something that has the name Kanye West on it, it’s supposed to be pushing the furthest possibilities. I will be the leader of a company that ends up being worth billions of dollars, because I got the answers. I understand culture. I am the nucleus.</p>
                                    </div>
                                    <div class="tab-pane" id="settings" role="tabpanel" aria-expanded="false">
                                        <p>
                                            "I will be the leader of a company that ends up being worth billions of dollars, because I got the answers. I understand culture. I am the nucleus. I think that’s a responsibility that I have, to push possibilities, to show people, this is the level that things could be at."
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-10 offset-md-1 col-xl-6 offset-xl-0">
                        <p class="category">Tabs with Background on Card</p>
                        <!-- Tabs with Background on Card -->
                        <div class="card">
                            <ul class="nav nav-tabs nav-tabs-neutral justify-content-center" role="tablist" data-background-color="orange">
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#home1" role="tab" aria-expanded="false">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#profile1" role="tab" aria-expanded="true">Profile</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#messages1" role="tab" aria-expanded="false">Messages</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#settings1" role="tab" aria-expanded="false">Settings</a>
                                </li>
                            </ul>
                            <div class="card-block">
                                <!-- Tab panes -->
                                <div class="tab-content text-center">
                                    <div class="tab-pane" id="home1" role="tabpanel" aria-expanded="false">
                                        <p>I think that’s a responsibility that I have, to push possibilities, to show people, this is the level that things could be at. So when you get something that has the name Kanye West on it, it’s supposed to be pushing the furthest possibilities. I will be the leader of a company that ends up being worth billions of dollars, because I got the answers. I understand culture. I am the nucleus.</p>
                                    </div>
                                    <div class="tab-pane active" id="profile1" role="tabpanel" aria-expanded="true">
                                        <p> I will be the leader of a company that ends up being worth billions of dollars, because I got the answers. I understand culture. I am the nucleus. I think that’s a responsibility that I have, to push possibilities, to show people, this is the level that things could be at. I think that’s a responsibility that I have, to push possibilities, to show people, this is the level that things could be at. </p>
                                    </div>
                                    <div class="tab-pane" id="messages1" role="tabpanel" aria-expanded="false">
                                        <p>I think that’s a responsibility that I have, to push possibilities, to show people, this is the level that things could be at. So when you get something that has the name Kanye West on it, it’s supposed to be pushing the furthest possibilities. I will be the leader of a company that ends up being worth billions of dollars, because I got the answers. I understand culture. I am the nucleus.</p>
                                    </div>
                                    <div class="tab-pane" id="settings1" role="tabpanel" aria-expanded="false">
                                        <p>
                                            "I will be the leader of a company that ends up being worth billions of dollars, because I got the answers. I understand culture. I am the nucleus. I think that’s a responsibility that I have, to push possibilities, to show people, this is the level that things could be at."
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Tabs on plain Card -->
                    </div>
                </div>
            </div>
        </div>
        <footer class="footer">
            <div class="container">
                @if(Auth::guest())
                    <a href="{{ route('logintest') }}" class="btn">Connexion test</a>
                @endif
                <div class="copyright">
                    &copy;
                    <script>
                        document.write(new Date().getFullYear())
                    </script>, Réalisé par
                    <a href="http://www.linkedin.com/in/mathias-robert-7a5589148" target="_blank">Mathias Robert</a>.
                </div>
            </div>
        </footer>

@endsection

