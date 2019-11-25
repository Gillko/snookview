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
						<td><?php echo h($ranking['ranking_rank']); ?>&nbsp;</td>
						<td>
							<a href="<?php WWW_ROOT ?>/players/<?php echo $ranking->player->player_id; ?>/<?php echo $ranking->player->player_slug; ?>">
								<?php echo $ranking->player->player_firstname . ' ' . $ranking->player->player_surname; ?>
							</a>
						</td>
						<td>
							<!-- <?= $ranking->player ?> -->
							<!-- <?php 
								/*foreach ($query as $ranking){
									echo $ranking->player->player_firstname;
								}*/
							?> -->


							<!-- <?= debug($ranking->players['player_nationality']) ?> -->
							<!-- <?= $ranking->player_id ?> -->
							<?php echo h($ranking->player->player_nationality); ?>
							<?php //echo h($ranking['Players']['player_nationality']); ?>
						</td>
						<td class="colspan" >
							<?php if($ranking->player->player_flag) echo $this->Html->image('/img/flags/' . $ranking->player->player_flag, array('class' => 'flag')); ?>
						</td>
						<td><?php echo h($ranking['ranking_points']); ?>&nbsp;</td>
					</tr>
				<?php endforeach; ?>
			</table>
		</div>
	</div>
	<div class="col-md-2"></div>
</div>