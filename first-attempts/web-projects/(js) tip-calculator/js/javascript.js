
function calculateTip() {

    var billCost = this.document.getElementById("bill-cost").value;
    var serviceQuality = this.document.getElementById("serviceQuality").value;
    var numberPeople = this.document.getElementById("number-people").value;

    if ( billCost === 0 || billCost === "" ) {

        return this.window.alert("Please enter the cost of your bill.");
    }

    if ( serviceQuality == 0 ) {
        return this.window.alert("Please select the quality of the service");
    }

    if (numberPeople <= 1 || numberPeople === "" ) {
        numberPeople = 1;
        this.document.getElementById("each").style.display = "none";
    } else {
        this.document.getElementById("each").style.display = "block";
    }

    // calculate the tip
    var tipAmount = (billCost * serviceQuality) / numberPeople;
    tipAmount = Math.round(tipAmount * 100) / 100;
    tipAmount = tipAmount.toFixed(2);

    // display the tip
    this.document.getElementById("tip").innerHTML = tipAmount;
    this.document.getElementById("totalTip").style.display = "block";

this.window.alert(tipAmount + " - " + this.document.getElementById("totalTip").style.display);
    
    
}



// on page load do:
// hide tip amount
//this.document.getElementById("totalTip").style.display = "none";
//this.document.getElementById("each").style.display = "none";
// set on-click action
this.document.getElementById("calculate").onclick = function() { calculateTip(); };
