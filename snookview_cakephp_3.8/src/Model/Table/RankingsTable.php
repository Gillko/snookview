<?php

namespace App\Model\Table;

use Cake\ORM\Table;

class RankingsTable extends Table
{
    public function initialize(array $config)
    {
      //parent::initialize($config);
    	$this->setTable('rankings');
    	$this->setDisplayField('ranking_rank');
    	$this->setDisplayField('ranking_points');
    	$this->setDisplayField('player_id');
    	$this->setDisplayField('season_id');

      $this->belongsTo('Players', [
          //'className' => 'Players',
          'foreignKey' => 'player_id',
      ]);

      //$this->hasOne('Seasons');

      $this->belongsTo('Seasons', [
          //'className' => 'Players',
          'foreignKey' => 'season_id',
      ]);

    	/*$this->addAssociations([
           'belongsTo' => [
               'Players' => ['className' => 'App\Model\Table\PlayersTable']
           ],
       	]);*/

        
    }
}