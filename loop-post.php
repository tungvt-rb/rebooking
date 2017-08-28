<?php
/**
 * @package WordPress
 * @subpackage sassthemes Themes
 */
global $data;
$sass_count = 0;
while (have_posts()) : the_post();
    $sass_count++;
?>  

<div class="w-blog-entry format-standard">
    <div class="w-blog-entry-h">
        <?php
            //crop image
            $thumb = get_post_thumbnail_id();
            $img_url = wp_get_attachment_url($thumb,'full'); //get full URL to image
            $sass_featured_image = aq_resize( $img_url, 500, '', false ); //resize & crop the image
        ?>

        <a class="w-blog-entry-link" href="<?php the_permalink(); ?>">
            <?php if($sass_featured_image) { ?>
            <span class="w-blog-entry-preview">
                <img src="<?php echo $sass_featured_image; ?>" alt="<?php echo the_title(); ?>" />
            </span>
            <?php } ?>

            <h2 class="w-blog-entry-title">
                <span class="w-blog-entry-title-h"><?php the_title(); ?></span>
            </h2>
        </a>
    
        <div class="w-blog-entry-body">
            <div class="w-blog-entry-meta">
                <div class="w-blog-entry-meta-date">
                    <i class="icon-time"></i>
                    <span class="w-blog-entry-meta-date-month"><?php the_time('M'); ?> </span>
                    <span class="w-blog-entry-meta-date-day"><?php the_time('d'); ?>, </span>
                    <span class="w-blog-entry-meta-date-year"><?php the_time('Y'); ?> </span>
                </div>
            </div>

            <!-- <div class="w-blog-entry-short"> -->
                <?php
                    //show excerpt
                    // $content = get_the_content();
                    // $content_stripped = strip_shortcodes($content);
                    // $sass_post_excerpt = !empty($post->post_excerpt) ? wp_trim_words(get_the_excerpt(), 30) : wp_trim_words($content_stripped, 30);
                    // echo $sass_post_excerpt; 
                ?>                
            <!-- </div> -->
        </div><!-- /w-blog-entry-body -->
    </div>
</div>
<?php
//end loop
endwhile; ?>