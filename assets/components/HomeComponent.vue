<template>
  <main class="site-main">
    <banner-component></banner-component>
    <latest-articles-slider-component></latest-articles-slider-component>
    <!--================ Start Blog Post Area =================-->
    <section class="blog-post-area section-margin mt-4">
      <div class="container">
        <div class="row">
          <article-pagination-component></article-pagination-component>
          <sidebar-component></sidebar-component>
        </div>
        <!-- End Blog Post Siddebar -->
      </div>
    </section>
    <!--================ End Blog Post Area =================-->
  </main>
</template>

<script>
import BannerComponent from "./home-components/BannerComponent";
import LatestArticlesSliderComponent from "./home-components/LatestArticlesSliderComponent";
import ArticlePaginationComponent from "./home-components/ArticlePaginationComponent";
import SidebarComponent from "./SidebarComponent";

export default {
  name: "HomeComponent",
  components: {
    BannerComponent, LatestArticlesSliderComponent,
    ArticlePaginationComponent, SidebarComponent
  }
}
</script>

<style scoped>

</style>