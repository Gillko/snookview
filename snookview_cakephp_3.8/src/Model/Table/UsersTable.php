<?php

namespace App\Model\Table;

use Cake\ORM\Table;

class UsersTable extends Table
{
	public function initialize(array $config)
	{
		$this->hasMany('Comments', [
			'className' => 'Comments',
			'foreignKey' => 'user_id'
		]);

		$this->hasMany('Favorites', [
			'className' => 'Favorites',
			'foreignKey' => 'user_id'
		]);
	}
}