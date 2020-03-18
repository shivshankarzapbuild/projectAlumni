<title> <h1><?= $this->fetch('title') ?> </h1></title>

<header> <nav class="navbar navbar-expand-lg navbar-light bg-dark fixed-top">
    <div class="container">

<span><a href="/" class="navbar-brand"><b><u>Alumni Network</u></b></a></span>
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
		          <li class="nav-item">
		           <a href="/users/login" class="nav-link">Login</a>
		                  <span class="sr-only">(current)</span>
		           </a>
		         </li>
		      </li>
        </ul>
      </div>
    </div>
  </nav>

</header>

	<div class="row">
		<div class="col1">

			<center><h2 class="detailsRegister"><b><?php echo "Enter Your Details"; ?></b></h2></center>
		<?= $this->fetch('meta') ?>

			<?= $this->Form->create($user,['autocomplete'=>true]); ?>


			<?php echo $this->Form->control('first_name',['type' => 'text','class'=>'form-control','placeholder'=>'Enter First Name','label' => ['class' => 'required'],'required'=>true]); ?>


			<?php echo $this->Form->control('middle_name',['type' => 'text','class'=>'form-control','placeholder'=>'Enter Middle Name']); ?>


			<?php echo $this->Form->control('last_name',['type' => 'text','class'=>'form-control','placeholder'=>'Enter Last Name','label' => ['class' => 'required'],'required'=>true]); ?>


			<?php echo $this->Form->control('username',['type' => 'email','class'=>'form-control','placeholder'=>'Enter Email','label' => ['class' => 'required'],'required'=>true]); ?>


			<?php echo $this->Form->control('password',['type' => 'password','class'=>'form-control','placeholder'=>'Enter Password','label' => ['class' => 'required'],'required'=>true]); ?>


			<?= $this->Form->button('Register',['class' => 'form-control btn btn-success mt-3'])?>
			
			
			<?= $this->Form->end() ?>
			<div style="margin-top: 3px;">
			<center><h3> Follow us On </h3></center>
			<center>
			<a href="#" class="fa fa-facebook"></a>
			<a href="#" class="fa fa-twitter"></a>
			<a href="#" class="fa fa-instagram"></a>
			<a href="#" class="fa fa-linkedin"></a>
			</div>
			</center>
		 </div>
		 
		<div class="col2">
			<div id="demo" class="carousel slide" data-ride="carousel">

			  <!-- Indicators -->
			  <ul class="carousel-indicators">
			    <li data-target="#demo" data-slide-to="0" class="active"></li>
			    <li data-target="#demo" data-slide-to="1"></li>
			    <li data-target="#demo" data-slide-to="2"></li>
			  </ul>

			  <!-- The slideshow -->
			  <div class="carousel-inner">
			    <div class="carousel-item active">
			      <?= $this->Html->image('destination_4.jpg',['alt'=>'Second'])?>
			    </div>
			    <div class="carousel-item">
			      <?= $this->Html->image('destination_3.jpg',['alt'=>'First'])?>
			    </div>
			    <div class="carousel-item">
			      <?= $this->Html->image('destination_2.jpg',['alt'=>'First'])?>
			    </div>
			  </div>

			  <!-- Left and right controls -->
			  <a class="carousel-control-prev" href="#demo" data-slide="prev">
			    <span class="carousel-control-prev-icon"></span>
			  </a>
			  <a class="carousel-control-next" href="#demo" data-slide="next">
			    <span class="carousel-control-next-icon"></span>
			  </a>

			</div>

	</div>
	</div>

	<footer> 

</footer>


