$(document).ready(function(){

    let form = '#task-change-form';

    $(form).on('click', (event) => {

        let url = $(form).attr('data-action');
        console.log('url', url)

        $.ajax({
            url: url,
            method: 'POST',
            data: new FormData($('#task-change-form').get(0)),
            dataType: 'JSON',
            contentType: false,
            cache: false,
            processData: false,
            success: (response) =>
            {
                // $(form).trigger("reset");
                // location.reload()
                console.log(response.success)
            },
            error: (err) => {
                console.log(err)
            }
        });
    });

});
