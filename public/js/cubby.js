jQuery(function($) {

    $(function() {
        setTimeout(function() {

            $('.alert-notification').addClass('hide');
        }, 3000);
    });

    $('body').on('click', 'a[data-action="add-to-waiting-list"]', function() {

        var that = $(this);

        $.ajax({
            type: "POST",
            url: "/links/add-to-waiting-list",
            dataType: 'json',
            data: { id:  that.data('id')}
        })
        .success(function(response) {

            if(response.status == 'true') {
                
                if(that.children('span').css('color') == 'rgb(255, 165, 0)') {
                    that.children('span').css('color', 'gray');
                } else {
                    that.children('span').css('color', 'orange');
                }
            }
            
        });
    });

    $('input[data-action="get-link-title"]').bind('change', function() {

        $.ajax({
            type: "POST",
            url: "/links/get-site-title",
            dataType: 'json',
            data: { url:  $('#link_url').val()}
        })
        .success(function(response) {

            $('#link_title').val(response.title);
        });

    });

    $('input[data-action="seach-category"]').bind('keyup', function() {

        var search = $(this).val();

        $.ajax({
            type: "POST",
            url: "/categories/get-by-name",
            dataType: 'json',
            data: { search:  search}
        })
        .success(function(response) {

            $('#categories-list').html(response.html);
        });

    });

    $('input[data-action="seach-link"]').bind('keyup', function() {

        var search = $(this).val();
        var category_id = $(this).data('category');

        $.ajax({
            type: "POST",
            url: "/links/get-by-name",
            dataType: 'json',
            data: { search:  search, category_id: category_id}
        })
        .success(function(response) {

            $('#links-list').html(response.html);
        });

    });

});