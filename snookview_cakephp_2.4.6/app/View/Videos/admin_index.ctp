<?php $this->start('meta'); ?>
	<title>Snookview - Videos</title>
<?php $this->end(); ?>
<div class="row">
	<?php 
	if(empty($videos)){
		echo '<div id="flashMessage" class="message">' . 'No videos have been added, please be the first to add a Video.' . '</div>';
	} ?>
	<div class="col-md-2">
		<ul class="nav nav-pills nav-stacked">
			<li><?php echo $this->Html->link(__('New Video'), array('action' => 'add')); ?></li>
		</ul>
	</div>
	<div class="col-md-10">
		<div class="table-responsive">
			<table class="table table-striped table-bordered">
				<tr>
						<th><?php echo $this->Paginator->sort('video_id', 'ID'); ?></th>
						<th><?php echo $this->Paginator->sort('video_title', 'Title'); ?></th>
						<th><?php echo $this->Paginator->sort('video_date', 'Date'); ?></th>
						<th><?php echo $this->Paginator->sort('video_scoreA', 'Score A'); ?></th>
						<th><?php echo $this->Paginator->sort('video_scoreB', 'Score B'); ?></th>
						<th><?php echo $this->Paginator->sort('video_url', 'URL'); ?></th>
						<th><?php echo $this->Paginator->sort('video_url_playlist', 'Playlist URL'); ?></th>
						<th><?php echo $this->Paginator->sort('video_part', 'Part'); ?></th>
						<th><?php echo $this->Paginator->sort('video_sort', 'Sort'); ?></th>
						<!-- <th><?php //echo $this->Paginator->sort('video_order', 'Order'); ?></th> -->
						<th><?php echo $this->Paginator->sort('tournament_id', 'Tournament'); ?></th>
						<th><?php echo $this->Paginator->sort('round_id', 'Round'); ?></th>
						<th><?php echo $this->Paginator->sort('timeline_id', 'Timeline'); ?></th>
						<th class="actions"><?php echo __('Actions'); ?></th>
				</tr>
				<?php foreach ($videos as $video): ?>
					<tr>
						<td><?php echo $this->Html->link($video['Video']['video_id'], array('action' => 'view', $video['Video']['video_id'])); ?></td>
						<td><?php echo h($video['Video']['video_title']); ?></td>
						<td><?php echo h(date("d-m-Y", strtotime($video['Video']['video_date']))); ?></td>
						<td><?php echo h($video['Video']['video_scoreA']); ?></td>
						<td><?php echo h($video['Video']['video_scoreB']); ?></td>
						<?php $string = $video['Video']['video_url']; ?>
						<td><?php print_r( explode(',', $string)); ?><br/></td>
						<td><?php echo h($video['Video']['video_url_playlist']); ?></td>
						<td><?php echo h($video['Video']['video_part']); ?></td>
						<td><?php echo h($video['Video']['video_sort']); ?></td>
						<!-- <td><?php //echo h($video['Video']['video_order']); ?></td> -->
						<td>
							<?php echo $this->Html->link($video['Tournament']['tournament_name'], array('controller' => 'tournaments', 'action' => 'view', $video['Tournament']['tournament_id'])); ?>
						</td>
						<td>
							<?php echo $this->Html->link($video['Round']['round_name'], array('controller' => 'rounds', 'action' => 'view', $video['Round']['round_id'])); ?>
						</td>
						<td>
							<?php echo $this->Html->link($video['Timeline']['timeline_title'], array('controller' => 'timelines', 'action' => 'view', $video['Timeline']['timeline_id'])); ?>
						</td>
						<td class="actions">
							<?php echo $this->Html->link($this->Html->tag('i', '', array('class' => 'glyphicon glyphicon-edit')) . "", 
							array('action' => 'edit', $video['Video']['video_id']), 
							array('class' => 'btn btn-mini btn-noPadding', 'escape' => false)
							); ?>
							<?php echo $this->Form->postLink(
							   $this->Html->tag('i', '', array('class' => 'glyphicon glyphicon-remove')). "",
							        array('action' => 'delete', $video['Video']['video_id']),
							        array('escape'=>false),
							    __('Are you sure you want to delete %s?',$video['Video']['video_title']),
							   array('class' => 'btn btn-mini btn-noPadding')
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
