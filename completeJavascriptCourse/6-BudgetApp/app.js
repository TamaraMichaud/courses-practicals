function getElement(elementId){
    
    return document.getElementById(elementId);
}

function queryElement(elementIdentifier) {
    return document.querySelector(elementIdentifier);
}

// --- UI Controller --- //
var UIController = (function(){
    
    var elementIds = {
        monthId: 'budgetMonth',
        descId: 'desc',
        amountId: 'amount',
        incexpId: 'add-type',
        income: {
            budgetIncomeAmount: '.budget__income--value',
            budgetIncomePerc: '.budget__income--percentage'
        },
        expense:{
            budgetExpensesAmount: '.budget__expenses--value',
            budgetExpensesPerc: '.budget__expenses--percentage'
        },
        budgetTotalAmount: '.budget__value',
        addButton: 'add-btn'
    }
    

    return {
        // get input values
        getValues: function(){
              return {
                  incexp: getElement(elementIds.incexpId).value, 
                  desc: getElement(elementIds.descId).value, 
                  amount: getElement(elementIds.amountId).value
              }
        },
        //   update title "month" value
        updateTitle: function(){
            getElement(elementIds.monthId).innerHTML = "SOMEMONTH";
        },
        //        add new item to ui bottom block
        refreshBudgetInfos: function(budgetData){
            
//          if(budgetData.)  
            
            
//            queryElement(elementIds.budgetxx);
        },
        getElementIds: function(){
            return elementIds;
        }
    } 
    
})();


// --- Data Controller --- //
var budgetController = (function(){

    var BudgetItemObject = function(id, desc, value, type) {
        this.id = id; 
        this.desc = desc;
        this.value = value;
        this.type = type;
    }
    
    var data = {
             listItems: {
                     inc: [],
                     exp: []            
                 },
             totals: {
                     inc: 0,
                     exp: 0
                 }
        }
     
     
   return {
       //        recalculate budget
       //        add new item to data structure

       updateData: function(newItem){
           
           var nextId = data.listItems.exp.length + data.listItems.inc.length;
           var nextItem = new BudgetItemObject(nextId, newItem.desc, newItem.amount, newItem.incexp)
           
           console.log(nextItem);
                      
           if(nextItem.type === "inc") {
               //add amount to totalIncome and budgetValue
               data.totals.inc += amount;
               data.listItems.inc.push(nextItem);
           } else {
               //remove amount from totalExpenses and budgetValue
               data.totals.exp -= amount;
               data.listItems[nextItem.type].push(nextItem);   // can reference the type dynamically as so
           }
           
           return data;
       }
   } 
    
})();


// --- Main Page Controller --- //
var controller = (function(budgetCtrl, UICtrl){

    // -- update title -- //
    UICtrl.updateTitle();

    // -- add event handler -- //   
    var setupEventListeners = function(){

        var uiElements = UICtrl.getElementIds();

        // submit new entry via keyboard:
        document.addEventListener('keypress', function(event){
            // limit the actions to only for RETURN
            if(event.keyCode === 13 || event.which === 13){
                console.log("hit the return key");
                ctrlAddItem();
            }
        });

        // submit new entry via mouse-click:
        document.getElementById(uiElements.addButton).addEventListener('click', ctrlAddItem);       
    };
    
 
    // action function
    var ctrlAddItem = function(){
        
        //ui:get input values
        var nextItem = UICtrl.getValues();
        console.log("Entered: desc = " + nextItem.desc + ", $" + nextItem.amount + ", as " + nextItem.incexp);
        //data:add ^^ to list
        //data:recalculate budget
        var newBudgetData = budgetCtrl.updateData(nextItem);
        
        //ui:refresh list
        //ui:refresh budget
        UICtrl.refreshBudgetInfos(newBudgetData);
    }
    
    
 

    // -- -- //
    
    
    
    
    // -- -- //   
    return {
        init: function(){
            console.log('Starting Up');
            setupEventListeners();
        }
    }
        
})(budgetController, UIController);
// ^^ dont need to pass these as arguments since we have access to them. 
// however, doing it this way maintains some separation, if we want to change 
// which other modules are included, we can just change the parameter provided
// here

controller.init();
