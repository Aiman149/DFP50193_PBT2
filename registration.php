<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fishCategory = $_POST['fish_category'];
    $feedingPerDay = $_POST['feeding_per_day'];
    $phValue = $_POST['ph_value'];
    $gramPerFeeding = $_POST['gram_per_feeding'];
    $growthWeeks = $_POST['growth_weeks'];

    if (empty($fishCategory) || empty($feedingPerDay) || empty($phValue) || empty($gramPerFeeding) || empty($growthWeeks)) {
        $error = "Please fill in all the fields.";
    } else {
        $feedingWeight = $feedingPerDay * $gramPerFeeding;

        $_SESSION['fish_info'] = array(
            'fish_category' => $fishCategory,
            'feeding_per_day' => $feedingPerDay,
            'ph_value' => $phValue,
            'gram_per_feeding' => $gramPerFeeding,
            'growth_weeks' => $growthWeeks,
            'feeding_weight' => $feedingWeight
        );

        $record = implode(',', $_SESSION['fish_info']);
        $file = fopen("fishresearchrecord.txt", "a");
        fwrite($file, $record . "\n");
        fclose($file);

        header("Location: fish_details.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Fish Registration</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>

<body>
    <h1>Fish Registration</h1>

    <?php if (isset($error)): ?>
        <p class="error">
            <?php echo $error; ?>
        </p>
    <?php endif; ?>

    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <div>
            <label for="fish_category">Fish Category:</label>
            <select name="fish_category" id="fish_category" required>
                <option value="">Select a category</option>
                <option value="Arowana">Arowana</option>
                <option value="Kelah">Kelah</option>
                <option value="Patin">Patin</option>
            </select>
        </div>
        <div>
            <label for="feeding_per_day">Number of Feedings per Day:</label>
            <input type="number" name="feeding_per_day" id="feeding_per_day" required>
        </div>
        <div>
            <label for="ph_value">PH Value:</label>
            <input type="number" step="0.1" name="ph_value" id="ph_value" required>
        </div>
        <div>
            <label for="gram_per_feeding">Gram per Feeding:</label>
            <input type="number" name="gram_per_feeding" id="gram_per_feeding" required>
        </div>
        <div>
            <label for="growth_weeks">Total Growth Weeks:</label>
            <input type="number" name="growth_weeks" id="growth_weeks" required>
        </div>
        <div>
            <input type="submit" value="Register"><br>
            <a href="index.php" class="button">Go to Home</a>
        </div>
    </form>
</body>

</html>