$(document).ready(function(){

    $('button[id=set_reservation]').on('click', function(e){
        e.preventDefault();
        reservation_data = {
            name: $('input[name=name]').val(),
            phone_number: $('input[name=phone_number]').val(),
            reservation_date: $('input[name=reservation_date]').val(),
            reservation_from: $('select[name=reservation_from]').val(),
            reservation_to: $('select[name=reservation_to]').val(),
            desk_information: $('input[name=desk_information]').val(),
            party_size: $('select[name=party_size]').val(),
            comment: $('textarea[name=comment]').val(),
        }
        let csrf_token = $('input[name=csrf_token]').val();
        $.ajax({
            url: $('input[name=reservation_url]').val(),
            data: reservation_data,
            header: { '_csrf': csrf_token },
            method: 'post',
            cache: false,
            dataType: 'json',
            success:function(data, status){
                $('#danger, #success').slideUp(200);
                if(data.status === 'success' ){
                    $('#' + data.status ).html(data.msg).slideDown(200);
                }else if(data.status === 'danger'){
                    $('#' + data.status ).html(data.msg).slideDown(200);
                }
            },
            abort: function(data, status){
                $('#danger, #success').slideUp(200);
                $('#danger').html("During booking your reservation, an error acquired please, contact with our Customer service numbers.");
            },
            error: function(data, status){
                $('#danger').html("During booking your reservation, an error acquired please, contact with our Customer service numbers.");
            }
        });
    });

    $('button[data-deskid]').click(function(e){
        e.preventDefault();
        $('button[data-deskid]').removeClass('active-option');
        $(this).addClass('active-option');
        $('input[name=desk_information]').val($(this).attr('data-deskid'));
        let limitation = $(this).attr('data-desksize');
        let start = 0;
        let new_options = "<option value='null'>Party Size</option>";
        for(let i = 1; i<= limitation; i++){
            new_options += "<option value='" + i  + "'>" + i + "</option>";
        }
        $("select[id=party_size]").html(new_options);
    });
});
