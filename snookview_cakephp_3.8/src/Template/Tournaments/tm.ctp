<?php $this->start('meta'); ?>
	<title>Snookview - Tournaments</title>
<?php $this->end(); ?>
<div class="row padding-top">
	<div class="col-md-1">
	</div>
	<div class="col-md-10 noPaddingTablet noPadding noPaddingMobile index">
		<h3><?php echo __('The Masters'); ?></h3>
		<div class="row tournaments">
			<?php foreach ($tournaments as $tournament): ?>
				<div class="col-md-3 noPaddingTablet noPaddingMobile text-center">
					<div class="box">
						<a href="<?php WWW_ROOT ?>/tournaments/<?php echo $tournament->tournament_id; ?>/<?php echo $tournament->tournament_slug; ?>">
							<?php if($tournament['tournament_winner']) echo $this->Html->image('/img/winners/' . $tournament['tournament_winner'], array('class' => 'img-responsive', 'alt' => $tournament['tournament_name'] . ' ' . $tournament['tournament_year'])); ?>
						</a>
						<?php //if($tournament['tournament_winner']) echo $this->Html->link($this->Html->image('../' . $tournament['tournament_winner'], array('class' => 'img-responsive', 'alt' => $tournament['tournament_name'] . ' ' . $tournament['tournament_year'])), array('controller' => 'tournaments', 'action' => 'view', $tournament['tournament_id']), array('escape' => false)); ?>
						<p class="source"><?php echo $this->Html->link('Image src', $tournament['tournament_winnerSrc'], array('target' => '_blank')); ?></p>
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
			<?php endforeach ?>
		</div>
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