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
						'class' => 'form-control',
					),
					'type' => 'get'
					));
				?>
				<fieldset>
					<div class="form-group">
						<?php
							echo $this->Form->control('player_firstname', array(
								'label' => 'Firstname',
								'placeholder' => 'Firstname',
								//'required' => false,
								'class' => 'form-control',
								'default' => $this->request->getQuery('player_firstname')
							));
						?>
					</div>
					<div class="form-group">
						<?php
							echo $this->Form->control('player_surname', array(
								'label' => 'Surname',
								'placeholder' => 'Surname',
								'required' => false,
								'class' => 'form-control',
								'default' => $this->request->getQuery('player_surname')
							));
						?>
					</div>
					<div class="submit">
						<?php
							echo $this->Form->button(__('Search'),['class'=> 'btn btn-default btn-success btn-lg']);
						?>
					</div>

					<?php
						echo $this->Form->end();
					?>
				</fieldset>
			</div>
		</div>
		<div class="row players">
			<?php foreach ($players as $player): ?> 
		    	<div class="col-md-2 col-sm-6 col-xs-6 player-image noPaddingMobile noPaddingTablet">
		    		<?php if(!empty($player['player_image'])): {
			   			echo $this->Html->link(
						    $this->Html->image($player['player_image'], array('class' => 'img-responsive', 'alt' => $player['player_firstname'] . ' ' . $player['player_surname'])) .  '<p class="img-responsive">' . $player['player_surname']. '</p>',
						    array('controller' => 'players', 'action' => 'view', $player['player_id']),
						    array('escape' => false)
						); } ?>
						<?php else:{
							echo $this->Html->link(
						    $this->Html->image('/img/players/Profile.jpg', array('class' => 'img-responsive')) .  '<p>' . $player['player_surname'] . '</p>',
						    array('controller' => 'players', 'action' => 'view', $player['player_id']),
						    array('escape' => false)
						); } ?>
					<?php endif; ?>
				</div>
		   	<?php endforeach ?>
		</div>
	</div>
	<div class="col-md-1"></div>
</div>