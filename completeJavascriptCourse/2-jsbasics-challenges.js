//challenge 1

var markMass, markHeight, johnMass, johnHeight;

markMass = 80;
markHeight = 1.90;
johnMass = 76;
johnHeight = 2.10;

markBmi = markMass / (markHeight * markHeight);
johnBmi = johnMass / (johnHeight * johnHeight);

console.log("Mark BMI: " + markBmi);
console.log("John BMI: " + johnBmi);
console.log("Is Mark's BMI higher than John's? " + markBmi > johnBmi)


// challenge 2

var teamJohn = [ 149, 120, 123 ];
var teamMark = [ 120, 149, 123 ];
var teamMary = [ 97, 134, 105 ];

var johnAve, markAve, maryAve;
johnAve = markAve = maryAve = 0;

var maxAve

for (var i = 0; i < teamJohn.length; i++){
	johnAve += teamJohn[i];
}
for (var i = 0; i < teamMark.length; i++){
	markAve += teamMark[i];
}
for (var i = 0; i < teamMary.length; i++){
	maryAve += teamMary[i];
}

if(johnAve > markAve && johnAve > maryAve ) {
	
	console.log("John is the winner!");
} else if (markAve > johnAve && markAve > maryAve ) {
	console.log("Mary is the winner!");
} else if (maryAve > johnAve && maryAve > markAve )  {
	console.log("Mary is the winner!");
} else {
	console.log("I don't beleive it... it's a tie!!");
}

console.log("John average: " + johnAve / 3);
console.log("Mark average: " + markAve / 3);
console.log("Mary average: " + maryAve / 3);


// challenge 3

var bills = [ 124, 48, 268 ];

function tipCalculator(billTotal){
	
	if(billTotal < 50 ) {
		console.log("tipping 20%");
		return billTotal * 0.2;
	} else if (billTotal > 200) {
		console.log("tipping 10%");
		return billTotal * 0.1;
	} else {
		console.log("tipping 15%");
		return billTotal * 0.15;
	}	
}

for (var i = 0; i < bills.length ; i++){
	
  var billTotal = bills[i];
	console.log("Bill Total: " + billTotal);
	var tipAmount = tipCalculator(billTotal);
	console.log("equals " + tipAmount);
	console.log(" --------------------- ");
	console.log("Bill final value = $" + (billTotal + tipAmount) );
}


// challenge 4

var mark = {
	mass: 80,
	height: 1.9,
	getBmi:function(){
		this.bmi = this.mass / (this.height * this.height);
//		return this.bmi;
	}
}


var john = {
	mass: 76,
	height: 2.1,
	getBmi:function(){
		this.bmi = this.mass / (this.height * this.height);
//		return this.bmi;
	}
}

mark.getBmi();
john.getBmi();
console.log("mark: " + mark.bmi);
console.log("john: " + john.bmi);



// challenge 5

var john = {
				billAmounts: [ 124, 48, 268, 180, 42 ],
				calcTip: function(amount){
						this.tipPerc = (amount < 50) ? 0.2 :
													(amount > 200 ) ? 0.1 : 0.15;
				}
}

var grandTotal = 0;
for (var i = 0 ; i < john.billAmounts.length ; i++) {
	var nextBill = john.billAmounts[i];
	john.calcTip(nextBill);
	var finalBill = (nextBill + 
								 (nextBill * john.tipPerc) );

	console.log("Bill amount $" + nextBill + 
					 " tips at " + john.tipPerc + "%, so totals " + finalBill );
	grandTotal += finalBill;
}

console.log("So with a grand total of $" + grandTotal + " spent over " + john.billAmounts.length + " bills, means an average dinner bill of $" + grandTotal / john.billAmounts.length);





