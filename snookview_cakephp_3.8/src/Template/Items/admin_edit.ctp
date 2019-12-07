<?php $this->start('meta'); ?>

	<title>Snookview - Admin Edit Item</title>

<?php $this->end(); ?>

<div class="row">
	<div class="col-md-3">
		<ul class="nav nav-pills nav-stacked">
			<li>
				<?= 
				$this->Form->postLink(
				    'Delete',[
				    	'action' 		=> 'delete', $item->item_id
				    ],
				    [
				    	'confirm' 		=> 'Are you sure?'
				    ]
				)
				?>
			</li>
		</ul>
	</div>
	<div class="col-md-9">
		<?php 
			echo $this->Form->create('Item', 
				[
					'inputDefaults' => 
					[
						'div'			=> 'form-group',
						'wrapInput' 	=> false,
						'class' 		=> 'form-control'
					],
					'class' 			=> 'well'
				]
			); 
		?>
		<fieldset>
			<legend><?php echo __('Admin Edit Item'); ?></legend>
			<?php
				echo $this->Form->input('item_title', 
					[
						'label' 		=> 'Title',
						'class' 		=> 'form-control',
						'value' 		=> $item->item_title
					]
				);

				echo $this->Form->input('item_hours_start', 
					[
						'type' 			=> 'integer',
						'label' 		=> 'Start Hour',
						'class' 		=> 'form-control',
						'id' 			=> 'ItemItemHoursStart',
						'value' 		=> $item->item_hours_start
					]
				);

				echo $this->Form->input('item_minutes_start', 
					[
						'type' 			=> 'integer',
						'label' 		=> 'Start Minutes',
						'class' 		=> 'form-control',
						'id' 			=> 'ItemItemMinutesStart',
						'value' 		=> $item->item_minutes_start
					]
				);
		
				echo $this->Form->input('item_seconds_start', 
					[
						'type' 			=> 'integer',
						'label' 		=> 'Start Seconds',
						'class' 		=> 'form-control',
						'id' 			=> 'ItemItemSecondsStart',
						'value' 		=> $item->item_seconds_start
					]
				);
		
				echo $this->Form->input('item_point_start', 
					[
						'type' 			=> 'integer',
						'label' 		=> 'Start Point',
						'class' 		=> 'form-control',
						'id' 			=> 'ItemItemPointStart',
						'value' 		=> $item->item_point_start
					]
				);
		
				echo $this->Form->input('item_hours_end', 
					[
						'type' 			=> 'integer',
						'label' 		=> 'End Hour',
						'class' 		=> 'form-control',
						'id' 			=> 'ItemItemHoursEnd',
						'value' 		=> $item->item_hours_end
					]
				);
		
				echo $this->Form->input('item_minutes_end', 
					[
						'type' 			=> 'integer',
						'label' 		=> 'End Minutes',
						'class' 		=> 'form-control',
						'id'			=> 'ItemItemMinutesEnd',
						'value' 		=> $item->item_minutes_end
					]
				);
		
				echo $this->Form->input('item_seconds_end', 
					[
						'type' 			=> 'integer',
						'label' 		=> 'End Seconds',
						'class' 		=> 'form-control',
						'id' 			=> 'ItemItemSecondsEnd',
						'value' 		=> $item->item_seconds_end
					]
				);
		
				echo $this->Form->input('item_point_end', 
					[
						'type' 			=> 'integer',
						'label' 		=> 'End Point',
						'class' 		=> 'form-control',
						'id' 			=> 'ItemItemPointEnd',
						'value' 		=> $item->item_point_end
					]
				);
		
				echo $this->Form->input('item_description', 
					[
						'label' 		=> 'Description',
						'class' 		=> 'form-control',
						'value' 		=> $item->item_description
					]
				);
		
				echo $this->Form->input('item_tags', 
					[
						'label' 		=> 'Tags',
						'class'		 	=> 'form-control',
						'value' 		=> $item->item_tags
					]
				);
		
				echo $this->Form->input('timeline_id', 
					[
						'class' 		=> 'form-control',
						'value' 		=> $item->timeline_id
					]
				);
		
				echo $this->Form->control('players._ids', 
					[
				    	'options' 		=> $players,
				    	'id' 			=> 'magicselect',
						'class' 		=> 'form-control',
						'multiple' 		=> true,
						'value' 		=> 
						[
							$item->players[0]['player_id'], 
							$item->players[1]['player_id']
						]
					]
				);

			echo $this->Html->div(
				'submit'
			);

			echo $this->Form->button(
				__('Edit'), 
					[
						'class'			=> 'btn btn-default btn-success btn-lg'
					]
				)
			;

			echo $this->Form->end();
		?>
		</fieldset>
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