<table class="tbl">
	<thead>
		<tr><th colspan="2"><?php the_title(); ?></th></tr>
	</thead>
	<tbody>
		<tr>
			<td>
				<div class="tleft"><?php pll_e('Price'); ?></div>
				<div class="tright"><i class="fa fa-money"></i> <?php pll_e('$') ?> <?php echo $re_price; ?></div>
				<div class="clear"></div>
			</td>
			<td>
				<div class="tleft"><?php pll_e('Built in') ?></div>
				<div class="tright"><i class="fa fa-calendar"></i> <?php echo $re_builtin; ?></div>
				<div class="clear"></div>
			</td>
		</tr>
		<tr>
			<td>
				<div class="tleft"><?php pll_e('Location'); ?></div>
				<div class="tright"><i class="fa fa-map-marker"></i> <?php echo $re_location; ?></div>
				<div class="clear"></div>
			</td>
			<td>
				<div class="tleft"><?php pll_e('Living area') ?></div>
				<div class="tright"><i class="fa fa-expand"></i> <?php echo $re_area; ?> <span>m<sup>2</sup></span></div>
				<div class="clear"></div>
			</td>
		</tr>
		<tr>
			<td>
				<div class="tleft"><?php pll_e('Bathroom') ?></div>
				<div class="tright"><i class="fa fa-bath"></i></i> <?php echo $re_bathroom; ?></div>
				<div class="clear"></div>
			</td>
			<td>
				<div class="tleft"><?php pll_e('Bathroom Type') ?></div>
				<div class="tright"><i class="fa fa-bath"></i> <i class="fa fa-shower"></i> <?php echo $re_bathroom_type; ?></div>
				<div class="clear"></div>
			</td>
		</tr>
		<tr>
			<td>
				<div class="tleft"><?php pll_e('Bedroom'); ?></div>
				<div class="tright"><i class="fa fa-bed"></i> <?php echo $re_bedroom; ?></div>
				<div class="clear"></div>
			</td>
			<td>

				<div class="tleft">
					<?php
						if ( !empty($re_includeof) ) {
					?>
							<?php pll_e('Kitchen equipped') ?> <span><i class="fa fa-cutlery"></i></span>
					<?php 
						} else {
					?>
							<?php pll_e('None') ?> <span><i class="fa fa-cutlery"></i></span>
					<?php }	?>
				</div>
				<div class="tright"><a class="view-detail" href="<?php the_permalink(); ?>"><?php pll_e('View detail') ?></a></div>
				<div class="clear"></div>
			</td>
		</tr>
	</tbody>
</table>