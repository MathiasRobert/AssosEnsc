import Vue from 'vue';

export default {
  getAll () {
    return Vue.http.get('/api/admin/evenements');
  },
  delete (id) {
    return Vue.http.delete('/api/admin/evenements/'+id);
  },
  // postArticle (data) {
  //   return Vue.http.post('/api/admin/articles', data);
  // }
}
