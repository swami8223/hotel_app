define([
'jquery',
  'underscore',
  'backbone',
  'text!../../templates/menu/menuTemplate.html'
 ],function($,_,Backbone,MenuTemplate){

//homeTemplate = _.template( $("#home-content").html());

var MenuView = Backbone.View.extend({
  el: $("#content"),
	render : function(){
    $('.menu li').removeClass('active');
   $("#menu").parent().addClass('active');
 //alert("hi")
     // 
      //$('.menu li a[href="#"]').parent().addClass('active');

		//alert("In render PDp"+this.$el.html());
     // $('.menu li').removeClass('active');
     // $('.menu li a[href="#"]').parent().addClass('active');
     this.$el.html(MenuTemplate);

}

});

 return MenuView;
});