<?php

namespace App\Controller;

use Cake\Event\Event;
use Cake\Mailer\Email;
use Cake\Auth\DefaultPasswordHasher;
use Cake\Utility\Security;
use Cake\ORM\TableRegistry;

/**
 * Users Controller
 *
 * @property User $User
 */
class UsersController extends AppController {

	/*Pagination*/
	public $paginate = [
		'limit' => 25,
		'order' => [
			'Users.user_id' => 'asc'
		]
	];
	/*Pagination*/

	public function initialize()
	{
		parent::initialize();
		$this->loadComponent('Paginator');
	}

	public function beforeFilter(Event $event) {
		$this->Auth->allow(
			[
				'verify',
				/*'adminAdd',
				'adminEdit',
				'adminIndex',
				'adminView',
				'adminDelete'*/
			]
		);
	}

	/**
	 * login method
	 *
	 * @return void
	 */
	public function login(){
		$this->viewBuilder()->setLayout('layout_front');

		if ($this->request->is('post')) {
	        $user = $this->Auth->identify();
	        if($user) {
	            $this->Auth->setUser($user);
	            
	            return $this->redirect($this->Auth->redirectUrl());
	        } else {
	            $this->Flash->error(__('Your Username or password is incorrect'));
	        }
	    }
	}

	/**
	 * logout method
	 *
	 * @return void
	 */
	public function logout(){
		return $this->redirect($this->Auth->logout());
	}

	/**
	 * admin_index method
	 *
	 * @return void
	 */
	public function adminIndex() {
		$this->viewBuilder()->setLayout('layout_back');

		$users = $this->paginate($this->Users);

		$this->set(
			compact(
				'users'
			)
		);
	}

	/**
	 * admin_view method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function adminView($id = null) {
		$this->viewBuilder()->setLayout('layout_back');
		
		if (!$this->Users->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		
		$user = $this->Users->get($id);
		
		$this->set(
			compact(
				'user'
			)
		);
	}

	/**
	 * admin_add method
	 *
	 * @return void
	 */
	/* https://www.youtube.com/watch?v=JhUu7C1UW2U */
	public function adminAdd() {
		$this->viewBuilder()->setLayout('layout_back');

		if($this->request->is('post')) {
			$usersTable 			= TableRegistry::get('Users');
			$user 					= $usersTable->newEntity();
			$hasher 				= new DefaultPasswordHasher();
			$user_firstname 		= $this->request->getData('user_firstname');
			$user_lastname 			= $this->request->getData('user_lastname');
			$user_country 			= $this->request->getData('user_country');
			$user_username 			= $this->request->getData('user_username');
			$user_email		 		= $this->request->getData('email');
			$password 				= $this->request->getData('password');
			$user_tokenhash 		= Security::hash(Security::randomBytes(32));
			$user_role 				= $this->request->getData('user_role');
			$user->user_firstname 	= $user_firstname;
			$user->user_lastname 	= $user_lastname;
			$user->user_country 	= $user_country;
			$user->user_username 	= $user_username;
			$user->email 			= $user_email;
			$user->password 		= $hasher->hash($password);
			$user->user_tokenhash 	= $user_tokenhash;
			$user->user_role 		= $user_role;

			$filename 				= $this->request->getData()['user_image']['name'];
			$uploadpath 			= 'img/users/';
			$uploadfile 			= $uploadpath . $filename;

			if(move_uploaded_file($this->request->getData()['user_image']['tmp_name'], $filename)){
				$user->user_image = $filename;

				if($usersTable->save($user)) {
					$this->Flash->success(__('The user has been saved, your confirmation email has been sent', ['id' => 'flashMessage']));
					
					$message = 'Click on the link below to complete registration ';
					
					$message .= 'http://localhost/users/verify/'.$user_tokenhash;
					
					$message = wordwrap($message, 70);
					
					$email = new Email('default');
					
					$email->emailFormat('html');
					
					$email->setFrom(['snookview147@gmail.com', 'snookview147@gmail.com']);
					
					$email->setTo($user_email);
					
					$email->setSubject('Confirm Registration for snookview.');
					
					$email->send($message);
				} else{
					$this->Flash->success(__('The user could not be saved. Please, try again.', ['id' => 'flashMessage']));
				}
			} else {
				$this->Flash->success(__('The user could not be saved. Please, try again.', ['id' => 'flashMessage']));
			}
		}
		$roles = [
			'Admin' 		=> 'Admin', 
			'User' 			=> 'User', 
			'UserTimeline' 	=> 'UserTimeline'
		];
		
		$this->set(
			compact('roles')
		);
	}

