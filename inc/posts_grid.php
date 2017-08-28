<?php
    $counter = 0;
    while ($foo->have_posts()) :
        $counter++;
        $foo->the_post();
?>
        <div class="w-blog-entry format-standard <?php  echo $counter==1 ? 'sticky' : '' ?>">
            <div class="w-blog-entry-h">
                <a class="w-blog-entry-link" href="<?php the_permalink();?>">
                    <span class="w-blog-entry-preview">
                        <?php if (has_post_thumbnail()) {the_post_thumbnail('large');} ?>
                    </span>
                    <h2 class="w-blog-entry-title">
                        <span class="w-blog-entry-title-h"><?php the_title(); ?></span>
                    </h2>
                </a>
                <div class="w-blog-entry-body">
                    <div class="w-blog-entry-meta">
                        <div class="w-blog-entry-meta-date">
                            <i class="icon-time"></i>
                            <span class="w-blog-entry-meta-date-day"><?php the_time('d'); ?> </span>
                            <span class="w-blog-entry-meta-date-month"><?php the_time('M'); ?>, </span>
                            <span class="w-blog-entry-meta-date-year"><?php the_time('Y'); ?></span>
                        </div>
                    </div>
                    <div class="w-blog-entry-short">
                        <p><?php the_excerpt_rss(); ?></p>
                    </div>
                </div>
            </div>
        </div><!-- .w-blog-entry -->
<?php endwhile; ?>
