<?php $this->start('meta'); ?>
    <!-- META FACEBOOK SHARE-->
    <meta property="og:type" content="website" />
    <meta property="og:title" content="Snookview." />
    <meta property="og:site_name" content="Snookview."/>
    <meta property="og:url" content="http://www.snookview.be/" />
    <meta property="og:description" content="The site for on demand snooker videos of the 3 biggest tournaments." />
    <meta property="og:image" content="http://www.snookview.be/img/snookview-share.png" />

    <!-- META TWITTER SHARE-->
    <meta name="twitter:card" content="photo"/>
    <meta name="twitter:title" content="Snookview." />
    <meta name="twitter:description" content="The site for on demand snooker videos of the 3 biggest tournaments." />
    <meta name="twitter:site" content="Snookview."/>
    <meta name="twitter:image" content="http://www.snookview.be/img/snookview-share.png" />
    
    <title>Snookview</title>
<?php $this->end(); ?>
<div class="row bgWhiteTitle">
    <div class="col-md-12">
        <h3><?php echo 'Last updated video by snookview.<br/>' ?></h3>
    </div>
</div>
<div class="row bgWhite">
    <div class="col-md-1">
    </div>
    <div class="col-md-10 noPaddingTablet noPaddingMobile">
        <div class="video-container">
            <iframe id="video-vimeo" src="https://player.vimeo.com/video/<?php echo $video->video_url ?>" width="640" height="360" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
        </div>
        <div class="matchinformation text-center">
            <ul>
                <li>
                    <h4><?php echo $video->tournament->tournament_name . ' ' . $video->tournament->tournament_year ?></h4>
                </li>
                <li>
                    <h4><?php echo $video->round->round_name. '<br/>' . $video->video_title ?></h4>
                </li>
                <li>
                    <h4><?php echo h(date("d-m-Y", strtotime($video->video_date))); ?></h4>
                </li>
            </ul>
            <div class="matchinformationScorePlayers">
                <div class="score text-center">
                    <p>
                        <?php echo $video->video_scoreA ?>
                    </p>
                </div>
                <?php foreach ($video->players as $player): ?>
                    <div class="player text-center">
                        <p>
                            <?php 
                                echo $this->Html->link(
                                    $player->player_firstname . ' ' . $player->player_surname, [
                                        'controller' => 'players', 
                                        'action' => 'view', 
                                        $player->player_id, '', $player->player_slug
                                    ]
                                ); 
                            ?>
                        </p>
                    </div>
                <?php endforeach; ?>
                <div class="score text-center">
                    <p>
                        <?php echo $video->video_scoreB ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-1">
    </div>
</div>
<!-- <div class="row bgGreenTitle">
    <div class="col-md-12 noPaddingTablet noPaddingMobile">
        <h3 class="white">About</h3>
    </div>
