var quizContainer = document.getElementById('quiz');
var resultsContainer = document.getElementById('results');
var submitButton = document.getElementById('submit');
var flag=0;
var sec=10;
var questions = [
	{
		question: "What is part of a database that holds only one type of information?",
		answers: {	
			a: "&ltjavascript&gt",
			b: "&ltscripted&gt",
			c: "&ltscript&gt",
			d: "&lt js &gt"

		},
		correctAnswer: 'c'
	},
	{
		question: "Which of the following is the correct syntax to display &quotGeeksforGeeks&quot in an alert box using JavaScript?",
		answers: {
			a: 'alertbox(&quotGeeksforGeeks&quot);',
			b: ' msg(&quotGeeksforGeeks&quot);',
			c: 'msgbox(&quotGeeksforGeeks&quot)',
			d: 'alert(&quotGeeksforGeeks&quot)'
		},
		correctAnswer: 'd'
	},{
		question: "What is the correct syntax for referring to an external script called &quotgeek.js&quot?",
		answers: {
			a: '&ltscript src=&quotgeek.js&quot&gt',
			b: '&ltscript href=&quotgeek.js&quot&gt',
			c: '&ltscript ref=&quotgeek.js&quot&gt',
			d: '&ltscript name=&quotgeek.js&quot&gt'
		},
		correctAnswer: 'a'
	},{
		question: "The external JavaScript file must contain &ltscript tag. True or False?",
		answers: {
			a: 'True',
			b: 'false',
		},
		correctAnswer: 'b'
	},{
		question: "Which of the following is not a reserved word in JavaScript?",
		answers: {
			a: 'interface',
			b: 'throws',
			c: 'short',
			d: 'program'
		},
		correctAnswer: 'd'
	}
	
];
function showQuestions(questions, quizContainer){
	// we'll need a place to store the output and the answer choices
	var output = [];
	var answers;
	// for each question...
	for(var i=0; i<questions.length; i++){
		// first reset the list of answers
		answers = [];
		// for each available answer to this question...
		for(letter in questions[i].answers){
			// ...add an html radio button
			answers.push(
				'<label id="asn'+i+'">'
					+ '<input type="radio" name="question'+i+'" value="'+letter+'">'
					+ questions[i].answers[letter]
				+ '</label><br>'
			);
		}

		// add this question and its answers to the output
		var j=i+1;
		output.push(
			'<div><div class="question"  id="'+i+'" onclick="toggle(this.id)">' +j+')'+questions[i].question + '</div>'
			+ '<div class="answers"  id="ans'+i+'">' + answers.join('') + '</div><p id="answer'+i+'"></p></div><br>'
		);
	}
	output.push(
		'<button id="submit" onclick="showResults()">submit</button>'
	);
	// finally combine our output list into one string of html and put it on the page
	quizContainer.innerHTML = output.join('');
hide1();
}

function start(){
	var elmnt = document.getElementById("start");
	  elmnt.remove();
	  var elmnt = document.getElementById("instruction");
	elmnt.remove();	 
	showQuestions(questions, quizContainer);
	  time=setInterval(myTimer, 1000);
}

function showResults(){
	sec=-1;
	var elmnt = document.getElementById("submit");
	elmnt.remove();	 
	// gather answer containers from our quiz
	flag=1;
	var answerContainers = quizContainer.querySelectorAll('.answers');
	var questionContainers=quizContainer.querySelectorAll('.question');
	// keep track of user's answers
	var userAnswer = '';
	var numCorrect = 0;
	
	// for each question...
	for(var i=0; i<questions.length; i++){

		// find selected answer
		userAnswer = (answerContainers[i].querySelector('input[name=question'+i+']:checked')||{}).value;
		
		// if answer is correct
		if(userAnswer===questions[i].correctAnswer){
			// add to the number of correct answers
			numCorrect++;
			// color the answers green
			answerContainers[i].style.color = 'lightgreen';
		}
		// if answer is wrong or blank
		else{
			// color the answers red
			answerContainers[i].style.color = 'red';
		}
		var x="answer"+i;
		document.getElementById(x).innerHTML="answer: "+questions[i].correctAnswer;
	}

	// show number of correct answers out of total
	document.getElementById("score1").innerHTML='<textarea id="score" name="score" readonly rows="1" cols="2"></textarea>';
	document.getElementById("score").innerHTML=numCorrect;
	resultsContainer.innerHTML =' out of ' + questions.length+' <br><button class="btn" name="update_score">update score</button>';
	for (i = 0; i < questions.length; i++)
	show(i);
}


function myTimer(){
   document.getElementById('timer').innerHTML ="time left:" +sec + "sec left";
   sec--;
   if (sec<=0) {
	   clearInterval(time);
	   if(flag==0)
	   {
	   window.alert("Time out!! :("); 
	   showResults();
	   }
   }
}

function toggle(id){
	$(document).ready(function(){
	   var x="#ans"+id;
		 $(x).slideToggle("speed");
   });
}
function show(id){
	$(document).ready(function(){
	   var x="#ans"+id;
		 $(x).slideDown("speed");
   });
}

function hide1(){
for (var i = 0; i < questions.length; i++)	
toggle(i);
}