<?php 
	$username = " ";
		foreach($users as $user){

			$username  = $user->first_name; 

		}
 ?>


<?php foreach($newmessages as $message): ?>

<?php

	if($message->sender_id == $_SESSION['user_id'])
	  {
	   $user_name = '<b class="text-success">You</b>';
	  }
	  else
	  {
	   $user_name = '<b class="text-danger">'.$username.'</b>';
	  }

  ?>
 
  <li style="border-bottom:1px dotted #ccc">
   <p><?php echo $user_name ." ". $message->message; ?> </p>
    <div align="right">
     - <small><em><?php echo $message->created; ?></em></small>
    </div>
   </p>
  </li>


<?php endforeach; ?>