<div> -->
<div class="row bgGreen">
    <div class="col-md-1">
    </div>
    <div class="col-md-10 about">
        <div class="row bgGreenTitle">
            <h3 class="white">About</h3>
        </div>
        <div class="white">
            <p>Hi there and welcome on the 'snookview.' website.</p>
            <p> Here you're at the right address for on demand snooker videos of the 3 biggest tournaments: the UK Championship, the Masters and the World Championship!</p>
            <p>Since the age of 14 I'm very interested in everything about snooker and pool. I spent a lot of time watching the 
                <a href="http://www.bbc.co.uk" target="_blank"><i class="white">BBC</i></a>
                . But my search to find full snooker matches wasn't successfull, so I decided to make my own website with matches from beginning to end.
            </p>
            <p>If you go to the Tournament page you can see al the videos of a tournament by clicking on the picture of the winner. Or if you only like to see the matches of a particular round you can click on the link of a round. Underneath each match there is a possibility to add a timeline. Each timeline has specific clickable items and each item represent a moment in the video. After clicking an item you go to that specific moment in the video. <!-- If you know a nice moment in a particular match, please <a href="/contact" class="white"><i>contact</i></a> me with the match and the specific time of the moment. Or ask me for permission to add the item yourself, I will give you access. --></p>
            <p>All videos provided on this website are recorded by me from the BBC channel but I don't own the rights to those snooker matches. Those rights belong to the 
                <a href="http://www.bbc.co.uk" target="_blank"><i class="white">BBC</i></a>
                !<p>Here are some other 
                <a href="http://www.bbc.co.uk" target="_blank"><i class="white">BBC</i></a>
                 websites:
            </p>
            <ul>
                <li><a href="http://www.bbc.com/sport/" target="_blank"><i class="white">BBC Sport</i></a></li>
                <li><a href="http://www.bbc.co.uk/iplayer" target="_blank"><i class="white">BBC iPlayer</i></a></li>
                <li><a href="http://www.bbc.co.uk/bbcone" target="_blank"><i class="white">BBC One</i></a></li>
                <li><a href="http://www.bbc.co.uk/bbctwo" target="_blank"><i class="white">BBC Two</i></a></li>
            </ul>
            <p>'Snookview.' also doesn't have the ownership of any pictures used on the website. Underneath each picture there is written: <i>'Image src'</i>. When clicking on it you go to the sources website where you can find the original image.</p>
            <!-- <p>Any other questions? Feel free to <a href="/contact"><i class="white">contact</i></a> me! I will get back to you asap!</p> -->
            <br/>
            <br/>
            <p>Greetings</p>
            <p><a href="/" class="white"><i class="white">Snookview.</i></a></p>
        </div>
    </div>
    <div class="col-md-1">
    </div>
</div>
<div class="row bgWhiteTitle">
    <div class="col-md-12 noPaddingTablet noPaddingMobile">
        <h3 class="">Player Profiles</h2>
    </div>
<div>
<div class="row bgWhite">
    <div class="col-md-1">
    </div>
    <div class="col-md-10 noPaddingTablet noPaddingMobile">
        <div class="row players">
            <?php foreach ($players as $player): ?>
                <div class="col-md-3 col-sm-6 col-xs-6 player-image noPaddingTablet noPaddingMobile">
                    <?php 
                        if(!empty($player->player_image)): {
                            echo $this->Html->link(
                                $this->Html->image(
                                    '/img/players/' . $player->player_image, [
                                        'class' => 'thumb img-responsive', 
                                        'alt' => $player->player_firstname . ' ' . $player->player_surname
                                        ]
                                    ) 
                                    . '<p class="img-responsive">' . $player->player_surname . '</p>', [
                                        'controller' => 'players', 
                                        'action' => '', 
                                        $player->player_id, '', $player->player_slug
                                    ], [
                                        'escape' => false
                                    ]
                                ); 
                            } 
                        ?>
                        <?php 
                            else:{
                                echo $this->Html->link(
                                    $this->Html->image('/img/players/Profile.jpg', [
                                        'class' => 'thumb img-responsive'
                                        ]
                                    ) .  '<p>' . $player->player_surname . '</p>', [
                                        'controller' => 'players', 
                                        'action' => 'view', 
                                        $player->player_id, '', $player->player_slug
                                    ],
                                    [
                                        'escape' => false
                                    ]
                                ); 
                            } 
                        ?>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="col-md-1">
    </div>
</div>
<div class="row bgGreenTitle">
    <div class="col-md-12 noPaddingTablet noPaddingMobile">
        <h3 class="white">World Snooker ranking Top 16 <?php echo '(' . $season->season_beginYear . ' - ' . $season->season_endYear . ')'; ?></h3>
    </div>
