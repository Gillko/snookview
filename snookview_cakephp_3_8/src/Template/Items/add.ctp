<?php $this->start('meta'); ?>
	<title>Snookview - Add Item</title>
<?php $this->end(); ?>
<div class="row">
	<div class="col-md-1">
	</div>
	<div class="col-md-10">
	<h3><?php echo __('Add Item'); ?></h3>
	<?php echo $this->Form->create('Item', array(
				'inputDefaults' => array(
				'div' => 'form-group',
				'wrapInput' => false,
				'class' => 'form-control'
			),
				'class' => ''
			)); ?>
		<fieldset>
		<?php
			echo $this->Form->input('item_title', array(
				'label' => 'Title',
				'placeholder' => 'Title'
			));
			echo $this->Form->input('item_hours_start ', array(
				'type' => 'integer',
				'label' => 'Start Hour',
				'placeholder' => 'Start Hour'
			));
			echo $this->Form->input('item_minutes_start', array(
				'type' => 'integer',
				'label' => 'Start Minutes',
				'placeholder' => 'Start Minutes',
			));
			echo $this->Form->input('item_seconds_start', array(
				'type' => 'integer',
				'label' => 'Start Seconds',
				'placeholder' => 'Start Seconds',
			));
			echo $this->Form->input('item_point_start', array(
				'type' => 'integer',
				'label' => 'Start Point',
				'placeholder' => 'Start Point',
			));
			echo $this->Form->input('item_hours_end ', array(
				'type' => 'integer',
				'label' => 'End Hour',
				'placeholder' => 'End Hour'
			));
			echo $this->Form->input('item_minutes_end', array(
				'type' => 'integer',
				'label' => 'End Minutes',
				'placeholder' => 'End Minutes',
			));
			echo $this->Form->input('item_seconds_end', array(
				'type' => 'integer',
				'label' => 'End Seconds',
				'placeholder' => 'End Seconds',
			));
			echo $this->Form->input('item_point_end', array(
				'type' => 'integer',
				'label' => 'End Point',
				'placeholder' => 'End Point',
			));
			echo $this->Form->input('item_description', array(
				'label' => 'Description',
				'placeholder' => 'Description',
			));
			echo $this->Form->input('item_tags', array(
				'label' => 'Tags',
				'placeholder' => 'Tags',
			));
			/*echo $this->Form->input('created', array(
				'label' => 'Created',
				'type' => 'hidden'
			));*/
			echo $this->Form->input('timeline_id');
		?>
		</fieldset>
		<?php echo $this->Form->end(array('label' => __('Add', true), 'class' => 'btn btn-default btn-success btn-lg')); ?>
	</div>
	<div class="col-md-1">
	</div>
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