<template>
  <!-- Start Blog Post Siddebar -->
  <div class="col-lg-4 sidebar-widgets">
    <div class="widget-wrap">

      <div class="alert alert-info" v-show="successSubsription.success">
        {{ successSubsription.message }}
      </div>

      <div v-html="subscriptionForm" v-on:submit.prevent="onSubmit"></div>

      <div class="single-sidebar-widget post-category-widget" v-if="categories.length > 0">
        <h4 class="single-sidebar-widget__title">Category</h4>
        <ul class="cat-list mt-20">

          <li v-for="category in categories">
            <a :href="category.category_url" class="d-flex justify-content-between">
              <p>{{ category.name }}</p>
              <p>{{ category.articles_count }}</p>
            </a>
          </li>

        </ul>
      </div>

      <div class="single-sidebar-widget popular-post-widget" v-if="popularArticles.length > 0">
        <h4 class="single-sidebar-widget__title">Popular Post</h4>
        <div class="popular-post-list">

          <div class="single-post-list" v-for="(popularArticle, index) in popularArticles" :key="index">
            <div class="thumb">
              <img class="card-img rounded-0" :src="'/img/'+popularArticle.image_path" alt="">
              <ul class="thumb-info">
                <li><a :href="popularArticle.article_url">{{ popularArticle.username }}</a></li>
                <li><a :href="popularArticle.article_url">{{ popularArticle.created }}</a></li>
              </ul>
            </div>
            <div class="details mt-20">
              <a :href="popularArticle.article_url">
                <h6>{{ popularArticle.title }}</h6>
              </a>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</template>

<script>
import axios from "axios";

export default {
  name: "SidebarComponent",
  data(){
    return{
      subscriptionForm: null,
      categories: [],
      popularArticles: [],
      successSubsription: {
        success: false,
        message: ""
      }
    }
  },
  methods:{
    onSubmit: function(e){
      let formData = new FormData(e.target);
      axios.post('/subscribe', formData)
      .then(response => {
        if(response.status == 200){
          this.successSubsription.success = true;
          this.successSubsription.message = response.data['message']
        }
      }).catch(error => {
        console.log(error);
      });
    }
  },
  async mounted() {
    axios.get('/get-subscription-form').then(response=>{
      if(response.data){
        this.subscriptionForm = response.data['form'];
      }
    }).catch(error => {
      console.log(error);
    });

    axios.get('/get-articles-count/').then(response=>{
      if(response.data){
        this.categories = response.data['data'];
      }
    }).catch(error => {
      console.log(error);
    });

    axios.get('/get-popular-articles').then(response => {
      if(response.data){
        this.popularArticles = response.data['data'];
      }
    }).catch(error => {
      console.log(error);
    });

  }
}
</script>

<style scoped>

</style>