<?php
$questions = [
    "q1" => "Which language is used for web page structure?",
    "q2" => "Which language is used for styling web pages?",
    "q3" => "Which language is executed on the server?",
    "q4" => "Which protocol is used to transfer web pages?",
    "q5" => "Which tag is used to create a hyperlink?"
];

$options = [
    "q1" => ["HTML", "CSS", "PHP", "SQL"],
    "q2" => ["HTML", "CSS", "JavaScript", "PHP"],
    "q3" => ["HTML", "CSS", "PHP", "XML"],
    "q4" => ["FTP", "SMTP", "HTTP", "TCP"],
    "q5" => ["<img>", "<a>", "<p>", "<div>"]
];

$correctAnswers = [
    "q1" => "HTML",
    "q2" => "CSS",
    "q3" => "PHP",
    "q4" => "HTTP",
    "q5" => "<a>"
];

$userAnswers = [];
$results = [];
$score = 0;
$error = "";
$submitted = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $submitted = true;

    foreach ($questions as $key => $q) {
        if (!isset($_POST[$key])) {
            $error = "Please answer all questions.";
            break;
        } else {
            $userAnswers[$key] = $_POST[$key];
        }
    }

    if ($error == "") {
        foreach ($correctAnswers as $key => $correct) {
            if ($userAnswers[$key] == $correct) {
                $score++;
                $results[$key] = "Correct";
            } else {
                $results[$key] = "Incorrect";
            }
        }

        $percentage = ($score / count($correctAnswers)) * 100;

        switch (true) {
            case ($percentage >= 80):
                $feedback = "Excellent";
                break;
            case ($percentage >= 60):
                $feedback = "Good";
                break;
            case ($percentage >= 40):
                $feedback = "Average";
                break;
            default:
                $feedback = "Poor";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Web Technology Quiz</title>
</head>
<body>

<h2>Web Technology Quiz</h2>

<?php if ($error != ""): ?>
    <p style="color:red;"><strong><?php echo  $error ?></strong></p>
<?php endif; ?>

<form method="post">

<?php foreach ($questions as $key => $question): ?>
    <p><strong><?php echo  $question ?></strong></p>

    <?php foreach ($options[$key] as $opt): ?>
        <input type="radio"
               name="<?php echo  $key ?>"
               value="<?php echo  $opt ?>"
               <?php echo  (isset($userAnswers[$key]) && $userAnswers[$key] == $opt) ? "checked" : "" ?>>
        <?php echo  $opt ?><br>
    <?php endforeach; ?>

    <br>
<?php endforeach; ?>

<input type="submit" value="Submit Quiz">

</form>

<?php if ($submitted && $error == ""): ?>

<h3>Quiz Result</h3>

<p>Score: <?php echo  $score ?> / <?php echo  count($correctAnswers) ?></p>
<p>Percentage: <?php echo  $percentage ?>%</p>
<p>Feedback: <strong><?php echo  $feedback ?></strong></p>

<h3>Answer Review</h3>
<ul>
<?php foreach ($results as $key => $res): ?>
    <li>
        <?php echo  $questions[$key] ?> — 
        <?php echo  $res ?>
        (Correct Answer: <?php echo  $correctAnswers[$key] ?>)
    </li>
<?php endforeach; ?>
</ul>

<?php endif; ?>

</body>
</html>
