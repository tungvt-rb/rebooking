<table>
	<tbody>
		<tr>
			<th><?php pll_e('Free services') ?></th>
			<td><?php echo $re_free_services; ?></td>
		</tr>
		<tr>
			<th><?php pll_e('Pay Services') ?></th>
			<td><?php echo $re_pay_services ?></td>
		</tr>
		<tr>
			<th><?php pll_e('Environment') ?></th>
			<td><?php echo $re_environment ?></td>
		</tr>
		<tr>
			<th><?php pll_e('Furniture') ?></th>
			<td><?php echo $re_furniture ?></td>
		</tr>
		<?php if(!empty($re_kitchen)) { ?>
		<tr>
			<th><?php pll_e('Kitchen') ?></th>
			<td><?php echo $re_kitchen ?></td>
		</tr>
		<?php } ?>
		<tr>
			<th><?php pll_e('Equipment') ?></th>
			<td><?php echo $re_equipment ?></td>
		</tr>
		<tr>
			<th><?php pll_e('Details') ?></th>
			<td><?php echo $re_details ?></td>
		</tr>
	</tbody>
</table>