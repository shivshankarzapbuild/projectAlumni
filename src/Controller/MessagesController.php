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
			$this->loadComponent('RequestHandler');

			$this->loadComponent('Security');
		} 
		
		

		public function add(){
			$messages = $this->paginate($this->Messages);

			$this->set(compact('messages'));
		}

		public function view(){

			$this->request->allowMethod('ajax');

			$keyword = $this->request->getQuery('keyword');
			 $query = $this->Messages->find('all',[
              'conditions' => ['message LIKE'=>'%'.$keyword.'%'],
              'order' => ['Messages.id'=>'DESC'],
              'limit' => 10
        ]);
			// pr($messages); die("messages");
			
			$this->set('messages', $this->paginate($query));
	        $this->set('_serialize', ['messages']);
		}
		
		public function chat(){



			if( $this->request->is('ajax') ) {
			      $new = $this->request->data; 

			     
			        echo "ok";
			        
			    }


		}

	}

?>