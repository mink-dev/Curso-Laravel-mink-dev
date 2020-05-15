require('./bootstrap');

$('form').on('submit', function(){
    $(this).find('input[type=submit]').attr('disabled', true);
})

Echo.channel()
    .listen('MessageWasReceived', (data) => {
        console.log(data);
    })


