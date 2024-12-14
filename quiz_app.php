<?php
/*
TARGET: You will write a PHP script for a Quiz Application that:
1. Asks a set of predefined questions to the user.
2. Evaluates the user's answers.
3. Provides a score and feedback based on their performance.
*/

/* 
1. defining the function evaluateQuiz()  
- Accepts two arrays as parameters:
       - $questions: An array of questions where each question has a question text and a correct answer.
       - $answers: An array of user-provided answers.
     - Compares the user's answers to the correct answers and calculates the score.
     - Returns the total score.
*/

function evaluateQuiz(array $questions, array $answers): int{
    $score = 0;
    foreach( $questions as $index => $question){
        if( $answers[$index] === $question['correct']){
            $score++;
        }
    }
    return $score;
}

/*
2. Create a set of quiz questions:
* Define an array of questions, each with a question and correct answer.
*/

$questions = [
    ['question' => 'What is 2 + 2?', 'correct' => '4'],
    ['question' => 'What is the capital of France?', 'correct' => 'Paris'],
    ['question' => 'Who wrote "Hamlet"?','correct' => 'Shakespeare'],
];

/* 
3. Collect answers from the user:
* Declare a Black Array for collecting users Answers
*/ 
$answers = [];

/* 
* Loop Through the Questions array, 
* display question one by one
* collect answer one by one at above declared array 
*/
foreach($questions as $index => $question){
    echo ($index+1) . ". " . $question['question'] . PHP_EOL;
    $answers[] = trim(readline("Type your Answer: "));
}

/*
4. Evaluate the user's score:
*/

// Pass the $questions and $answers arrays to the evaluateQuiz function.
$score = evaluateQuiz( $questions, $answers);

// Declaring Total Marks, mark each question = 1. 
$totalMarks = count($questions) * 1;

// Display the score to the user in the format: "You scored X out of Y." 
echo "\nYou scored $score out of $totalMarks." . PHP_EOL;

/*
5. Feedback based on performance
*/
if($score >= $totalMarks){
    echo "Excellent job!";
}elseif($score > ($totalMarks/2)){
    echo "Good effort!";
}else{
    echo "Better luck next time!";
}