	public function verify($user_tokenhash){
		$this->viewBuilder()->setLayout('layout_back');

		$usersTable = TableRegistry::get('Users');
		$verify = $usersTable->find('all')->where(['user_tokenhash'])->first();
		$verify->user_activate = '1';
		$usersTable->save($verify);
	}

	/**
	 * admin_edit method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function adminEdit($id = null) {
		$this->viewBuilder()->setLayout('layout_back');

		$user = $this->Users->get($id);

		if ($this->request->is(['patch', 'post', 'put'])) {
			$user = $this->Users->patchEntity($user, $this->request->data);
			
			$filename = $this->request->getData()['user_image']['name'];
			
			$uploadpath = 'img/users/';
			
			$uploadfile = $uploadpath . $filename;

			if(move_uploaded_file($this->request->getData()['user_image']['tmp_name'], $uploadfile)){
				$user->user_image = $uploadfile;
			}
			
			if ($this->Users->save($user)){
				$this->Flash->success(__('The user has been updated.'));
				
				return $this->redirect(['action' => 'adminIndex']);
			} else {
				$this->Flash->error(__('The user could not be updated. Please, try again.'));
			}
		}
		$this->set(
			compact(
				'user'
			)
		);

		$roles = [
			'Admin' => 'Admin', 
			'User' => 'User', 
			'UserTimeline' => 'UserTimeline'
		];

		$this->set(
			compact(
				'roles'
			)
		);
	}

	/**
	 * admin_delete method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function adminDelete($id) {
		$this->request->allowMethod(['post', 'delete']);

		$user = $this->Users->get($id);
		
		if ($this->Users->delete($user)) {
			$this->Flash->success(__('The user with id: {0} has been deleted.', h($id)));
			
			return $this->redirect(['action' => 'adminIndex']);
		}
	}

	/**
	 * profile method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	/*public function profile($id = null) {
		$this->viewBuilder()->setLayout('layout_front');

		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		
		$options = ['conditions' => ['User.' . $this->User->primaryKey => $id]];
		
		$this->set('user', $this->User->find('first', $options));
	}*/

	/**
	 * register method
	 *
	 * @return void
	 */
	/*public function register() {
		$this->viewBuilder()->setLayout('layout_front');

		if(!empty($this->request->data)){
			$this->User->setCaptcha('security_code', $this->Captcha->getCode('User.security_code')); //getting from component and passing to model to make proper validation check
			$this->User->set($this->request->data);
		}
		if($this->request->is('post')) {
			$this->User->create();
			$hash = sha1($this->data['User']['user_username'].rand(0, 100));
			$this->User->data['User']['user_tokenhash'] = $hash;
			if($this->User->validates()) {
				if($this->User->save($this->request->data)) {
					$message .= '
						<a href="http://www.snookview.be"><img src="http://www.snookview.be/img/snookview-logo.png"></a>
						<br/>
						<p>' . 'Hi ' . $this->data['User']['user_username'] . '</p>' .
						'<p>Welcome to Snookview.</p>
						<a href="' . 'http://www.snookview.be/users/verify/t:' . $hash . '/n:' . $this->data['User']['user_username'] . '' . '">Click here</a> to complete your snookview registration.
						<p>Greetings
							<br/>
							<a href="http://www.snookview.be">Snookview.</a>
						</p>
						<ul style="list-style-type:none;-webkit-padding-start: 0px;padding-left: 0px;margin-left:0em;">
							<li style="display: inline-block;margin-left:0px;">
								<a href="https://www.facebook.com/snookview/" class="" data-lang="en" target="_blank">
									<img src="http://www.snookview.be/img/assets/facebook.png" style="width: 30px;height: 30px;cursor: pointer;">
								</a>
							</li>
							<li style="display: inline-block;margin-left:0px;">
								<a href="https://twitter.com/snookview" class="" data-lang="en" target="_blank">
									<img src="http://www.snookview.be/img/assets/twitter.png" style="width: 30px;height: 30px;cursor: pointer;">
								</a>
							</li>
						</ul>';
					$message = wordwrap($message, 70);
					$Email = new CakeEmail();
					$Email->from(['snookview147@gmail.com', 'snookview147@gmail.com'])
					->emailFormat('html')
					->to($this->data['User']['email'])
					->subject('Confirm Registration for snookview.')
					->send($message);
					$this->Session->setFlash(__('Please Check your email for validation Link.'));
					return $this->redirect(['action' => 'login']);
				} else {
					$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
				}
			}
		}
		//$people = $this->User->Person->find('list');
		//$this->set(compact('people'));
	}*/

