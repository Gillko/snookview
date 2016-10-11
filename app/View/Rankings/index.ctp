<?php $this->start('meta'); ?>
	<title>Snookview - Ranking</title>
<?php $this->end(); ?>
<div class="row padding-top">
	<?php //echo debug($test); ?>
	<div class="col-md-2"></div>
	<div class="col-md-8 noPaddingTablet noPaddingMobile ranking front">
		<h3><?php echo __('Ranking World Snooker 2015-2016'); ?></h3>
		<div class="table-responsive">
			<table class="text-center">
				<tr>
					<th><?php echo $this->Paginator->sort('ranking_rank', 'Rank'); ?></th>
					<th><?php echo $this->Paginator->sort('player_id', 'Name'); ?></th>
					<th colspan="2"><?php echo $this->Paginator->sort('player_nationality', 'Country'); ?></th>
					<th><?php echo $this->Paginator->sort('ranking_points', 'Points'); ?></th>
				</tr>
				<?php foreach ($rankings as $ranking): ?>
					<tr>
						<td><?php echo h($ranking['Ranking']['ranking_rank']); ?>&nbsp;</td>
						<td>
							<?php echo $this->Html->link($ranking['Player']['player_firstname'] . ' ' . $ranking['Player']['player_surname'] , array('controller' => 'players', 'action' => 'view', $ranking['Player']['player_id'])); ?>
						</td>
						<td>
							<?php echo h($ranking['Player']['player_nationality']); ?>
						</td>
						<td class="colspan" >
							<?php if($ranking['Player']['player_flag']) echo$this->Html->image(h($ranking['Player']['player_flag']), array('class' => 'flag')); ?>
						</td>
						<td><?php echo h($ranking['Ranking']['ranking_points']); ?>&nbsp;</td>
					</tr>
				<?php endforeach; ?>
			</table>
		</div>
	</div>
	<div class="col-md-2"></div>
</div>