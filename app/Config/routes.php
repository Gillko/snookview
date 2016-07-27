<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Config
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
/**
 * Here, we are connecting '/' (base path) to controller called 'Pages',
 * its action called 'display', and we pass a param to select the view file
 * to use (in this case, /app/View/Pages/home.ctp)...
 */
	Router::connect('/', array('controller' => 'pages', 'action' => 'display', 'home'));
/**
 * ...and connect the rest of 'Pages' controller's URLs.
 */
	Router::connect('/pages/*', array('controller' => 'pages', 'action' => 'display'));

	/*PLAYER ROUTES*/

	Router::connect('/players', array('controller' => 'players', 'action' => 'index'));

	Router::connect("/players/adam-duffy", array("controller" => "players", "action" => "view", 1));
	Router::connect('/players/aditya-mehta', array('controller' => 'players', 'action' => 'view', 2));
	Router::connect("/players/alan-mcmanus", array("controller" => "players", "action" => "view", 3));
	Router::connect("/players/alfie-burden", array("controller" => "players", "action" => "view", 4));
	Router::connect("/players/ali-carter", array("controller" => "players", "action" => "view", 5));
	Router::connect("/players/andrew-higginson", array("controller" => "players", "action" => "view", 6));
	Router::connect("/players/andrew-norman", array("controller" => "players", "action" => "view", 7));
	Router::connect("/players/anthony-hamilton", array("controller" => "players", "action" => "view", 8));
	Router::connect("/players/anthony-mcgill", array("controller" => "players", "action" => "view", 9));
	Router::connect("/players/barry-hawkins", array("controller" => "players", "action" => "view", 10));
	Router::connect("/players/barry-pinches", array("controller" => "players", "action" => "view", 11));
	Router::connect("/players/ben-woollaston", array("controller" => "players", "action" => "view", 12));
	Router::connect("/players/cao-yupeng", array("controller" => "players", "action" => "view", 13));
	Router::connect("/players/chen-zhe", array("controller" => "players", "action" => "view", 14));
	Router::connect("/players/craig-steadman", array("controller" => "players", "action" => "view", 15));
	Router::connect("/players/daniel-wells", array("controller" => "players", "action" => "view", 16));
	Router::connect("/players/dave-harold", array("controller" => "players", "action" => "view", 17));
	Router::connect("/players/david -gilbert", array("controller" => "players", "action" => "view", 18));
	Router::connect("/players/david-grace", array("controller" => "players", "action" => "view", 19));
	Router::connect("/players/david-morris", array("controller" => "players", "action" => "view", 20));
	Router::connect("/players/dechawat-poomjaeng", array("controller" => "players", "action" => "view", 21));
	Router::connect("/players/ding-junhui", array("controller" => "players", "action" => "view", 22));
	Router::connect("/players/dominic-dale", array("controller" => "players", "action" => "view", 23));
	Router::connect("/players/fergal-obrien", array("controller" => "players", "action" => "view", 24));
	Router::connect("/players/gerard-greene", array("controller" => "players", "action" => "view", 25));
	Router::connect("/players/graeme-dott", array("controller" => "players", "action" => "view", 26));
	Router::connect("/players/hossein-vafaei", array("controller" => "players", "action" => "view", 27));
	Router::connect("/players/ian-burns", array("controller" => "players", "action" => "view", 28));
	Router::connect("/players/jack-lisowski", array("controller" => "players", "action" => "view", 29));
	Router::connect("/players/james-wattana", array("controller" => "players", "action" => "view", 30));
	Router::connect("/players/jamie-burnett", array("controller" => "players", "action" => "view", 31));
	Router::connect("/players/jamie-cope", array("controller" => "players", "action" => "view", 32));
	Router::connect("/players/jamie-jones", array("controller" => "players", "action" => "view", 33));
	Router::connect("/players/jamie-oneill", array("controller" => "players", "action" => "view", 34));
	Router::connect("/players/jimmy-robertson", array("controller" => "players", "action" => "view", 35));
	Router::connect("/players/jimmy-white", array("controller" => "players", "action" => "view", 36));
	Router::connect("/players/joe-perry", array("controller" => "players", "action" => "view", 37));
	Router::connect("/players/joe-swail", array("controller" => "players", "action" => "view", 38));
	Router::connect("/players/joel-walker", array("controller" => "players", "action" => "view", 39));
	Router::connect("/players/john-higgins", array("controller" => "players", "action" => "view", 40));
	Router::connect("/players/judd-trump", array("controller" => "players", "action" => "view", 41));
	Router::connect("/players/ken-doherty", array("controller" => "players", "action" => "view", 42));
	Router::connect("/players/kurt-maflin", array("controller" => "players", "action" => "view", 43));
	Router::connect("/players/li-yan", array("controller" => "players", "action" => "view", 44));
	Router::connect("/players/liam-highfield", array("controller" => "players", "action" => "view", 45));
	Router::connect("/players/liang-wenbo", array("controller" => "players", "action" => "view", 46));
	Router::connect("/players/liu-chuang", array("controller" => "players", "action" => "view", 47));
	Router::connect("/players/luca-brecel", array("controller" => "players", "action" => "view", 48));
	Router::connect("/players/marco-fu", array("controller" => "players", "action" => "view", 49));
	Router::connect("/players/marcus-campbell", array("controller" => "players", "action" => "view", 50));
	Router::connect("/players/mark-allen", array("controller" => "players", "action" => "view", 51));
	Router::connect("/players/mark-davis", array("controller" => "players", "action" => "view", 52));
	Router::connect("/players/mark-joyce", array("controller" => "players", "action" => "view", 53));
	Router::connect("/players/mark-king", array("controller" => "players", "action" => "view", 54));
	Router::connect("/players/mark-selby", array("controller" => "players", "action" => "view", 55));
	Router::connect("/players/mark-williams", array("controller" => "players", "action" => "view", 56));
	Router::connect("/players/martin-gould", array("controller" => "players", "action" => "view", 57));
	Router::connect("/players/martin-o'donnell", array("controller" => "players", "action" => "view", 58));
	Router::connect("/players/matthew-selt", array("controller" => "players", "action" => "view", 59));
	Router::connect("/players/matthew-stevens", array("controller" => "players", "action" => "view", 60));
	Router::connect("/players/michael-holt", array("controller" => "players", "action" => "view", 61));
	Router::connect("/players/michael-leslie", array("controller" => "players", "action" => "view", 62));
	Router::connect("/players/michael-wasley", array("controller" => "players", "action" => "view", 63));
	Router::connect("/players/michael-white", array("controller" => "players", "action" => "view", 64));
	Router::connect("/players/mike-dunn", array("controller" => "players", "action" => "view", 65));
	Router::connect("/players/neil-robertson", array("controller" => "players", "action" => "view", 66));
	Router::connect("/players/nigel-bond", array("controller" => "players", "action" => "view", 67));
	Router::connect("/players/pankaj-advani", array("controller" => "players", "action" => "view", 68));
	Router::connect("/players/passakorn-suwannawat", array("controller" => "players", "action" => "view", 69));
	Router::connect("/players/paul-davison", array("controller" => "players", "action" => "view", 70));
	Router::connect("/players/peter-ebdon", array("controller" => "players", "action" => "view", 71));
	Router::connect("/players/peter-lines", array("controller" => "players", "action" => "view", 72));
	Router::connect("/players/ricky-walden", array("controller" => "players", "action" => "view", 73));
	Router::connect("/players/robbie-williams", array("controller" => "players", "action" => "view", 74));
	Router::connect("/players/robert-milkins", array("controller" => "players", "action" => "view", 75));
	Router::connect("/players/robin-hull", array("controller" => "players", "action" => "view", 76));
	Router::connect("/players/rod-lawler", array("controller" => "players", "action" => "view", 77));
	Router::connect("/players/ronnie-osullivan", array("controller" => "players", "action" => "view", 78));
	Router::connect("/players/rory-mcleod", array("controller" => "players", "action" => "view", 79));
	Router::connect("/players/ryan-day", array("controller" => "players", "action" => "view", 80));
	Router::connect("/players/sam-baird", array("controller" => "players", "action" => "view", 81));
	Router::connect("/players/scott-donaldson", array("controller" => "players", "action" => "view", 82));
	Router::connect("/players/sean-osullivan", array("controller" => "players", "action" => "view", 83));
	Router::connect("/players/shaun-murphy", array("controller" => "players", "action" => "view", 84));
	Router::connect("/players/simon-bedford", array("controller" => "players", "action" => "view", 85));
	Router::connect("/players/stephen-hendry", array("controller" => "players", "action" => "view", 86));
	Router::connect("/players/stephen-lee", array("controller" => "players", "action" => "view", 87));
	Router::connect("/players/stephen-maguire", array("controller" => "players", "action" => "view", 88));
	Router::connect("/players/steve-davis", array("controller" => "players", "action" => "view", 89));
	Router::connect("/players/stuart-bingham", array("controller" => "players", "action" => "view", 90));
	Router::connect("/players/thanawat-thirapongpaiboon", array("controller" => "players", "action" => "view", 91));
	Router::connect("/players/thepchaiya-un-nooh", array("controller" => "players", "action" => "view", 92));
	Router::connect("/players/tian-pengfei", array("controller" => "players", "action" => "view", 93));
	Router::connect("/players/tom-ford", array("controller" => "players", "action" => "view", 94));
	Router::connect("/players/tony-drago", array("controller" => "players", "action" => "view", 95));
	Router::connect("/players/xiao-guodong", array("controller" => "players", "action" => "view", 96));
	Router::connect("/players/yu-delu", array("controller" => "players", "action" => "view", 97));
	Router::connect("/players/zhang-anda", array("controller" => "players", "action" => "view", 98));
	Router::connect("/players/gary-wilson", array("controller" => "players", "action" => "view", 99));
	Router::connect("/players/kyren-wilson", array("controller" => "players", "action" => "view", 100));
	Router::connect("/players/stuart-carrington", array("controller" => "players", "action" => "view", 101));
	Router::connect("/players/li-hang", array("controller" => "players", "action" => "view", 102));
	Router::connect("/players/noppon-saengkham", array("controller" => "players", "action" => "view", 103));
	Router::connect("/players/chris-wakelin", array("controller" => "players", "action" => "view", 105));
	Router::connect("/players/alex-davies", array("controller" => "players", "action" => "view", 106));
	Router::connect("/players/john-astley", array("controller" => "players", "action" => "view", 107));
	Router::connect("/players/andrew-pagett", array("controller" => "players", "action" => "view", 108));
	Router::connect("/players/hammad-miah", array("controller" => "players", "action" => "view", 109));
	Router::connect("/players/vinnie-calabrese", array("controller" => "players", "action" => "view", 110));
	Router::connect("/players/michael-georgiou", array("controller" => "players", "action" => "view", 111));
	Router::connect("/players/alex-borg", array("controller" => "players", "action" => "view", 112));
	Router::connect("/players/elliot-slessor", array("controller" => "players", "action" => "view", 114));
	Router::connect("/players/chris-norbury", array("controller" => "players", "action" => "view", 115));
	Router::connect("/players/igor-figueiredo", array("controller" => "players", "action" => "view", 116));
	Router::connect("/players/ross-muir", array("controller" => "players", "action" => "view", 117));
	Router::connect("/players/ratchayothin-yotharuck", array("controller" => "players", "action" => "view", 118));
	Router::connect("/players/lee-page", array("controller" => "players", "action" => "view", 119));
	Router::connect("/players/cao-xinlong", array("controller" => "players", "action" => "view", 120));
	Router::connect("/players/oliver-lines", array("controller" => "players", "action" => "view", 121));
	Router::connect("/players/zhou-yuelong", array("controller" => "players", "action" => "view", 122));
	Router::connect("/players/lu-chenwei", array("controller" => "players", "action" => "view", 123));
	Router::connect("/players/chris-melling", array("controller" => "players", "action" => "view", 124));
	Router::connect("/players/james-cahill", array("controller" => "players", "action" => "view", 125));
	Router::connect("/players/alexander-ursenbacher", array("controller" => "players", "action" => "view", 126));
	Router::connect("/players/allan-taylor", array("controller" => "players", "action" => "view", 127));
	Router::connect("/players/ryan-clark", array("controller" => "players", "action" => "view", 128));
	Router::connect("/players/lu-ning", array("controller" => "players", "action" => "view", 129));
	Router::connect("/players/ian-glover", array("controller" => "players", "action" => "view", 130));
	Router::connect("/players/ju-reti", array("controller" => "players", "action" => "view", 131));
	Router::connect("/players/jak-jones", array("controller" => "players", "action" => "view", 133));
	Router::connect("/players/steven-hallworth", array("controller" => "players", "action" => "view", 134));
	Router::connect("/players/lee-walker", array("controller" => "players", "action" => "view", 135));
	Router::connect("/players/lee-spick", array("controller" => "players", "action" => "view", 136));
	Router::connect("/players/ahmed-saif", array("controller" => "players", "action" => "view", 137));
	Router::connect("/players/khaled-abumdas", array("controller" => "players", "action" => "view", 138));
	Router::connect("/players/rouzi-maimaiti", array("controller" => "players", "action" => "view", 139));
	Router::connect("/players/zak-surety", array("controller" => "players", "action" => "view", 140));
	Router::connect("/players/thor-chuanleong", array("controller" => "players", "action" => "view", 141));
	Router::connect("/players/mitchell-mann", array("controller" => "players", "action" => "view", 142));
	Router::connect("/players/andy-hicks", array("controller" => "players", "action" => "view", 144));
	Router::connect("/players/steve-mifsud", array("controller" => "players", "action" => "view", 143));
	Router::connect("/players/ben-judge", array("controller" => "players", "action" => "view", 145));
	Router::connect("/players/mohamed-khairy", array("controller" => "players", "action" => "view", 146));
	Router::connect("/players/floyd-ziegler", array("controller" => "players", "action" => "view", 147));
	Router::connect("/players/jin-long", array("controller" => "players", "action" => "view", 148));
	Router::connect("/players/patrick-einsle", array("controller" => "players", "action" => "view", 149));
	Router::connect("/players/shi-hanqing", array("controller" => "players", "action" => "view", 150));
	Router::connect("/players/lyu-haotian", array("controller" => "players", "action" => "view", 152));
	Router::connect("/players/sanderson-lam", array("controller" => "players", "action" => "view", 153));
	Router::connect("/players/darryl-hill", array("controller" => "players", "action" => "view", 154));
	Router::connect("/players/michael-wild", array("controller" => "players", "action" => "view", 155));
	Router::connect("/players/gareth-allen", array("controller" => "players", "action" => "view", 156));
	Router::connect("/players/eden-sharav", array("controller" => "players", "action" => "view", 157));
	Router::connect("/players/jason-weston", array("controller" => "players", "action" => "view", 158));
	Router::connect("/players/zhang-yong", array("controller" => "players", "action" => "view", 159));
	Router::connect("/players/rhys-clark", array("controller" => "players", "action" => "view", 160));
	Router::connect("/players/duane-jones", array("controller" => "players", "action" => "view", 161));
	Router::connect("/players/sydney-wilson", array("controller" => "players", "action" => "view", 162));
	Router::connect("/players/akani-songsermsawad", array("controller" => "players", "action" => "view", 163));
	Router::connect("/players/hamza-akbar", array("controller" => "players", "action" => "view", 164));
	Router::connect("/players/hatem-yassen", array("controller" => "players", "action" => "view", 165));
	Router::connect("/players/itaro-santos", array("controller" => "players", "action" => "view", 166));
	Router::connect("/players/antony-parsons", array("controller" => "players", "action" => "view", 167));
	Router::connect("/players/shane-castle", array("controller" => "players", "action" => "view", 168));
	Router::connect("/players/patrick-fraser", array("controller" => "players", "action" => "view", 169));

	Router::connect('/players/*', array('controller' => 'players', 'action' => 'view'));

	/*TOURNAMENT ROUTES*/

	Router::connect('/tournaments', array('controller' => 'tournaments', 'action' => 'index'));

	Router::connect("/tournaments/uk-championship-2012", array("controller" => "tournaments", "action" => "view", 1));
	Router::connect("/tournaments/the-masters-2013", array("controller" => "tournaments", "action" => "view", 2));
	Router::connect("/tournaments/world-championship-2013", array("controller" => "tournaments", "action" => "view", 3));
	Router::connect("/tournaments/uk-championship-2013", array("controller" => "tournaments", "action" => "view", 4));
	Router::connect("/tournaments/the-masters-2014", array("controller" => "tournaments", "action" => "view", 5));
	Router::connect("/tournaments/world-championship-2014", array("controller" => "tournaments", "action" => "view", 6));
	Router::connect("/tournaments/uk-championship-2014", array("controller" => "tournaments", "action" => "view", 7));
	Router::connect("/tournaments/the-masters-2015", array("controller" => "tournaments", "action" => "view", 8));

	Router::connect("/tournaments/uk-championship", array("controller" => "tournaments", "action" => "uk"));
	Router::connect("/tournaments/the-masters", array("controller" => "tournaments", "action" => "tm"));
	Router::connect("/tournaments/world-championship", array("controller" => "tournaments", "action" => "wc"));

	Router::connect('/tournaments/*', array('controller' => 'tournaments', 'action' => 'view'));

	/*VIDEO ROUTES*/

	Router::connect('/videos', array('controller' => 'videos', 'action' => 'index'));

	/*ALREADY SHARED VIDEO ROUTES*/

	Router::connect("/videos/view/1", array("controller" => "videos", "action" => "view", 1));
	Router::connect("/videos/view/2", array("controller" => "videos", "action" => "view", 2));
	Router::connect("/videos/view/21", array("controller" => "videos", "action" => "view", 21));
	Router::connect("/videos/view/100", array("controller" => "videos", "action" => "view", 100));
	Router::connect("/videos/view/117", array("controller" => "videos", "action" => "view", 117));
	Router::connect("/videos/view/167", array("controller" => "videos", "action" => "view", 167));
	Router::connect("/videos/view/237", array("controller" => "videos", "action" => "view", 237));
	Router::connect("/videos/view/238", array("controller" => "videos", "action" => "view", 238));
	Router::connect("/videos/view/239", array("controller" => "videos", "action" => "view", 239));
	Router::connect("/videos/view/242", array("controller" => "videos", "action" => "view", 242));
	Router::connect("/videos/view/243", array("controller" => "videos", "action" => "view", 243));
	Router::connect("/videos/view/244", array("controller" => "videos", "action" => "view", 244));
	Router::connect("/videos/view/245", array("controller" => "videos", "action" => "view", 245));
	Router::connect("/videos/view/246", array("controller" => "videos", "action" => "view", 246));
	Router::connect("/videos/view/247", array("controller" => "videos", "action" => "view", 247));
	Router::connect("/videos/view/248", array("controller" => "videos", "action" => "view", 248));
	Router::connect("/videos/view/249", array("controller" => "videos", "action" => "view", 249));
	Router::connect("/videos/view/250", array("controller" => "videos", "action" => "view", 250));
	Router::connect("/videos/view/251", array("controller" => "videos", "action" => "view", 251));
	Router::connect("/videos/view/252", array("controller" => "videos", "action" => "view", 252));
	Router::connect("/videos/view/253", array("controller" => "videos", "action" => "view", 253));
	Router::connect("/videos/view/254", array("controller" => "videos", "action" => "view", 254));
	Router::connect("/videos/view/255", array("controller" => "videos", "action" => "view", 255));
	Router::connect("/videos/view/256", array("controller" => "videos", "action" => "view", 256));
	Router::connect("/videos/view/257", array("controller" => "videos", "action" => "view", 257));
	Router::connect("/videos/view/258", array("controller" => "videos", "action" => "view", 258));
	Router::connect("/videos/view/259", array("controller" => "videos", "action" => "view", 259));
	Router::connect("/videos/view/260", array("controller" => "videos", "action" => "view", 260));
	Router::connect("/videos/view/261", array("controller" => "videos", "action" => "view", 261));
	Router::connect("/videos/view/262", array("controller" => "videos", "action" => "view", 262));
	Router::connect("/videos/view/263", array("controller" => "videos", "action" => "view", 263));
	Router::connect("/videos/view/264", array("controller" => "videos", "action" => "view", 264));
	Router::connect("/videos/view/265", array("controller" => "videos", "action" => "view", 265));
	Router::connect("/videos/view/266", array("controller" => "videos", "action" => "view", 266));
	Router::connect("/videos/view/267", array("controller" => "videos", "action" => "view", 267));

	Router::connect("/videos/uk-championship-2012/first-round/john-higgins-vs-michael-holt", array("controller" => "videos", "action" => "view", 1));
	Router::connect("/videos/uk-championship-2012/first-round/john-higgins-vs-michael-holt-part-two", array("controller" => "videos", "action" => "view", 2));
	Router::connect("/videos/uk-championship-2012/first-round/ding-junghui-vs-ryan-day-highlights", array("controller" => "videos", "action" => "view", 3));
	Router::connect("/videos/uk-championship-2012/first-round/barry-hawkins-vs-liang-wenbo-snooker-extra", array("controller" => "videos", "action" => "view", 4));
	Router::connect("/videos/uk-championship-2012/first-round/shaun-murphy-vs-robert-milkins", array("controller" => "videos", "action" => "view", 5));
	Router::connect("/videos/uk-championship-2012/first-round/judd-trump-vs-mark-joyce", array("controller" => "videos", "action" => "view", 6));
	Router::connect("/videos/uk-championship-2012/first-round/mark-davis-vs-cao-yupeng-snooker-extra", array("controller" => "videos", "action" => "view", 7));
	Router::connect("/videos/uk-championship-2012/first-round/neil-robertson-vs-tom-ford", array("controller" => "videos", "action" => "view", 8));
	Router::connect("/videos/uk-championship-2012/first-round/mark-williams-vs-mark-king", array("controller" => "videos", "action" => "view", 9));
	Router::connect("/videos/uk-championship-2012/first-round/matthew-stevens-vs-dominic-dale-snooker-extra", array("controller" => "videos", "action" => "view", 10));
	Router::connect("/videos/uk-championship-2012/second-round/matthew-stevens-vs-marco-fu", array("controller" => "videos", "action" => "view", 11));
	Router::connect("/videos/uk-championship-2012/second-round/stephen-maguire-vs-stuart-bingham-highlights-", array("controller" => "videos", "action" => "view", 12));
	Router::connect("/videos/uk-championship-2012/second-round/mark-joyce-vs-ali-carter-snooker-extra", array("controller" => "videos", "action" => "view", 13));
	Router::connect("/videos/uk-championship-2012/second-round/mark-selby-vs-ryan-day", array("controller" => "videos", "action" => "view", 14));
	Router::connect("/videos/uk-championship-2012/second-round/john-higgins-vs-mark-davis", array("controller" => "videos", "action" => "view", 15));
	Router::connect("/videos/uk-championship-2012/quarter-finals/shaun-murphy-vs-luca-brecel", array("controller" => "videos", "action" => "view", 16));
	Router::connect("/videos/uk-championship-2012/quarter-finals/mark-selby-vs-neil-robertson", array("controller" => "videos", "action" => "view", 17));
	Router::connect("/videos/uk-championship-2012/quarter-finals/mark-selby-vs-neil-robertson-highlights", array("controller" => "videos", "action" => "view", 18));
	Router::connect("/videos/uk-championship-2012/semi-finals/shaun-murphy-vs-ali-carter", array("controller" => "videos", "action" => "view", 19));
	Router::connect("/videos/uk-championship-2012/semi-finals/shaun-murphy-vs-ali-carter-part-two", array("controller" => "videos", "action" => "view", 20));
	Router::connect("/videos/uk-championship-2012/semi-finals/shaun-murphy-vs-ali-carter-highlights", array("controller" => "videos", "action" => "view", 21));
	Router::connect("/videos/uk-championship-2012/semi-finals/mark-selby-vs-mark-davis", array("controller" => "videos", "action" => "view", 22));
	Router::connect("/videos/uk-championship-2012/semi-finals/mark-selby-vs-mark-davis-part-two", array("controller" => "videos", "action" => "view", 23));
	Router::connect("/videos/uk-championship-2012/final/mark-selby-vs-shaun-murphy", array("controller" => "videos", "action" => "view", 24));
	Router::connect("/videos/uk-championship-2012/final/mark-selby-vs-shaun-murphy-part-two", array("controller" => "videos", "action" => "view", 25));
	Router::connect("/videos/the-masters-2013/first-round/neil-robertson-vs-ding-junghui", array("controller" => "videos", "action" => "view", 26));
	Router::connect("/videos/the-masters-2013/first-round/neil-robertson-vs-ding-junghui-highlights", array("controller" => "videos", "action" => "view", 27));
	Router::connect("/videos/the-masters-2013/first-round/neil-robertson-vs-ding-junghui-snooker-extra", array("controller" => "videos", "action" => "view", 28));
	Router::connect("/videos/the-masters-2013/first-round/john-higgins-vs-ali-carter", array("controller" => "videos", "action" => "view", 29));
	Router::connect("/videos/the-masters-2013/first-round/stephen-maguire-vs-graeme-dott-highlights", array("controller" => "videos", "action" => "view", 30));
	Router::connect("/videos/the-masters-2013/first-round/john-higgins-vs-ali-carter-snooker-extra", array("controller" => "videos", "action" => "view", 31));
	Router::connect("/videos/the-masters-2013/first-round/judd-trump-vs-barry-hawkins", array("controller" => "videos", "action" => "view", 32));
	Router::connect("/videos/the-masters-2013/first-round/judd-trump-vs-barry-hawkins-highlights", array("controller" => "videos", "action" => "view", 33));
	Router::connect("/videos/the-masters-2013/first-round/judd-trump-vs-barry-hawkins-snooker-extra", array("controller" => "videos", "action" => "view", 34));
	Router::connect("/videos/the-masters-2013/first-round/mark-williams-vs-matthew-stevens", array("controller" => "videos", "action" => "view", 35));
	Router::connect("/videos/the-masters-2013/first-round/mark-williams-vs-matthew-stevens-highlights", array("controller" => "videos", "action" => "view", 36));
	Router::connect("/videos/the-masters-2013/first-round/mark-williams-vs-matthew-stevens-snooker-extra", array("controller" => "videos", "action" => "view", 37));
	Router::connect("/videos/the-masters-2013/quarter-finals/neil-robertson-vs-mark-allen", array("controller" => "videos", "action" => "view", 38));
	Router::connect("/videos/the-masters-2013/quarter-finals/john-higgins-vs-shaun-murphy", array("controller" => "videos", "action" => "view", 39));
	Router::connect("/videos/the-masters-2013/quarter-finals/john-higgins-vs-shaun-murphy-highlights", array("controller" => "videos", "action" => "view", 40));
	Router::connect("/videos/the-masters-2013/quarter-finals/neil-robertson-vs-mark-allen-snooker-extra", array("controller" => "videos", "action" => "view", 41));
	Router::connect("/videos/the-masters-2013/quarter-finals/judd-trump-vs-graeme-dott", array("controller" => "videos", "action" => "view", 42));
	Router::connect("/videos/the-masters-2013/quarter-finals/mark-selby-vs-mark-williams", array("controller" => "videos", "action" => "view", 43));
	Router::connect("/videos/the-masters-2013/quarter-finals/mark-selby-vs-mark-williams-highlights", array("controller" => "videos", "action" => "view", 44));
	Router::connect("/videos/the-masters-2013/quarter-finals/judd-trump-vs-graeme-dott-snooker-extra", array("controller" => "videos", "action" => "view", 45));
	Router::connect("/videos/the-masters-2013/semi-finals/shaun-murphy-vs-neil-robertson", array("controller" => "videos", "action" => "view", 46));
	Router::connect("/videos/the-masters-2013/semi-finals/shaun-murphy-vs-neil-robertson-part-two", array("controller" => "videos", "action" => "view", 47));
	Router::connect("/videos/the-masters-2013/semi-finals/mark-selby-vs-graeme-dott", array("controller" => "videos", "action" => "view", 48));
	Router::connect("/videos/the-masters-2013/semi-finals/shaun-murphy-vs-neil-robertson-snooker-extra", array("controller" => "videos", "action" => "view", 49));
	Router::connect("/videos/the-masters-2013/final/mark-selby-vs-neil-robertson", array("controller" => "videos", "action" => "view", 50));
	Router::connect("/videos/the-masters-2013/final/mark-selby-vs-neil-robertson-part-two", array("controller" => "videos", "action" => "view", 51));
	Router::connect("/videos/world-championship-2013/first-round/ronnie-osullivan-vs-marcus-campbell", array("controller" => "videos", "action" => "view", 52));
	Router::connect("/videos/world-championship-2013/first-round/ronnie-osullivan-vs-marcus-campbell-part-two", array("controller" => "videos", "action" => "view", 53));
	Router::connect("/videos/world-championship-2013/first-round/shaun-murphy-vs-martin-gould", array("controller" => "videos", "action" => "view", 54));
	Router::connect("/videos/world-championship-2013/first-round/ronnie-osullivan-vs-marcus-campbell-part-three", array("controller" => "videos", "action" => "view", 55));
	Router::connect("/videos/world-championship-2013/first-round/ronnie-osullivan-vs-marcus-campbell-highlights", array("controller" => "videos", "action" => "view", 56));
	Router::connect("/videos/world-championship-2013/first-round/ricky-walden-vs-michael-holt-snooker-extra", array("controller" => "videos", "action" => "view", 57));
	Router::connect("/videos/world-championship-2013/first-round/mark-williams-vs-michael-white", array("controller" => "videos", "action" => "view", 58));
	Router::connect("/videos/world-championship-2013/first-round/mark-williams-vs-michael-white-highlights", array("controller" => "videos", "action" => "view", 59));
	Router::connect("/videos/world-championship-2013/first-round/greame-dott-vs-peter-ebdon-snooker-extra", array("controller" => "videos", "action" => "view", 60));
	Router::connect("/videos/world-championship-2013/first-round/mark-allen-vs-mark-king", array("controller" => "videos", "action" => "view", 61));
	Router::connect("/videos/world-championship-2013/first-round/graeme-dott-vs-peter-ebdon", array("controller" => "videos", "action" => "view", 62));
	Router::connect("/videos/world-championship-2013/first-round/john-higgins-vs-mark-davis-highlights", array("controller" => "videos", "action" => "view", 63));
	Router::connect("/videos/world-championship-2013/first-round/stephen-maguire-vs-dechuwat-poomjaeng-snooker-extra", array("controller" => "videos", "action" => "view", 64));
	Router::connect("/videos/world-championship-2013/first-round/ding-junghui-vs-alan-mcmanus", array("controller" => "videos", "action" => "view", 65));
	Router::connect("/videos/world-championship-2013/first-round/ding-junghui-vs-alan-mcmanus-part-two", array("controller" => "videos", "action" => "view", 66));
	Router::connect("/videos/world-championship-2013/first-round/stephen-maguire-vs-dechuwat-poomjaeng-highlights", array("controller" => "videos", "action" => "view", 67));
	Router::connect("/videos/world-championship-2013/first-round/ding-junghui-vs-alan-mcmanus-snooker-extra", array("controller" => "videos", "action" => "view", 68));
	Router::connect("/videos/world-championship-2013/first-round/judd-trump-vs-dominic-dale", array("controller" => "videos", "action" => "view", 69));
	Router::connect("/videos/world-championship-2013/first-round/judd-trump-vs-dominic-dale-part-two", array("controller" => "videos", "action" => "view", 70));
	Router::connect("/videos/world-championship-2013/first-round/matthew-stevens-vs-marco-fu-highlights", array("controller" => "videos", "action" => "view", 71));
	Router::connect("/videos/world-championship-2013/first-round/neil-robertson-vs-robert-milkins-snooker-extra", array("controller" => "videos", "action" => "view", 72));
	Router::connect("/videos/world-championship-2013/first-round/neil-robertson-vs-robert-milkins", array("controller" => "videos", "action" => "view", 73));
	Router::connect("/videos/world-championship-2013/first-round/neil-robertson-vs-robert-milkins-highlights", array("controller" => "videos", "action" => "view", 74));
	Router::connect("/videos/world-championship-2013/second-round/shaun-murphy-vs-graeme-dott-snooker-extra", array("controller" => "videos", "action" => "view", 75));
	Router::connect("/videos/world-championship-2013/second-round/shaun-murphy-vs-graeme-dott", array("controller" => "videos", "action" => "view", 76));
	Router::connect("/videos/world-championship-2013/second-round/shaun-murphy-vs-graeme-dott-part-three", array("controller" => "videos", "action" => "view", 77));
	Router::connect("/videos/world-championship-2013/second-round/shaun-murphy-vs-graeme-dott-highlights", array("controller" => "videos", "action" => "view", 78));
	Router::connect("/videos/world-championship-2013/second-round/michael-white-vs-dechuwat-poomjaeng-snooker-extra", array("controller" => "videos", "action" => "view", 79));
	Router::connect("/videos/world-championship-2013/second-round/judd-trump-vs-marco-fu", array("controller" => "videos", "action" => "view", 80));
	Router::connect("/videos/world-championship-2013/second-round/ali-carter-vs-ronnie-osullivan", array("controller" => "videos", "action" => "view", 81));
	Router::connect("/videos/world-championship-2013/second-round/mark-selby-vs-barry-hawkins", array("controller" => "videos", "action" => "view", 82));
	Router::connect("/videos/world-championship-2013/second-round/judd-trump-vs-marco-fu-highlights", array("controller" => "videos", "action" => "view", 83));
	Router::connect("/videos/world-championship-2013/second-round/ali-carter-vs-ronnie-osullivan-snooker-extra", array("controller" => "videos", "action" => "view", 84));
	Router::connect("/videos/world-championship-2013/second-round/ali-carter-vs-ronnie-osullivan-part-two", array("controller" => "videos", "action" => "view", 85));
	Router::connect("/videos/world-championship-2013/second-round/stuart-bingham-vs-mark-davis", array("controller" => "videos", "action" => "view", 86));
	Router::connect("/videos/world-championship-2013/second-round/stuart-bingham-vs-mark-davis-highlights", array("controller" => "videos", "action" => "view", 87));
	Router::connect("/videos/world-championship-2013/second-round/ding-junghui-vs-mark-king-snooker-extra", array("controller" => "videos", "action" => "view", 88));
	Router::connect("/videos/world-championship-2013/second-round/ding-junghui-vs-mark-king", array("controller" => "videos", "action" => "view", 89));
	Router::connect("/videos/world-championship-2013/second-round/ali-carter-vs-ronnie-osullivan-part-three", array("controller" => "videos", "action" => "view", 90));
	Router::connect("/videos/world-championship-2013/second-round/ali-carter-vs-ronnie-osullivan-highlights", array("controller" => "videos", "action" => "view", 91));
	Router::connect("/videos/world-championship-2013/second-round/stuart-bingham-vs-mark-davis-snooker-extra", array("controller" => "videos", "action" => "view", 92));
	Router::connect("/videos/world-championship-2013/quarter-finals/judd-trump-vs-shaun-murphy", array("controller" => "videos", "action" => "view", 93));
	Router::connect("/videos/world-championship-2013/quarter-finals/judd-trump-vs-shaun-murphy-part-two", array("controller" => "videos", "action" => "view", 94));
	Router::connect("/videos/world-championship-2013/quarter-finals/judd-trump-vs-shaun-murphy-part-three", array("controller" => "videos", "action" => "view", 95));
	Router::connect("/videos/world-championship-2013/quarter-finals/judd-trump-vs-shaun-murphy-highlights", array("controller" => "videos", "action" => "view", 96));
	Router::connect("/videos/world-championship-2013/quarter-finals/ricky-walden-vs-michael-white-snooker-extra", array("controller" => "videos", "action" => "view", 97));
	Router::connect("/videos/world-championship-2013/quarter-finals/stuart-bingham-vs-ronnie-osullivan", array("controller" => "videos", "action" => "view", 98));
	Router::connect("/videos/world-championship-2013/quarter-finals/stuart-bingham-vs-ronnie-osullivan-part-two", array("controller" => "videos", "action" => "view", 99));
	Router::connect("/videos/world-championship-2013/quarter-finals/stuart-bingham-vs-ronnie-osullivan-part-three", array("controller" => "videos", "action" => "view", 100));
	Router::connect("/videos/world-championship-2013/quarter-finals/judd-trump-vs-shaun-murphy-highlights", array("controller" => "videos", "action" => "view", 101));
	Router::connect("/videos/world-championship-2013/quarter-finals/judd-trump-vs-shaun-murphy-snooker-extra", array("controller" => "videos", "action" => "view", 102));
	Router::connect("/videos/world-championship-2013/semi-finals/judd-trump-vs-ronnie-osullivan", array("controller" => "videos", "action" => "view", 103));
	Router::connect("/videos/world-championship-2013/semi-finals/ricky-walden-vs-barry-hawkins", array("controller" => "videos", "action" => "view", 104));
	Router::connect("/videos/world-championship-2013/semi-finals/ricky-walden-vs-barry-hawkins-highlights", array("controller" => "videos", "action" => "view", 105));
	Router::connect("/videos/world-championship-2013/semi-finals/judd-trump-vs-ronnie-osullivan-part-two", array("controller" => "videos", "action" => "view", 106));
	Router::connect("/videos/world-championship-2013/semi-finals/judd-trump-vs-ronnie-osullivan-part-three", array("controller" => "videos", "action" => "view", 107));
	Router::connect("/videos/world-championship-2013/semi-finals/ricky-walden-vs-barry-hawkins-part-two", array("controller" => "videos", "action" => "view", 108));
	Router::connect("/videos/world-championship-2013/semi-finals/judd-trump-vs-ronnie-osullivan-part-four", array("controller" => "videos", "action" => "view", 109));
	Router::connect("/videos/world-championship-2013/semi-finals/judd-trump-vs-ronnie-osullivan-highlights", array("controller" => "videos", "action" => "view", 110));
	Router::connect("/videos/world-championship-2013/semi-finals/ricky-walden-vs-barry-hawkins-part-three", array("controller" => "videos", "action" => "view", 111));
	Router::connect("/videos/world-championship-2013/semi-finals/ricky-walden-vs-barry-hawkins-part-four", array("controller" => "videos", "action" => "view", 112));
	Router::connect("/videos/world-championship-2013/semi-finals/ricky-walden-vs-barry-hawkins-part-five", array("controller" => "videos", "action" => "view", 113));
	Router::connect("/videos/world-championship-2013/final/barry-hawkins-vs-ronnie-osullivan", array("controller" => "videos", "action" => "view", 114));
	Router::connect("/videos/world-championship-2013/final/barry-hawkins-vs-ronnie-osullivan-part-two", array("controller" => "videos", "action" => "view", 115));
	Router::connect("/videos/world-championship-2013/final/barry-hawkins-vs-ronnie-osullivan-part-three", array("controller" => "videos", "action" => "view", 116));
	Router::connect("/videos/world-championship-2013/final/barry-hawkins-vs-ronnie-osullivan-part-four", array("controller" => "videos", "action" => "view", 117));
	Router::connect("/videos/uk-championship-2013/first-round/ding-junghui-vs-antony-parsons", array("controller" => "videos", "action" => "view", 118));
	Router::connect("/videos/uk-championship-2013/first-round/mark-selby-vs-shane-castle", array("controller" => "videos", "action" => "view", 119));
	Router::connect("/videos/uk-championship-2013/first-round/ding-junghui-vs-antony-parsons-snooker-extra", array("controller" => "videos", "action" => "view", 120));
	Router::connect("/videos/uk-championship-2013/second-round/judd-trump-vs-dechuwat-poomjaeng", array("controller" => "videos", "action" => "view", 121));
	Router::connect("/videos/uk-championship-2013/second-round/ding-junghui-vs-james-wattana-highlights", array("controller" => "videos", "action" => "view", 122));
	Router::connect("/videos/uk-championship-2013/second-round/stuart-bingham-vs-jimmy-white-snooker-extra", array("controller" => "videos", "action" => "view", 123));
	Router::connect("/videos/uk-championship-2013/second-round/neil-robertson-vs-robbie-williams", array("controller" => "videos", "action" => "view", 124));
	Router::connect("/videos/uk-championship-2013/second-round/ronnie-osullivan-vs-adam-duffy-highlights", array("controller" => "videos", "action" => "view", 125));
	Router::connect("/videos/uk-championship-2013/second-round/mark-selby-vs-tian-pengfei-snooker-extra", array("controller" => "videos", "action" => "view", 126));
	Router::connect("/videos/uk-championship-2013/third-round/ronnie-osullivan-vs-marus-campbell", array("controller" => "videos", "action" => "view", 127));
	Router::connect("/videos/uk-championship-2013/last-16/shaun-murphy-vs-barry-hawkins-highlights", array("controller" => "videos", "action" => "view", 128));
	Router::connect("/videos/uk-championship-2013/third-round/neil-robertson-vs-li-hang-snooker-extra", array("controller" => "videos", "action" => "view", 129));
	Router::connect("/videos/uk-championship-2013/last-16/ding-junghui-vs-ricky-walden", array("controller" => "videos", "action" => "view", 130));
	Router::connect("/videos/uk-championship-2013/last-16/-robert-milkins-vs-ronnie-osullivan", array("controller" => "videos", "action" => "view", 131));
	Router::connect("/videos/uk-championship-2013/quarter-finals/-stuart-bingham-vs-ronnie-osullivan", array("controller" => "videos", "action" => "view", 132));
	Router::connect("/videos/uk-championship-2013/quarter-finals/mark-selby-vs-barry-hawkins", array("controller" => "videos", "action" => "view", 133));
	Router::connect("/videos/uk-championship-2013/quarter-finals/mark-selby-vs-barry-hawkins-highlights", array("controller" => "videos", "action" => "view", 134));
	Router::connect("/videos/uk-championship-2013/semi-finals/neil-robertson-vs-stuart-bingham", array("controller" => "videos", "action" => "view", 135));
	Router::connect("/videos/uk-championship-2013/semi-finals/neil-robertson-vs-stuart-bingham-part-two", array("controller" => "videos", "action" => "view", 136));
	Router::connect("/videos/uk-championship-2013/semi-finals/neil-robertson-vs-stuart-bingham-highlights", array("controller" => "videos", "action" => "view", 137));
	Router::connect("/videos/uk-championship-2013/semi-finals/mark-selby-vs-ricky-walden", array("controller" => "videos", "action" => "view", 138));
	Router::connect("/videos/uk-championship-2013/semi-finals/mark-selby-vs-ricky-walden-part-two", array("controller" => "videos", "action" => "view", 139));
	Router::connect("/videos/uk-championship-2013/semi-finals/mark-selby-vs-ricky-walden-part-three", array("controller" => "videos", "action" => "view", 140));
	Router::connect("/videos/uk-championship-2013/final/neil-robertson-vs-mark-selby", array("controller" => "videos", "action" => "view", 141));
	Router::connect("/videos/uk-championship-2013/final/neil-robertson-vs-mark-selby-part-two", array("controller" => "videos", "action" => "view", 142));
	Router::connect("/videos/the-masters-2014/first-round/mark-selby-vs-mark-davis", array("controller" => "videos", "action" => "view", 143));
	Router::connect("/videos/the-masters-2014/first-round/mark-selby-vs-mark-davis-highlights", array("controller" => "videos", "action" => "view", 144));
	Router::connect("/videos/the-masters-2014/first-round/mark-selby-vs-mark-davis-snooker-extra", array("controller" => "videos", "action" => "view", 145));
	Router::connect("/videos/the-masters-2014/first-round/judd-trump-vs-marco-fu", array("controller" => "videos", "action" => "view", 146));
	Router::connect("/videos/the-masters-2014/first-round/judd-trump-vs-marco-fu-highlights", array("controller" => "videos", "action" => "view", 147));
	Router::connect("/videos/the-masters-2014/first-round/judd-trump-vs-marco-fu-snooker-extra", array("controller" => "videos", "action" => "view", 148));
	Router::connect("/videos/the-masters-2014/first-round/ding-junghui-vs-shaun-murphy", array("controller" => "videos", "action" => "view", 149));
	Router::connect("/videos/the-masters-2014/first-round/ding-junghui-vs-shaun-murphy-highlights", array("controller" => "videos", "action" => "view", 150));
	Router::connect("/videos/the-masters-2014/first-round/ding-junghui-vs-shaun-murphy-snooker-extra", array("controller" => "videos", "action" => "view", 151));
	Router::connect("/videos/the-masters-2014/first-round/neil-robertson-vs-mark-allen", array("controller" => "videos", "action" => "view", 152));
	Router::connect("/videos/the-masters-2014/first-round/barry-hawkins-vs-ricky-walden-highlights", array("controller" => "videos", "action" => "view", 153));
	Router::connect("/videos/the-masters-2014/first-round/neil-robertson-vs-mark-allen-snooker-extra", array("controller" => "videos", "action" => "view", 154));
	Router::connect("/videos/the-masters-2014/quarter-finals/shaun-murphy-vs-marco-fu", array("controller" => "videos", "action" => "view", 155));
	Router::connect("/videos/the-masters-2014/quarter-finals/mark-selby-vs-john-higgins", array("controller" => "videos", "action" => "view", 156));
	Router::connect("/videos/the-masters-2014/quarter-finals/shaun-murphy-vs-marco-fu-highlights", array("controller" => "videos", "action" => "view", 157));
	Router::connect("/videos/the-masters-2014/quarter-finals/shaun-murphy-vs-marco-fu-snooker-extra", array("controller" => "videos", "action" => "view", 158));
	Router::connect("/videos/the-masters-2014/quarter-finals/ricky-walden-vs-ronnie-osullivan", array("controller" => "videos", "action" => "view", 159));
	Router::connect("/videos/the-masters-2014/quarter-finals/neil-robertson-vs-stephen-maguire", array("controller" => "videos", "action" => "view", 160));
	Router::connect("/videos/the-masters-2014/quarter-finals/ricky-walden-vs-ronnie-osullivan-highlights", array("controller" => "videos", "action" => "view", 161));
	Router::connect("/videos/the-masters-2014/quarter-finals/ricky-walden-vs-ronnie-osullivan-snooker-extra", array("controller" => "videos", "action" => "view", 162));
	Router::connect("/videos/the-masters-2014/semi-finals/mark-selby-vs-shaun-murphy", array("controller" => "videos", "action" => "view", 163));
	Router::connect("/videos/the-masters-2014/semi-finals/stephen-maguire-vs-ronnie-osullivan", array("controller" => "videos", "action" => "view", 164));
	Router::connect("/videos/the-masters-2014/semi-finals/mark-selby-vs-shaun-murphy-snooker-extra", array("controller" => "videos", "action" => "view", 165));
	Router::connect("/videos/the-masters-2014/final/mark-selby-vs-ronnie-osullivan", array("controller" => "videos", "action" => "view", 166));
	Router::connect("/videos/the-masters-2014/final/mark-selby-vs-ronnie-osullivan-part-two", array("controller" => "videos", "action" => "view", 167));
	Router::connect("/videos/world-championship-2014/first-round/ronnie-osullivan-vs-robin-hull", array("controller" => "videos", "action" => "view", 168));
	Router::connect("/videos/world-championship-2014/first-round/ronnie-osullivan-vs-robin-hull-part-two", array("controller" => "videos", "action" => "view", 169));
	Router::connect("/videos/world-championship-2014/first-round/stephen-maguire-vs-ryan-day", array("controller" => "videos", "action" => "view", 170));
	Router::connect("/videos/world-championship-2014/first-round/shaun-murphy-vs-jamie-cope", array("controller" => "videos", "action" => "view", 171));
	Router::connect("/videos/world-championship-2014/first-round/ronnie-osullivan-vs-robin-hull-part-three", array("controller" => "videos", "action" => "view", 172));
	Router::connect("/videos/world-championship-2014/first-round/ronnie-osullivan-vs-robin-hull-highlights", array("controller" => "videos", "action" => "view", 173));
	Router::connect("/videos/world-championship-2014/first-round/stephen-maguire-vs-ryan-day-snooker-extra", array("controller" => "videos", "action" => "view", 174));
	Router::connect("/videos/world-championship-2014/first-round/stuart-bingham-vs-ken-doherty", array("controller" => "videos", "action" => "view", 175));
	Router::connect("/videos/world-championship-2014/first-round/ding-junghui-vs-michael-wasley", array("controller" => "videos", "action" => "view", 176));
	Router::connect("/videos/world-championship-2014/first-round/shaun-murphy-vs-jamie-cope-highlights", array("controller" => "videos", "action" => "view", 177));
	Router::connect("/videos/world-championship-2014/first-round/stuart-bingham-vs-ken-doherty-snooker-extra", array("controller" => "videos", "action" => "view", 178));
	Router::connect("/videos/world-championship-2014/first-round/mark-selby-vs-michael-white", array("controller" => "videos", "action" => "view", 179));
	Router::connect("/videos/world-championship-2014/first-round/john-higgins-vs-alan-mcmanus", array("controller" => "videos", "action" => "view", 180));
	Router::connect("/videos/world-championship-2014/first-round/mark-selby-vs-michael-white-highlights", array("controller" => "videos", "action" => "view", 181));
	Router::connect("/videos/world-championship-2014/first-round/john-higgins-vs-alan-mcmanus-snooker-extra", array("controller" => "videos", "action" => "view", 182));
	Router::connect("/videos/world-championship-2014/first-round/john-higgins-vs-alan-mcmanus-part-two", array("controller" => "videos", "action" => "view", 183));
	Router::connect("/videos/world-championship-2014/first-round/john-higgins-vs-alan-mcmanus-part-three", array("controller" => "videos", "action" => "view", 184));
	Router::connect("/videos/world-championship-2014/first-round/john-higgins-vs-alan-mcmanus-highlights", array("controller" => "videos", "action" => "view", 185));
	Router::connect("/videos/world-championship-2014/first-round/marco-fu-vs-martin-gould-snooker-extra", array("controller" => "videos", "action" => "view", 186));
	Router::connect("/videos/world-championship-2014/first-round/judd-trump-vs-tom-ford", array("controller" => "videos", "action" => "view", 187));
	Router::connect("/videos/world-championship-2014/first-round/judd-trump-vs-tom-ford-part-three", array("controller" => "videos", "action" => "view", 188));
	Router::connect("/videos/world-championship-2014/first-round/judd-trump-vs-tom-ford-highlights", array("controller" => "videos", "action" => "view", 189));
	Router::connect("/videos/world-championship-2014/first-round/barry-hawkins-vs-david-gilbert-snooker-extra", array("controller" => "videos", "action" => "view", 190));
	Router::connect("/videos/world-championship-2014/second-round/mark-selby-vs-ali-carter", array("controller" => "videos", "action" => "view", 191));
	Router::connect("/videos/world-championship-2014/second-round/mark-selby-vs-ali-carter-highlights", array("controller" => "videos", "action" => "view", 192));
	Router::connect("/videos/world-championship-2014/second-round/mark-selby-vs-ali-carter-snooker-extra", array("controller" => "videos", "action" => "view", 193));
	Router::connect("/videos/world-championship-2014/second-round/mark-selby-vs-ali-carter-part-two", array("controller" => "videos", "action" => "view", 194));
	Router::connect("/videos/world-championship-2014/second-round/mark-selby-vs-ali-carter-part-three", array("controller" => "videos", "action" => "view", 195));
	Router::connect("/videos/world-championship-2014/second-round/mark-selby-vs-ali-carter-part-four", array("controller" => "videos", "action" => "view", 196));
	Router::connect("/videos/world-championship-2014/second-round/ken-doherty-vs-alan-mcmanus-snooker-extra", array("controller" => "videos", "action" => "view", 197));
	Router::connect("/videos/world-championship-2014/second-round/joe-perry-vs-ronnie-osullivan", array("controller" => "videos", "action" => "view", 198));
	Router::connect("/videos/world-championship-2014/second-round/joe-perry-vs-ronnie-osullivan-highlights", array("controller" => "videos", "action" => "view", 199));
	Router::connect("/videos/world-championship-2014/second-round/ken-doherty-vs-alan-mcmanus", array("controller" => "videos", "action" => "view", 200));
	Router::connect("/videos/world-championship-2014/second-round/barry-hawkins-vs-ricky-walden", array("controller" => "videos", "action" => "view", 201));
	Router::connect("/videos/world-championship-2014/second-round/joe-perry-vs-ronnie-osullivan-highlights", array("controller" => "videos", "action" => "view", 202));
	Router::connect("/videos/world-championship-2014/second-round/judd-trump-vs-ryan-day-snooker-extra", array("controller" => "videos", "action" => "view", 203));
	Router::connect("/videos/world-championship-2014/second-round/neil-robertson-vs-mark-allen", array("controller" => "videos", "action" => "view", 204));
	Router::connect("/videos/world-championship-2014/second-round/judd-trump-vs-ryan-day", array("controller" => "videos", "action" => "view", 205));
	Router::connect("/videos/world-championship-2014/second-round/neil-robertson-vs-mark-allen-part-two", array("controller" => "videos", "action" => "view", 206));
	Router::connect("/videos/world-championship-2014/second-round/neil-robertson-vs-mark-allen-highlights", array("controller" => "videos", "action" => "view", 207));
	Router::connect("/videos/world-championship-2014/second-round/judd-trump-vs-ryan-day-snooker-extra", array("controller" => "videos", "action" => "view", 208));
	Router::connect("/videos/world-championship-2014/second-round/neil-robertson-vs-mark-allen-part-three", array("controller" => "videos", "action" => "view", 209));
	Router::connect("/videos/world-championship-2014/second-round/judd-trump-vs-ryan-day-part-three", array("controller" => "videos", "action" => "view", 210));
	Router::connect("/videos/world-championship-2014/second-round/neil-robertson-vs-mark-allen-part-four", array("controller" => "videos", "action" => "view", 211));
	Router::connect("/videos/world-championship-2014/second-round/dominic-dale-vs-michael-wasley-snooker-extra", array("controller" => "videos", "action" => "view", 212));
	Router::connect("/videos/world-championship-2014/quarter-finals/mark-selby-vs-alan-mcmanus", array("controller" => "videos", "action" => "view", 213));
	Router::connect("/videos/world-championship-2014/quarter-finals/mark-selby-vs-alan-mcmanus-part-two", array("controller" => "videos", "action" => "view", 214));
	Router::connect("/videos/world-championship-2014/quarter-finals/mark-selby-vs-alan-mcmanus-part-three", array("controller" => "videos", "action" => "view", 215));
	Router::connect("/videos/world-championship-2014/quarter-finals/shaun-murphy-vs-ronnie-osullivan-highlights", array("controller" => "videos", "action" => "view", 216));
	Router::connect("/videos/world-championship-2014/quarter-finals/neil-robertson-vs-judd-trump-snooker-extra", array("controller" => "videos", "action" => "view", 217));
	Router::connect("/videos/world-championship-2014/quarter-finals/shaun-murphy-vs-ronnie-osullivan", array("controller" => "videos", "action" => "view", 218));
	Router::connect("/videos/world-championship-2014/quarter-finals/shaun-murphy-vs-ronnie-osullivan-part-three", array("controller" => "videos", "action" => "view", 219));
	Router::connect("/videos/world-championship-2014/quarter-finals/barry-hawkins-vs-dominic-dale", array("controller" => "videos", "action" => "view", 220));
	Router::connect("/videos/world-championship-2014/quarter-finals/neil-robertson-vs-judd-trump-highlights", array("controller" => "videos", "action" => "view", 221));
	Router::connect("/videos/world-championship-2014/quarter-finals/mark-selby-vs-alan-mcmanus-snooker-extra", array("controller" => "videos", "action" => "view", 222));
	Router::connect("/videos/world-championship-2014/semi-finals/barry-hawkins-vs-ronnie-osullivan", array("controller" => "videos", "action" => "view", 223));
	Router::connect("/videos/world-championship-2014/semi-finals/neil-robertson-vs-mark-selby", array("controller" => "videos", "action" => "view", 224));
	Router::connect("/videos/world-championship-2014/semi-finals/neil-robertson-vs-mark-selby-highlights", array("controller" => "videos", "action" => "view", 225));
	Router::connect("/videos/world-championship-2014/semi-finals/barry-hawkins-vs-ronnie-osullivan-part-two", array("controller" => "videos", "action" => "view", 226));
	Router::connect("/videos/world-championship-2014/semi-finals/barry-hawkins-vs-ronnie-osullivan-part-three", array("controller" => "videos", "action" => "view", 227));
	Router::connect("/videos/world-championship-2014/semi-finals/barry-hawkins-vs-ronnie-osullivan-part-four", array("controller" => "videos", "action" => "view", 228));
	Router::connect("/videos/world-championship-2014/semi-finals/barry-hawkins-vs-ronnie-osullivan-highlights", array("controller" => "videos", "action" => "view", 229));
	Router::connect("/videos/world-championship-2014/semi-finals/neil-robertson-vs-mark-selby-part-two", array("controller" => "videos", "action" => "view", 230));
	Router::connect("/videos/world-championship-2014/semi-finals/neil-robertson-vs-mark-selby-part-three", array("controller" => "videos", "action" => "view", 231));
	Router::connect("/videos/world-championship-2014/semi-finals/neil-robertson-vs-mark-selby-part-four", array("controller" => "videos", "action" => "view", 232));
	Router::connect("/videos/world-championship-2014/final/mark-selby-vs-ronnie-osullivan", array("controller" => "videos", "action" => "view", 233));
	Router::connect("/videos/world-championship-2014/final/mark-selby-vs-ronnie-osullivan-part-two", array("controller" => "videos", "action" => "view", 234));
	Router::connect("/videos/world-championship-2014/final/mark-selby-vs-ronnie-osullivan-part-three", array("controller" => "videos", "action" => "view", 235));
	Router::connect("/videos/world-championship-2014/final/mark-selby-vs-ronnie-osullivan-part-four", array("controller" => "videos", "action" => "view", 236));
	Router::connect("/videos/uk-championship-2014/second-round/ding-junghui-vs-jimmy-white", array("controller" => "videos", "action" => "view", 237));
	Router::connect("/videos/uk-championship-2014/second-round/judd-trump-vs-aditya-mehta", array("controller" => "videos", "action" => "view", 238));
	Router::connect("/videos/uk-championship-2014/second-round/barry-hawkins-vs-nigel-bond", array("controller" => "videos", "action" => "view", 239));
	Router::connect("/videos/uk-championship-2014/second-round/barry-hawkins-vs-nigel-bond-highlights", array("controller" => "videos", "action" => "view", 240));
	Router::connect("/videos/uk-championship-2014/second-round/ding-junhui-vs-jimmy-white-snooker-extra", array("controller" => "videos", "action" => "view", 241));
	Router::connect("/videos/uk-championship-2014/second-round/neil-robertson-vs-kyren-wilson", array("controller" => "videos", "action" => "view", 242));
	Router::connect("/videos/uk-championship-2014/second-round/mark-allen-vs-luca-brecel", array("controller" => "videos", "action" => "view", 243));
	Router::connect("/videos/uk-championship-2014/second-round/ronnie-osullivan-vs-peter-lines", array("controller" => "videos", "action" => "view", 244));
	Router::connect("/videos/uk-championship-2014/second-round/ronnie-osullivan-vs-peter-lines-highlights", array("controller" => "videos", "action" => "view", 245));
	Router::connect("/videos/uk-championship-2014/third-round/judd-trump-vs-patrick-fraser", array("controller" => "videos", "action" => "view", 246));
	Router::connect("/videos/uk-championship-2014/third-round/shaun-murphy-vs-jack-lisowski", array("controller" => "videos", "action" => "view", 247));
	Router::connect("/videos/uk-championship-2014/third-round/shaun-murphy-vs-jack-lisowski-highlights", array("controller" => "videos", "action" => "view", 248));
	Router::connect("/videos/uk-championship-2014/third-round/mark-allen-vs-luca-brecel-snooker-extra", array("controller" => "videos", "action" => "view", 249));
	Router::connect("/videos/uk-championship-2014/third-round/ronnie-osullivan-vs-ben-woollasten", array("controller" => "videos", "action" => "view", 250));
	Router::connect("/videos/uk-championship-2014/third-round/stephen-maguire-vs-mark-williams", array("controller" => "videos", "action" => "view", 251));
	Router::connect("/videos/uk-championship-2014/third-round/ding-junghui-vs-james-cahill", array("controller" => "videos", "action" => "view", 252));
	Router::connect("/videos/uk-championship-2014/third-round/ding-junghui-vs-james-cahill-highlights", array("controller" => "videos", "action" => "view", 253));
	Router::connect("/videos/uk-championship-2014/last-16/neil-robertson-vs-peter-ebdon-snooker-extra", array("controller" => "videos", "action" => "view", 254));
	Router::connect("/videos/uk-championship-2014/last-16/john-higgins-vs-anthony-mcgill", array("controller" => "videos", "action" => "view", 255));
	Router::connect("/videos/uk-championship-2014/last-16/neil-robertson-vs-graeme-dott", array("controller" => "videos", "action" => "view", 256));
	Router::connect("/videos/uk-championship-2014/last-16/neil-robertson-vs-graeme-dott-highlights", array("controller" => "videos", "action" => "view", 257));
	Router::connect("/videos/uk-championship-2014/last-16/judd-trump-vs-rod-lawler", array("controller" => "videos", "action" => "view", 258));
	Router::connect("/videos/uk-championship-2014/last-16/ronnie-osullivan-vs-matthew-selt", array("controller" => "videos", "action" => "view", 259));
	Router::connect("/videos/uk-championship-2014/last-16/ronnie-osullivan-vs-matthew-selt-highlights", array("controller" => "videos", "action" => "view", 260));
	Router::connect("/videos/uk-championship-2014/quarter-finals/ronnie-osullivan-vs-anthony-mcgill", array("controller" => "videos", "action" => "view", 261));
	Router::connect("/videos/uk-championship-2014/quarter-finals/stephen-maguire-vs-marco-fu", array("controller" => "videos", "action" => "view", 262));
	Router::connect("/videos/uk-championship-2014/quarter-finals/stuart-bingham-vs-graeme-dott", array("controller" => "videos", "action" => "view", 263));
	Router::connect("/videos/uk-championship-2014/quarter-finals/judd-trump-vs-mark-davis-highlights", array("controller" => "videos", "action" => "view", 264));
	Router::connect("/videos/uk-championship-2014/semi-finals/ronnie-osullivan-vs-stuart-bingham", array("controller" => "videos", "action" => "view", 265));
	Router::connect("/videos/uk-championship-2014/semi-finals/judd-trump-vs-stephen-maguire", array("controller" => "videos", "action" => "view", 266));
	Router::connect("/videos/uk-championship-2014/final/ronnie-osullivan-vs-judd-trump", array("controller" => "videos", "action" => "view", 267));
	Router::connect("/videos/the-masters-2015/first-round/mark-selby-vs-shaun-murphy", array("controller" => "videos", "action" => "view", 268));

	Router::connect('/videos/*', array('controller' => 'videos', 'action' => 'view'));

	/*ROUND ROUTES*/
	
	Router::connect('/rounds', array('controller' => 'rounds', 'action' => 'index'));

	Router::connect("/rounds/uk-championship-2012/first-round", array("controller" => "rounds", "action" => "view", 1));
	Router::connect("/rounds/uk-championship-2012/second-round", array("controller" => "rounds", "action" => "view", 2));
	Router::connect("/rounds/uk-championship-2012/quarter-finals", array("controller" => "rounds", "action" => "view", 3));
	Router::connect("/rounds/uk-championship-2012/semi-finals", array("controller" => "rounds", "action" => "view", 4));
	Router::connect("/rounds/uk-championship-2012/final", array("controller" => "rounds", "action" => "view", 5));
	Router::connect("/rounds/the-masters-2013/first-round", array("controller" => "rounds", "action" => "view", 6));
	Router::connect("/rounds/the-masters-2013/quarter-finals", array("controller" => "rounds", "action" => "view", 7));
	Router::connect("/rounds/the-masters-2013/semi-finals", array("controller" => "rounds", "action" => "view", 8));
	Router::connect("/rounds/the-masters-2013/final", array("controller" => "rounds", "action" => "view", 9));
	Router::connect("/rounds/world-championship-2013/first-round", array("controller" => "rounds", "action" => "view", 10));
	Router::connect("/rounds/world-championship-2013/second-round", array("controller" => "rounds", "action" => "view", 11));
	Router::connect("/rounds/world-championship-2013/quarter-finals", array("controller" => "rounds", "action" => "view", 12));
	Router::connect("/rounds/world-championship-2013/semi-finals", array("controller" => "rounds", "action" => "view", 13));
	Router::connect("/rounds/world-championship-2013/final", array("controller" => "rounds", "action" => "view", 14));
	Router::connect("/rounds/uk-championship-2013/first-round", array("controller" => "rounds", "action" => "view", 15));
	Router::connect("/rounds/uk-championship-2013/second-round", array("controller" => "rounds", "action" => "view", 16));
	Router::connect("/rounds/uk-championship-2013/third-round", array("controller" => "rounds", "action" => "view", 17));
	Router::connect("/rounds/uk-championship-2013/last-16", array("controller" => "rounds", "action" => "view", 18));
	Router::connect("/rounds/uk-championship-2013/quarter-finals", array("controller" => "rounds", "action" => "view", 19));
	Router::connect("/rounds/uk-championship-2013/semi-finals", array("controller" => "rounds", "action" => "view", 20));
	Router::connect("/rounds/uk-championship-2013/final", array("controller" => "rounds", "action" => "view", 21));
	Router::connect("/rounds/the-masters-2014/first-round", array("controller" => "rounds", "action" => "view", 22));
	Router::connect("/rounds/the-masters-2014/quarter-finals", array("controller" => "rounds", "action" => "view", 23));
	Router::connect("/rounds/the-masters-2014/semi-finals", array("controller" => "rounds", "action" => "view", 24));
	Router::connect("/rounds/the-masters-2014/final", array("controller" => "rounds", "action" => "view", 25));
	Router::connect("/rounds/world-championship-2014/first-round", array("controller" => "rounds", "action" => "view", 26));
	Router::connect("/rounds/world-championship-2014/second-round", array("controller" => "rounds", "action" => "view", 27));
	Router::connect("/rounds/world-championship-2014/quarter-finals", array("controller" => "rounds", "action" => "view", 28));
	Router::connect("/rounds/world-championship-2014/semi-finals", array("controller" => "rounds", "action" => "view", 29));
	Router::connect("/rounds/world-championship-2014/final", array("controller" => "rounds", "action" => "view", 30));
	Router::connect("/rounds/uk-championship-2014/first-round", array("controller" => "rounds", "action" => "view", 31));
	Router::connect("/rounds/uk-championship-2014/second-round", array("controller" => "rounds", "action" => "view", 32));
	Router::connect("/rounds/uk-championship-2014/third-round", array("controller" => "rounds", "action" => "view", 33));
	Router::connect("/rounds/uk-championship-2014/last-16", array("controller" => "rounds", "action" => "view", 34));
	Router::connect("/rounds/uk-championship-2014/quarter-finals", array("controller" => "rounds", "action" => "view", 35));
	Router::connect("/rounds/uk-championship-2014/semi-finals", array("controller" => "rounds", "action" => "view", 36));
	Router::connect("/rounds/uk-championship-2014/final", array("controller" => "rounds", "action" => "view", 37));
	Router::connect("/rounds/the-masters-2015/first-round", array("controller" => "rounds", "action" => "view", 38));

	Router::connect('/rounds/*', array('controller' => 'rounds', 'action' => 'view'));

/**
 * Load all plugin routes. See the CakePlugin documentation on
 * how to customize the loading of plugin routes.
 */
	CakePlugin::routes();

/**
 * Load the CakePHP default routes. Only remove this if you do not want to use
 * the built-in default routes.
 */
	require CAKE . 'Config' . DS . 'routes.php';
