<?php if (isset($slides['image']) AND sizeof($slides['image'])) : ?>

<div class="flexslider">
    <ul class="slides">
        <?php 
            foreach ($slides['image'] as $index=>$image) :
                $heading = isset($slides['heading'][$index]) ? $slides['heading'][$index] : '';
                $link = isset($slides['link'][$index]) ? $slides['link'][$index] : '';
                $description = isset($slides['description'][$index]) ? $slides['description'][$index] : '';
                if ($heading=='Heading') $heading = '';
                if ($link=='URL') $link = '';
                if ($description=='Description') $description = '';
                $slide_image = aq_resize( $image , 1400, 550, true );
        ?>
            <li>
                <img src="<?php echo $slide_image; ?>">
            </li>
        <?php endforeach;?>
    </ul>
</div><!-- .flexslider -->
<div class="custom-navigation nav-1">
    <a href="#" class="flex-prev"><i class="fa fa-chevron-left"></i></a>
    <a href="#" class="flex-next"><i class="fa fa-chevron-right"></i></a>
</div><!-- .custom-navigation -->
<div class="custom-controls-container"></div>
<div class="clear"></div>
<?php endif; ?>