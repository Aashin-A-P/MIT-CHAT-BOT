<?php

        $question=$_POST['question'];
        $answer=$_POST['answer'];
        use Skyeng\Lemmatizer;
        use Skyeng\Lemma;

        // Require Composer's autoloader
        require_once __DIR__ . "\\vendor\\autoload.php";

        $lemmatizer = new Lemmatizer();
        // $qn=$_POST['qn'];
        // $ans=$_POST['an'];
    if ($_SERVER["REQUEST_METHOD"] === "POST"){
       
        function removeSpecialCharsAndLowercase($string,$stop) {
            // Remove special characters using regular expression
            $string = preg_replace('/[^A-Za-z\ -]/', ' ', $string);

            // Convert to lowercase
            $string = strtolower($string);
            $string=explode(' ',$string);
            $filteredWords = array_diff($string, $stop);

            return array_unique(array_values($filteredWords));


        }
        $stopWords = array(
            'a', 'an', 'the', 'and', 'but', 'or', 'so', 'as', 'at', 'by','s',
            'for', 'in', 'of', 'on', 'to', 'with', 'is', 'are', 'was', 'were',
            'be', 'being', 'been', 'has', 'have', 'had', 'do', 'does', 'did',
            'can', 'could', 'will', 'would', 'shall', 'should', 'may', 'might',
            'must', 'ought', 'there', 'here', 'that', 'this', 'these', 'those',
            'it', 'he', 'she', 'its', 'himself', 'herself', 'itself', 'they',
            'them', 'their', 'themselves', 'we', 'us', 'our', 'ourselves',
            'your', 'yourselves', 'I', 'me', 'my', 'myself', 'which', 'who',
            'whom', 'whose', 'what', 'when', 'where', 'why', 'how', 'some', 'any',
            'no', 'not', 'all', 'only', 'own', 'same', 'so', 'very', 'just', 'about',
            'over', 'under', 'above', 'below', 'up', 'down', 'through', 'from', 'into',
            'onto', 'without', 'with', 'because', 'if', 'unless', 'until', 'though',
            'although', 'even', 'ever', 'much', 'more', 'less', 'few', 'many', 'each',
            'every', 'both', 'neither', 'either', 'none', 'one', 'two', 'three', 'four',
            'five', 'six', 'seven', 'eight', 'nine', 'ten', 'next', 'previous', 'same', 'different', 'such', 'another', 'several',
            'good', 'great', 'better', 'best', 'bad', 'worse', 'worst', 'right', 'wrong', 'old', 'new', 'young', 'early', 'late',
            'big', 'small', 'large', 'tiny', 'huge', 'long', 'short', 'tall', 'low', 'high',
            'deep', 'shallow', 'narrow', 'wide', 'thick', 'thin', 'heavy', 'light', 'dark',
            'bright', 'clear', 'cloudy', 'rainy', 'snowy', 'sunny', 'windy', 'hot', 'cold',
            'dry', 'wet', 'noisy', 'quiet', 'clean', 'dirty', 'empty', 'full', 'solid',
            'liquid', 'gas', 'soft', 'hard', 'smooth', 'rough', 'sharp', 'dull', 'sweet',
            'sour', 'bitter', 'salty', 'fresh', 'stale', 'delicious', 'tasteless', 'healthy',
            'sick', 'strong', 'weak', 'brave', 'cowardly', 'happy', 'sad', 'excited', 'bored',
            'surprised', 'calm', 'anxious', 'afraid', 'tired', 'energetic', 'friendly',
            'hostile', 'kind', 'cruel', 'generous', 'selfish', 'honest', 'dishonest', 'polite',
            'rude', 'patient', 'impatient', 'responsible', 'irresponsible', 'organized',
            'disorganized', 'talented', 'untalented', 'intelligent', 'unintelligent', 'creative',
            'unimaginative', 'ambitious', 'lazy', 'successful', 'unsuccessful', 'lucky', 'unlucky',
            'safe', 'dangerous', 'easy', 'difficult', 'expensive', 'cheap', 'valuable', 'worthless',
            'famous', 'unknown', 'busy', 'idle', 'present', 'absent', 'here', 'there', 'now', 'then',
            'always', 'never', 'sometimes', 'often', 'rarely', 'occasionally', 'generally', 'specifically',
            'particularly', 'surely', 'probably', 'definitely', 'maybe', 'perhaps', 'possibly', 'actually',
            'basically', 'essentially', 'really', 'truly', 'mostly', 'partly', 'largely', 'completely',
            'totally', 'absolutely', 'nearly', 'approximately', 'exactly', 'indeed', 'furthermore',
            'moreover', 'additionally', 'likewise', 'similarly', 'however', 'nevertheless', 'nonetheless',
            'though', 'although', 'but', 'yet', 'unless', 'until', 'because', 'since', 'as', 'if', 'unless',
            'when', 'where', 'why', 'how', 'what', 'who', 'whom', 'which', 'whose', 'that', 'this', 'these',
            'those', 'here', 'there', 'near', 'far', 'close', 'open', 'shut', 'start', 'stop', 'go', 'come',
            'walk', 'run', 'jump', 'sit', 'stand', 'lie', 'sleep', 'wake', 'eat', 'drink', 'talk', 'listen',
            'see', 'hear', 'touch', 'smell', 'taste', 'feel', 'believe', 'think', 'know', 'understand',
            'learn', 'remember', 'forget', 'imagine', 'create', 'destroy', 'build', 'break', 'fix',
            'change', 'stay', 'leave', 'arrive', 'depart', 'win', 'lose', 'succeed', 'fail', 'help', 'hurt'
        )
        ;
        $ques=removeSpecialCharsAndLowercase($question,$stopWords);
        



        $conn=mysqli_connect('localhost','root','','chat');
        if($conn){
            $ques=implode(',',$ques);
            $ques=str_replace(",,", ",", $ques);
            $query="insert into chats values ('','$ques','$answer')";
            $result =mysqli_query($conn,$query);
            if($result){
                echo 'inserted successfully';
            }else{
                echo 'not inserted';
            }
        }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Data to Database</title>
</head>
<body>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="question">Question:</label>
        <input type="text" name="question" id="question" required>
        <br><br>
        <label for="answer">Answer:</label>
        <input type="text" name="answer" id="answer" required>
        <br><br>
        <input type="submit" value="Add Data">
    </form>
</body>
</html>
