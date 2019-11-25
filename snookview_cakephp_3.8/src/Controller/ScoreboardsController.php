<?php

/**STILL TO ADJUST*/


App::uses('AppController', 'Controller');
/**
 * Scoreboards Controller
 *
 * @property Scoreboard $Scoreboard
 * @property PaginatorComponent $Paginator
 */
class ScoreboardsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->layout = 'layout_front';
	}
}