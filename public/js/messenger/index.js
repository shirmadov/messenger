const fs = require('fs');
const https = require('https');
const WebSocket = require('ws');

const wss = new WebSocket.Server({port:8000}, ()=>{
    console.log('Connected');
});

// const clients = new Set();
// CLIENTS = [];

wss.on('connection', function connection(ws) {
    ws.on('message', function message(data) {

        const all_data = JSON.parse(data);
        // console.log(all_data);

        if(all_data.data_type === 1){
            ws.id = all_data.hash_token;
        }else if(all_data.data_type === 2){

            if(all_data.hash_tokens){

                wss.clients.forEach(function each(client){
                    console.log('Clients',client.id)
                    if(all_data.hash_tokens.includes(client.id))
                    {
                        console.log('Clients',client.id)
                        client.send(JSON.stringify(all_data));
                    }
                });

            }




        }
        // console.log(clients)



    });

    // ws.send('something');
});
