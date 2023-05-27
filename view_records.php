<?php
$records = file("fishresearchrecord.txt", FILE_IGNORE_NEW_LINES);
?>

<!DOCTYPE html>
<html>

<head>
    <title>View Fish Records</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>

<body>
    <h1>View Fish Records</h1>

    <div class="button-container">
        <a href="index.php" class="button">Go to Home</a>
        <a href="registration.php" class="button">Go to Registration</a>
    </div>

    <?php if (empty($records)): ?>
        <p>No fish records found.</p>
    <?php else: ?>
        <table>
            <tr>
                <th>Fish Category</th>
                <th>Feeding per Day</th>
                <th>PH Value</th>
                <th>Gram per Feeding</th>
                <th>Total Growth Weeks</th>
                <th>Feeding Weight</th>
            </tr>
            <?php foreach ($records as $record): ?>
                <?php $fishInfo = explode(',', $record); ?>
                <tr>
                    <td>
                        <?php echo $fishInfo[0]; ?>
                    </td>
                    <td>
                        <?php echo $fishInfo[1]; ?>
                    </td>
                    <td>
                        <?php echo $fishInfo[2]; ?>
                    </td>
                    <td>
                        <?php echo $fishInfo[3]; ?>
                    </td>
                    <td>
                        <?php echo $fishInfo[4]; ?>
                    </td>
                    <td>
                        <?php echo $fishInfo[5]; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
</body>

</html>