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

app.use('/assets', express.static(path.join(__dirname, '../assets')));

app.get('/', function(req, res) {
  res.render('index', {
    appTitle:       'CS313 - Web Engineering II',
    appDescription: 'Example Heroku applications and practical Node.js & PHP examples.',
    appThemeColor:  '#22b222'
  });
});

app.listen(3000)//process.env.PORT);
