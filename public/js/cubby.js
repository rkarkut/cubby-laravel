jQuery(function($) {

    $('a[data-action="add-to-waiting-list"]').bind('click', function() {

        console.log('add to waiting list');

        var that = $(this);

        $.ajax({
            type: "POST",
            url: "/links/add-to-waiting-list",
            dataType: 'json',
            data: { id:  that.data('id')}
        })
        .success(function(response) {

            if(response.status == 'true') {

                console.log('color', that.children('span').css('color'));
                
                if(that.children('span').css('color') == 'rgb(255, 165, 0)') {
                    console.log('set to gray');
                    that.children('span').css('color', 'gray');
                } else {
                    console.log('set to orange');
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

});