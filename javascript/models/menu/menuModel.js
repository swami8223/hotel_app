define([
  'underscore',
  'backbone',
], function(_, Backbone) {
  
  var MenuModel = Backbone.Model.extend({
 //this.render();
  	defaults : {
  		medalHex : '#A67D3D',
  		picWidth : '100px',
  		githubPath : 'concat github and login'
  	}




 });

  return MenuModel;

});
