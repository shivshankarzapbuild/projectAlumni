<?php
	declare(strict_types=1);

	namespace App\Controller;

	class PostsController extends AppController{

		public function index(){

		}
		public function add(){

			$this->viewBuilder()->setLayout('Profile');


		}

		public function delete($id = null){


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