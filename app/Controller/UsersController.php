<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');
App::uses('Folder', 'Utility');
App::uses('File', 'Utility');
/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 */
class UsersController extends AppController {

	public $uses = array('User');

	public $helpers = array('Html', 'Form', 'Captcha');

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Email', 'Captcha'=>array('field'=>'security_code'));

	public function beforeFilter(){
		//ALL THE BEFORE SETTINGS FROM THE APPCONTROLLER.PHP FILE
		parent::beforeFilter();
		//ADDITIONAL SETTINGS FOR JUST THE USERCONTROLLER
		//$this->Auth->allow('register', 'password', 'reset', 'captcha');
	}

	/*public function isAuthorized($user){
		if($user['user_role'] == 'admin'){
			return true;
		}
		if(in_array($this->action, array('admin_view', 'admin_edit', 'admin_delete', 'edit', 'delete', 'profile'))){
			if($user['user_id'] != $this->request->params['pass']['0']){
				return $this->Session->setFlash(__('Access denied'));
			}
		}
		return true;
	}*/

	public function captcha()	{
        $this->autoRender = false;
        $this->layout='ajax';
        if(!isset($this->Captcha))	{ //if you didn't load in the header
            $this->Captcha = $this->Components->load('Captcha'); //load it
        }
        $this->Captcha->create();
    }

    public function admin_captcha()	{
        $this->autoRender = false;
        $this->layout='ajax';
        if(!isset($this->Captcha))	{ //if you didn't load in the header
            $this->Captcha = $this->Components->load('Captcha'); //load it
        }
        $this->Captcha->create();
    }

	public function verify(){
		//check if the token is valid
		if (!empty($this->passedArgs['n']) && !empty($this->passedArgs['t'])){
			$name = $this->passedArgs['n'];
			$tokenhash = $this->passedArgs['t'];
			//$results = $this->User->findByUser_username($name);
			$results = $this->User->find('first', array('conditions' => array('user_username' => $name)));
			
			//check if the user is already activated
			if ($results['User']['user_activate'] != 1){
				//check the token
				if($results['User']['user_tokenhash'] == $tokenhash){
					//Set activate to 1
					$this->User->id = $results['User']['user_id'];
					$this->User->saveField('user_activate', 1);
					//$results['User']['user_activate'] = 1;
					
					//Save the data
					//$this->User->save($results);
					$this->Session->setFlash('Your registration is complete');
					return $this->redirect(array('action' => 'login'));
					exit;
				} else{
					$this->Session->setFlash('Your registration failed please try again');
					return $this->redirect(array('action' => 'register'));
				}
			} else{
				$this->Session->setFlash('This link will work only once and has already been used.');
				return $this->redirect(array('action' => 'register'));
			}
		}
	}

	public function login(){
		$this->layout = 'layout_front';
		/*if ($this->request->is('post')){
			if($this->Auth->login()){
				$this->redirect($this->Auth->redirect());
			} else {
				$this->Session->setFlash(_('The email and/or password is incorrect'));
			}
		}*/
		if (!empty($this->data)) {
			if ($this->Auth->loggedIn()) {
				$this->Session->setFlash('There is already a user logged in, he or she needs to logout first.');
	            $this->redirect($this->Auth->redirect('login'));
	        }
			if ($this->User->validates()) {
				$this->User->data = $this->data;
				$results = $this->User->findByEmail($this->data['User']['email']);
				/*if email is in database*/
				if($results){
					/*check if account is activated*/
					if ($results['User']['user_activate']==1){
						/*when logged in*/
						if ($this->Auth->login()) {
							$this->Session->write('User', $results['User']);
							//$this->lastLoginUser();
							/*redirect*/
							$this->redirect($this->Auth->redirect('/'));
						}
						/*when logging failed*/
						else {
							$this->Session->setFlash('Invalid Username or Password please try again');
				  		}
			  		}
			  		/*when account isn't activated*/
			  		else  {
						$this->Session->setFlash('Your Email is not verified. Please verify and try again.');
			  		}
				}
				/*if email isn't in database*/
				else{
					$this->Session->setFlash('Invalid Username or Password please try again');
				}
				
			}
		}
	}

	protected function lastLoginUser(){
        $this->User->id = $this->Auth->user('user_id');
        $this->User->read();
        $this->User->data['User']['user_lastlogin'] = date('Y-m-d H:i:s');
        $this->User->save($this->User->data, false);
    }

	public function admin_login(){
		$this->layout = 'layout_back';
		if ($this->request->is('post')){
			if($this->Auth->login()){
				$this->redirect($this->Auth->redirect());
			} else {
				$this->Session->setFlash(_('The email and/or password is incorrect'));
			}
		}
	}

	public function logout(){
		$this->redirect($this->Auth->logout());
	}

