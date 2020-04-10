$('document').ready(function(){
         $('#search').keyup(function(){
            var searchkey = $(this).val();
            searchmessages( searchkey );
         });

        function searchmessages( keyword ){
            var data = keyword;
        $.ajax({
                    method: 'get',
                    url : '/users/messages/view',
                    data: {keyword:data},

                    success: function( response )
                    {       
                       $('.table-content').html(response);
                    }
                });
        };
    });