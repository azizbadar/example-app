import './bootstrap';


window.Echo.channel('option-channel')
    .listen('ExampleEvent', (e) => {
        console.log('Received event:', e.message);
    });
