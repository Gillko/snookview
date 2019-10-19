<?php $this->start('meta'); ?>
	<title>Snookview - Edit Session</title>
<?php $this->end(); ?>
<div class="row">
	<div class="col-md-3">
		<ul class="nav nav-pills nav-stacked">
			<li>
				<?= 
				$this->Form->postLink(
				    'Delete',[
				    	'action' => 'delete', $session->session_id
				    ],[
				    	'confirm' => 'Are you sure?'
				    ]
				)
				?>
			</li>
		</ul>
	</div>

	<div class="col-md-9">
		<?php echo $this->Form->create($session->session_id, array(
			'inputDefaults' => array(
				'div' => 'form-group',
				'wrapInput' => false,
				'class' => 'form-control'
			),
			'class' => 'well'
		)); ?>
	<fieldset>
		<legend><?php echo __('Edit Session'); ?></legend>
		<div class="form-group">
			<?php
				echo $this->Form->control($session->session_id, array(
					'label' => 'ID',
					'placeholder' => 'ID',
					'class' => 'form-control',
					'id' => 'VideoVideoId',
					'value' => $session->session_id
				))
			?>
		</div>
		<div class="form-group">
			<?php
				echo $this->Form->control('session_title', array(
					'label' => 'Title',
					'placeholder' => 'Title',
					'class' => 'form-control',
					'value' => $session->session_title
				))
			?>
		</div>
		<div class="form-group">
			<?php
				echo $this->Form->control('session_description', array(
					'label' => 'Description',
					'placeholder' => 'Description',
					'class' => 'form-control',
					'value' => $session->session_description
				));
			?>
		</div>
		<div class="submit">
			<?php
				echo $this->Form->button(__('Edit'), ['class'=> 'btn btn-default btn-success btn-lg']);
			?>
		</div>
		<?php
			echo $this->Form->end();
		?>
	</fieldset>
</div>