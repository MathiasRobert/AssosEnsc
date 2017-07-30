import Vue from 'vue';
import Router from 'vue-router';
import Resource from 'vue-resource';
import App from './components/App.vue';
import DashboardView from './components/Dashboard/dashboard.vue';
import ArticleView from './components/Article/article.vue';
import EvenementView from './components/Evenement/evenement.vue';


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
  '/back/article': {
    name: 'article',
    component: ArticleView, 

  },
  '/back/evenement': {
    name: 'evenement',
    component: EvenementView, 

  },
});

// Redirect 404 pages
router.redirect({
  '*': '/back/dashboard'
});


router.start(App, '#app');