</div>
<div class="row bgGreen">
    <div class="col-md-1">
    </div>
    <div class="col-md-10 noPaddingTablet noPaddingMobile">
        <div id="table-container" class="table-responsive table-container">
            <table class="ranking home">
                <?php foreach ($rankings as $ranking): ?>
                    <tr>
                        <td class="text-center">
                            <?php 
                                echo $ranking->ranking_rank 
                            ?>
                        </td> 
                        <td class="text-center">
                            <?php 
                                if($ranking->player->player_flag) 
                                    echo $this->Html->image(
                                        '/img/flags/' . $ranking->player->player_flag, [
                                            'class' => 'flag'
                                        ]
                                    )
                                ; 
                            ?>
                        </td>
                        <td class="text-center">
                            <a href="<?php WWW_ROOT ?>/players/<?php echo $ranking->player->player_id; ?>/<?php echo $ranking->player->player_slug; ?>">
                                <?php 
                                    echo $ranking->player->player_firstname . ' ' .  $ranking->player->player_surname;
                                ?>
                            </a>
                        </td>
                        <td class="text-center">
                            <?php echo $ranking->ranking_points ?>
                        </td> 
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
    <div class="col-md-1">
    </div>
</div>
<div class="row bgWhiteTitle">
    <div class="col-md-12 noPaddingTablet noPaddingMobile">
        <h3>Social Media</h3>
    </div>
</div>
<div class="row bgWhite">
    <div class="col-md-4">
    </div>
    <div class="col-md-1 col-sm-4 col-xs-4 padding-bottom">
        <a href="https://www.facebook.com/snookview/" class="" data-lang="en" target="_blank">
            <?php echo $this->Html->image('assets/fb.png', array('class' => 'socialImgLarge center-block', 'alt' => 'https://www.facebook.com/snookview')); ?>
        </a>
    </div>
    <div class="col-md-1 col-sm-4 col-xs-4 padding-bottom">
        <a href="https://twitter.com/snookview" class="" data-lang="en" target="_blank">
            <?php echo $this->Html->image('assets/tw.png', array('class' => 'socialImgLarge center-block', 'alt' => 'https://twitter.com/snookview')); ?>
        </a>
    </div>
    <div class="col-md-1 col-sm-4 col-xs-4 padding-bottom">
        <a href="https://www.youtube.com/channel/UC6hrDfllhCdWtiW-HI2stDw" class="" data-lang="en" target="_blank">
            <?php echo $this->Html->image('assets/yt.png', array('class' => 'socialImgLarge center-block', 'alt' => 'https://www.youtube.com/channel/UC6hrDfllhCdWtiW-HI2stDw'));?>
        </a>
    </div>
    <div class="col-md-1 col-sm-4 col-xs-4 padding-bottom">
        <a href="https://www.instagram.com/snookview/" class="" data-lang="en" target="_blank">
            <?php echo $this->Html->image('assets/instagram.png', array('class' => 'socialImgLarge center-block', 'alt' => 'https://www.instagram.com/snookview/')); ?>
        </a>
    </div>
    <div class="col-md-4">
    </div>
</div>
<script>
    var tag = document.createElement('script');
    tag.src = "https://www.youtube.com/player_api";
    var firstScriptTag = document.getElementsByTagName('script')[0];
    firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
    var player;
    var video_sort = '<?php echo $video['Video']['video_sort'] ?>';
    //console.log(video_sort);
    function onYouTubePlayerAPIReady() {
        if(video_sort == 'Single'){
            player = new YT.Player('player', {
                videoId: '<?php echo $video['Video']['video_url'] ?>'
          });
        }
        else if(video_sort == 'Playlist'){
            player = new YT.Player('player', {
                /*videoId: '<?php //echo $video['Video']['video_url'] ?>',*/
                    playerVars: {
                        listType:'playlist',
                        list: '<?php echo $video['Video']['video_url_playlist'] ?>'
                       /* playlist:     '<?php //echo $video['Video']['video_url_part_two'] . ',' . $video['Video']['video_url_part_three'] . ',' . $video['Video']['video_url_part_four'] . ',' . $video['Video']['video_url_part_five'] . ',' . $video['Video']['video_url_part_six'] . ',' . $video['Video']['video_url_part_seven'] . ',' . $video['Video']['video_url_part_eight'] . ',' . $video['Video']['video_url_part_nine'] . ',' . $video['Video']['video_url_part_ten'] ?>'*/
                                    
                    }
            });
        }
    }
</script>