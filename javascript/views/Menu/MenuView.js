define([
'jquery',
  'underscore',
  'backbone',
  'text!../../templates/menu/menuTemplate.html',
  'collections/menu/menuCollections',
'models/menu/menuModel'
 ],function($,_,Backbone,MenuTemplate,MenuCollection,MenuModel){

//homeTemplate = _.template( $("#home-content").html());


var MenuView = Backbone.View.extend({
 

  


  el: $("#content"),


  initialize : function(){

//this.collection = new MenuCollection([]); 
//that.collection.fetch({ success : onDataHandler, dataType: "jsonp" });
this.render();
  },

	render : function(){
    $('.menu li').removeClass('active');
   $("#menu").parent().addClass('active');
 

 var onDataHandler = function(collection) {
          console.log("COLLECTIONSSS"+JSON.stringify(menuCollection.models));
      }

      // var menu0 = new MenuModel(); 
       var menuCollection = new MenuCollection();

       menuCollection.fetch({ success : onDataHandler, dataType: "jsonp" });
//var data = {menu: menuCollection.models,_: _ };
      //console.log("Collection"+JSON.stringify(this.collection));
//console.log("DATA" + JSON.stringify(data));
    // var compiledTemplate = _.template( MenuTemplate, data );
      //$("#projects-list").html( compiledTemplate ); 
var onDataHandler = function(collection) {
          console.log("COLLECTIONSSS"+menuCollection.models);
      }

     this.$el.html(MenuTemplate);

}

});

 return MenuView;
});