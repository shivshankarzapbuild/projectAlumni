<?php
	declare(strict_types=1);

	namespace App\Controller;

	class PostsController extends AppController{

		public function index(){

		}
		public function add(){

			$this->viewBuilder()->setLayout('Profile');
			// $posts = $this->paginate($this->Posts);


			$post = $this->Posts->newEmptyEntity();

			$user = $this->Authentication->getIdentity();

			$user_id = $user->id;
			 // pr($user_id ); die("user id ");


			$this->request->allowMethod(['post','ajax']);

				

			if($this->request->is('post')){
			   $data = $this->request->getData();
			   $data = implode($data);
			   $data1 = json_decode($data);
			   echo "<pre>".print_r($data1)."</pre>";
			   //You should be able to see file data in this array
			}
					// $this->set(compact('data'));

					// echo $data;

				

				// die("post data");

				// if(!empty($this->request->getData('image'))){

				// 	// die(" Not EMpty Image");

				// $file =  $this->request->getData('image')->getClientFilename('image');


    //             $file_name = date("dmYHis").preg_replace('/\s/', '', $file);
                
    //             $tmpPath = $this->request->getData('image')->getStream('image')->getMetadata('uri');
    //             // echo $tmpPath;

    //             move_uploaded_file($tmpPath,WWW_ROOT."img/".$file_name);

    //             $post['user_id'] = $user_id;

				// $post = $this->Posts->patchEntity($post,$this->request->getData());
				// $post['image'] = $file_name;

				// if($this->Posts->save($post)){

				// 	$this->Flash->success('Post Added ');
				// 	$this->redirect(['controller'=>'Users','action'=>'home']);
				// }

				// else
				// {
				// 	echo '<script> alert("The post could not be saved")</script>';
				// }

				// }
			

			// $this->set(compact('post','categories'));



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