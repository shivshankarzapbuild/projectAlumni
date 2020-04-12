<?= $this->element('header') ?>

<div class="row">


  <div class="col-sm-4" style="background-color: lavender">
   
  </div>
    <div class="col-sm-8" style="margin-top: 50px;">

        <div id="user_model_details">
            <div id="user_dialog">
                
            </div>
        </div>


    </div>
</div>

<script type="text/javascript">
    $('document').ready(function(){

    fetch_user();

    setInterval(function(){

        update_last_activity();
        fetch_user();
    },5000);
         
         function fetch_user(){

            $.ajax({

                url: '/users/messages/onlineusers',
                type : 'post',

                beforeSend: function(request) {
                    request.setRequestHeader('X-CSRF-Token' ,'<?php echo $this->request->getAttribute('csrfToken'); ?>');
                  },

                success: function(data){

                    $(".col-sm-4").html(data);
                }
            });
         }

         function update_last_activity(){

            $.ajax({

                url: 'lastactivity',
                beforeSend: function(request) {
                    request.setRequestHeader('X-CSRF-Token' ,'<?php echo $this->request->getAttribute('csrfToken'); ?>');
                  },
                success: function(data){

                   
                }
            });
         }
         function make_chat_dialog_box(to_user_id, to_user_name)
             {
              var modal_content = '<div id="user_dialog'+to_user_id+'" class="user_dialog" title="You have chat with '+to_user_name+'">';
              modal_content += '<div style="height:400px; border:1px solid #ccc; overflow-y: scroll; margin-bottom:24px; padding:16px;" class="chat_history" data-touserid="'+to_user_id+'" id="chat_history_'+to_user_id+'">';
              // modal_content += fetch_user_chat_history(to_user_id);
              modal_content += '</div>';
              modal_content += '<div class="form-group">';
              modal_content += '<textarea name="chat_message_'+to_user_id+'" id="chat_message_'+to_user_id+'" class="form-control"></textarea>';
              modal_content += '</div><div class="form-group" align="right">';
              modal_content+= '<button type="button" name="send_chat" id="'+to_user_id+'" class="btn btn-info send_chat">Send</button></div></div>';
              $('#user_model_details').html(modal_content);
             }

             $(document).on('click', '#start_chat', function(){
              var to_user_id = $(this).data('id');
              var to_user_name = $(this).data('first_name');
              make_chat_dialog_box(to_user_id, to_user_name);

              $("#user_dialog").dialog({
               autoOpen:false,
               width:400
              });
              
              $('#user_dialog').dialog('open');
             });
    });
</script>