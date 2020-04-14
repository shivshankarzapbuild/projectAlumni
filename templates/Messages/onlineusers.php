
<h1> YourFriends</h1>
  	
        <table class="table table-bordered table-striped">
         <tr>
          <td>Username</td>
          <td>Status</td>
          <td>Action</td>
         </tr>
      


    
    <?php foreach ($users as $user): ?>
      <?php 
      $status = ""; 
      $current_timestamp = strtotime(date('Y-m-d H:i:s').'-10 second');

      $current_timestamp = date('Y-m-d H:i:s',$current_timestamp);

      if($user->last_activity > $current_timestamp){

        $status = '<span class="btn btn-success">Online</span>';

      }else {

        $status = '<span class="btn btn-danger">Offline</span>';
        
      }
      ?>

  	<tr>
      
        <td><?php echo $user->first_name ." ".$user->middle_name." ".$user->last_name."<br>"; ?> </td> 
        
       <td><?php echo $status; ?></td> 
       <td> <?php echo $this->Form->button('Start chat', ['class' => 'btn btn-primary','id' => 'start_chat','data-touserid'=> $user->id,'data-tousername' => $user->first_name]) ?> </td> 

   </tr>

    <?php endforeach; ?>


    </table>



    
 