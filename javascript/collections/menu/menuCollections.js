define([
  'jquery',
  'underscore',
  'backbone',
  'models/menu/menuModel'
], function($, _, Backbone, MenuModel){
  var MenuCollection = Backbone.Collection.extend({
   model: MenuModel,
    
 initialize : function(models, options) {},


   url : function() {

    //alert("inisde url");
        return 'http://localhost:8888/hotel_app/PHP/web_service/categories_webservice.php';
      },
    
 
    
      parse : function(data) {
        console.log(JSON.stringify(data));
          var uniqueArray = this.removeDuplicates(data);

          return uniqueArray;
      },
      
      removeDuplicates: function(myArray) {

       console.log("my array"+ myArray);

          //credit: http://newcodeandroll.blogspot.ca/2012/01/how-to-find-duplicates-in-array-in.html  
          // I was hoping underscore's _uniq would work here but it only seems to work for single values not objects               
          var length = myArray.length;
          var ArrayWithUniqueValues = [];
          
          var objectCounter = {};
          
          for (i = 0; i < length; i++) {
          
              var currentMemboerOfArrayKey = JSON.stringify(myArray[i]);
              var currentMemboerOfArrayValue = myArray[i];
            
              if (objectCounter[currentMemboerOfArrayKey] === undefined){
                  ArrayWithUniqueValues.push(currentMemboerOfArrayValue);
                 objectCounter[currentMemboerOfArrayKey] = 1;
              }else{
                 objectCounter[currentMemboerOfArrayKey]++;
              }
          }
      
          return ArrayWithUniqueValues;
      }        
     

  });
 
  return MenuCollection;
});
