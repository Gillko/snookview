<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');
/**
 * Contact Controller
 *
 * @property Contact $Contact
 * @property PaginatorComponent $Paginator
 */
class ContactController extends AppController {

/**
 * Components
 *
 * @var array
 */

	public $helpers = array('Html', 'Form', 'Captcha');
	public $components = array('Email', 'CaptchaContact' => array('field'=>'security_code'));

	public function beforeFilter(){
		//ALL THE BEFORE SETTINGS FROM THE APPCONTROLLER.PHP FILE
		parent::beforeFilter();
		//ADDITIONAL SETTINGS FOR JUST THE USERCONTROLLER
		$this->Auth->allow('index', 'captcha');
	}

	public function captcha()	{
        $this->autoRender = false;
        $this->layout='ajax';
        if(!isset($this->Captcha)){ 
            $this->Captcha = $this->Components->load('CaptchaContact');
        }
        $this->Captcha->create();
    }

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->layout = 'layout_front';

		if(!empty($this->request->data)){
			/*CaptchaContact because I made another Captcha component 'CaptchaContactComponent' Change private $sessionKey on line 104 and changed 'model' => 'Contact' on line 132 of the component*/
        	$this->Contact->setCaptcha('security_code', $this->CaptchaContact->getCode('Contact.security_code'));
        	$this->Contact->set($this->request->data);
    	}

		if($this->request->is('post')) {
			if($this->Contact->validates($this->request->data)) {
					$Email = new CakeEmail();
					$Email->from(array($this->request->data['Contact']['email'], $this->request->data['Contact']['email']))
					->to('snookview147@gmail.com')
					->subject('Message from the snookview contact page by ' . $this->data['Contact']['email'])
					->send($this->data['Contact']['message']);
					$message = '
						<a href="http://www.snookview.be"><img src="http://www.snookview.be/img/snookview-logo.jpg"></a>
						<br/>
						<p>' . 'Hi ' . $this->request->data['Contact']['firstname'] . ' ' . $this->request->data['Contact']['surname'] . '</p>' .
						'<p>Thanks for contacting snookview, we will get back to you soon.</p><p>See here your message below : <br/>' . $this->data['Contact']['message']. '</p>
						<p>Greetings
							<br/>
							<a href="http://www.snookview.be">Snookview.</a>
						</p>
						<ul style="list-style-type:none;padding-left:0px;margin-left:0px;margin-left:0em;">
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
					$Email->from(array('snookview147@gmail.com', 'snookview147@gmail.com'))
					->emailFormat('html')
					->to($this->data['Contact']['email'])
					->subject('Thanks for contacting snookview.')
					->send($message);

					$this->Session->setFlash(__('You\'re message has been send to snookview, we will get back to you soon.'));
					return $this->redirect(array('action' => '/'));
				} else {
					$this->Session->setFlash(__('You\'re message could not be send to snookview, please try again.'));
				}
			//}
		}
	}
}