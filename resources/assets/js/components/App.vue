<template>
  
  <div class="wrapper" id="root">
    
    <div class="sidebar" data-active-color="purple" data-background-color="black">

      <div class="logo">
          <a href="#" class="simple-text">
               Bureau des élèves
          </a>
      </div>
      <div class="logo logo-mini">
          <a href="#" class="simple-text">
               BDE
          </a>
      </div>
      <div class="sidebar-wrapper">
          <div class="user">
              <div class="photo">
                  <img src="/images/bde.jpg" />
              </div>
              <div class="info">
                  <a data-toggle="collapse" href="#collapseExample" class="collapsed">
                       $association->email 
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
              <li v-link="{ name: 'dashboard', activeClass: 'active'}">
                  <a>
                      <i class="material-icons">dashboard</i>
                      <p>Dashboard</p>
                  </a>
              </li>
              <li v-link="{ name: 'article', activeClass: 'active'}">
                  <a>
                      <i class="material-icons">image</i>
                      <p>Articles</p>
                  </a>
              </li>
              <li v-link="{ name: 'evenement', activeClass: 'active'}">
                  <a>
                      <i class="material-icons">apps</i>
                      <p>Evenements</p>
                  </a>
              </li>
          </ul>
      </div>
  </div>

  <div class="main-panel">

      <nav class="navbar navbar-transparent navbar-absolute">
        <div class="container-fluid">
            <div class="navbar-minimize">
                <button id="minimizeSidebar" class="btn btn-round btn-white btn-fill btn-just-icon">
                    <i class="material-icons visible-on-sidebar-regular">more_vert</i>
                    <i class="material-icons visible-on-sidebar-mini">view_list</i>
                <div class="ripple-container"></div></button>
            </div>
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">
                Dashboard
                <div class="ripple-container"></div>
                </a>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="#pablo" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="material-icons">dashboard</i>
                            <p class="hidden-lg hidden-md">Dashboard</p>
                        </a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="profile-photo dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            <div class="profile-photo-small">
                                <img id="avatar" class="img-circle img-responsive" src="http://lorempixel.com/600/600/cats/" alt="avatar">
                            </div>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="http://localhost:8000/logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Se déconnecter
                                </a>

                                <form id="logout-form" action="http://localhost:8000/logout" method="POST" style="display: none;"><input type="hidden" name="_token" value="F53ezuUAZ4V8IOmNOAeIbJHCtgMXa74JodDLHLti"></form>
                            </li>
                        </ul>
                </li></ul>
            </div>
        </div>
      </nav>
      <div class="content">
        <main>
          <router-view
            class="view"
            keep-alive
            transition
            transition-mode="out-in">
          </router-view>
        </main>
      </div>
  </div>

  </div>
</template>

<script>

  export default {

    replace :false,

  }

</script>


<style lang="stylus">


</style>

