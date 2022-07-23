$(document).ready(function() {

    $('#work').on('click', (_) => {
        $('.all-task-row').addClass('display-none')
        $('.work-task-row').removeClass('display-none')
        $('.complete-task-row').addClass('display-none')
    })
    $('#all').on('click', (_) => {
        $('.all-task-row').removeClass('display-none')
        $('.work-task-row').addClass('display-none')
        $('.complete-task-row').addClass('display-none')
    })
    $('#complete').on('click', (_) => {
        $('.all-task-row').addClass('display-none')
        $('.work-task-row').addClass('display-none')
        $('.complete-task-row').removeClass('display-none')
    })

})
