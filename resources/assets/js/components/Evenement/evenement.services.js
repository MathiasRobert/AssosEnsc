import Vue from 'vue';

export default {
  getAll () {
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
  }
  // postArticle (data) {
  //   return Vue.http.post('/api/admin/articles', data);
  // }
}
