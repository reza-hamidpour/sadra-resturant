jQuery(document).ready(function(){
    jQuery(document).on('click',"#add-new-img", function(e){
        e.preventDefault();
        var new_pic = jQuery('.img-gallery[data-img=temp-img]').clone(true);
        new_pic.appendTo("#wrapper-img-gallery");
        // $("#wrapper-img-gallery").appendChild(new_pic);
        new_pic.slideDown().removeAttr("data-img");

        var pre = 0;
        // Reparing data-preview and data-groupname values
        jQuery("a[data-preview][data-groupname=gallery-btn]").each(function(){
            $(this).attr("data-preview", "img-preview-" + pre);
            $(this).attr("data-input", "img-input-" + pre);
            $(this).attr("id", "img-" + pre);
            $(document).on('click', function (target) {
                ("a[data-groupname=gallery-btn][data-preview]").filemanager('image');
            });
            pre += 1;
        });
        pre = 0;
        // Reindexing div tag's ids
        jQuery("div.img-gallery").each(function(){
            jQuery(this).attr("id", "img-gallery-" + pre);
            jQuery(this).find("i.fa-trash").attr("data-remove", "img-gallery-" + pre);
            pre += 1;
        });
        pre = 0;
        // ReIndexing .gallery-imgs-previewr ids -> preview the image
        jQuery('.gallery-imgs-previewer[data-groupname=gallery-preview]').each(function(){
            jQuery(this).attr('id', 'img-preview-' + pre);
            pre += 1;
        });
        pre = 0;
        // ReIndexing inputs name and id -> input
        jQuery('.input-gallery-imgs').each(function(){
            jQuery(this).attr('id', 'img-input-' + pre);
            jQuery(this).attr('name', 'gallery_imgs[' + pre + ']');
            pre += 1;
        });

        $(document).on('click', 'a[data-groupname=gallery-btn][data-preview]' , function(e){
            // localStorage.setItem('target_input', $(this).data('input'));
            // localStorage.setItem('target_preview', $(this).data('preview'));
            var target_input = $('#' + $(this).data('input'));
            var target_preview = $('#' + $(this).data('preview'));
            window.open('/laravel-filemanager?type=image' , 'FileManager', 'width=900,height=600');
            window.SetUrl = function (items) {
                var file_path = items.map(function (item) {
                    return item.url;
                }).join(',');

                target_input.val('').val(file_path).trigger('change');
                // clear previous preview
                target_preview.html('');

                // set or change the preview image src
                items.forEach(function (item) {
                    target_preview.append(
                        $('<img>').css({ width: 100, height: 100 }).attr('src', item.thumb_url)
                    );
                });

                // trigger change event
                target_preview.trigger('change');

            }
        });

    });
    jQuery("i.fa-trash").on("click", function(e){
        let remove_item = jQuery(this).attr("data-remove");
        jQuery("#" + remove_item ).remove();
    });




});


