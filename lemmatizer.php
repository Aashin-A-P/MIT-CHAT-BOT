


<!DOCTYPE html>
<html>
<head>
    <title>ChatBot</title>
    <style>
            body {
            font-family: Arial, sans-serif;
            background: radial-gradient(circle, rgba(80,255,175,1) 0%, rgba(0,128,128,1) 100%);
        }

        .container {
            max-width: 100%;
            margin: 0 auto;
            padding: 20px;
            padding-right:30px;
            background-color: #f2f2f2;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            position: sticky;
            top: 0; /* Stick to the top of the viewport */
            z-index: 100; /* To control stacking order */

        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .form-group input[type="text"] {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .form-group button {
            padding: 10px 20px;
            font-size: 16px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .form-group button:hover {
            background-color: #45a049;
        }

        .form-group .reply {
            margin-top: 20px;
            font-weight: bold;
            overflow-y: scroll;
            max-height: 200px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>ChatBot</h2>
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <div class="form-group">
                <label for="chat">Enter your question:</label>
                <input type="text" id="chat" name="chat" placeholder="Hello, how can I help?" >
            </div>
            <div class="form-group">
                <button type="submit">Submit</button>
                <button type='submit' name='delete'>Delete Chat History</button>
    
            </div>
        </form>

        <?php if (!empty($reply)) : ?>
            <div class="form-group">
                <p class="reply"><?php echo 'result'; ?></p>
            </div>
        <?php endif; ?> 
    </div>
    

    <?php
use Skyeng\Lemmatizer;

// Require Composer's autoloader
require_once __DIR__ . "\\vendor\\autoload.php";

$lemmatizer = new Lemmatizer();

function removeSpecialCharsAndLowercase($string, $stop)
{
    // Remove special characters using regular expression
    $string = preg_replace('/[^A-Za-z\- ]/', ' ', $string);

    // Convert to lowercase
    $string = strtolower($string);
    $string = explode(' ', $string);
    $filteredWords = array_diff($string, $stop);

    return array_unique(array_values($filteredWords));
}

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $reply = '';
    $user = $_POST['chat'];
    $your_entry = $user;

    $stopWords = array(
        'a', 'an', 'the', 'and', 'but', 'or', 'so', 'as', 'at', 'by',
        'for', 'in', 'of', 'on', 'to', 'with', 'is', 'are', 'was', 'were',
        'be', 'being', 'been', 'has', 'have', 'had', 'do', 'does', 'did',
        'can', 'could', 'will', 'would', 'shall', 'should', 'may', 'might',
        'must', 'ought', 'there', 'here', 'that', 'this', 'these', 'those',
        'it', 'he', 'she', 'its', 'himself', 'herself', 'itself', 'they',
        'them', 'their', 'themselves', 'we', 'us', 'our', 'ourselves',
        'your', 'yourselves', 'I', 'me', 'my', 'myself', 'which',
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
    );

    $user = removeSpecialCharsAndLowercase($user, $stopWords);

    $user_new = [];
    foreach ($user as $a) {
        $lemmas = $lemmatizer->getOnlyLemmas($a);
        $user_new[] = $lemmas[0];
    }
    

    
   
    
    // include('similarity.php');
    $conn=mysqli_connect('localhost','root','','chat');
    $query='SELECT question from chats';
    $result=mysqli_query($conn,$query);
    if ($result){
        
        $data = array();
    
    // Fetch all rows and add them to the array
        while ($row = mysqli_fetch_assoc($result)) {
             $data[] = $row;
             

    
    }
    //sprint_r($data);
    
    function countWordsPresent($array1, $array2) {
        $total=0;
        foreach ($array1 as $word) {
           
            $count = 0;
            foreach($array2 as $a2){

                
                if ($a2==$word){
                    
                    $count+=1;
                }
                
            }
            $total+=$count;
            
        }
        return $total;
        
    }
    
    $count = [];
    foreach ($data as $a) {
        $newa=explode(',',$a['question']);
        
        $ans = countWordsPresent($user_new,$newa);
        
        $count[] = $ans;
    }
   
    function sigmoid($x, $count) {
        $expX = exp($x);
        $sumExp = array_sum(array_map(function ($i) {
            return exp($i);
        }, $count));
    
        $result = $expX / $sumExp;
        return $result;
    }
  
    
    $sig = [];
    foreach ($count as $c) {
        $sig[] = sigmoid($c, $count);
    }
    
    $maxValue = max($sig); // Get the maximum value from the array
    
    
    $keys = (array_keys($sig, $maxValue)); // Get the keys corresponding to the maximum value
    
    
    
    // $reply=array_rand($reply);
    }
    
    $answer=array_values($keys);
    
    $string=intval(implode(' ',$answer));
   
    foreach($answer as $s)
    
    $answer="SELECT answer from chats where id='$string'";
    
    $reply=mysqli_query($conn,$answer);
    $rows=mysqli_fetch_assoc($reply);
    
    
    $reply=join(' ',$rows);
    
   
}

    // Rest of the code remains unchanged...
    // ...
    // ...

    // Storing chat history in sessions
    if (!isset($_SESSION['chat_history'])) {
        $_SESSION['chat_history'] = [];
    }
    if(isset($_POST['delete'])){
        $_SESSION['chat_history']=[];
    }
    // Adding the user's chat to the chat history
    $_SESSION['chat_history'][] = ['user' => $your_entry, 'bot' => $reply];

    // Display the chat history
    echo '<div class="form-group">';
    echo '<p class="reply">';
    $hello=[];
    
    $entryCount = count($_SESSION['chat_history']);
    foreach (array_reverse($_SESSION['chat_history']) as $index => $chat) {
        $entryId = 'chat-entry-' . ($entryCount - $index);
        if(htmlspecialchars($chat['user'])!=''){
        echo '<a id="' . $entryId . '"></a>';
        echo '<strong>You:</strong> ' . htmlspecialchars($chat['user']) . '<br>';
        echo '<strong>Bot:</strong> ' . htmlspecialchars($chat['bot']) . '<br>';
        echo '<hr>';
    }
}
    
    
    
    
    echo '</p>';
    echo '</div>';
//     echo "<center><h1 id='typing-text'></h1></center>";
//     echo "<script>
//     const textElement = document.getElementById('typing-text');
// const textToType = '{$chat['bot']}';
// let index = 0;

// function typeText() {
//     if (index < textToType.length) {
//         textElement.textContent += textToType.charAt(index);
//         index++;
//         setTimeout(typeText, 100);
//     } else {
//         displayRandomGreeting();
//     }
// }
// window.addEventListener('load', () => {
//     typeText();
// });
//     </script>";
?>
</body>
</html>
