<?php
declare(strict_types=1);

namespace App\Controller;


class UsersController extends AppController
{
    

    public function initialize() : void{

        parent::initialize();

        $this->loadComponent('Flash');

    }
    public function index()
    {
    	$this->viewBuilder()->setLayout('indexLayout');
        $users = $this->paginate($this->Users);
        $this->Authorization->skipAuthorization();


        // debug(get_included_files());

        $this->set(compact('users'));
    }

    public function home(){

            // $this->Authentication->getResult();
            $users = $this->Authentication->getIdentity();

			$this->set('title','Homepage');
			$this->viewBuilder()->setLayout('HomeLayout');

            $user = $this->Users->findById($users->id)->firstOrFail();

            $this->Authorization->authorize($user);
			
		}



   
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);

        $this->set('user', $user);
    }
		


	public function beforeFilter(\Cake\Event\EventInterface $event)
        {
            parent::beforeFilter($event);
            // Configure the login action to not require authentication, preventing
            // the infinite redirect loop issue
            $this->Authentication->addUnauthenticatedActions(['login']);
            $this->Authentication->addUnauthenticatedActions(['login', 'registration','index']);
        }



    public function registration()
    {

        $this->Authorization->skipAuthorization();


    	$this->set('title','Registration');
        $this->viewBuilder()->setLayout('Register');
        // $this->loadModel('Users');

        $user = $this->Users->newEmptyEntity();

            if ($this->request->is('post')) {

                // $validator = new App\Model\UsersTable();

                // $errors = $validator->errors($this->request->data());

                $user = $this->Users->patchEntity($user, $this->request->getData());
               // pr($user);die('user value');
                if ($this->Users->save($user)) {
                    $this->Flash->success(__('Registered Successfully'));

                    return $this->redirect(['action' => 'login']);
                }
                else{
                    echo "<script>alert('Something went wrong') </script>";
                }
               echo "<script>alert('Something went wrong') </script>";
            }
            $this->set(compact('user'));
    }

    
    public function edit($id)
    {
        $user = $this->Users
        ->findById($id) 
        ->firstOrFail();
        $this->Authorization->authorize($user);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {

                $this->Flash->success(__(''));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }




    public function login(){

        $this->Authorization->skipAuthorization();

			$this->viewBuilder()->setLayout('Login');
			$this->set('title','Login');

            $users = $this->paginate($this->Users);

            

			 // $this->request->allowMethod(['get', 'post']);

			// pr($this->request->getData());

		    $result = $this->Authentication->getResult();
		    
		    
		    if ($result->isValid()) {

                $user = $this->Authentication->getIdentity();



               // echo $user->role;die('users role ---------->');

                if($user->role == '1'){

                 $redirect = $this->request->getQuery('redirect', [
                    'controller' => 'Users',
                    'action' => 'home',
                ]);
                }
                else{
                     $redirect = $this->request->getQuery('redirect', [
                    'controller' => 'Admins',
                    'action' => 'index',
                ]);

                }

		       

		        return $this->redirect($redirect);
		    }
		    
		    if ($this->request->is('post') && !$result->isValid()) {
		    	
		          echo "<script>alert('Email or Password is Incorrect');</script>";
		    }

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




    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function profile(){

     $users = $this->Authentication->getIdentity();

        $this->viewBuilder()->setLayout('Profile');
        $this->set('title','Profile');
        
        $user = $this->Users->findById($users->id)->firstOrFail();

       $this->Authorization->authorize($user);


    }
}
