$('img[navbar_picture]').addClass('navbar_picture').click(function(){
    var src = $(this).attr('src');
    $('<div>').css({
        background: 'RGBA(0,0,0,.5) url('+src+') no-repeat center',
        backgroundSize: 'contain',
        width:'100%', height:'100%',
        position:'fixed',
        zIndex:'10000',
        top:'0', left:'0',
        cursor: 'zoom-out'
    }).click(function(){
        $(this).remove();
    }).appendTo('body');
});

$(document).on("click", ".overlay-add-user", function(event){ //(1)
event.preventDefault();
$('.contentWrapAddUsers').load($(this).attr("href")); //(2)
$('#dialogModalAddUsers').modal('show'); //(3)
});

csrf_token = $("input[name='_csrfToken']").val();
// *-*-*-*-*-*-*-*-*-*-*-*-
// Validation de la modal d'ajout de nouveau user
// *-*-*-*-*-*-*-*-*-*-*-*-
$(document).on('click','#SubmitUserNew', function(e){
var formSerialize = $('#formUserAdd').serialize();

$.ajax({
beforeSend: function(xhr) {
xhr.setRequestHeader('X-CSRF-Token', csrf_token);
$('#SubmitUserNew').text('Saving...');
$('#SubmitUserNew').attr('disabled', true);
$(".error-message").remove();
$(".has-error").removeClass('has-error');
},
url: 'users/add/',
data: formSerialize,
type: "POST",
dataType: "JSON",
async: true,
success: function (a){
if (a.status === 'success'){
$('#SubmitUserNew').text('Submit');
$('#SubmitUserNew').attr('disabled', false);
$('#dialogModalAddUsers').modal('hide');
}
if (a.status === 'error'){
$('#SubmitUserNew').text('Submit');
$('#SubmitUserNew').attr('disabled', false);
$.each(a.data, function(model, errors) {
for (var fieldName in this) {
var element = $("[name='"+fieldName+"']");
$.each(this[fieldName], function(label, text){
text_error = text ;
});
var create = $(document.createElement('span')).insertAfter(element);
create.addClass('error-message help-block').text(text_error);
create.parent().addClass('has-error');
}
});
}
}
});
});