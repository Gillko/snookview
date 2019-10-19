<?php

// src/Model/Table/UsersTable.php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class UsersTable extends Table
{

   /* public function validationDefault(Validator $validator)
    {
        return $validator
            ->notEmpty('email', 'An email is required')
            ->notEmpty('user_password', 'A password is required')
            ->notEmpty('user_role', 'A role is required')
            ->add('user_role', 'inList', [
                'rule' => ['inList', ['admin', 'regular']],
                'message' => 'Please enter a valid role'
        ]);
    }*/

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