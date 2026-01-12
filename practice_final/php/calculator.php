<?php
$result = "";
$error = "";

$num1 = $_POST['num1'] ?? '';
$num2 = $_POST['num2'] ?? '';
$operation = $_POST['operation'] ?? '';

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    if (!is_numeric($num1) || !is_numeric($num2)) {
        $error = "Please enter valid numbers.";
    } else {
        switch ($operation) {
            case '+':
                $result = $num1 + $num2;
                break;

            case '-':
                $result = $num1 - $num2;
                break;

            case '*':
                $result = $num1 * $num2;
                break;

            case '/':
                if ($num2 == 0) {
                    $error = "Division by zero is not allowed.";
                } else {
                    $result = $num1 / $num2;
                }
                break;

            default:
                $error = "Please select an operation.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PHP Calculator</title>
    <style>
        .error {
            color: red;
        }

        .result{
            color: green;
        }
    </style>
</head>
<body>

    <h2>Simple Calculator</h2>

    <form method="post">
        <input type="number" name="num1" value="">
        <input type="number" name="num2" value="">

        <select name="operation">
            <option value="">Select Operation</option>
            <option value="+" <?php echo ($operation=='+')?'selected':'' ?>>Addition (+)</option>
            <option value="-" <?php echo  ($operation=='-')?'selected':'' ?>>Subtraction (-)</option>
            <option value="*" <?php echo  ($operation=='*')?'selected':'' ?>>Multiplication (×)</option>
            <option value="/" <?php echo  ($operation=='/')?'selected':'' ?>>Division (÷)</option>
        </select>

        <button type="submit">Calculate</button>
    </form>

    <?php if ($result !== ""): ?>
        <div class="result">
            Result: <?php echo  $result ?>
        </div>
    <?php endif; ?>

    <?php if ($error !== ""): ?>
        <div class="error">
            <?php echo  $error ?>
        </div>
    <?php endif; ?>

</body>
</html>
