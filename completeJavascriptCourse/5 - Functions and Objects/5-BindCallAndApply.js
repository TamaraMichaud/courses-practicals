// functions - have certain methods same as any other object which can allow us to do special stuff


var john = {
    name: 'John',
    age: 26,
    job: 'Loser',
    presentation: function(style, timeOfDay) {
        
        var greeting = (style === 'formal') ? 
            'Good ' + timeOfDay + ' ladies and gentlemen,' : 
        timeOfDay + ' dude!';
        
        console.log(greeting + " I'm " + this.name);
    }
}


john.presentation('formal', 'morning');
john.presentation('friendly', 'evening');

// ------------------------------------------------------------- //
// CALL

var emily = {
    name: 'Emily',
    age: 21,
    job: 'Cool Kid'
}

// ^^ we want emily to be able to call "presentation" ... how can we do this?

john.presentation.call(emily, 'formal', 'afternoon');
// ^^ this is called method borrowing.
// we have borrowed "presentation()" from John, and then "call()" takes
// the object to apply the method against, and then the method arguments

// ^^ here we have now made "this" become Emily instead of John!

// ------------------------------------------------------------- //
// APPLY

// an alternative to ".call()", is ".apply()", which simply takes 2 arguments;
// the object on which the method is to be applied, and an array of all the other arguments.

var confusingResult = {
    name: 'Jolene',
    age: 23,
    job: 'thief'
}

john.presentation.apply(confusingResult, ['formal', 'afternoon']);
// ^^ this will NOT work however, we have not built the "presentation()" method
// to accept an array... although... run this lol - it works fine! :/


// ------------------------------------------------------------- //
// BIND

// this pulls a function from another object but does not call it.
// allows us to store the function somewhere.  and also with preset args!

var boundFunctionJohnFriendly = john.presentation.bind(john, ['friendly']);
// ^^ can be any object, we chose John.  can be both values or neither that
// are pre-set - we've chosen only one.

boundFunctionJohnFriendly('morning');
// ^^ now we only need to pass the remaining parameter; we'll always be "friendly" but maybe at different times of day

// ^^ this is called "currying" (?)



// -------------------------------------------------------------- //
// mini-challenge


var years = [ 1990, 1965, 1937, 2005, 1998 ]; // 5 years

// main function
function arrayIterator(arr, fn) {
    
    var arrRes = []; // we will populate this with our results
    
    for(var i = 0; i < arr.length; i++) {
        arrRes.push(fn(arr[i]));  // push the results of our function, after it's performed an action against the arr[i] value passed
    }
    return arrRes;
    
}

// callback functions
function calculateAge(yearOfBirth) {
    return 2019 - yearOfBirth;
}

function isAdult(limit, yearOfBirth) {
    return yearOfBirth >= limit;
}

// results
var ageArray = arrayIterator(years, calculateAge);
console.log(ageArray);

// but if we wanted to run array Iterator for "isAdult" - this one needs 2 args and arrayIterator only expects the second, array of years!
//how to proceed?!

// example 1:
var isAdultUk = this.isAdult.bind(this, [18]); // there is no "this" set here, but "limit" for isAdult is now forced to be 18, so now;
var ageArray2 = arrayIterator(ageArray, isAdultUk);

console.log(ageArray2);

// or, inline:
var ageArray3 = arrayIterator(ageArray, this.isAdult.bind(this, [18]));

console.log(ageArray3);









