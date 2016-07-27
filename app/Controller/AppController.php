<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
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
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
	//LOCK ALL THE CONTROLLERS
	//You can only view pages when you actually log in
	//var $components = array('Auth', 'Session');
	public $components = array(
		//'DebugKit.Toolbar',
		'Session', 
		'Auth' => array(
			'authenticate' => array(
				'Form' => array(
					'fields' => array(
						'username' => 'email',
						'password' => 'user_password'
					),
					'passwordHasher' => array(
						'className' => 'Simple',
						'hashType' => 'sha256'
					)
				)
			),
			'loginRedirect' => '/',
			'logoutRedirect' => array('controller'=>'users', 'action'=>'login'),
			'AuthError' => 'You cannot access that page',
			'authorize'=>array('Controller')
		)
	);

	public function isAuthorized($user){
		// Only admins can access admin functions
		if (isset($this->request->params['admin'])) {
            return (bool)($user['user_role'] === 'admin');
        }
        if($user['user_role'] === 'user'){
        	if(in_array($this->action, array('add'))){
				if($user['user_id'] != $this->request->params['pass']['0']){
					return $this->Session->setFlash(__('Access denied'));
				}
			}
        } else{
        	return true;
        }
        return true;
	}

	function beforeRender() {
	    if($this->name == 'CakeError') {
	        $this->layout = 'layout_front';
	    }
	}

	//FILTER FOR ACTIONS
	//If you aren't logged in you can still view the index and view actions
	//If you go to edit or delete you will need to log in first
	 public function beforeFilter() {
		$this->Auth->allow('verify', 'display');
		$this->set('logged_in', $this->Auth->loggedIn());
		$this->set('current_user', $this->Auth->user());
	}
}
