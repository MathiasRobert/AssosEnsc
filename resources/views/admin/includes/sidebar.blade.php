<div class="sidebar" data-active-color="rose" data-background-color="black">
    <!--
Tip 1: You can change the color of active element of the sidebar using: data-active-color="purple | blue | green | orange | red | rose"
Tip 2: you can also add an image using data-image tag
Tip 3: you can change the color of the sidebar with data-background-color="white | black"
-->
    <div class="logo">
        <a href="#" class="simple-text">
            {{ $association->nom }}
        </a>
    </div>
    <div class="logo logo-mini">
        <a href="#" class="simple-text">
            {{ $association->diminutif }}
        </a>
    </div>
    <div class="sidebar-wrapper">
        <div class="user">
            <div class="photo">
                <img src="{{ $association->logo }}" />
            </div>
            <div class="info">
                <a data-toggle="collapse" href="#collapseExample" class="collapsed">
                    {{ $association->email }}
                    <b class="caret"></b>
                </a>
                <div class="collapse" id="collapseExample">
                    <ul class="nav">
                        <li>
                            <a href="#">Mes informations</a>
                        </li>
                        <li>
                            <a href="#">Mon équipe</a>
                        </li>
                        <li>
                            <a href="#">Paramètres</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <ul class="nav">
            <li class="active">
                <a href="{{ route('admin') }}">
                    <i class="material-icons">dashboard</i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li>
                <a href="{{ route('adminArticles') }}">
                    <i class="material-icons">image</i>
                    <p>Articles</p>
                </a>
            </li>
            <li>
                <a href="{{ route('adminEvenements') }}">
                    <i class="material-icons">apps</i>
                    <p>Evenements</p>
                </a>
            </li>
        </ul>
    </div>
</div>