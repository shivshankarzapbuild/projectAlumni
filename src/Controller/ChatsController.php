<?php 
	declare(strict_types=1);

	namespace App\Controller;

	class ChatsController extends AppController
	{
		
		public function initialize() : void{

			$this->viewBuilder()->setLayout('chatLayout');


		} 

		public function add(){


		}

		public function view(){


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