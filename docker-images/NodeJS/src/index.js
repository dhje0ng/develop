const express = require('express')

const app = express();

app.get('/', (req, res) => {
    res.send("Hello node-web")
});

app.listen(8000, function(){
    console.log("start nodejs-web")
});