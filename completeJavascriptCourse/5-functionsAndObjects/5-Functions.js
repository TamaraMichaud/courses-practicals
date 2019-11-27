// -- Javascript has "first-class functions" -- //
// Functions - a function is an instance of an Object -- "Everything in javascript is an object!!"

// ------------------------------------------------------ //
// ------------------------------------------------------ //
// FUNCTIONS AS INPUTS:


// passing functions as arguments:

var years = [ 1990, 1965, 1937, 2005, 1998 ]; // 5 years

function arrayIterator(arr, fn) {
    
    var arrRes = []; // we will populate this with our results
    
    for(var i = 0; i < arr.length; i++) {
        arrRes.push(fn(arr[i]));  // push the results of our function, after it's performed an action against the arr[i] value passed
    }
    return arrRes;
    
}

// callback function (a term for functions that are passed into other functions)
function calculateAge(yearOfBirth) {
    return 2019 - yearOfBirth;
}


var ageArray = arrayIterator(years, calculateAge);

console.log(ageArray);


// another callback function example

function isAdult(age) {
    return (age >= 18 ) ? true : false;
}

var adults = arrayIterator(ageArray, isAdult);

console.log(adults);


// ------------------------------------------------------ //
// ------------------------------------------------------ //
// FUNCTIONS RETURNING FUNCTIONS

function interviewQuestion(job) {
    
    // depending on the job, we will dispaly a different quesiton
    switch(job) {
            
        case "designer" : 
            // here is an anonymous function, we will catch it in a variable to name it later
            return function(name) {
                        console.log(name + ', can you please explain what UX design is?');
                            };
        break;

        case "teacher" : 
            return function(name) {
                        console.log('What subject is your speciality, ' + name + "?");
                            };
        break;
            
        default:
            return function(name) {
                        console.log('Hello ' + name + ', what do you do?');
                            };
            break;
    }
}


var teacherQuestion = interviewQuestion('teacher');
teacherQuestion('tamara');

// OR, chain the functions:
interviewQuestion('designer')('John');
//                          ^ here we got back a function, so we can simply add the arguments directly to the end