	public function admin_logout(){
		$this->layout = 'layout_back';
		$this->redirect($this->Auth->logout());
	}

/**
 * admin_index method
 *
 * @return void
 */
	/*public function index() {
		$this->layout = 'layout_front';
		$this->User->recursive = 0;
		$this->set('users', $this->Paginator->paginate());
	}*/

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function profile($id = null) {
		$this->layout = 'layout_front';
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$this->set('user', $this->User->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function register() {
		$this->layout = 'layout_front';

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
					$Email->from(array('snookview147@gmail.com', 'snookview147@gmail.com'))
					->emailFormat('html')
					->to($this->data['User']['email'])
					->subject('Confirm Registration for snookview.')
					->send($message);
					$this->Session->setFlash(__('Please Check your email for validation Link.'));
					return $this->redirect(array('action' => 'login'));
				} else {
					$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
				}
			}
		}
		//$people = $this->User->Person->find('list');
		//$this->set(compact('people'));
	}

	public function password() {
		$this->layout = 'layout_front';

		$this->User->recursive = -1;

		if($this->request->is('post')) {
			$email = $this->data['User']['email'];
 			$findUser = $this->User->find('first', array('conditions' => array('User.email' => $email)));
 			if($findUser){
 				if($findUser['User']['user_activate'] == 1){
					$key = Security::hash(String::uuid(),'sha512', true);
					$hash = sha1($findUser['User']['user_username'].rand(0, 100));
					$url = Router::url( array('controller'=>'users', 'action'=>'reset'), true ).'/'.$key.'#'.$hash;
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
						$Email->from(array('snookview147@gmail.com', 'snookview147@gmail.com'))
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
	}

	public function reset($token = null) {
		$this->layout = 'layout_front';
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

					if($this->User->validates(array('fieldList' => array('user_password', 'password_confirm')))){
						if($this->User->save($this->User->data)){
							$this->Session->setFlash('Password has been updated, you can login again.');
							$this->redirect(array('controller' => 'users', 'action'=>'login'));
						}
					} else{ 
						$this->set('errors', $this->User->invalidFields());
					}
				}
			} else{
				$this->Session->setFlash('This link will work only once and has already been used. Please reset your password again by clicking on "Forgot Password?".');
				$this->redirect(array('action' => 'login'));
			}
		} else {
			$this->redirect(array('action' => 'login'));
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->layout = 'layout_front';
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('Your account has been updated.'));
				return $this->redirect(array('action' => 'edit', $id));
			} else {
				$this->Session->setFlash(__('Your account couldn\'t be updated. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
		}
		//$people = $this->User->Person->find('list');
		//$this->set(compact('people'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->layout = 'layout_front';
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
		return $this->redirect(array('action' => 'login'));
	}


/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		/*$this->layout = 'layout_back';
		$this->User->recursive = 0;
		$this->set('users', $this->Paginator->paginate());*/

		$this->layout = 'layout_back';
		$this->User->recursive = 1;

		$this->paginate = array( 
	        'order' => array('User.user_id' => 'DESC')
	    );

	    $this->set('users', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->layout = 'layout_back';
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$this->set('user', $this->User->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		$this->layout = 'layout_back';

		if(!empty($this->request->data)){
        	$this->User->setCaptcha('security_code', $this->Captcha->getCode('User.security_code')); //getting from component and passing to model to make proper validation check
        	$this->User->set($this->request->data);
    	}

		if($this->request->is('post')) {
			$this->User->create();
			$hash = sha1($this->data['User']['user_username'].rand(0,100));
			$this->User->data['User']['user_tokenhash'] = $hash;
			if($this->User->validates()) {
				if($this->User->save($this->request->data)) {
					$ms = 'Click on the link below to complete registration ';
					$ms .= 'http://www.snookview.be/users/verify/t:'.$hash.'/n:'.$this->data['User']['user_username'].'';
					$ms = wordwrap($ms, 70);
					$Email = new CakeEmail('smtp');
					$Email->from(array('snookview147@gmail.com', 'snookview147@gmail.com'))
					->to($this->data['User']['email'])
					->subject('Confirm Registration for snookview.')
					->send($ms);
					$this->Session->setFlash(__('Please Check your email for validation Link.'));
					return $this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
				}
			}
		}
		$roles = array('Admin' => 'Admin', 'User' => 'User', 'UserTimeline' => 'UserTimeline');
		$this->set(compact('roles'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		$this->layout = 'layout_back';
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
		}
		$user_username = $this->data['User']['user_username'];
		$dir = new Folder('img' . DS . 'users' . DS . $user_username);
		$files = $dir->find('.*\.jpg', true);
		$roles = array('Admin' => 'Admin', 'User' => 'User', 'UserTimeline' => 'UserTimeline');
		$this->set(compact('files', 'roles'));
		//$people = $this->User->Person->find('list');
		//$this->set(compact('people'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->layout = 'layout_back';
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
		return $this->redirect(array('action' => 'login'));
	}
 }