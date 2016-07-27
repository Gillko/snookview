<?php $this->start('meta'); ?>
	<title>Snookview - Players</title>
<?php $this->end(); ?>
<div class="row padding-top">
	<div class="col-md-1"></div>
	<div class="col-md-10 noPadding noPaddingMobile noPaddingTablet">
		<h3><?php echo __('Players'); ?></h3>
		<div class="row">
			<div class="col-md-12 noPaddingMobile noPaddingTablet">
				<?php echo $this->Form->create('', array(
				'inputDefaults' => array(
				'div' => 'form-group',
				'wrapInput' => false,
				'class' => 'form-control'
			))); ?>
				<fieldset>
				<?php
					echo $this->Form->input('player_firstname', array(
						'label' => 'Firstname',
						'placeholder' => 'Firstname',
						'required' => false
					));
					echo $this->Form->input('player_surname', array(
						'label' => 'Surname',
						'placeholder' => 'Surname',
						'required' => false
					));
					echo $this->Form->end(array('label' => __('Search', true), 'class' => 'btn btn-default btn-success btn-lg'));
				?>
			</div>
		</div>
		<div class="row players">
			<?php if(!empty($results)): ?>
				<?php foreach ($results as $result): ?>
			    	<div class="col-md-2 col-sm-6 col-xs-6 player-image noPaddingMobile noPaddingTablet">
			    		<?php if(!empty($result['Player']['player_image'])): {
				   			echo $this->Html->link(
							    $this->Html->image($result['Player']['player_image'], array('class' => 'img-responsive', 'alt' => $result['Player']['player_firstname'] . ' ' . $result['Player']['player_surname'])) .  '<p class="img-responsive">' . $result['Player']['player_surname']. '</p>',
							    array('controller' => 'players', 'action' => 'view', $result['Player']['player_id']),
							    array('escape' => false)
							); } ?>
							<?php else: {
								echo $this->Html->link(
							    $this->Html->image('/img/players/Profile.jpg', array('class' => 'img-responsive')) .  '<p>' . $result['Player']['player_surname'] . '</p>',
							    array('controller' => 'players', 'action' => 'view', $result['Player']['player_id']),
							    array('escape' => false)
							); } ?>
						<?php endif; ?>
					</div>
			   	<?php endforeach ?>
			<?php else: ?>
			<?php foreach ($players as $player): ?> 
		    	<div class="col-md-2 col-sm-6 col-xs-6 player-image noPaddingMobile noPaddingTablet">
		    		<?php if(!empty($player['Player']['player_image'])): {
			   			echo $this->Html->link(
						    $this->Html->image($player['Player']['player_image'], array('class' => 'img-responsive', 'alt' => $player['Player']['player_firstname'] . ' ' . $player['Player']['player_surname'])) .  '<p class="img-responsive">' . $player['Player']['player_surname']. '</p>',
						    array('controller' => 'players', 'action' => 'view', $player['Player']['player_id']),
						    array('escape' => false)
						); } ?>
						<?php else:{
							echo $this->Html->link(
						    $this->Html->image('/img/players/Profile.jpg', array('class' => 'img-responsive')) .  '<p>' . $player['Player']['player_surname'] . '</p>',
						    array('controller' => 'players', 'action' => 'view', $player['Player']['player_id']),
						    array('escape' => false)
						); } ?>
					<?php endif; ?>
				</div>
		   	<?php endforeach ?>
		   	<?php endif; ?>
		</div>
	</div>
	<div class="col-md-1"></div>
</div>