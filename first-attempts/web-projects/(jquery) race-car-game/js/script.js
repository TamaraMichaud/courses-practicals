/* jQuery Animation! */

$(function () {

   // click the "Race!" button:
   $('#race').click(function() {

      // function to check for winner
      function checkIfComplete(){

         if(isComplete == false){
            //no-one has won yet
            isComplete == true;
         } else {
            // other car won
            place = 'second';
         }
      }

      // they are the same so you can pick the class... but if not you'll have a problem so...
      var carWidth = $('#car1').width();
      var roadLength = $('#road').width() - carWidth;
      // ^^ we want the car to finish with nose at finish line because it's measuring from top-left

      // generate a random number
      var raceTime1 = Math.floor( (Math.random() * 5000) + 1); // between 1 and 5k (being miliseconds of race duration)
      var raceTime2 = Math.floor( (Math.random() * 5000) + 1); // between 1 and 5k (being miliseconds of race duration)

      // flag for race-ended check
      var isComplete = false;
      var place = 'first';

      // animate! full syntax:
      // $(element).animate(
      //                { // actions}, time, after()
      //                   )
      $('#car1').animate({

         left: roadLength

      }, raceTime1, function() {

         // check if the car has completed the race
         checkIfComplete();

         //give feedback on results
         $('#result1 span').text('Finished in ' +
                                 place + ' place, with a time of ' +
                                 raceTime1 + ' ms!');
      });

      $('#car2').animate({

         left: roadLength

      }, raceTime2, function() {

         // check if the car has completed the race
         checkIfComplete();

         //give feedback on results
         $('#result2 span').text('Finished in ' +
                                 place + ' place, with a time of ' +
                                 raceTime2 + ' ms!');
      });





   });

   
   // RESET click
   $('#reset').click(function() {

      $('img').css('left','0');
      $('#results span').text('');

   });

});