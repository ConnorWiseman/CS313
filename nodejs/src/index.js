const http = require('http');

const app = http.createServer(function(req, res) {
  res.end('Hello, world!');
});

app.listen(process.env.PORT);
