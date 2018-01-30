<?php

function ssc_view()
{
  $args = array(
    'numberposts' => -1, //表示（取得）する記事の数
    'post_type'   => 'customcarousel', //投稿タイプの指定
  );
  $posts = get_posts($args);

  include $_SERVER['DOCUMENT_ROOT'] . '/wp-content/plugins/simple-slick-carousel/view/carousel-view.php';
}

function ssc_view_with_category($category)
{
  $args = array(
    'numberposts' => -1, //表示（取得）する記事の数
    'post_type'   => 'customcarousel', //投稿タイプの指定
    'tax_query'   => array(
      array(
        'taxonomy' => 'customcarousel_taxonomy',
        'field'    => 'slug',
        'terms'    => $category,
      ),
    ),
  );
  $posts = get_posts($args);

  include $_SERVER['DOCUMENT_ROOT'] . '/wp-content/plugins/simple-slick-carousel/view/carousel-view.php';
}
