// Closures

// call a function that returns a function which calculates years to retirement

// NOTE:  outer function "retirement()" has arg "retirementAge" AND var "a" - which are accessible to the inner anonymous function even after the outer function has been executed separately::

// INNER FUNCTIONS always have access to the contents of the outer function, even after the outer function has completed and returned.  Because the current execution contents has "closed in" on the outer variable object (the outer function) - hence, "closure"


function retirement(retirementAge) {
    var a = "Years till retirement: ";
    return function(yearOfBirth){
        var age = 2016 - yearOfBirth;
        console.log(a + (retirementAge - age));
    }
}

var john = {
    yearOfBirth: 1990
}


// retirement age is 65 in uk; but differs from country to country...
var retirementUK = retirement(65);
var retirementUS = retirement(66);

retirementUK(john.yearOfBirth);
retirementUS(john.yearOfBirth);

// OR:

retirement(60)(john.yearOfBirth);


// -------------------------- mini challenge. 
// re-write "interview" function using closures:



function interviewQuestion(job) {
    
    var questionText = "";
    return function(name) {
        switch(job) {
            case "designer" : 
                // here is an anonymous function, we will catch it in a variable to name it later
                questionText = name + ', can you please explain what UX design is?';

                break;

            case "teacher" : 
                questionText = 'What subject is your speciality, ' + name + "?";
                break;

            default:
                questionText = 'Hello ' + name + ', what do you do?';
                break;
        }

        console.log(questionText)
    }
}


var teacherQuestion = interviewQuestion('teacher');
teacherQuestion('tamara');

// OR, chain the functions:
interviewQuestion('designer')('John');