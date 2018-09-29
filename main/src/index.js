const express = require('express');
const exphbs  = require('express-handlebars');
const path    = require('path');

const app = express();

app.set('views', path.join(__dirname, '../templates/views'));
app.engine('html', exphbs({
  defaultLayout: 'default',
  extname:       '.html',
  layoutsDir:    path.join(__dirname, '../templates/layouts'),
  partialsDir:   path.join(__dirname, '../templates/partials')
}));
app.set('view engine', 'html');

app.get('/', function(req, res) {
  res.render('index');
});

app.listen(process.env.PORT);
