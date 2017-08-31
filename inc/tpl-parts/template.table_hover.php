<table class="tbl tooltiptext">
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
				<div class="tleft"><?php pll_e('Location'); ?></div>
				<div class="tright"><i class="fa fa-map-marker"></i> <?php echo $re_location; ?></div>
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
				<div class="tleft"><?php pll_e('Bathroom'); ?></div>
				<div class="tright"><i class="fa fa-bath"></i></i> <?php echo $re_bathroom; ?></div>
				<div class="clear"></div>
			</td>
		</tr>
		<tr>
			<td>
				<div class="tleft"><?php pll_e('Living area'); ?></div>
				<div class="tright"><i class="fa fa-expand"></i> <?php echo $re_area; ?> <span>m<sup>2</sup></span></div>
				<div class="clear"></div>
			</td>
			<td>
				<div class="tleft"><?php pll_e('Built in'); ?></div>
				<div class="tright"><i class="fa fa-calendar"> </i><?php echo $re_builtin; ?></div>
				<div class="clear"></div>
			</td>
		</tr>
		<tr>
			<td>
				<div class="tleft"><?php pll_e('Furnished'); ?></div>
				<div class="tright"><i class="fa fa-object-group"></i> <?php echo $re_furnished; ?></div>
				<div class="clear"></div>
			</td>
			<td>
				<div class="tleft"><?php pll_e('Equipped'); ?></div>
				<div class="tright"><i class="fa fa-object-group"></i> <?php echo $re_equipped; ?></div>
				<div class="clear"></div>
			</td>
		</tr>
	</tbody>
</table>