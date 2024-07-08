<?php
// Include the database connection
include 'config.php';

// Fetch highest metrics
$highestMetrics = file_get_contents('http://localhost:3000/highest_metrics');
$highestMetrics = json_decode($highestMetrics, true);

// Fetch dashboard metrics
$dashboardMetrics = file_get_contents('http://localhost:3000/dashboard_metrics');
$dashboardMetrics = json_decode($dashboardMetrics, true);

// Placeholder for handling errors or empty responses
if (!$highestMetrics || !$dashboardMetrics) {
    $highestMetrics = ['maxPower' => 'N/A', 'maxLoad' => 'N/A', 'maxSpeed' => 'N/A'];
    $dashboardMetrics = [];
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
                <a href="Dashboard.php" class="block py-2 px-2  hover:bg-blue-700 rounded-lg flex items-center text-white bg-blue-800">
                    <img src="images/dashboard-interface.png" alt="Dashboard Icon" class="w-5 h-5 mr-2">
                    Dashboard
                </a>
                <a href="Testing.php" class="block py-2 px-2 hover:bg-blue-700 rounded-lg flex items-center text-white">
                    <img src="images/testing.png" alt="regis icon" class="w-5 h-5 mr-2">
                    Testing
                </a>
                <a href="PHPmkr" target="_blank" class="block py-2 px-2 hover:bg-blue-700 rounded-lg flex items-center text-white">
                    <img src="images/data.png" alt="History icon" class="w-5 h-5 mr-2">
                    Database
                </a>
            </nav>
        </div>

       <!-- Main Content Area -->
       <div class="grid col-span-3 gap-6 mr-2">

        <div class="bg-gray-800 text-white p-4 rounded-lg h-screen">
        
        <div class="grid grid-cols-3 gap-4 text-center">
            <div class="p-4 bg-blue-800 rounded shadow">
                <h2 class="font-bold">Highest Power</h2>
                <p><?= $highestMetrics['maxPower'] ?></p>
            </div>
            <div class="p-4 bg-blue-800 rounded shadow">
                <h2 class="font-bold">Highest Load</h2>
                <p><?= $highestMetrics['maxLoad'] ?></p>
            </div>
            <div class="p-4 bg-blue-800 rounded shadow">
                <h2 class="font-bold">Highest Speed</h2>
                <p><?= $highestMetrics['maxSpeed'] ?></p>
            </div>
            <div class="grid col-span-3 gap-6 mr-2">
            <div id="ranking-container"></div>
        </div>
        </div>

    

    <script src="dashboard.js"></script>
</body>
</html>
                                


                                    
