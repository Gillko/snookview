<?php $this->start('meta'); ?>
	<title>Snookview - Match</title>
<?php $this->end(); ?>
<div class="row padding-top">
	<div class="col-md-1"></div>
	<div class="col-md-10 noPaddingTablet noPaddingMobile ranking front">
		<h3><?php echo __('Create a match'); ?></h3>
		<?php echo $this->Form->create('Match', array(
			'inputDefaults' => array(
			'div' => 'form-group',
			'wrapInput' => false,
			'class' => 'form-control'
		),
			'class' => 'well'
		)); ?>
		<fieldset>
		<?php
			echo $this->Form->input('match_title', array(
				'label' => 'Title',
				'placeholder' => 'Title',
			));
			echo $this->Form->input('match_player_one_firstname', array(
				'label' => 'Firstname Player One',
				'placeholder' => 'Firstname',
			));
			echo $this->Form->input('match_player_one_surname', array(
				'label' => 'Surname Player One',
				'placeholder' => 'Surname',
			));
			echo $this->Form->input('match_player_two_firstname', array(
				'label' => 'Firstname Player Two',
				'placeholder' => 'Firstname',
			));
			echo $this->Form->input('match_player_two_surname', array(
				'label' => 'Surname Player Two',
				'placeholder' => 'Surname',
			));
			echo $this->Form->input('match_created', array(
				'label' => 'Created',
				'type' => 'hidden'
			));
		?>
		</fieldset>
		<?php echo $this->Form->end(array('label' => __('Add', true), 'class' => 'btn btn-default btn-success btn-lg')); ?>
	</div>
	<div class="col-md-1"></div>
</div>