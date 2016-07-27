<?php $this->start('meta'); ?>
	<title>Snookview Miscue</title>
<?php $this->end(); ?>
<div class="row">
	<div class="col-md-1"></div>
	<div class="col-md-10 noPaddingMobile noPaddingTablet">
		<h3>Miscue <?php printf(
				__d('cake', 'The requested address %s was not found on this server.'),
				"<strong>'{$url}'</strong>"
			); ?>
		</h3>
		<div class="video-container">
			<div id="player">
			</div>
		</div>
		<script>
		var tag = document.createElement('script');
        tag.src = "http://www.youtube.com/player_api";
        var firstScriptTag = document.getElementsByTagName('script')[0];
        firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
        var player;
        function onYouTubePlayerAPIReady() {
            player = new YT.Player('player', {
                videoId: '9VGPvFpkPuY',
                events: {
	            	'onReady': onPlayerReady
	        	}
	        });
	      }
	    function onPlayerReady(event) {
	    	event.target.playVideo();
	    }
        $(function() {
		    $(document).on('click', '#btnSeek', function() {
		        player.seekTo($(this).data('seek'), true);
		    });
		});
		</script>
	</div>
	<div class="col-md-1"></div>
</div>
