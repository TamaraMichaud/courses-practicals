// IIFE  (iffy)

// random game; win if you get above 5, lose if lower.

function game() {
    var score = Math.random() * 10;
    console.log(score >= 5);
}

game();

// ^^ this is the plain way, but IIFE "Immediately Invoked Function Expression" is smarter if only to be used once.

//(anonymous function; this is an expression, not a statement)
//v the surrounding brackets force it to be a declaration, hence the "function()" with no name, does not error.
(function() {
    
        var score = Math.random() * 10;
    console.log(score >= 5);
})();
//^ invoke the function immediately after creation.  no name provided so can't be called again.

// ------------------------------------ // 
// also works with parameters.

(function (goodluck) {
        var score = Math.random() * 10;
    console.log(score >= 5 - goodluck);
})(5);  // in this situation; we only need to be bigger than 0 (5 - 5) so the odds of winning are higher (100%)

// not for re-use.  for data privacy only.  effectively a "private" variable.