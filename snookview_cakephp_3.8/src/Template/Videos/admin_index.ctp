<?php $this->start('meta'); ?>
	
	<title>Snookview - Videos</title>

<?php $this->end(); ?>

<div class="row">
	<?php 
		if(empty($videos)){
			echo '<div id="flashMessage" class="message">' . 'No videos have been added, please be the first to add a Video.' . '</div>';
		}
	?>
	<div class="col-md-2">
		<ul class="nav nav-pills nav-stacked">
			<li>
				<?php 
					echo $this->Html->link(
						__('New Video'),
							[
								'action' => 'adminAdd'
							]
						)
					; 
				?>
			</li>
		</ul>
	</div>
	<div class="col-md-10">
		<div class="table-responsive">
			<table class="table table-striped table-bordered">
				<tr>
					<th><?php echo $this->Paginator->sort('video_id'		, 'ID'			); ?></th>
					<th><?php echo $this->Paginator->sort('video_title'		, 'Title'		); ?></th>
					<th><?php echo $this->Paginator->sort('video_date'		, 'Date'		); ?></th>
					<th><?php echo $this->Paginator->sort('video_scoreA'	, 'Score A'		); ?></th>
					<th><?php echo $this->Paginator->sort('video_scoreB'	, 'Score B'		); ?></th>
					<th><?php echo $this->Paginator->sort('video_url'		, 'URL'			); ?></th>
					<th><?php echo $this->Paginator->sort('tournament_id'	, 'Tournament'	); ?></th>
					<th><?php echo $this->Paginator->sort('round_id'		, 'Round'		); ?></th>
					<th><?php echo $this->Paginator->sort('timeline_id'		, 'Timeline'	); ?></th>
					<th class="actions">
						<?php echo __('Actions'); ?>	
					</th>
				</tr>
				<?php foreach ($videos as $video): ?>
					<tr>
						<td>
							<?php 
								echo $this->Html->link($video->video_id, 
									[
										'action' => 'adminView', 
										$video->video_id
									]
								); 
							?>
						</td>
						<td><?php echo $video->video_title	 		?></td>
						<td>
							<?php 
								echo date(
									"d-m-Y", 
									strtotime(
										$video->video_date
									)
								); 
							?>
						</td>
						<td><?php echo $video->video_scoreA			?></td>
						<td><?php echo $video->video_scoreB 	 	?></td>
						<td><?php echo $video->video_url			?></td>
						<td>
							<?php
								echo $this->Html->link($video->tournament->tournament_name, 
									[
										'action' => 'adminView', 
										$video->tournament->tournament_id
									]
								);
							?>
						</td>
						<td>
							<?php
								echo $this->Html->link($video->round->round_name, 
									[
										'action' => 'adminView', 
										$video->round->round_id
									]
								);
							?>
						</td>
						<td>
							<?php
								echo $this->Html->link($video->timeline->timeline_title, 
									[
										'action' => 'adminView', 
										$video->timeline->timeline_id
									]
								);
							?>
						</td>
						<td class="actions">
							<?php 
								echo $this->Html->link($this->Html->tag(
									'i', '', 
									[
										'class' => 'glyphicon glyphicon-edit'
									]) . "", 
									[
										'action' 	=> 'adminEdit', $video->video_id
									], 
									[
										'class' 	=> 'btn btn-mini btn-noPadding', 
										'escape' 	=> false
									]
								); 
							?>
							<?php 
								echo $this->element('deleteAction', 
									[
										"idDeleteAction" 		=> $video->video_id,
										"displayDeleteAction" 	=> $video->video_title
									]
								); 
							?>
						</td>
					</tr>
				<?php endforeach; ?>
			</table>
		</div>
	</div>
</div>
<?php echo $this->element('pagination'); ?>