<?php

	declare(strict_types=1);

	namespace App\Controller\Admin;

    use App\Controller\AppController;



	class AdminsController extends AppController{

		public function initialize() : void {

			parent::initialize();
			$this->loadModel('Users');

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


		}

		public function add(){
			 $users = $this->paginate($this->Users);

			$this->viewBuilder()->setLayout('Admin');



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