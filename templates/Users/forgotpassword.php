<div class="row">
	<div class="col-md-4 offset-md-4">
		
		<div class="card">
			<h3 class=" card-header">
				Forgot Password
			</h3>
			<div class="card-body">
				<?php echo $this->Form->create() ?>

				<div class="form-group">

					<?php echo $this->Form->control('email',['type'=>'text','class'=>'form-control','required' => true])?>
					
				</div>

				<?php
					echo $this->Form->button('Get New Password',['type'=>'submit','class'=>'btn btn-primary']);

					echo $this->Html->link('Login',['action'=>'login'],['class'=>'btn btn-success']);

					echo $this->Form->end();

				?>
				
			</div>
		</div>
		
	</div>
	
</div>