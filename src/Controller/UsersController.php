<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Utility\Security;
use Cake\Mailer\Mailer;
use Cake\Mailer\Email;
use Cake\Mailer\TransportFactory;
use Authentication\PasswordHasher\DefaultPasswordHasher; 



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


        // debug(get_included_files());

        $this->set(compact('users'));
        $this->set('_serialize', ['users']); 
  }

    public function home(){

            // $this->Authentication->getResult();
            $user = $this->Authentication->getIdentity();

            $users = $this->Users->get($user->id, [
            'contain' => ['posts'],
            ]);

            $posts = $this->Users->Posts->find('list',['limit'=>200]);

            


            // die(" users identity------------>>");
            // $this->
            $this->loadModel('Posts');

			$this->set('title','Homepage');
			$this->viewBuilder()->setLayout('HomeLayout');



            $user = $this->Users->findById($users->id)->firstOrFail();
            $posts = $this->paginate($this->Posts);

            $this->Authorization->authorize($user);

            $this->set(compact('users','posts'));	
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
            $this->Authentication->addUnauthenticatedActions(['login', 'registration','index','resetpassword','forgotpassword']);
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
                        $users = $this->paginate($this->Users); 

               
                
                
                $result = $this->Authentication->getResult();
                // regardless of POST or GET, redirect if user is logged in
         if ($result->isValid()) {

                    // variable for dynamic menu
                    $_SESSION['user']='login';

                    if($this->Authentication->getIdentityData('role')==3)
                    {
                        $redirect = $this->request->getQuery('redirect', [
                            'controller' => 'Admin',
                            'action' => 'index',
                        ]);
                    }
                    else
                    {
                        $redirect = $this->request->getQuery('redirect', [
                        'controller' => 'Users',
                        'action' => 'home',
                        ]);
                    }

                    return $this->redirect($redirect);
                }
                // display error if user submitted and authentication failed
                if ($this->request->is('post') && !$result->isValid()) 
                {
                    $this->Flash->success(__('Invalid username or password'));
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

        $post = $this->Users->get($user->id);

    if($this->request->is(['patch', 'post', 'put'])){

             if(!empty($this->request->getData('image'))){
                     
                $file =  $this->request->getData('image')->getClientFilename('image');
                $file_name = date("dmYHis").preg_replace('/\s/', '', $file);
                $tmpPath = $this->request->getData('image')->getStream('image')->getMetadata('uri');
                echo $tmpPath;
                move_uploaded_file($tmpPath,WWW_ROOT."img/".$file_name);
                $post = $this->Users->patchEntity($post, $this->request->getData());
                $post['image'] = $file_name;
            }
            if ($this->Users->save($post)) {
                 echo "<script>alert('The Profile Picture has been updated')</script>";
                 return $this->redirect(['action' => 'profile']);
            }
            
            $this->Flash->error(__('The Profile Picture could not be saved. Please, try again.'));
     }
   

       

    
       //      if(!empty($this->request->getData('image'))){
       //               $file =  $this->request->getData('image')->getClientFilename('image');
       //              $file_name = date("dmYHis").preg_replace('/\s/', '', $file);
       //              $tmpPath = $this->request->getData('image')->getStream('image')->getMetadata('uri');
       //             move_uploaded_file($tmpPath,WWW_ROOT."img/".$file_name);
       //              $post = $this->Posts->patchEntity($post, $this->request->getData());
                   
       //              $post['image'] = $file_name;
       //               }
       //              if ($this->Posts->save($post)) {
       //                  $this->Flash->success(__('The post has been saved.'));

       //                  return $this->redirect(['action' => 'index']);
       //      }
       //      $this->Flash->error(__('The post could not be saved. Please, try again.'));
        
       //  }



       $this->set(compact('user'));


}

    public function callModal(){

        $user = $this->Authorization->getIdentity();

        $this->Authorization->authorize($user);

        $this->viewBuilder()->setLayout('ajax');

            if($this->request->is('ajax')){
                    $user = $this->Users->newEmptyEntity();
                    $this->set(compact('user'));
                    // $this->set('_serialize', ['user']);
            }
    }

    public function admin(){

        $user = $this->Authorization->getIdentity();
        debug($user);
        $this->Authorization->authorize($user);

    }


    

    public function forgotpassword(){

        $this->Authorization->skipAuthorization();
        $this->viewBuilder()->setLayout('resetpassword');

        if($this->request->is('post')){

            $myemail = $this->request->getData('email'); 
            $mytoken = Security::hash(Security::randomBytes(25));
            $user = $this->Users->find('all')->where(['username'=>$myemail])->firstOrFail();
             $user->token = $mytoken;

             if($this->Users->save($user)){
                
                    $mailer=new Mailer('default');

                    $mailer=$mailer->setTransport('gmail')
                            ->setEmailFormat('both')
                            ->setfrom(['shivshankarkumar.pusa@gmail.com'=>'Shivshankar '])
                            ->setSubject('Please confirm your reset passwors')
                            ->setTo($myemail);

                    $mailer->deliver('Hello '.$myemail.'<br>Please click link below to reset your password<br><br><br><a href="http://localhost:8080/users/resetpassword/'.$mytoken.'">Reset Password</a>');
                    $this->Flash->success('Link has been sent to '.$myemail.' ');

                 }
            }


        }

            public function resetpassword($token){
            
            $this->Authorization->skipAuthorization();


            if($this->request->is('post')){
                
                $mypass = $this->request->getData('password');
                $encryptedPassword = (new DefaultPasswordHasher())->hash($mypass);

                $user = $this->Users->find('all')->where(['token' => $token])->firstOrFail();

                pr($user);die("saffasd");                $user->password = $encryptedPassword;

                if($this->Users->save($user)){

                    return $this->redirect(['controller' => 'Users', 'action' => 'login']);
                }

                }
            }
}
