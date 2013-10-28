// Filename: app.js
define([
  'jquery', 
  'jquery_mobilemenu',
  'responsive_slide',
  'custom',
  'underscore', 
  'backbone',
  'router', // Request router.js
], function($,jquery_mobilemenu,responsive_slide,custom,_, Backbone, Router){
  var initialize = function(){
    // Pass in our Router module and call it's initialize function
    Router.initialize();
  };

  return { 
    initialize: initialize
  };
});
