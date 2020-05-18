require('./bootstrap');

$('form').on('submit', function(){
    $(this).find('input[type=submit]').attr('disabled', true);
});

Echo.channel('emails-name')
    .listen('MessageWasReceived', (data) => {
       alert('llegamos');
        console.log(data);
    });


