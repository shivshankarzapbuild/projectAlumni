
<h1> YourFriends</h1>
  	<table class="table">
  		<thead>
  			<th> Name </th>
  			<th> Status </th>
  			<th> Chat </th>
  		</thead>
    
    <?php foreach ($users as $user): ?>
      <?php 
      // $status = ""; 
      // $current_timestamp = strtotime('Y-m-d H:i:s').'-10 second';
      // $current_timestamp = date('Y-m-d H:i:s',$current_timestamp);

      ?>
  	<tr>
        <td><?php echo $user->first_name ." ".$user->middle_name." ".$user->last_name."<br>"; ?> </td> 
        
       <td> online </td> 
       <td> <?php echo $this->Form->button('Start chat', ['class' => 'start_chat','id' => 'start_chat']) ?> </td> 

   </tr>

        

    <?php endforeach; ?>

    </table>
 