<template>
  <div>
    <!--================ Hero sm Banner start =================-->
    <section class="mb-30px">
      <div class="container">
        <div class="hero-banner hero-banner--sm">
          <div class="hero-banner__content">
            <h1>{{ categoryName }} Page</h1>
            <nav aria-label="breadcrumb" class="banner-breadcrumb">
              <ol class="breadcrumb">
<!--                {{ url('posts') }}-->
                <li class="breadcrumb-item"><a href="">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ categoryName }} Page</li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </section>
    <!--================ Hero sm Banner end =================-->

    <!--================ Start Blog Post Area =================-->
    <section class="blog-post-area section-margin">
      <div class="container">
        <div class="row">
          <div class="col-lg-8">
            <div class="row">
              <div class="col-md-6" v-for="article in articles">
                <div class="single-recent-blog-post card-view">
                  <div class="thumb">
                    <img class="card-img rounded-0" :src="article.image_path" alt="">
                    <ul class="thumb-info">
                      <li><a href="#"><i class="ti-user"></i>{{ article.username }}</a></li>
                      <li><a href="#"><i class="ti-themify-favicon"></i>{{ article.comments_count }} {{ article.comments_count == 1?'Comment':'Comments' }}</a></li>
                    </ul>
                  </div>
                  <div class="details mt-20">
                    <a href="blog-single.html">
                      <h3>{{ article.title }}</h3>
                    </a>
                    <p>{{ article.content }}</p>
                    <!-- {{ url('article',{'id':article.id}) }}= -->
                    <a class="button" href="">Read More <i class="ti-arrow-right"></i></a>
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-lg-12">
                <nav class="blog-pagination justify-content-center d-flex">
                  <button @click="previousPage()" class="btn btn-danger" :style="{display: shown}">Previous</button>
                  <button @click="nextPage()" class="btn btn-primary" :style="{display: disabled}">Next</button>
                </nav>
              </div>
            </div>
          </div>

          <sidebar-component></sidebar-component>
        </div>

      </div>
    </section>
    <!--================ End Blog Post Area =================-->
  </div>
</template>

<script>
import SidebarComponent from "./SidebarComponent";
import axios from "axios";
export default {
  name: "CategoryComponent",
  components: {SidebarComponent},
  data(){
    return{
      categoryName: "",
      articles: [],
      currentPage: 1,
      numberOfPages: 0,
      shown: 'none',
      disabled: 'block'
    }
  },
  methods:{
    getArticles: function(categoryID){
      axios.get('/get-category/'+categoryID+'/'+this.currentPage).then(response=>{
        if(response.data){
          this.categoryName = response.data['category_name'];
          this.articles = response.data['articles'];
          this.numberOfPages  = response.data['number_of_pages'];
        }
      }).catch(error => {
        console.log(error);
      })
    },
    nextPage: function (){
      if(this.numberOfPages > this.currentPage){
        this.currentPage++;
        this.getArticles(this.$route.params['id']);
      }
    },
    previousPage: function (){
      this.currentPage--;
      this.getArticles(this.$route.params['id']);
    }
  },
  mounted() {
    this.getArticles(this.$route.params['id'])
  },
  watch: {
    $route(to, from) {
      this.currentPage = 1;
      this.getArticles(to.params.id);
    },
    currentPage: function (val) {
      if(this.numberOfPages > 1){
        this.shown = val <= 1 ? 'none' : 'block';
        this.disabled = this.numberOfPages == val ? 'none' : 'block';
      }
      else{
        this.shown    = 'none';
        this.disabled = 'none';
      }
    }
  }
}
</script>

<style scoped>

</style>