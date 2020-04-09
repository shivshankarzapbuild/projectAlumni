<?php 
    echo $this->Form->create($messages,array('id'=>'testform'));
    echo $this->Form->input('Something');
    echo $this->Form->submit();
    echo $this->Form->end();
?>


<script type="text/javascript">
	
	 $('#testform').submit(function(event) {
        $.ajax({
            type: 'POST',
            url: "/users/messages/view",
            headers : {
			      'X-CSRF-Token': $('[name="_csrfToken"]').val()
			   },
            data: $('#testform').serialize(),
            success: function(data){ 
                alert('this worked');
            },
            error:function() {
                alert('This not worked');
            }
        });

        event.preventDefault(); // Stops form being submitted in traditional way
    }); 
</script>