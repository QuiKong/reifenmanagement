'use strict';

const http = require('http');

const express = require('express');

const app = express();
app.get('/', (req, res) => {
    const person = {
        firstname: 'Just A.',
        lastname: 'Test'
    };

    res.send(person);

});

const server = http.createServer(app);

server.listen(3000, () => {
    console.log('Server is listening on port 3000.');
});