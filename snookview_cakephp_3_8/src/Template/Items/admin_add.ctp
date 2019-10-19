<?php $this->start('meta'); ?>
	<title>Snookview - Add Item</title>
<?php $this->end(); ?>
<div class="row">
	<div class="col-md-12">
		<?php echo $this->Form->create('Items', array(
			'inputDefaults' => array(
				'div' => 'form-group',
				'wrapInput' => false,
				'class' => 'form-control'
			),
			'class' => 'well'
		)); ?>
		<fieldset>
			<legend><?php echo __('Add Item'); ?></legend>

			<div class="form-group">
				<?php
					echo $this->Form->input('item_title', array(
						'label' => 'Title',
						'placeholder' => 'Title',
						'id' => 'VideoVideoTitle',
						'class' => 'form-control'
					));
				?>
			</div>
			<div class="form-group">
				<?php
					echo $this->Form->input('item_hours_start', array(
						'type' => 'integer',
						'label' => 'Start Hour',
						'placeholder' => 'Start Hour',
						'class' => 'form-control',
						'id' => 'ItemItemHoursStart'
					));
				?>
			</div>
			<div class="form-group">
				<?php
					echo $this->Form->input('item_minutes_start', array(
						'type' => 'integer',
						'label' => 'Start Minutes',
						'placeholder' => 'Start Minutes',
						'class' => 'form-control',
						'id' => 'ItemItemMinutesStart'
					));
				?>
			</div>
			<div class="form-group">
				<?php
					echo $this->Form->input('item_seconds_start', array(
						'type' => 'integer',
						'label' => 'Start Seconds',
						'placeholder' => 'Start Seconds',
						'class' => 'form-control',
						'id' => 'ItemItemSecondsStart'
					));
				?>
			</div>
			<div class="form-group">
				<?php
					echo $this->Form->input('item_point_start', array(
						'type' => 'integer',
						'label' => 'Start Point',
						'placeholder' => 'Start Point',
						'class' => 'form-control',
						'id' => 'ItemItemPointStart'
					));
				?>
			</div>
			<div class="form-group">
				<?php
					echo $this->Form->input('item_hours_end', array(
						'type' => 'integer',
						'label' => 'End Hour',
						'placeholder' => 'End Hour',
						'class' => 'form-control',
						'id' => 'ItemItemHoursEnd'
					));
				?>
			</div>
			<div class="form-group">
				<?php
					echo $this->Form->input('item_minutes_end', array(
						'type' => 'integer',
						'label' => 'End Minutes',
						'placeholder' => 'End Minutes',
						'class' => 'form-control',
						'id' => 'ItemItemMinutesEnd'
					));
				?>
			</div>
			<div class="form-group">
				<?php
					echo $this->Form->input('item_seconds_end', array(
						'type' => 'integer',
						'label' => 'End Seconds',
						'placeholder' => 'End Seconds',
						'class' => 'form-control',
						'id' => 'ItemItemSecondsEnd'
					));
				?>
			</div>
			<div class="form-group">
				<?php
					echo $this->Form->input('item_point_end', array(
						'type' => 'integer',
						'label' => 'End Point',
						'placeholder' => 'End Point',
						'class' => 'form-control',
						'id' => 'ItemItemPointEnd'
					));
				?>
			</div>
			<div class="form-group">
				<?php
					echo $this->Form->input('item_description', array(
						'label' => 'Description',
						'placeholder' => 'Description',
						'class' => 'form-control'
					));
				?>
			</div>
			<div class="form-group">
				<?php
					echo $this->Form->input('item_tags', array(
						'label' => 'Tags',
						'placeholder' => 'Tags',
						'class' => 'form-control'
					));
				?>
			</div>
			<div class="form-group">
				<?php
					echo $this->Form->control('timeline_id', array(
						'class' => 'form-control'
					));
				?>
			</div>
			<div class="form-group">
				<?php
					echo $this->Form->control('players._ids', [
					    'options' => $players,
					    'id' => 'magicselect',
						'class' => 'form-control',
						'multiple' => true
					]);
				?>
			</div>
			<div class="submit">
				<?php
					echo $this->Form->button(__('Add'), ['class'=> 'btn btn-default btn-success btn-lg']);
				?>
			</div>
			<?php
				echo $this->Form->end();
			?>
		</fieldset>
	</div>
	<script>
	$(document).ready(function() {
		//this calculates values automatically 
		sumStart();
		$("#ItemItemHoursStart, #ItemItemMinutesStart, #ItemItemSecondsStart").on("keydown keyup", function() {
			sumStart();
		});

		sumEnd();
		$("#ItemItemHoursEnd, #ItemItemMinutesEnd, #ItemItemSecondsEnd").on("keydown keyup", function() {
			sumEnd();
		});
	});

	function sumStart() {
		var ItemItemHoursStart = document.getElementById('ItemItemHoursStart').value;
		var ItemItemMinutesStart = document.getElementById('ItemItemMinutesStart').value;
		var ItemItemSecondsStart = document.getElementById('ItemItemSecondsStart').value;
		var resultStart = parseInt(ItemItemHoursStart)*3600 + parseInt(ItemItemMinutesStart)*60 + parseInt(ItemItemSecondsStart);
		if (!isNaN(resultStart)) {
			document.getElementById('ItemItemPointStart').value = resultStart;
		}
	}

	function sumEnd() {
		var ItemItemHoursEnd = document.getElementById('ItemItemHoursEnd').value;
		var ItemItemMinutesEnd = document.getElementById('ItemItemMinutesEnd').value;
		var ItemItemSecondsEnd = document.getElementById('ItemItemSecondsEnd').value;
		var resultEnd = parseInt(ItemItemHoursEnd)*3600 + parseInt(ItemItemMinutesEnd)*60 + parseInt(ItemItemSecondsEnd);
		if (!isNaN(resultEnd)) {
			document.getElementById('ItemItemPointEnd').value = resultEnd;
		}
	}
	</script>
</div>