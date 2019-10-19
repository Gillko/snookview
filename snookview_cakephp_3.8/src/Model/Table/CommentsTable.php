<?php

namespace App\Model\Table;

use Cake\ORM\Table;

class CommentsTable extends Table
{
	public function initialize(array $config)
    {
    	$this->belongsTo('Users', [
	    	'className' => 'Users',
			'foreignKey' => 'user_id'
	    ]);
    	$this->belongsTo('Videos', [
	    	'className' => 'Videos',
			'foreignKey' => 'video_id'
	    ]);
	}
}