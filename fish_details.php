<?php
session_start();

if (!isset($_SESSION['fish_info'])) {
    // Handle case when fish information is not available
    echo "Fish details not found.";
    exit();
}

$fishInfo = $_SESSION['fish_info'];
?>

<!DOCTYPE html>
<html>

<head>
    <title>Fish Details</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>

<body>
    <h1>Fish Details</h1>

    <table>
        <tr>
            <th>Fish Category</th>
            <th>Feeding per Day</th>
            <th>PH Value</th>
            <th>Gram per Feeding</th>
            <th>Total Growth Weeks</th>
            <th>Feeding Weight</th>
        </tr>
        <tr>
            <td>
                <?php echo $fishInfo['fish_category']; ?>
            </td>
            <td>
                <?php echo $fishInfo['feeding_per_day']; ?>
            </td>
            <td>
                <?php echo $fishInfo['ph_value']; ?>
            </td>
            <td>
                <?php echo $fishInfo['gram_per_feeding']; ?>
            </td>
            <td>
                <?php echo $fishInfo['growth_weeks']; ?>
            </td>
            <td>
                <?php echo $fishInfo['feeding_weight']; ?>
            </td>
        </tr>
    </table><br>

    <div class="button-container">
        <a href="index.php" class="button">Home</a>
    </div>
</body>

</html>