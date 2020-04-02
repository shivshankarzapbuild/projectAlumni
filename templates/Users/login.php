
	<title> <?= $this->fetch('title') ?></title>

		<?= $this->fetch('meta') ?>
		<header> <nav class="navbar navbar-expand-lg navbar-light bg-info fixed-top">
    <div class="container">
    
      <a href="/" class="navbar-brand"><b><u>Alumni Network</u></b></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
           <a href="/users/registration" class="nav-link">Register</a>
                  <span class="sr-only">(current)</span>
        </a>
          </li>
         
        </ul>
      </div>
    </div>
  </nav>

</header>

	<div class="row">
		
<div class="col"> </div>

		<div class="col"></div>

			<div class="col" id="login_form"> 

			
			    <?= $this->Flash->render() ?>
			    <h3>Login</h3>
			    <?= $this->Form->create($users) ?>
			    <fieldset>
			        
			        <?php echo $this->Form->control('username',['type' => 'email','class'=>'form-control','placeholder' => 'Enter Email','label' => ['class' => 'required'],'required' => true]); ?>


			        <?php echo $this->Form->control('password',['type' => 'password','class'=>'form-control','placeholder' => 'Enter Password','label' => ['class' => 'required'],'required' => true]); ?>


				    </fieldset>

				    <?= $this->Form->button('Login',['class' => 'form-control btn btn-success mt-3'])?>

				    <?= $this->Html->link('Forgot Password ??',['controller' => 'Users','action'=>'forgotpassword']) ?>

				    <?= $this->Form->end() ?>

				    
			<?= $this->Form->end() ?>	
		</div>
		</div>


		
		
		<div class="layout">
      <div class="layout-image">
          <img src="img/destination_1.jpg" alt="">
      </div>
    </div>
	



