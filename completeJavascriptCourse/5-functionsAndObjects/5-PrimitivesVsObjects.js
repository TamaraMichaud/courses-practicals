// -- variables assigned to a primitive value store that value itself directly in memory.
// -- variables assigned to non-primitives store only a pointer to that value.
//
//BEWARE INHERITANCE!!
//e.g.
// Primitives:
var a = 23;
var b = a;
a = 46;
console.log("A: " + a + " B: " + b);
// A: 46 B:23 // as expected, two distinct variables who do not affect each other.

// Objects:
var c = [ 1, 2, 3 ];
d = c;
d.push(8);
console.log("C: " + c + " D: " + d);
// C: 1,2,3,8 D: 1,2,3,8

// ^^ D is not a COPY of C, it is a reference to C

// ------------------------------------------------------------------ //

// --- Functions work in the same way:

var age = 27;
var obj = {
    name: 'Dick',
    city: 'London'
};

function change(a, b) {
    a = 30;
    b.city = 'Nowhere';
    
//    var altCity = b.city;
//    altCity = 'Somewhere';  // << this will avoid the inheritance; now altCity IS a copy, and does not update the obj. object any more
}

change(age, obj);
console.log("Age: " + age + " City: " + obj.city);

// ^^ now the primitive variable; A, is unchanged.  but the object.city value has been updated


