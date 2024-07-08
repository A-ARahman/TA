<?php
// Include the database connection
include 'config.php';

// Fetch users from the database
$users = $pdo->query("SELECT user_id, name FROM users_st")->fetchAll(PDO::FETCH_ASSOC);

// Initially select the first user if available
$selectedUserId = $users[0]['user_id'] ?? null;

// Fetch metrics from the '/metrics' endpoint only if a user is selected
$metrics = [];
if ($selectedUserId) {
    $url = "http://localhost:3000/metrics?userId=" . urlencode($selectedUserId);
    $response = @file_get_contents($url); // Using @ to suppress warnings, check for errors instead
    if ($response === false) {
        $error = error_get_last();
        echo "HTTP request failed. Error was: " . $error['message'];
    } else {
        $metrics = json_decode($response, true);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smart Target - Testing</title>
    <!-- Tailwind CSS from unpkg -->
    <link href="tailwind.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
    <script src="chart.js"></script>
</head>

<body class="bg-custom p-3 bg-cover bg-no-repeat bg-center bg-fixed">
    
    <div class="grid grid-cols-4 gap-6">

        <!-- Sidebar -->
        <div class="bg-gray-800 text-white p-4 rounded-lg h-screen">
            <h1 class="text-2xl font-bold mb-4 flex items-center text-white">
                <img src="images/logo1.png" alt="main Icon" class="h-12  mr-2">
                Smart Target
            </h1>
            <nav>
                <a href="Dashboard.php" class="block py-2 px-2  hover:bg-blue-700 rounded-lg flex items-center text-white">
                    <img src="images/dashboard-interface.png" alt="Dashboard Icon" class="w-5 h-5 mr-2">
                    Dashboard
                </a>
                <a href="Testing.php" class="block py-2 px-2 hover:bg-blue-700 rounded-lg flex items-center text-white bg-blue-800">
                    <img src="images/testing.png" alt="regis icon" class="w-5 h-5 mr-2">
                    Testing
                </a>
                <a href="PHPmkr" target="_blank" class="block py-2 px-2 hover:bg-blue-700 rounded-lg flex items-center text-white">
                <img src="images/data.png" alt="History icon" class="w-5 h-5 mr-2">
                Database
            </a>


            </nav>
        </div>

         <!-- main section -->
         <div class="col-span-3 space-y-6">
                <!-- User selection and action button -->
                <div class="col-span-1 lg:col-span-4">
                    <div class="flex items-center space-x-3 bg-gray-800 p-4 rounded shadow">
                        <select id="user-select" class="p-2 bg-gray-700  rounded-md flex-1 text-white">
                            <option value="">Select User</option>
                            <?php foreach ($users as $user): ?>
                                <option value="<?= htmlspecialchars($user['user_id']) ?>">
                                    <?= htmlspecialchars($user['name']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <button id="set-active-user" class="px-4 py-2 bg-blue-600 text-white rounded-md">Set Active User</button>
                    </div>
                    <p id="feedback" class="mt-2 text-center text-red-500"></p>
                    <div id="metrics-container" class="space-y-4 bg-gray-800">
                </div>
        </div>
                                


                                    
   
    <script src="script.js"></script>
</body>
</html>
