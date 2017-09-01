<?php get_header();?>

<?php 
    if (have_posts()) :
        while (have_posts()) :
            the_post();
?>
    <div class="single-content">
        <div class="wrapper">
            <div class="g-row">
                <div class="one-third">
                    <?php dynamic_sidebar( 'default-sidebar' ); ?>
                </div>
                <div class="two-thirds">
                    <h1 class="single-title"><?php the_title(); ?></h1>

                    <?php if (function_exists('kmf_breadcrumbs')) kmf_breadcrumbs(); ?>
                    <div class="single-body">
                        <?php the_content(); ?>
                    </div>
                </div>
            </div>
        </div><!-- .wrapper -->
    </div><!-- .single-content -->

    <div class="wrapper">
        <div class="g-row">
            <div class="full-width">
                <div class="tags">
                <?php 
                    $tags = wp_get_post_tags($post->ID);
                    if ( !empty($tags) ) : 
                ?>
                    <span>Tags:</span>
                <?php 
                        foreach ($tags as $key => $tag) {
                    ?>
                            <a href="<?php echo site_url() ?>/tag/<?php echo $tag->slug ?>"><?php echo $tag->name?></a>
                <?php 
                        }
                    endif; 
                ?>
                    <div class="clear"></div>
                </div><!-- .tags -->
                
                <div class="related-posts">
                <?php
                    // $tags = wp_get_post_tags($post->ID);
                    
                    $tags_query = '';
                    $count = 0;

                    foreach ($tags as $key => $tag) {
                        $count++;
                        if ($count==1) {
                            $tags_query .= $tag->slug;
                        } else {
                            $tags_query .= ','.$tag->slug;
                        }
                        
                    }
                    if (!empty($tags_query)) {
                        $args=array(
                            'tag' => $tags_query,
                            'showposts'=>5,
                        );
                        $my_query = new WP_Query($args);
                        if( $my_query->have_posts() ) {
                            echo '<h4>Tin liên quan:</h4>';
                            while ($my_query->have_posts()) : $my_query->the_post(); 
                ?>
                            <div class="related-post"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a> - <span class="posted-on"><?php the_time('d'); ?>/<?php the_time('m'); ?>/<?php the_time('Y'); ?></span></div>
                <?php
                            endwhile;
                        }

                        wp_reset_query();
                    }
                ?>
                </div><!-- .recent-posts -->

                <div class="share_buttons">
                    <div class="addthis_native_toolbox"></div>
                    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5508f6ca3895b911"></script>
                </div><!-- .share_buttons -->

                <div id="fb-root"></div>
                <script>
                    (function(d, s, id) {
                        var js, fjs = d.getElementsByTagName(s)[0];
                        if (d.getElementById(id)) return;
                        js = d.createElement(s); js.id = id;
                        js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.5";
                        fjs.parentNode.insertBefore(js, fjs);
                    }(document, 'script', 'facebook-jssdk'));
                </script>
                <div class="fb-comments" data-href="<?php the_permalink() ?>" data-numposts="5" data-width="100%" data-colorscheme="light"></div><!-- .fb-comments -->
            </div>
        </div>

    </div>

<?php
        endwhile;
    endif;
?>

<?php get_footer(); ?>