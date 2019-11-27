// Object.create;
// previously we did "Objects - Prototypes and created our instance using "new [ObjectName]" -> function Constructor.  
// Now we will do it using Object.create

// vv no longer with the upper P, this is not a Constructor...
var personProto = {
    sayHello: function(){
        console.log("Hello there fella");
    }
};

var john = Object.create(personProto, {
   
    name: {value: 'John'},
    yearOfBirth: {value: 2000},
    job: {value: 'junkie'}
});


// apparently Object.create is better for more complex inheritance schemes... i dont really understand why.
// the function constructor method is still the most popular though (thankfully... if true).


//  or using the function Constructor method:

var Person = function(name, yearOfBirth, job){
    
                    this.name = name;
                    this.yearOfBirth = yearOfBirth;
                    this.job = job;

            }
Person.prototype.sayHello = function(){
                        console.log("Hello you!");
                            }
                    
var john = new Person('John', 1990, 'teacher');