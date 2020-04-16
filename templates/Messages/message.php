<?= $this->element('header') ?>

<div class="row">


  <div class="col-sm-4" style="background-color: lavender">
   
  </div>
    <div class="col-sm-8" style="margin-top: 50px;">

        <div id="user_model_details">
            
        </div>


    </div>
</div>

<script type="text/javascript">
    $('document').ready(function(){

    fetch_user();

    setInterval(function(){

        
        fetch_user();
        update_user_chat_history();

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

    
         function make_chat_dialog_box(to_user_id, to_user_name)
             {
              var modal_content = '<div id="user_dialog_'+to_user_id+'" class="user_dialog" title="You have chat with '+to_user_name+'">';
              modal_content += '<div style="height:400px; border:1px solid #ccc; overflow-y: scroll; margin-bottom:24px; padding:16px;" class="chat_history" data-touserid="'+to_user_id+'" id="chat_history_'+to_user_id+'">';
              modal_content += fetch_user_chat_history(to_user_id);
              modal_content += '</div>';
              modal_content += '<div class="form-group">';
              modal_content += '<textarea name="chat_message_'+to_user_id+'" id="chat_message_'+to_user_id+'" class="form-control"></textarea>';
              modal_content += '</div><div class="form-group" align="right">';
              modal_content+= '<button type="button" name="send_chat" id="'+to_user_id+'" class="btn btn-info send_chat">Send</button></div></div>';
              $('#user_model_details').html(modal_content);
             }

             $(document).on('click', '#start_chat', function(){

              var to_user_id = $(this).data('touserid');
              var to_user_name = $(this).data('tousername');

              make_chat_dialog_box(to_user_id, to_user_name);

                  $("#user_dialog_"+to_user_id).dialog({
                   autoOpen:false,
                   width:400,
                   height:600
                  });
                      $('#user_dialog_'+to_user_id).dialog('open');

            });

             $(document).on('click','.send_chat',function(){

                var touserid = $(this).attr('id');
                var chatmessage = $('#chat_message_'+touserid).val();
                
                    $.ajax({

                        url:'/users/messages/insert',
                        method:'post',
                        data:{ touserid : touserid , chatmessage : chatmessage},
                        beforeSend: function(request) {
                    request.setRequestHeader('X-CSRF-Token' ,'<?php echo $this->request->getAttribute('csrfToken'); ?>');
                  },

                        success: function(data){

                            $(".chat_history").html(data);
                            $('#chat_message_'+touserid).val("");
                        }
        

                    });
                });

             function fetch_user_chat_history(to_user_id){

                $.ajax({

                        url:'/users/messages/fetchhistory',
                        method:'post',
                        data:{ touserid : to_user_id },
                        beforeSend: function(request) {
                    request.setRequestHeader('X-CSRF-Token' ,'<?php echo $this->request->getAttribute('csrfToken'); ?>');
                  },

                        success: function(data){

                            $("#chat_history_"+to_user_id).html(data);
                           ;
                        }
        

                    });
             }

             function update_user_chat_history(){

                $('.chat_history').each(function(){

                  var to_user_id = $(this).data('touserid');

                  fetch_user_chat_history(to_user_id);
                

                });
             }

    });
</script>

