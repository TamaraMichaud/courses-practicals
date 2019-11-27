/*
GAME RULES:
- The game has 2 players, playing in rounds
- In each turn, a player rolls a dice as many times as he whishes. Each result get added to his ROUND score
- BUT, if the player rolls a 1, all his ROUND score gets lost. After that, it's the next player's turn
- The player can choose to 'Hold', which means that his ROUND score gets added to his GLBAL score. After that, it's the next player's turn
- The first player to reach 100 points on GLOBAL score wins the game
*/
var scores, roundScore, activePlayer; //, dice;

newGame();

document.querySelector('.btn-roll').addEventListener('click', rollDice);
document.getElementById('newGame').addEventListener('click', newGame);
document.querySelector('.btn-hold').addEventListener('click', nextPlayer);

function rollDice(){
	
	document.querySelector('.dice').style.display = "";
	var roundScoreId = '#current-' + activePlayer;
	var diceValue = getDiceValue();
	var diceImg = "dice-" + diceValue + ".png";
	document.querySelector('.dice').setAttribute("src", diceImg);
	if(diceValue === 1){
			document.querySelector(roundScoreId).textContent = 0;		
			roundScore = 0;
			nextPlayer();
	} else {
			var currentValue = Number(document.querySelector(roundScoreId).textContent);
			document.querySelector(roundScoreId).textContent = currentValue + diceValue;
			roundScore += diceValue;
	}
}

function getDiceValue(){
	return Math.floor(Math.random() * 6) + 1;
}

function updateValue(elementId, value){
	document.getElementById(elementId).textContent = value;
}

function nextPlayer(){
	
	scores[activePlayer] += roundScore;
	updateValue('score-' + activePlayer, scores[activePlayer])
	roundScore = 0;
	updateValue('current-' + activePlayer, 0);
	
	document.querySelector(".player-" + activePlayer + "-panel").classList.toggle("active");
	
	if(!checkWinner()){	
	
		activePlayer = (activePlayer == 0 ) ? 1 : 0 ;
		document.querySelector(".player-" + activePlayer + "-panel").classList.toggle("active");
	} 
}


function checkWinner(){
	
	if(scores[activePlayer] >= 10) {
		updateValue('name-' + activePlayer, 'Winner');
		document.querySelector('.player-' + activePlayer + '-panel').classList.add('winner');		
		return true;
	}
	return false;
}


function newGame(){
	
	document.querySelector('.dice').style.display = "none";
	scores = [0,0];
	roundScore = 0;
	activePlayer = 0;
	var loopNum = 0;
	while(loopNum < 2){
		updateValue('score-' + loopNum, 0);
		updateValue('current-' + activePlayer, 0);
		loopNum++;
	}
}

