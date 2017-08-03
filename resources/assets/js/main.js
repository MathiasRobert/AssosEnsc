import Vue from 'vue';
import Router from 'vue-router';
import Resource from 'vue-resource';
import App from './components/App.vue';
import DashboardView from './components/Dashboard/dashboard.vue';
import ArticleView from './components/Article/article.index.vue';
import ArticleNewView from './components/Article/article.new.vue';
import EvenementIndexView from './components/Evenement/evenement.index.vue';
import EvenementEditView from './components/Evenement/evenement.edit.vue';

Vue.config.debug = true;

document.addEventListener("DOMContentLoaded", function(event) {
  Vue.use(Router);
  Vue.use(Resource);

  var router = new Router({
    history: true
  });

  router.map({
  '/back/dashboard': {
    name: 'dashboard',
    component: DashboardView, 
  },
  '/back/article/': {
    name: 'article',
    component: ArticleView,
  },
  '/back/article/new': {
    name: 'newArticle',
    component: ArticleNewView,
  },
  '/back/evenement': {
    name: 'evenement',
    component: EvenementIndexView, 
  },
  '/back/evenement/edit/:id': {
    name: 'editEvenement',
    component: EvenementEditView, 
  },
  });

  // Redirect 404 pages
  router.redirect({
  '*': '/back/dashboard'
  });


  router.start(App, '#app');

});

