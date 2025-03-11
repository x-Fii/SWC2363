<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Vacation Budget Calculator</title>

    <style>
        body { font-family: Arial, sans-serif; margin: 20px; text-align: center; background-color:rgb(238, 221, 235);}
        table { width: 100%; border-collapse: collapse; margin-top: 20px; margin-left: auto; margin-right: auto; }
        th, td { border: 1px solid black; padding: 10px; text-align: center; background-color:rgb(251, 255, 255);}
        th { background-color:rgb(91, 215, 219); }
        input[type="text"], input[type="number"], select {
            width: 200px; 
            padding: 10px; 
            margin-top: 5px; 
        }
        input[type="submit"] {
            background-color: green; 
            color: white; 
            padding: 10px 20px; 
            border: none; 
            cursor: pointer; 
            margin-top: 10px; 
        }
        input[type="submit"]:hover {
            background-color: blueviolet;
        }
    </style>
</head>
<body>
    <div style="border: 1px solid #ccc; padding: 5px; display: inline-block;background-color:rgb(255, 255, 255);">
        <h2>Online Vacation Budget Calculator</h2>
        <form method="post" action="">
            <label for="passenger_name">Traveller’s Name:</label>
            <br>
            <input type="text" name="passenger_name" required>
            <br><br>
            <label for="destination">Destination Location:</label>
            <br>
            <sub>Pick one location available below</sub>
            <br>
            <select name="destination" required>
                <option value="Paris">Paris</option>
                <option value="Tokyo">Tokyo</option>
                <option value="London">London</option>
                <option value="Dubai">Dubai</option>
                <option value="Singapore">Singapore</option>
            </select>
            <br><br>
            <label for="number_of_travellers">Number of Travellers:</label>
            <br>
            <input type="number" name="number_of_travellers" required>
            <br><br>
            <label for="number_of_days">Number of Days:</label>
            <br>
            <input type="number" name="number_of_days" required>
            <br><br>
            <label for="accommodation_type">Accommodation Type:</label>
            <br>
            <select name="accommodation_type" required>
                <option value="Budget">Budget</option>
                <option value="Standard">Standard</option>
                <option value="Luxury">Luxury</option>
            </select>
            <br><br>

            <input type="submit" name="calculate" value="Calculate Fare">
            <br><br>
        </form>
    </div>

    <?php
    $flightFares = [
        "Paris" => 500,
        "Tokyo" => 800,
        "London" => 600,
        "Dubai" => 400,
        "Singapore" => 600,
    ];

    $dailyExpensesPerPerson = 50;
    $accommodationCosts = [
        "Budget" => 50,
        "Standard" => 100,
        "Luxury" => 200,
    ];

    function calculateTotalCost($destination, $numTravellers, $numDays, $accommodationType) {
        global $flightFares, $dailyExpensesPerPerson, $accommodationCosts;

        $flightCost = $flightFares[$destination] * $numTravellers;
        $dailyExpenses = $dailyExpensesPerPerson * $numDays * $numTravellers;
        $accommodationCost = $accommodationCosts[$accommodationType] * $numDays * $numTravellers;

        $totalCost = $flightCost + $dailyExpenses + $accommodationCost;

        if ($numTravellers > 4) {
            $totalCost *= 0.9; // Apply 10% discount
        }

        return $totalCost;
    }

    // Process form submission
    if (isset($_POST["calculate"])) {
        $passengerName = $_POST["passenger_name"];
        $destination = $_POST["destination"];
        $numTravellers = $_POST["number_of_travellers"];
        $numDays = $_POST["number_of_days"];
        $accommodationType = $_POST["accommodation_type"];
        $totalCost = calculateTotalCost($destination, $numTravellers, $numDays, $accommodationType);


       
        // Display results
        echo "<h2>Fare Calculation Results</h2>";
        echo "<table>";
        echo "<tr>
                <th>Passenger Name</th>
                <th>Destination</th>
                <th>Number of Travellers</th>
                <th>Days</th>
                <th>Accommodation Type</th>
                <th>Total Estimated Cost</th>
              </tr>";
        echo "<tr>
                <td>{$passengerName}</td>
                <td>{$destination}</td>
                <td>{$numTravellers}</td>
                <td>{$numDays}</td>
                <td>{$accommodationType}</td>
                <td>{$totalCost}</td>
              </tr>";
        echo "</table>";
    }
    ?>
</body>
<footer>
    <p><p>Copyright © Fii. 2025.</p></p>
</footer>
</html>