	/**
	 * password method
	 *
	 * @return void
	 */
	/*public function password() {
		$this->viewBuilder()->setLayout('layout_front');

		$this->User->recursive = -1;

		if($this->request->is('post')) {
			$email = $this->data['User']['email'];
			$findUser = $this->User->find('first', ['conditions' => ['User.email' => $email]]);
			if($findUser){
				if($findUser['User']['user_activate'] == 1){
					$key = Security::hash(String::uuid(),'sha512', true);
					$hash = sha1($findUser['User']['user_username'].rand(0, 100));
					$url = Router::url(['controller'=>'users', 'action'=>'reset'], true ).'/'.$key.'#'.$hash;
					$message = '
						<a href="http://www.snookview.be"><img src="http://www.snookview.be/img/snookview-logo.png"></a>
						<br/>
						<p>' . 'Hi ' . $findUser['User']['user_username'] . '</p>' .
						'<a href="' . '' . $url . '">Click here</a> to change your password.
						<p>Greetings
							<br/>
							<a href="http://www.snookview.be">Snookview.</a>
						</p>
						<ul style="list-style-type:none;-webkit-padding-start:0px;padding-left:0px;margin-left:0em;">
							<li style="display: inline-block;margin-left:0px;">
								<a href="https://www.facebook.com/snookview/" class="" data-lang="en" target="_blank">
									<img src="http://www.snookview.be/img/assets/facebook.png" style="width: 30px;height: 30px;cursor: pointer;">
								</a>
							</li>
							<li style="display: inline-block;margin-left:0px;">
								<a href="https://twitter.com/snookview" class="" data-lang="en" target="_blank">
									<img src="http://www.snookview.be/img/assets/twitter.png" style="width: 30px;height: 30px;cursor: pointer;">
								</a>
							</li>
						</ul>';

					//$message = $url;
					$message = wordwrap($message, 1000);

					$findUser['User']['user_tokenhash_forgot_password'] = $key;
					$this->User->id = $findUser['User']['user_id'];
					if($this->User->saveField('user_tokenhash_forgot_password', $findUser['User']['user_tokenhash_forgot_password'])){
						$Email = new CakeEmail();
						$Email->from(['snookview147@gmail.com', 'snookview147@gmail.com'])
						->emailFormat('html')
						->to($this->data['User']['email'])
						->subject('Change password for snookview account.')
						->send($message);
						$this->Session->setFlash(__('An email has been send to ' . $this->data['User']['email'] . ' with a link where you can set a new password.'));
					}
				} else{
					$this->Session->setFlash(__('This account hasn\'t been activated yet. Please activate it first.'));
				}
			} else {
				$this->Session->setFlash(__('This email doesn\'t exist.'));
			} 
		} 		
	}*/

	/**
	 * reset method
	 *
	 * @return void
	 */
	/*public function reset($token = null) {
		$this->viewBuilder()->setLayout('layout_front');
		$this->User->recursive = -1;
		if(!empty($token)){
			$u=$this->User->findByuser_tokenhash_forgot_password($token);
			if($u){
				$this->User->id=$u['User']['user_id'];
				if(!empty($this->data)){
					$this->User->data = $this->data;
					$this->User->data['User']['user_username'] = $u['User']['user_username'];
					$new_hash = sha1($u['User']['user_username'] . rand(0, 100));//created token
					$this->User->data['User']['user_tokenhash_forgot_password'] = $new_hash;

					if($this->User->validates(['fieldList' => ['user_password', 'password_confirm']])){
						if($this->User->save($this->User->data)){
							$this->Session->setFlash('Password has been updated, you can login again.');
							$this->redirect(['controller' => 'users', 'action'=>'login']);
						}
					} else{ 
						$this->set('errors', $this->User->invalidFields());
					}
				}
			} else{
				$this->Session->setFlash('This link will work only once and has already been used. Please reset your password again by clicking on "Forgot Password?".');
				$this->redirect(['action' => 'login']);
			}
		} else {
			$this->redirect(['action' => 'login']);
		}
	}*/

	/**
	 * delete account method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	/*public function delete($id = null) {
		$this->viewBuilder()->setLayout('layout_front');
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->User->delete()) {
			$this->redirect($this->Auth->logout());
			$this->Session->setFlash(__('You\'re account has been deleted'));
		} else {
			$this->Session->setFlash(__('You\'re account could not be deleted. Please, try again.'));
		}
		return $this->redirect(['action' => 'login']);
	}*/
 }