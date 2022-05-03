const fs = require('fs');
const https = require('https');
const WebSocket = require('ws');

const wss = new WebSocket.Server({port:8000});

wss.on('connection', function connection(ws) {
    ws.on('message', function message(data) {

        const all_data = JSON.parse(data);

        console.log(all_data);

    });

    ws.send('something');
});
