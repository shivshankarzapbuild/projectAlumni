<?php 
	declare(strict_types=1);

	namespace App\Controller;
	use Cake\Controller\Component;
	

	class MessagesController extends AppController
	{


		
		public function initialize() : void{

			parent::initialize();
			$this->loadModel('Users');

			
			
		} 
		// public function beforeFilter(EventInterface $event)
		//     {
		//         parent::beforeFilter($event);

		//         if ($this->request->getParam('action') === 'onlineusers') {
		//             $this->FormProtection->setConfig('validate', false);
		//         }
		//     }
		
		

		public function add(){
			


		}

		public function view(){

			$this->request->allowMethod(['post','ajax']);

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

			$this->request->allowMethod(['post','ajax']);

			$keyword = $this->request->getQuery();

 
			$messages = $this->Messages->newEmptyEntity();

			
			        
	  }


		public function onlineusers(){

			 $this->request->allowMethod(['post','ajax']);
			// $token = $this->request->getParam('_csrfToken');

			// echo $token; die("sdfgs");
			$user = $this->Authentication->getIdentity();

			$users = $this->Users->find('all',[

				'conditions' => [
					'id !=' => $user->id
				]
			]);

			$this->set(compact('users'));

		}

		public function message(){

			$this->viewBuilder()->setLayout('chatLayout');

					
		}
		

		

	}

?>