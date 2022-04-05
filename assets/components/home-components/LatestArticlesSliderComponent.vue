<template>
  <!--================ Blog slider start =================-->
  <section>
    <div class="container">

      <carousel :loop="true" :margin="30" :items="1"
                :nav="false" :autoplay="true" :dots="true"
                :smartSpeed="1500" :responsiveClass="true"
                :responsive="{0:{items:1},600:{items:2},1000:{items:3}}"
      v-if="articles.length > 0">
        <div v-for="(article, index) in articles" :key="index" class="card blog__slide text-center">
          <div class="blog__slide__img">
            <img :src="article.image_path"
                 class="card-img rounded-0">
          </div>
          <div class="blog__slide__content">
<!--            {{ url('category_articles',{'id':latest_article.category.id}) }}-->
<!--            {{ latest_article.category.name }}-->
<!--            {{ url('article',{'id':latest_article.id}) }}-->
            <a class="blog__slide__label" :href="article.category_url">{{ article.category_name }}</a>
            <h3><a :href="article.article_url">{{ article.title }}</a></h3>
            <timeago :datetime="article.created"></timeago>

          </div>
        </div>
      </carousel>
    </div>
  </section>
  <!--================ Blog slider end =================-->
</template>

<script>
import carousel from 'vue-owl-carousel';
import axios from "axios";

export default {
  name: "LatestArticlesSliderComponent",
  components: {carousel},
  data(){
    return {
      articles: [],
    }
  },
  mounted() {
    axios.get('/get-latest-posts/').then(response=>{
      if(response.data){
        this.articles = response.data['data'];
      }
    }).catch(error => {
      console.log(error);
    })
  }
}
</script>

<style scoped>

</style>