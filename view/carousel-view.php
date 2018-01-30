<div class="slick-slider">
<?php if ($posts): ?>
  <?php foreach ($posts as $post): ?>
    <?php setup_postdata($post);?>
    <?php if (has_post_thumbnail($post->ID)): ?>
    <div class="slick-item">
      <a href="<?php echo get_post_meta($post->ID, 'img_url', true); ?>" title="<?php echo get_post_meta($post->ID, 'img_description', true); ?>">
        <?php echo get_the_post_thumbnail($post->ID, 'full', array('class' => 'd-block w-100', 'alt' => $post->post_title, 'title' => get_post_meta($post->ID, 'img_description', true))); ?>
      </a>
    </div>
    <?php endif;?>
  <?php endforeach;?>
<?php endif;?>
</div>
