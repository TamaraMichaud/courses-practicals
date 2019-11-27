// 1. Build a function constructor called Question. a question should include:
//  a) question itself
//  b) the answer options
//  c) the correct answer (use a number)

// 2. Create some questions using the constructor

// 3. set them into an array

// 4. select on at random and log it to the console with the possible answers
//   hint:  Question.displayToScreen();

// 5. "prompt" the user for an answer and only accept valid options

// 6. check if the answer is correct and print the result

// 7. ensure al the variables are private and cannot interfere with anything else (i.e. imagine this were to be a plugin)
(function(){

    var Question = function(question, arrayOfAnswers, correctAnswer){

                        this.question = question;
                        this.arrayOfAnswers = arrayOfAnswers;
                        this.correctAnswer = correctAnswer;
    }

    Question.prototype.printQuestion = function(){

        console.log("Question: " + this.question);
        for(var i = 0; i < this.arrayOfAnswers.length; i++){

            console.log(i + ") " + this.arrayOfAnswers[i]);
        }
    }

    Question.prototype.checkAnswer = function(answerSelected){

        var message = 'Answer: ';
        var returnValue = 0;
        if(this.correctAnswer === answerSelected) {
             message = this.correctAnswer + " - Yes that's right!!";
             returnValue = 1;
        } else {
            message = "Woopsie silly! The correct answer is: " + this.correctAnswer;
            returnValue = 0;
        }
        console.log(message);
        return returnValue;
    }

    var questionsArray = [
        new Question('What colour is the sky?', ['Green','Dead','Blue'], '2'),
        new Question('Who sucks worst?', ['You','Your mama','Get Lost'], '1'),
        new Question('Are you hungry', ['Yes','No','What'], '0')
    ];


    //console.log("Selection next question as: " + nextQuestion);

    var score = 0;
    var gameOver = false;
    function askAQuestion(){
        
        var nextQuestion = Math.floor(Math.random() * questionsArray.length);
        var answered = false;
        while (!answered) {
            questionsArray[nextQuestion].printQuestion();
            var selection = prompt("Please select your answer (or type 'Exit' to end the game)");
            if(!isNaN(selection * 1)){
                answered = true;
                var wasCorrect  = questionsArray[nextQuestion].checkAnswer(selection);
                score += wasCorrect;
                
            }
            else if(selection == "Exit") {
                    answered = true;
            }
        }
        if(selection != "Exit") {
            console.log(" ------------ Game Score: " + score);
            askAQuestion()
        }
    }

    // advanced challenge

    // 8. then display the next random question so the game never ends
    // 9. give the user an option to "exit" the game
    // 10. track the user's score so they will enjoy it.
    // 11. display the score in the console
    console.log(" ------------ Game Score: " + score);
    askAQuestion();
    
    console.log("The End!! Well done, your score was: " + score);
        
})(); // fully contained
        
        
        
        
        
        
        
        
        
        
        
        
        