$(document).ready(function(){

    $('button[id=set_reservation]').on('click', function(e){
        e.preventDefault();
        let csrf_token = $('input[name=csrf_token]').val();
        $.ajax({
            url: $('input[name=reservation_url]').val(),
            method: 'post',
            data: reservation_data,
            header: { '_csrf': csrf_token },
            cache: false,
            dataType: 'json',
            success:function(data, status){
                if(data.status === 'success' ){
                    $('#' + data.status ).html(data.msg).slideDown(200);
                }else if(data.status === 'danger'){
                    $('#' + data.status ).html(data.msg).slideDown(200);
                }
            },
            abort: function(data, status){
                $('#danger').html("During reserving your reservation, an error acquired please, contact with our Customer service numbers.");
            }
        });
    });

});
