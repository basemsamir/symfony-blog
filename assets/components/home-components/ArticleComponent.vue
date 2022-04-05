<template>

  <div class="single-recent-blog-post">
    <div class="thumb">
      <img class="img-fluid" :src="'/img/'+article.image_path" >
      <ul class="thumb-info">
        <li><a href="#"><i class="ti-user"></i>{{ article.username  }}</a></li>
        <li><a href="#"><i class="ti-notepad"></i>{{ article.created }}</a></li>
        <li><a href="#"><i class="ti-themify-favicon"></i>{{ article.comments_count }} {{ article.comments_count == 1?'Comment':'Comments' }}</a></li>
      </ul>
    </div>
    <div class="details mt-20">
      <a :href="'/article/'+article.id">
        <h3>{{ article.title }}</h3>
      </a>
      <p class="tag-list-inline">
        <a href="#">{{ article.article_tags }}</a>
      </p>
      <p>{{ article.content }}</p>
      <a class="button" :href="'/article/'+article.id">Read More <i class="ti-arrow-right"></i></a>
    </div>
  </div>
</template>

<script>

export default {
  name: "ArticleComponent",
  props: ['article']
}
</script>

<style scoped>

</style>