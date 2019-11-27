/* ----------- Objects; prototypes and inheritance ----------- */


/* perviously we have been creating objects using the  object literal, e.g.
var john = {
    name: 'John',
    yearOfBirth: 1990,
    job: 'teacher'
};
*/


// ------- Function Constructor Example: ----------- //
//(vv it's basically a Class remember, so naming conventions are as normal)
var Person = function(name, yearOfBirth, job){
    
                    this.name = name;
                    this.yearOfBirth = yearOfBirth;
                    this.job = job;
                    
                    this.sayHello = function(){
                        alert("YOYO!!");
                    }
                    
                    
            }

// instantiation of Person constructor.   "new" creates an empty object
var john = new Person('John', 1990, 'teacher');

console.log("JOHN is a: " + john.job);
john.sayHello();

// BUT.   image we have 50 people; they all have the "sayHello()" function - identical - for them all...
// As such, we should utilize Inheritence better!


// if we re-design the Person prototype:

var Person = function(name, yearOfBirth, job){
    
                    this.name = name;
                    this.yearOfBirth = yearOfBirth;
                    this.job = job;

            }
Person.prototype.sayHello = function(){
                        console.log("Hello you!");
                            }
                    
var john = new Person('John', 1990, 'teacher');

console.log("JOHN is a: " + john.job);
john.sayHello();
// ^^ basically the same, but now John does not have his own "sayHello()"; he has simply inherited the use
// of Person's sayHello method.



/* ------------------------------------------------------- */
// Console Output Testing __proto__ and .prototype:
//
// >john
//<:Person {name: "John", yearOfBirth: 1990, job: "teacher"}
//    job: "teacher"
//    name: "John"
//    yearOfBirth: 1990
//    __proto__: sayHello: ƒ ()
//        constructor: ƒ (name, yearOfBirth, job)
//        __proto__: 
//            constructor: ƒ Object()
//            hasOwnProperty: ƒ hasOwnProperty()
//            isPrototypeOf: ƒ isPrototypeOf()
//            propertyIsEnumerable: ƒ propertyIsEnumerable()
//            toLocaleString: ƒ toLocaleString()
//            toString: ƒ toString()
//            valueOf: ƒ valueOf()
//            __defineGetter__: ƒ __defineGetter__()__defineSetter__: ƒ __defineSetter__()__lookupGetter__: ƒ __lookupGetter__()__lookupSetter__: ƒ __lookupSetter__()get __proto__: ƒ __proto__()set __proto__: ƒ __proto__()
//
// >Person
//<:ƒ (name, yearOfBirth, job){
//    
//                    this.name = name;
//                    this.yearOfBirth = yearOfBirth;
//                    this.job = job;
//            }
//
// >Person.prototype
//<:{sayHello: ƒ, constructor: ƒ}
//    sayHello: ƒ ()
//    constructor: ƒ (name, yearOfBirth, job)
//    __proto__: Object
//
// >john.__proto__ === Person
//<:false
//
// >john.__proto__ === Person.prototype
//<:true
//
//
//



