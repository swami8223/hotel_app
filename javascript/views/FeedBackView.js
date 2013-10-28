define([
'jquery',
  'underscore',
  'backbone',
  'text!../../templates/feedback/feedbackTemplate.html'
 ],function($,_,Backbone,FeedbackTemplate){

//homeTemplate = _.template( $("#home-content").html());

var FeedBackiew = Backbone.View.extend({
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
     this.$el.html(FeedbackTemplate);

}

});

 return FeedBackiew;
});