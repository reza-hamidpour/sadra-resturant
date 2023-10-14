$(document).ready(function(){
    // *** update options which are selected by user ****/
    $('button[data-optionid]').on('click', function(e){
       $("input[name='option-" + $(this).attr('data-optionid') + "']").attr('value', $(this).attr('data-optionvalue'));
    });
    // **** End update options which are selected by user ***/
    // *** Update food price base quantity ****//
    $('button.btn-number[data-type]').on('click', function(e){
        let food_id = $(this).attr('data-target');
        let add_to_cart_btn = $("button#add-to-cart-btn-" + food_id);
        add_to_cart_btn.find("span").html( add_to_cart_btn.attr('data-price') * $("input[name='" + $(this).attr('data-field') + "']").val());
    });
    //**** End update food price base quantity *****//
    // ******* Add food to cart *****/
    $("button.add-to-cart-btn").on('click', function(e){
        let food_id = $(this).attr('data-foodid');
        let age_check = false;
        if($('input[data-checkbox=age_check]#age_check_' + food_id).length > 0) {
            age_check = $('input[type=checkbox][data-checkbox=age_check]#age_check_' + food_id).val();
        }
        let food_options = [];
        let food_options_elements = $('input[data-option]');
        if(food_options_elements.length > 1){
            food_options_elements.each(function(){
                if($(this).val() !== "" ) {
                    food_options.push({
                        option_id: $(this).attr('data-option'),
                        option_option: $(this).val(),
                    });
                }
            });
        }

        let data_form = {
            food_id: food_id,
            food_price: $(this).attr('data-price'),
            food_option: food_options,
            allergic_comment: $('#' +food_id + '-textarea[type=text]').val(),
            age_check: age_check,
            quantity: $("input[name='quant[" + food_id + "]'").val(),
        }
        $.ajax({
            url: $('input[type=hidden][name=add_to_cart]').val(),
            data: data_form,
            header: {'_csrf': $('input[type=hidden][name=csrf_token]').val()},
            dataType: 'json',
            method: 'post',
            cache: false,
            success: function(data, status_code){
                console.log('success function.');
                console.log(data);
                console.log(status_code);
            },
            abort: function(data, status_code){
                console.log('abort function');
                console.log(data);
                console.log(status_code);
            }
        });
    });
    // ******* End add food to cart *******/

    //******* Load Carts and details *******/
    function load_cart(){
        $.ajax({
            url: $('input[type=hidden][name=get-cart-url]').val,
            method: 'get',
            cache: false,
            success: function(data, status_code){
                // need to write this section to load cart
            },
            abort: function(data, status_code){
                // need to handle errors.
                console.log('there is a issue during loading cart and its details, please contact your developer.');
            }
        });
    }
    //******** End Load Carts and details *******/

});
