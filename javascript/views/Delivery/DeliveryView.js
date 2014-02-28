define([
'jquery',
  'underscore',
  'backbone',
  'text!../../templates/delivery/deliveryTemplate.html'
 ],function($,_,Backbone,Deliverytemplate){

//homeTemplate = _.template( $("#home-content").html());

var FeedBackiew = Backbone.View.extend({
  el: $("#content"),
	render : function(){

    $('.menu li').removeClass('active');
      $("#menu").parent().addClass('active');
     this.$el.html(Deliverytemplate);

}

});

 return FeedBackiew;
});