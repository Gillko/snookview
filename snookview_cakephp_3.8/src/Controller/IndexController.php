<?php

namespace App\Controller;

use Cake\Event\Event;

class IndexController extends AppController
{

    public function beforeFilter(Event $event) {
        $this->Auth->allow(
            [
                'index'
            ]
        );
    }

    public function index() {
        $this->loadModel('Players');
        $this->loadModel('Rankings');
        $this->loadModel('Videos');
        $this->loadModel('Seasons');

        /*LAYOUT*/
        $this->viewBuilder()->setLayout('layout_home');

        $players = $this->Players->find('all', [
            'order' => 'rand()',
            'limit' => 12
            ]
        );
        
        /*RANKING*/
        $rankings = $this->Rankings->find(
            'all', [
                'limit' => 16,
                'order' => [
                    'ranking_rank ASC'
                ], 
                'conditions' => [
                    'Rankings.season_id' => 4
                ],
            ]
        )->contain([
            'Players'
        ]);

        /*VIDEO*/
        $videos = $this->Videos->find('all', ['order' => ['video_id DESC']])->contain([
            'Players',
            'Tournaments',
            'Rounds'
        ]);
        $video = $videos->first();

        $seasons = $this->Seasons->find('all', ['order' => ['season_id DESC']]);
        $season = $seasons->first();

        $this->set(
            compact(
                'players', 
                'rankings', 
                'videos', 
                'seasons',
                'video',
                'season'
            )
        );
    }
}
