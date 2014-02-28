define([
  'jquery',
  'underscore',
  'backbone',

  'views/Home/HomeView',
  'views/Plp/PlpView',
  'views/Menu/MenuView',
  'views/AboutUS/AboutUsView',
  'views/FeedBack/FeedBackView',
  'views/ContactUS/ContactUsView',
  'views/Delivery/DeliveryView',
  'global',
],function($,_,Backbone,HomeView,PlpView,MenuView,AboutUs,FeedBack,ContactUs,Delivery){


var initialize =  function(){
	//alert("PdpView")
    
   var app_router = new AppRouter ();

    app_router.on("route:Home_page",function(){
    var homeview = new HomeView();
    homeview.render();
  

   });

  app_router.on("route:Menu_page",function(){

    var plpview = new PlpView();

    var menuview = new MenuView();

    //menuview.render();

   });
   app_router.on("route:About_us",function(){
    var aboutus = new AboutUs();
    aboutus.render();

   });
   app_router.on("route:Feed_back",function(){
    var feedback = new FeedBack();
    feedback.render();

   });  

   app_router.on("route:Contact_us",function(){
    var contactview = new ContactUs();
    contactview.render();

   });

   app_router.on("route:Delivery_page",function(){
    var deliveryview = new Delivery();
    deliveryview.render();
  

   });

    Backbone.history.start();

};

var AppRouter = Backbone.Router.extend({
    routes: {
      // Define some URL routes always before default
    'menu':'Menu_page',
    'aboutUs':"About_us",
    'feedBack':"Feed_back",
    'contactUs':'Contact_us',
    'delivery' : 'Delivery_page',
      // Default
      '*actions': 'Home_page',
      
    }
  });


 return { 
    initialize: initialize
  };
});


