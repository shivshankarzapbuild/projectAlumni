$(document).ready(function(e){

    console.log("ready function");

});


function openPrompt()
{

    console.log("Inside the open prompt");
    var cancelled = true;
    
  var logo = prompt('Please enter a value:', function(value)
    {

        $.ajax({
            type:"POST",
            data:{value_to_send:value}, 
            url:"/users/chats/chat/",
            success : function(data) {
               alert(data);// will alert "ok"

            },
            error : function() {
               alert("false");
            }
        });


        }, function()
       {

        });
};
function fetch_users(argument){
    
}
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

 $(document).on('click', '.start_chat', function(){
          var to_user_id = 'username';
          var to_user_name = 'anotherName';
          make_chat_dialog_box(to_user_id, to_user_name);
                  $("#user_dialog_"+to_user_id).dialog({
                   autoOpen:false,
                   width:300
                  });
                  $('#user_dialog_'+to_user_id).dialog('open');
 });


 

