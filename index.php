<?php
$title = "PHP Calculator";

$error = "";
$x = "";
$y = "";
$result = "";
$op = "";

if (isset($_GET['operation'])) {
    $x = $_GET['num1'];
    $y = $_GET['num2'];
    $op = $_GET['operation'];

    if (is_numeric($x) && is_numeric($y)) {
        switch ($op) {
            case 'add':
                $result = $x + $y;
                break;
            case 'sub':
                $result = $x - $y;
                break;
            case 'pro':
                $result = $x * $y;
                break;
            case 'div':
                $result = $x / $y;
                break;
            default:
                $error = "Invalid operation selected";
        }
    } else {
        $error = "Please enter valid numbers.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="form">
        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="get">
            <div class="numbers">
                <label for="num1">x</label>
                <input type="number" name="num1" id="num1" value="<?= htmlspecialchars($x) ?>">
            </div>

            <div class="numbers">
                <label for="num2">y</label>
                <input type="number" name="num2" id="num2" value="<?= htmlspecialchars($y) ?>">
            </div>

            <div>
                <label for="operation">Operation:</label>
                <select name="operation" id="operation">
                    <option value=""></option>
                    <option value="add" <?= $op == 'add' ? 'selected' : '' ?>>Add</option>
                    <option value="sub" <?= $op == 'sub' ? 'selected' : '' ?>>Subtract</option>
                    <option value="pro" <?= $op == 'pro' ? 'selected' : '' ?>>Multiply</option>
                    <option value="div" <?= $op == 'div' ? 'selected' : '' ?>>Divide</option>
                </select>
            </div>

            <div class="result">
                <button type="submit">=</button>
                <input type="number" id="result" value="<?= htmlspecialchars($result) ?>" disabled>
            </div>
        </form>

        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="get">
            <button type="submit" id="reset">RESET</button>
        </form>
    </div>

    <?php if ($error): ?>
        <script>
            window.alert("<?= htmlspecialchars($error) ?>");
        </script>
    <?php endif; ?>
</body>

</html>