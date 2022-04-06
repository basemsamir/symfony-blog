<template>
  <!-- Start Blog Post Siddebar -->
  <div class="col-lg-4 sidebar-widgets">
    <div class="widget-wrap">
<!--      {% for message in app.flashes('success') %}-->
<!--      <div class="alert alert-info">-->
<!--        {{ message }}-->
<!--      </div>-->
<!--      {% endfor %}-->
<!--      <div class="single-sidebar-widget newsletter-widget">-->
<!--        <h4 class="single-sidebar-widget__title">Newsletter</h4>-->
<!--        {% set newsletterForm = home_service.getNewsletterFormView %}-->
<!--        {{ form_start(newsletterForm) }}-->
<!--        <div class="form-group mt-30">-->
<!--          <div class="col-autos">-->
<!--            {{ form_widget(newsletterForm.email) }}-->
<!--          </div>-->
<!--        </div>-->
<!--        {{ form_widget(newsletterForm.submit) }}-->
<!--        {{ form_end(newsletterForm) }}-->
<!--      </div>-->


      <div class="single-sidebar-widget post-category-widget">
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

<!--      <div class="single-sidebar-widget popular-post-widget">-->
<!--        <h4 class="single-sidebar-widget__title">Popular Post</h4>-->
<!--        <div class="popular-post-list">-->
<!--          {% for popular_article in global_articles.getPopularArticles(3) %}-->
<!--          <div class="single-post-list">-->
<!--            <div class="thumb">-->
<!--              <img class="card-img rounded-0" src="{{ asset('img/'~popular_article.getImagePath()) }}" alt="">-->
<!--              <ul class="thumb-info">-->
<!--                <li><a href="{{ url('article',{id: popular_article.id}) }}">{{ popular_article.user.username }}</a></li>-->
<!--                <li><a href="{{ url('article',{id: popular_article.id}) }}">{{ popular_article.created|date('d M') }}</a></li>-->
<!--              </ul>-->
<!--            </div>-->
<!--            <div class="details mt-20">-->
<!--              <a href="{{ url('article',{id: popular_article.id}) }}">-->
<!--                <h6>{{ popular_article.title }}</h6>-->
<!--              </a>-->
<!--            </div>-->
<!--          </div>-->
<!--          {% endfor %}-->
<!--        </div>-->
<!--      </div>-->
<!--      -->
    </div>
  </div>
</template>

<script>
import axios from "axios";

export default {
  name: "SidebarComponent",
  data(){
    return{
      categories: []
    }
  },
  mounted() {
    axios.get('/get-articles-count/').then(response=>{
      if(response.data){
        this.categories = response.data['data'];
      }
    }).catch(error => {
      console.log(error);
    })
  }
}
</script>

<style scoped>

</style>