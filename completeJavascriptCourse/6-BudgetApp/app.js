function getElement(elementId){
    
    return document.getElementById(elementId);
}

var UIController = (function(){
    
    //   update title "month" value
    var monthEl = getElement('budgetMonth');

    //        get input values
    var descEl = getElement('desc');
    var amountEl = getElement('amount');
    var incexpEl = getElement('add-type');
    
    //        add new item to ui bottom block
    
    
    //        update ui top block
    var budgetIncEl = document.querySelector('.budget__income--value');
    var budgetIncPercEl = document.querySelector('.budget__income--percentage');
    var budgetExpEl = document.getElementById('.budget__expenses--value');
    var budgetExpEl = document.getElementById('.budget__expenses--value');
    var budgetTotal = document.getElementById('.budget__value');
    
    
    
    return {
        getValues: function(){
              return {
                  incexp: incexpEl.value, 
                  desc: descEl.value,
                  amount: amountEl.value 
              };
              
              
        }
    }
    
    
})();



var budgetController = (function(){
//        recalculate budget
//        add new item to data structure
 
    
})();


var controller = (function(budgetCtrl, UICtrl){

    // add event handler
    document.getElementById('add-btn').addEventListener('click', function(){
        
        //ui:get input values
        var nextItem = UICtrl.getValues();
        console.log("Entered: desc = " + nextItem.desc + ", $" + nextItem.amount + ", as " + nextItem.incexp);
        //data:add ^^ to list
        //data:recalculate budget
        //ui:refrest list
        //ui:refrest budget
    })

    
    
})(budgetController, UIController);
// ^^ dont need to pass these as arguments since we have access to them. 
// however, doing it this way maintains some separation, if we want to change 
// which other modules are included, we can just change the parameter provided
// here

>>>>>>> 3963f48576755770cfc8736b3fce52661ab0cf4e:completeJavascriptCourse/6-BudgetApp/app.js
