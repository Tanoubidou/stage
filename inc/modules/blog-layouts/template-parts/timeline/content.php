<?php

/**
 * Template part for displaying timeline style of posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Fashion_daily
 */

$categories_visible = fashion_daily_theme()->customizer->get_value('blog_post_categories');
$thumbnail 			= 'fashion_daily-thumb-timeline';
?>

<article id="post-<?php echo esc_attr(the_ID()); ?>" <?php post_class('posts-list__item timeline-item'); ?>>

   <?php get_template_part('inc/modules/blog-layouts/template-parts/timeline/meta-timeline-date'); ?>

   <div class="posts-list__item-inner">

      <?php fashion_daily_post_thumbnail($thumbnail); ?>

      <div class="posts-list__item-content textaligncenter">
         <div class="entry-meta entry-meta-top"><?php
                                                fashion_daily_posted_in(array(
                                                   'visible' 	=> $categories_visible,
                                                ));

                                                fashion_daily_post_comments(array(
                                                   'prefix' 	=> ''
                                                ));
                                                ?></div><!-- .entry-meta -->

         <header class="entry-header">
            <h3 class="entry-title"><?php
                                    fashion_daily_sticky_label();
                                    the_title('<a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a>');
                                    ?></h3>
         </header><!-- .entry-header -->

         <div class="entry-meta entry-meta-main"><?php
                                                   fashion_daily_posted_on(array(
                                                      'prefix' 	=> '',
                                                      'time_ago' 	=> true
                                                   ));

                                                   fashion_daily_posted_by(array(
                                                      'prefix' 	=> ''
                                                   ));
                                                   ?></div><!-- .entry-meta -->

         <?php fashion_daily_post_excerpt(); ?>

         <footer class="entry-footer">
            <div class="entry-footer-container">
               <div class="entry-meta"><?php
                                       fashion_daily_post_tags(array(
                                          'prefix' 	=> '',
                                          'delimiter' => '',
                                       ));
                                       ?></div>
               <div class="post__button-wrap"><?php
                                                fashion_daily_post_link(array(
                                                   'class' => 'btn-primary'
                                                ));
                                                ?></div>
            </div>
         </footer><!-- .entry-footer -->
      </div><!-- .posts-list__item-content -->
   </div><!-- .posts-list__item-inner -->
</article><!-- #post-<?php the_ID(); ?> -->