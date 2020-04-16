<?php 
	declare(strict_types=1);

	namespace App\Controller;
	use Cake\Controller\Component;
	

	class MessagesController extends AppController
	{


		
		public function initialize() : void{

			parent::initialize();
			$this->loadModel('Users');
			$this->loadModel('Conversations');


			$conversation = $this->Conversations->newEmptyEntity();

			$conversation->id = $_SESSION['user_id'];
			$conversation->creator_id = $_SESSION['user_id'];

			$this->Conversations->save($conversation);

			
			
		} 

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

		public function insert(){

			$message = $this->Messages->newEmptyEntity();

			$this->request->allowMethod(['post','ajax']);

			if( $this->request->is('ajax')) {
			     $messages = $_POST['chatmessage'];
			     $userid = $_POST['touserid'];

			     // echo $messages ." ". $userid;
			     
			     $message->message = $messages;
			     $message->sender_id = $_SESSION['user_id'];
			     $message->participant_id = $userid;
			     $message->conversation_id = $_SESSION['user_id'];

			     // pr($message);

			    $value = $this->Messages->save($message);


			     $newmessages = $this->Messages->find('all', 
						        array(
						            'limit' => 200,
						            'order' => 'Messages.created DESC',
						            'recursive' => 1,
						            'conditions' => ['conversation_id' => $_SESSION['user_id']],
						       )
						   );

			     $users = $this->Users->findById($message->participant_id);
			      // $this->request->getQuery('chatmessage');

			     $this->set(compact('newmessages','users'));

			}

		}

		public function fetchhistory(){

			$this->request->allowMethod(['post','ajax']);

			if( $this->request->is('ajax')) {

					$userid = $_POST['touserid'];
					 $newmessages = $this->Messages->find('all', 
						        array(
						            'limit' => 200,
						            'order' => 'Messages.created DESC',
						            'recursive' => 1,
						            'conditions' => ['conversation_id' => $_SESSION['user_id']],

						       )
						   );

				     $users = $this->Users->findById($userid);
				   

				     $this->set(compact('newmessages','users'));
			}
		}


		

		

	}
?>