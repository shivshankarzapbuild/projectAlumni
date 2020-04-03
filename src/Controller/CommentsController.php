<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Utility\Security;
use Cake\Mailer\Mailer;
use Cake\Mailer\Email;
use Cake\Mailer\TransportFactory;
use Authentication\PasswordHasher\DefaultPasswordHasher; 



class CommentsController extends AppController
{
	public function initialize() : void{

		parent::initialize();
		$this->loadComponent('Flash');
		$this->loadModel('Posts');
		$this->loadModel('Users');

	}

	public function add(){



	}

	public function edit($id){


	}

	public function view($id){


	}

	public function delete($id){

		$this->request->allowMethod(['post', 'delete']);

		    $comment = $this->Comments->findById($id)->firstOrFail();

		    if ($this->Students->delete($comment)) {
		        
		        

	}
}
  