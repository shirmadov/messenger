const fs = require('fs');
const https = require('https');
const config = require(__dirname+"/socket_config.json");
const WebSocket = require('ws');

// const wss = new WebSocket.Server({port:8000}, ()=>{
//     console.log('Connected');
// });

const server = https.createServer({
    cert: fs.readFileSync(config.crt),
    key: fs.readFileSync(config.key)
});

const wss = new WebSocket.Server({ server });

// const clients = new Set();
// CLIENTS = [];

wss.on('connection', function connection(ws) {
    ws.on('message', function message(data) {

        const all_data = JSON.parse(data);

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

server.listen(8080);
