<template>
  <div class="col-lg-8">
    <article-component v-for="article in articles" :article="article" :key="article.id"></article-component>
    <div class="row">
      <div class="col-lg-12">
        <nav class="blog-pagination justify-content-center d-flex">
          <button @click="previousPage()" class="btn btn-danger" :style="{display: shown}">Previous</button>
          <button @click="nextPage()" class="btn btn-primary" :style="{display: disabled}">Next</button>
        </nav>
      </div>
    </div>
  </div>
</template>

<script>
import ArticleComponent from "./ArticleComponent";
import axios from "axios";

export default {
  name: "ArticlePaginationComponent",
  data(){
    return {
      articles: [],
      currentPage: 1,
      numberOfPages: 0,
      shown: 'none',
      disabled: 'block'
    }
  },
  components:{
    ArticleComponent
  },
  watch:{
    currentPage: function (val){
      this.shown = val <= 1 ? 'none': 'block';
      this.disabled = this.numberOfPages == val ? 'none': 'block';
    }
  },
  methods:{
    getPostsPerPage: function (){
      axios.get('/get-posts/'+this.currentPage).then(response=>{
        if(response.data){
          this.articles = response.data['data'];
          this.numberOfPages = response.data['number_of_pages']
        }
      }).catch(error => {
        console.log(error);
      })
    },
    nextPage: function (){
      if(this.numberOfPages > this.currentPage){
        this.currentPage++;
        this.getPostsPerPage();
      }
    },
    previousPage: function (){
      this.currentPage--;
      this.getPostsPerPage();
    }
  },
  mounted() {
    this.getPostsPerPage();
  }
}
</script>

<style scoped>

</style>