<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;

use Cake\Controller\Component\AuthComponent;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller{

    //LOCK ALL THE CONTROLLERS
    //You can only view pages when you actually log in
    //var $components = array('Auth', 'Session');
    public $components = array(
        //'DebugKit.Toolbar',
        //'Session', 
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
                    //return $this->Session->setFlash(__('Access denied'));
                }
            }
        } else{
            return true;
        }
        return true;
    }

    function beforeRender(Event $event) {
        if($this->name == 'CakeError') {
            $this->layout = 'layout_front';
        }
    }

    //FILTER FOR ACTIONS
    //If you aren't logged in you can still view the index and view actions
    //If you go to edit or delete you will need to log in first
     public function beforeFilter(Event $event) {
        $this->Auth->allow('verify', 'display');
        //$this->set('logged_in', $this->Auth->loggedIn());
        //$this->set('current_user', $this->Auth->user());
    }

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('RequestHandler', [
            'enableBeforeRedirect' => false,
        ]);
        $this->loadComponent('Flash');

        $this->loadComponent('Auth', [
            'authenticate' => [
                'Form' => [
                    'fields' => [
                        'username' => 'email', 
                        'password' => 'user_password'
                    ],
                    'passwordHasher' => array(
                        'className' => 'Simple',
                        'hashType' => 'sha256'
                    )
                ]
            ],
            'loginRedirect' => '/',
            'logoutRedirect' => array('controller'=>'users', 'action'=>'login'),
            'AuthError' => 'You cannot access that page',
            'authorize'=>array('Controller')
        ]);

        /*
         * Enable the following component for recommended CakePHP security settings.
         * see https://book.cakephp.org/3.0/en/controllers/components/security.html
         */
        //$this->loadComponent('Security');
    }
}
