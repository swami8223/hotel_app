define([
'jquery',
  'underscore',
  'backbone',
  'text!../../templates/aboutUs/aboutusTemplate.html'
 ],function($,_,Backbone,AboutUsTemplate){

//homeTemplate = _.template( $("#home-content").html());

var HomeView = Backbone.View.extend({
  el: $("#content"),
	render : function(){
    $('.menu li').removeClass('active');
    $("#about-us").parent().addClass('active');
 //alert("hi")
     // 
      //$('.menu li a[href="#"]').parent().addClass('active');

		//alert("In render PDp"+this.$el.html());
     // $('.menu li').removeClass('active');
     // $('.menu li a[href="#"]').parent().addClass('active');
     this.$el.html(AboutUsTemplate);

}

});

 return HomeView;
});