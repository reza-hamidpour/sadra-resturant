jQuery(document).ready(function(){
    jQuery(document).on('click',"#add_new_option", function(e) {
        e.preventDefault(); // Prevent default behaviour of buttons
        // Copy our element and appending to its parent.
        var new_pic = $('.foods-options[data-option=temp-option]').clone(true);
        new_pic.appendTo("#wrapper-options");
        new_pic.slideDown();

        var pre = 0;
        $('div.data-option').each(function () {
            $(this).attr('data-option', 'option-' + pre);
            pre += 1;
        })
        // Reparing options title
        jQuery('input[type=text][data-option=option_title]').each(function () {
            $(this).attr('name', 'option_title[' + pre + ']');
            $(this).attr('id', 'option_title-' + pre);
            $(this).attr('data-groupname', 'option_' + pre);
            pre += 1;
        });
        pre = 0;
        $("button.add_option_options").each(function(){
            $(this).attr('data-target', 'option-' + pre);
            $(this).attr('data-groupname', 'option_' + pre);
            pre += 1;
        })
        pre = 0;
        // Reparing options options parent fields
        $('div[data-optionparent]').each(function(){
           $(this).attr('data-optionparent', 'option-' + pre);
            let childNumber = 0;
            $(this).find('input[data-optiontype=value]').each(function(){
                $(this).attr('name', 'option_value[' + pre + "][" + childNumber + "]");
                $(this).attr('data-optionoption', 'option_' + pre);
                childNumber += 1;
            });
            childNumber = 0;
            $(this).find('input[data-optiontype=price]').each(function(){
                $(this).attr('name', 'option_price[' + pre + "][" + childNumber + "]");
                $(this).attr('data-optionoption', 'option_' + pre);
                childNumber += 1;
            });
           pre += 1;
        });
        pre = 0;
        $('button[data-groupname]').each(function () {
            $(this).attr('id', 'add_option_options');
            $(this).href = 'option_options' + pre;
            $(this).attr('data-groupname', 'option_' + pre);
            $(this).find('i[data-optionname]').attr('data-optionname', 'option_' + pre);
            pre += 1;
        }).on('click', function(e){
            e.preventDefault();
            let new_row = $('div[data-optionparent=' + $(this).attr("data-groupname") + ']').find('row').clone(true);
            new_row.appendTo('div[data-optionparent='+ $(this).attr('data-groupname') +']');
            ['name', 'value', 'price'].forEach(repairChildrenOptions.bind($(this).attr('data-groupname').slice('_')[1]));
        });

        function repairChildrenOptions(optionParent_id, type_ ){
            var pre = 0;
            $('div[data-optionparent=option_' + optionParent_id + '] > input[data-optiontype= ' + type_ + ']').each(function(){
                $(this).attr('name', 'option_' + type_ + '_' + optionParent_id + '[' + pre + ']');
                $(this).attr('data-optionoption', 'option_' + optionParent_id );
            });
        }
        jQuery(document).on('click', 'button.add_option_options', function(e){
            e.preventDefault();
            let target = $(this).attr('data-target');
            let new_row = $('div.option_options[data-optionparent=temp-option] div.row:first-child').clone(true);
            $('div.option_options[data-optionparent=' + target + ']').append(new_row);
            new_row.appendTo('#wrapper-options');
            new_row.slideDown(200);
        });
    });

});


