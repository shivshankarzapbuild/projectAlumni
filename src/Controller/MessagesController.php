<?php 
	declare(strict_types=1);

	namespace App\Controller;
	use Cake\Controller\Component;
	use Cake\Http\Middleware\CsrfProtectionMiddleware;

	class MessagesController extends AppController
	{


		
		public function initialize() : void{

			parent::initialize();
			$this->viewBuilder()->setLayout('chatLayout');

			$this->loadComponent('Security');
		} 
		
		

		public function add(){
			$messages = $this->Messages->newEmptyEntity();

			if( $this->request->is('ajax') ) {

			      $newData  = $this->request->getData(); 

			      echo '<script> console.log("Ajax request") </script>';
			}

			$this->set(compact('messages'));
		}

		public function view(){


			if( $this->request->is('ajax') ) {
			      $newData  = $this->request->getData(); 

			      echo '<script> console.log("Ajax request") </script>';    
			      
			    }

		}
		public function chat(){



			if( $this->request->is('ajax') ) {
			      $new = $this->request->data; 

			      echo $new; die("hello");

			        echo "ok";
			        
			    }


		}

	}

?>