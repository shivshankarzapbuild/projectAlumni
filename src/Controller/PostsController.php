<?php
	declare(strict_types=1);

	namespace App\Controller;

	class PostsController extends AppController{

		public function add(){

			$this->viewBuilder()->setLayout('addPosts');
		}
	}

?>