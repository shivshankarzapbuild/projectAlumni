<?= $this->element('header') ?>


  <div class="row">

              <div class="col-md-3" style="background-color: lavender;height: 500px;">

                
                <div class="online_users" style="margin-top:50px;">
                  <h1>Online Users</h1>
                  <div class="users">
                    
                  </div>
                </div>
                
              </div>

              <div class="col-md-9" style="background-color: lavenderblush;height: 500px;">  

                    <div id="profile" style="margin-top: 50px;">

                          <button class="start_chat" >submit </button>

                          <div id="user_details"></div>
                          <div id="user_model_details"></div>
                    </div>

              </div>
  </div>

<script type="text/javascript">
  function openPrompt(){

        $.ajax({

            method:"POST",
            url : "<?php $this->Url->build(['controller' => 'Messages', 'action' =>'view']) ?>",
            beforeSend: function (xhr) { // Add this line
        xhr.setRequestHeader('X-CSRF-Token', $('[name="_csrfToken"]').val());
    },

            success:function(data){
                $("#user_details").html(data);
            }
        }) 
  
    
}

</script>