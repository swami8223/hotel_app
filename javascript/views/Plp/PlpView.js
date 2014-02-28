define([
'jquery',
  'underscore',
  'backbone',
  'text!../../templates/menu/menuTemplate.html',
  'collections/menu/menuCollections',
'models/menu/menuModel'
 ],function($,_,Backbone,MenuTemplate,MenuCollection,MenuModel){

//homeTemplate = _.template( $("#home-content").html());

//console.log("MenuTemplate"+MenuTemplate)
var MenuView = Backbone.View.extend({
  el: $("#content"),
  

  initialize : function(){
      this.render();
      
  },




	render : function(){
    $('.menu li').removeClass('active');
   $("#menu").parent().addClass('active');
 

 var onDataHandler = function(collection,response) {
 // var data = collection.models;
  var menu_data = response;


      var compiledTemplate = _.template(MenuTemplate,{
          menu: menu_data
         });
     $("#content").html(compiledTemplate);

      }

      
  var menuCollection = new MenuCollection();
   menuCollection.fetch({ success : onDataHandler, dataType: "json" });
},


events: { 
    "click .item-div"  : "item_overlay",
    "click .main-menu a" : "main_menu_display",
    "click .cart-btn" : "add_to_cart",
    "click .add_to_main_cart" : "add_to_main_cart"
  },


// start is add_to_main_cart

add_to_main_cart: function(){
  
  var order_list = new Array() ; // this is order list which to be set as cookie


  $(".cart-list li").each(function (){

  var item_quantity = $(this).attr("qty");
  var item_id = $(this).attr("item_id");

  order_list.push(item_id+":"+item_quantity); 
 
 

  });
Global.setCookie("order_list",order_list,"30");

Backbone.history.navigate("//delivery")

},

// end is add_to_main_cart





//  start is add_to_cart

add_to_cart: function(e){
    
  var cart_element = e.target
  //console.log($(this).siblings('.item_name').class);

var item_id = $(cart_element).parent("li").attr("id");


 var item_price = $(cart_element).siblings(".item-price").attr('coast-hidden');
 var item_name = $(cart_element).siblings(".item-name").html()
 var item_qty =  $(cart_element).siblings(".qty-box").val(); 

 if(item_qty == ""){
item_qty = 1;

 }

 var total = item_qty * parseInt(item_price); 

$(".cart-list").append('<li qty = '+ item_qty +' item_id ='+ item_id.split("item-id")[1] +' class="cart-item-list"><div class="flt-lft item-name two_fifth">'+ item_name +'</div><div class="flt-lft item-price two_fifth">Rs '+25+'</div><div class="flt-lft item-number auto-width"> x '+item_qty+'= </div><div class="flt-lft item-total auto-width">'+total+'</div></li>')
$(".cart-wheel").slideDown("slow");
$("#total-amount").html(parseInt($("#total-amount").html())+ total)
$("#total-item").html(parseInt($("#total-item").html()) + parseInt(item_qty));
},

//  end is add_to_cart




// start is main_menu_display

  main_menu_display: function(e){
        var toDisplay = e.target.id
        var name = e.target.name;
$(".current").removeClass("current").slideUp("slow");
$("#"+toDisplay+"-container").addClass("current").removeClass("hide").slideDown("slow");

},

// end is main_menu_display


  item_overlay : function(e){
    event.preventDefault();
    return ;
  }

});

 return MenuView;
});