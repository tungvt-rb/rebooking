<p><a title="Add Slide Image" data-editor="slider" class="button insert-media add_media" href="#">Add Slide Image</a></p>
<table width="100%" class="tbl">
    <colgroup>
        <col width="100" />
        <col width="" />
        <col width="20" />
    </colgroup>
    <tbody id="themecode_slides">
<?php if ($slides) : ?>
    <?php
        foreach ($slides['image'] as $index=>$slideImage) :
            $slideThumbnail = isset($slides['thumbnail'][$index]) ? $slides['thumbnail'][$index] : '';
            $slideThumbnail640x362 = isset($slides['vr_650x400'][$index]) ? $slides['vr_650x400'][$index] : '';
            $slideHeading = isset($slides['heading'][$index]) ? $slides['heading'][$index] : '';
            $slideDescription = isset($slides['description'][$index]) ? $slides['description'][$index] : '';
            $slideLink = isset($slides['link'][$index]) ? $slides['link'][$index] : '';
    ?>
        <tr>
            <td valign="top">
            <?php if (!empty($slideThumbnail)) : ?>
                <img src="<?php echo $slideThumbnail?>" width="100" />
                <input type="hidden" name="slider[thumbnail][]" value="<?php echo $slideThumbnail?>" />
            <?php endif; ?>
                <input type="hidden" name="slider[vr_650x400][]" value="<?php echo $slideThumbnail640x362?>" />
                <input type="hidden" name="slider[image][]" value="<?php echo !empty($slideImage) ? $slideImage : ''?>" />
            </td>
            <td>
                <input type="text" class="widefat" name="slider[heading][]" value="<?php echo !empty($slideHeading) ? $slideHeading : 'Heading'?>" onfocus="if(this.value=='Heading')this.value=''" onblur="if(this.value=='')this.value='Heading'" />
                <textarea class="widefat" name="slider[description][]" onfocus="if(this.value=='Description')this.value=''" onblur="if(this.value=='')this.value='Description'"><?php echo !empty($slideDescription) ? $slideDescription : 'Description'?></textarea>
                <input type="text" class="widefat" name="slider[link][]" value="<?php echo !empty($slideLink) ? $slideLink : 'URL'?>" onfocus="if(this.value=='URL')this.value=''" onblur="if(this.value=='')this.value='URL'" />
            </td>
            <td valign="top">
                <input type="button" class="button btnupslide" value="&uarr;" /><br />
                <input type="button" class="button btndownslide" value="&darr;" /><br />
                <input type="button" class="button btnremoveslide" value="X" />
            </td>
        </tr>
    <?php endforeach; ?>
<?php endif; ?>
    </tbody>
</table>

<style type="text/css">
.tbl {border-collapse:collapse;}
.tbl td {padding:5px;border:1px solid #999;}
</style>