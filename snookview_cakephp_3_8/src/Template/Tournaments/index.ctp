<?php $this->start('meta'); ?>
	<title>Snookview - Tournaments</title>
<?php $this->end(); ?>
<div class="row padding-top">
	<div class="col-md-1">
	</div>
	<div class="col-md-10 noPaddingTablet noPadding noPaddingMobile tournaments index">
		<h3><?php echo __('Tournaments'); ?></h3>

		<?php 
			$count = 1;
			foreach($tournaments as $tournament) 
			{
				    if ($count%4 == 1)
				    {  
				         echo "<div class='row tournaments'>";
				    } ?>
					    <div class="col-md-3 noPaddingTablet noPaddingMobile text-center">
							<div class="box">
								<?php if($tournament['tournament_winner']) echo $this->Html->link($this->Html->image(h($tournament['tournament_winner']), array('class' => 'img-responsive', 'alt' => $tournament['tournament_name'] . ' ' . $tournament['tournament_year'])), array('controller' => 'tournaments', 'action' => 'view', $tournament['tournament_id']),
							    array('escape' => false)); ?>
								<p class="source"><?php echo $this->Html->link('Image src', $tournament['tournament_winnerSrc'], array('target' => '_blank')); ?></p>
								<p class="tournament-name"><?php echo $this->Html->link(__($tournament['tournament_name']), array('controller' => 'tournaments', 'action' => 'view', $tournament['tournament_id'])); ?></p>
								<h4><?php echo $this->Html->link(__($tournament['tournament_year']), array('controller' => 'tournaments', 'action' => 'view', $tournament['tournament_id'])); ?></h4>
								<span>&nbsp;</span>

								<div class="rounds">
									<ul>
										<?php if(!empty($tournament->rounds)): ?>
											<?php foreach ($tournament->rounds as $round): ?>
												<li>
													<?php echo $this->Html->link(__($round['round_name']), array('controller' => 'rounds', 'action' => 'view', $round['round_id'])); ?>
												</li>
											<?php endforeach; ?>
										<?php else:
											echo '<li class="comming">coming soon</li>';
										 ?>
										<?php endif; ?>
									</ul>
								</div>
							</div>
						</div>
				    <?php if ($count%4 == 0)
				    {
				        echo "</div>";
				    }
				    $count++;
				}
				if ($count%4 != 1) echo "</div>";
		?>
	</div>
	<div class="col-md-1">
	</div>
</div>
<script>
if($('ul > li').length == 4){
	$('ul').addClass("list-rounds");
}
$("div.tournaments").each(function () {
    if($(this).children('div').length == 1){
        $(this).children('div').addClass('col-md-12');
        $(this).children('div').removeClass('col-md-3');
    }
});
$("div.tournaments").each(function () {
    if($(this).children('div').length == 2){
        $(this).children('div').addClass('col-md-6');
        $(this).children('div').removeClass('col-md-3');
    }
});
$("div.tournaments").each(function () {
    if($(this).children('div').length == 3){
        $(this).children('div').addClass('col-md-4');
        $(this).children('div').removeClass('col-md-3');
    }
});
</script>