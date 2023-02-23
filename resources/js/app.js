require('./bootstrap');
//require('bootstrap3/dist/js/bootstrap.js');
require('jquery/dist/jquery.js');
require('bootstrap/dist/js/bootstrap.js');
require('bootstrap-star-rating/js/star-rating.js');
require('leaflet/dist/leaflet.js');

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();
require('./calendar'); 

