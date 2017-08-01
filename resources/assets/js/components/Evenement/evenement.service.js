import Vue from 'vue';

export default {
  getAll () {
    return Vue.http.get('/api/admin/evenements');
  },
  // getAllCategoriesArticle () {
  //   return Vue.http.get('/api/admin/getAllCategoriesArticle');
  // },
  // postArticle (data) {
  //   return Vue.http.post('/api/admin/articles', data);
  // }
}
