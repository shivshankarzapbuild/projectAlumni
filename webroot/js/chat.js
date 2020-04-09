$(document).ready(function(e){



});





        $('#testform').submit(function(event) {
        $.ajax({
            type: 'POST',
            url: "/users/messages/",
            data: $('#testform').serialize(),
            success: function(data){ 
                alert('Wow this actually worked');
            },
            error:function() {
                alert('This will never work');
            }
        });
        event.preventDefault(); // Stops form being submitted in traditional way
    }); 
  
    


$(document).on('click','')

function make_chat_dialog_box(to_user_id, to_user_name)
 {
  var modal_content = '<div id="user_dialog_'+to_user_id+'" class="user_dialog" title="You have chat with '+to_user_name+'">';
  modal_content += '<div style="height:400px; border:1px solid #ccc; overflow-y: scroll; margin-bottom:24px; padding:16px;" class="chat_history" data-touserid="'+to_user_id+'" id="chat_history_'+to_user_id+'">';
  modal_content += '</div>';
  modal_content += '<div class="form-group">';
  modal_content += '<textarea name="chat_message_'+to_user_id+'" id="chat_message_'+to_user_id+'" class="form-control"></textarea>';
  modal_content += '</div><div class="form-group" align="right">';
  modal_content+= '<button type="button" name="send_chat" id="'+to_user_id+'" class="btn btn-info send_chat">Send</button></div></div>';
  $('#user_model_details').html(modal_content);
 }

 $(document).on('submit', '#ajaxForm', function(){
          
          openPrompt();
 });


 


