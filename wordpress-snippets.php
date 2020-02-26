<?php
// TAXONOMY - show tags only for one post type
// ----------------------------------------------
// if you have one taxonomy assign to few post types
// you can get terms from only one of them

$only_gallery_post_type = get_posts(array(
  'fields'          => 'ids',
  'posts_per_page'  => -1,
  'post_type' => 'gallery'
));

$tags = get_tags( array(
  'hide_empty' => true,
  'object_ids' => $only_gallery_post_type,
));

foreach( $tags as $tag ) :
  $tag_id = $tag->term_id;
  $active = ( get_queried_object()->term_id == $tag_id)? 'active' : ''; ?>

  <li class="<?php echo $active; ?>">
    <a href="<?php echo get_term_link($tag_id); ?>">
      <p class="nav-taxonomy__tax-name">Tag</p>
      <p class="nav-taxonomy__term-name"><?php echo $tag->name; ?></p>
    </a>
  </li>

<?php
endforeach; ?>
