<table class="list">
<tr>
	<th><?php __('Registration'); ?></th>
	<th><?php __('Cost'); ?></th>
	<th><?php __('Opens on'); ?></th>
	<th><?php __('Closes on'); ?></th>
</tr>
<?php
$i = 0;
foreach ($events as $event):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $this->Html->link(__($event['Event']['name'], true), array('action' => 'view', 'event' => $event['Event']['id'])); ?>
		</td>
		<td>
			<?php
			$cost = $event['Event']['cost'] + $event['Event']['tax1'] + $event['Event']['tax2'];
			if ($cost > 0) {
				echo '$' . $cost;
			} else {
				echo $this->Html->tag ('span', 'FREE', array('class' => 'free'));
			}
			?>
		</td>
		<td>
			<?php echo $this->ZuluruTime->datetime($event['Event']['open']); ?>
		</td>
		<td>
			<?php echo $this->ZuluruTime->datetime($event['Event']['close']); ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>