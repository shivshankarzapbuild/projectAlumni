<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Utility\Security;
use Cake\Mailer\Mailer;
use Cake\Mailer\Email;
use Cake\Mailer\TransportFactory;
use Authentication\PasswordHasher\DefaultPasswordHasher; 



class ReportsController extends AppController
{
	public function initialize() : void{

		parent::initialize();
		$this->loadComponent('Flash');
	}
}
  