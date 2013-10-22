

var Menu_page= {
		 
	    onReady: function() {
	        //$( "#magic" ).click( PI.candyMtn );
	        //$( "#happiness" ).load( PI.url + " #unicorns", PI.unicornCb );
	    	Menu_page.menu_init();
	    	
	    },
	 
	    menu_init: function( event ) {
	    	jQuery.ajax({
	    		  url: "http://localhost:8888/MAMP/hotel_app/PHP/web_service/categories_webservice.php",
	    		  context: document.body
	    		}).done(function() {
	    		// alert("done");
	    		});
	    },
	 
	   
	 
	};