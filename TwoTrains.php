<?php
if (isset($_POST['submit'])) {
    // Retrieve form data
    $speedA = $_POST['speedA'];
    $speedB = $_POST['speedB'];
    $distance = $_POST['distance'];

    // Validate input
    if ($speedA <= 0 || $speedB <= 0 || $distance <= 0) {
        echo "Invalid input. Please enter positive numbers.";
        exit;
    }

    // Calculate required values
    $distanceA = (($speedA / $speedB) * $distance) / (1 + ($speedA / $speedB));
    $distanceB = $distance - $distanceA;
    $timeA = $distanceA / $speedA;
    $timeB = $distanceB / $speedB;
    
    // Calculate time until collision
    $timeUntilCollision = ($distanceA + $distanceB) / ($speedA + $speedB);
    $hoursUntilCollision = floor($timeUntilCollision);
    $minutesUntilCollision = ($timeUntilCollision - $hoursUntilCollision) * 60;

    // Display results
    echo "<h1>Train Problem Solver</h1>";
    echo "<p>If Train A is traveling at $speedA mph and Train B is traveling at $speedB mph, they will collide in approximately $hoursUntilCollision hours and $minutesUntilCollision minutes.</p>";
    echo "<p>Speed of Train A: $speedA mph</p>";
    echo "<p>Speed of Train B: $speedB mph</p>";
    echo "<p>Distance between the two trains: $distance miles</p>";
    echo "<p>Distance traveled by Train A: $distanceA miles</p>";
    echo "<p>Distance traveled by Train B: $distanceB miles</p>";
    echo "<p>Time taken by Train A: $timeA hours</p>";
    echo "<p>Time taken by Train B: $timeB hours</p>";
} else {
    echo "<h1>Train Problem Solver</h1>";
    echo "<p>Fill out the form below to solve the train problem.</p>";
    echo "<form action="train_problem.php" method="post">
        <p>Enter the speed of Train A (mph): <input type="number" name="speedA" min="1" required></p>
        <p>Enter the speed of Train B (mph): <input type="number" name="speedB" min="1" required></p>
        <p>Enter the distance between the two trains (miles): <input type="number" name="distance" min="1" required></p>
        <input type="submit" name="submit" value="Solve Problem">
    </form>";
}
?>
