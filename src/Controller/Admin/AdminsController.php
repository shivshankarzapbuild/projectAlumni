<?php

	declare(strict_types=1);

	namespace App\Controller\Admin;

    use App\Controller\AppController;



	class AdminsController extends AppController{

		public function initialize() : void {

			parent::initialize();
			$this->loadModel('Users');
			$this->loadModel('Posts');
			$this->loadModel('Comments');
			$this->loadModel('DeletedMessages');
			$this->loadModel('DeletedConversations');
			$this->loadModel('Reports');

			// die("Admins Controller ----------->");
		


		}

		public function index(){

			 $users = $this->paginate($this->Users);

			$this->viewBuilder()->setLayout('Admin');
			// $users = $this->Authentication->getIdentity();
	        
	        $this->Authorization->skipAuthorization();


        // debug(get_included_files());

        $this->set(compact('users'));
		}
		
		public function users(){

			$this->viewBuilder()->setLayout('Admin');
			$users = $this->paginate($this->Users);

			$this->set(compact('users'));


		}
		public function post(){

			$this->viewBuilder()->setLayout('Admin');

			$posts = $this->Posts->find('all',[
            
                'contain' => ['Users','Comments']
            ]);
			$this->set(compact('posts'));

		}
		public function comments(){
			$this->viewBuilder()->setLayout('Admin');

			$comments = $this->Comments->find('all',[
            
                'contain' => ['Posts']
            ]);
			$this->set(compact('comments'));

		}
		public function deletedmessages(){

			$this->viewBuilder()->setLayout('Admin');

			$deletedmessages = $this->paginate($this->DeletedMessages);
			$this->set(compact('deletedmessages'));

		}

		public function deletedconversations(){

			$this->viewBuilder()->setLayout('Admin');

			$deletedconversations = $this->paginate($this->DeletedConversations);
			$this->set(compact('deletedconversations'));

		}
		public function reports(){

			$this->viewBuilder()->setLayout('Admin');
			$reports = $this->paginate($this->Reports);
			$this->set(compact('reports'));


		}

		public function view($id){


		}

		public function delete($id){


		}


		public function logout(){

        		
        		$this->Authorization->skipAuthorization();

			    $result = $this->Authentication->getResult();
			    // regardless of POST or GET, redirect if user is logged in
			    if ($result->isValid()) {
			        $this->Authentication->logout();
			        return $this->redirect(['prefix' => ' ','controller' => 'Users', 'action' => 'login']);
			    }
			}
	}
?>