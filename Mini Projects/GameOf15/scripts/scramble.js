//to create the array that has to be shuffled
for (var a=[],i=1;i<16;i++){	
	a[i-1]=i; 
}// end for
	a[15] = " ";
var emptyCell ;   // to keep track of the empty element
var movesCounter = 0; //keeps track of the moves
var seconds = 0;   //keeps track of the time
var timer = 0;   //timer flag to start the timer only once

var $ = function(id){
	return document.getElementById(id);
};
var shuffledArray = new Array();// stores the array which is shuffled

//this function is called when the suffle button is clicked
function shuffleGame(){	
	shuffledArray = shuffle();
	loadMatrix(shuffledArray);
}

// to check if the cell calling the swap function is a neighbour of the empty cell
function isNeighbour(cell){
	var neighbourArr = [emptyCell+4, emptyCell-4, emptyCell+1,emptyCell-1];
	if(contains(cell,neighbourArr))
		return true;
	else
		return false;
}
// to check if the element is present in the array
function contains(cell,array){
	for(var i =0;i<array.length;i++){
		if(array[i] === cell){			
			return true;
		}
	}// end for
}

// called if the simple game button is clicked
function simpleGame(){
	shuffledArray = [1,2,3,4,5,6,7,8,9,10,11," ",13,14,15,12];	
	seconds = 0;
	movesCounter = 0;
	loadMatrix(shuffledArray);
}

// swap function is called when the adjacent cell ofthe empty element is clicked.
function swap(event){
	var str = event.target.id;
	var currentCell = parseInt(str.substring(4, str.length)) - 1;
	var temp = shuffledArray[currentCell];
	
	if(isNeighbour(currentCell)){	//checking if neighbor
		shuffledArray[currentCell] = shuffledArray[emptyCell];
		shuffledArray[emptyCell] = temp;
		emptyCell = currentCell;
		movesCounter++;    //moves is incremented
		loadMatrix(shuffledArray);   //the array is loaded to the table 
		if(checkMatrix(shuffledArray)){    //checked if puzzle is solved
			if(confirm("Congratulations!! You solved the puzzle in "+movesCounter+" moves! Do you want to Play Again?")){
				shuffledArray = shuffle();   //new shuffled array for new game
				loadMatrix(shuffledArray);   //new array loaded to table
				movesCounter = 0;     //moves is reset
			}
			else{
				$("rules").style.display = 'none';
				$("game").style.display = 'none';
				$("endgame").style.display = 'block';
			}
		}
	}
} 
//checking if the puzzle  is solved
function checkMatrix(array){
	for(var i=0; i<array.length-1;i++){
		if(array[i] !== i+1){
			return false;
		}
		else{
			continue;
		}
	} // end for
	return true;
}

// timer is started
function startTimer() {
	timer = 1;
	seconds = 0;
	window.setInterval("updateTimer()", 1000);
};
function updateTimer() {
	$("time").innerHTML = "Time Elapsed: "+seconds++;
}
// the array generated is displayed in its corresponding cell by calling this method
function loadMatrix(array){
	$("moves").innerHTML = "Number of Moves made: "+movesCounter;
	for(i=1;i<=16;i++){
		 if(array[i-1]=== " "){
    		emptyCell = i-1;
    	}
		var cell = "cell"+i;
		$(cell).innerHTML = array[i-1];
		$(cell).addEventListener("click",swap);
	}// end for
}

// shuffles the array
function shuffle(){
	if(timer != 1){
		startTimer();
	}
	var b=timer;
	var array = a;
	var tmp, current, top = array.length;
  	while(--top) {
    	current = Math.floor(Math.random() * (top + 1));
    	tmp = array[current];
    	array[current] = array[top];
	    array[top] = tmp;
  	}
	seconds =0;  
	movesCounter = 0;
	return array;
}
function start(){
	$("endgame").style.display = 'none';
	$("shuffle").addEventListener("click", shuffleGame);
	$("simplegame").addEventListener("click", simpleGame);
	shuffleGame();
}
window.addEventListener("load",start, false);

