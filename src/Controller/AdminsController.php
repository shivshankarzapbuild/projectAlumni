<?php

	declare(strict_types=1);

	namespace App\Controller;

	class AdminsController extends AppController{

		public function index(){

			$this->viewBuilder()->setLayout('Admin');
	        
	        $this->Authorization->skipAuthorization();


        // debug(get_included_files());

        $this->set(compact('users'));
		}


		public function logout(){

        		
        		$this->Authorization->skipAuthorization();

			    $result = $this->Authentication->getResult();
			    // regardless of POST or GET, redirect if user is logged in
			    if ($result->isValid()) {
			        $this->Authentication->logout();
			        return $this->redirect(['controller' => 'Users', 'action' => 'login']);
			    }
			}
	}
?>