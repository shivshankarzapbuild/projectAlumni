<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Utility\Security;
use Cake\Mailer\Mailer;
use Cake\Mailer\Email;
use Cake\Mailer\TransportFactory;
use Authentication\PasswordHasher\DefaultPasswordHasher; 



class CommentsController extends AppController
{
	public function initialize() : void{

		parent::initialize();
		$this->viewBuilder()->setLayout('HomeLayout');
		$this->loadComponent('Flash');
		$this->loadModel('Posts');
		$this->loadModel('Users');

	}

	public function add($id){

		

		$userId = $this->Authentication->getIdentity();

		 $comment = $this->Comments->newEmptyEntity();

		 $comment->post_id = $id;

 		if($this->request->is('post')){


			$comments = $this->Comments->patchEntity($comment,$this->request->getData());
			if($this->Comments->save($comments)){

				$this->Flash->success('Comment Added');
				$this->redirect(['controller'=>'users','action'=>'home']);
			}

			
		}


		$this->set(compact('comment'));



	}

	public function edit($id){

		$comment = $this->Comments->findById($id)->firstOrFail();

		if ($this->request->is(['patch', 'post', 'put'])) {
            	
            $comments = $this->Comments->patchEntity($comment,$this->request->getData());

            if ($this->Comments->save($comments)) {
                $this->Flash->success(__('The Comments has been saved.'));

                return $this->redirect(['controller'=>'Users','action' => 'home']);
            }
            $this->Flash->error(__('The secondlevel could not be saved. Please, try again.'));
        }
        

		$this->set(compact('comment'));		


	}

	public function view($id){

		echo $id;


	}

	public function delete($id){

		// $this->request->allowMethod(['post', 'delete']);

		 $comment = $this->Comments->findById($id)->firstOrFail();
		$this->request->allowMethod(['post', 'delete']);

		    $comment = $this->Comments->findById($id)->firstOrFail();

		    if ($this->Comments->delete($comment)) {
		        
		         return $this->redirect(['controller' => 'Users','action' => 'home']);
		    }
		}

		// pr($id);die("Id in the comments---------->>>>>");

	
}
  