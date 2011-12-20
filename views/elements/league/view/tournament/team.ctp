<?php
$class = null;
if (count ($classes)) {
	$class = ' class="' . implode (' ', $classes). '"';
}
?>
<tr<?php echo $class;?>>
	<?php if ($is_admin || $is_coordinator): ?>
	<td><?php echo $team['rating']; ?></td>
	<?php endif; ?>
	<td><?php
	echo $this->element('team/block', array('team' => $team));
	?></td>
	<td><?php
	$roster_required = Configure::read("roster_requirements.{$league['League']['ratio']}");
	$count = $team['roster_count'];
	if (($is_admin || $is_coordinator) && $team['roster_count'] < $roster_required && $league['League']['roster_deadline'] != '0000-00-00') {
		echo $this->Html->tag ('span', $count, array('class' => 'warning-message'));
	} else {
		echo $count;
	}
	?></td>
	<td><?php echo $team['average_skill']; ?></td>
	<td class="actions">
	<?php echo $this->element('team/actions', compact('team')); ?>
	</td>
</tr>