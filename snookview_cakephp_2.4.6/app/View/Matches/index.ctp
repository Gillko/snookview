<?php $this->start('meta'); ?>
	<title>Snookview - Matches</title>
<?php $this->end(); ?>
<div class="row padding-top">
	<div class="col-md-1">
	</div>
	<div class="col-md-10 favorites noPaddingTablet noPaddingMobile">
		<h3>My Matches</h3>
		<div class="row">
			<?php foreach ($matches as $match) if ($match['Match']['user_id'] == $current_user['user_id']): ?>
				<div class="box text-center">
					<a href='/matches/view/<?php echo $match['Match']['match_id']; ?>'>
						<h5><?php echo h($match['Match']['match_title']); ?></h5>
						<p><?php echo h($match['Match']['match_player_one_firstname']); ?>
						<?php echo h($match['Match']['match_player_one_surname']); ?></p>
						<p>VS</p>
						<p><?php echo h($match['Match']['match_player_two_firstname']); ?>
						<?php echo h($match['Match']['match_player_two_surname']); ?></p>
						<p><?php echo h($this->Time->nice($match['Match']['match_created'])); ?></p>
					</a>
					<div class="text-right">
						<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $match['Match']['match_id']), null, __('Are you sure you want to delete %s?', $match['Match']['match_title'])); ?>
					</div>
				</div>
			<?php endif; ?>
		</div>
	</div>
	<div class="col-md-1">
	</div>
</div>