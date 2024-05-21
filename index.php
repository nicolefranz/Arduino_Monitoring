<?php
include_once('config.php');

try {
    // Initialize empty arrays to store temperature and humidity data
    $temperatureData = array();
    $humidityData = array();

    // Fetch data from the database
    $stmt = $dbh->prepare("SELECT * FROM temps");
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Loop through the fetched data and populate the arrays
    foreach ($result as $row) {
        $temperatureData[] = $row['temp'];
        $humidityData[] = $row['humidity'];
        $waterData[] = $row['water'];
        $fireData[] = $row['fire'];
    }

    // Fetch data from the database to determine the number of data points
    $stmt = $dbh->prepare("SELECT COUNT(*) AS count FROM temps");
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $numDataPoints = $result['count'];

    // Generate time labels dynamically based on the number of data points
    $labels = range(1, $numDataPoints);
} catch (PDOException $e) {
    // Handle database connection errors
    die("Connection failed: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>TEMPERATURE AND HUMIDITY MONITORING</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
</head>
<style>
    .graph-container {
        width: 100%;
        max-width: 800px;
        margin-top: 20px;
    }

    .graph {
        height: 400px;
        margin-bottom: 20px;
    }

    .graph-scrollable {
    width: 100%;
    overflow-x: auto;
}

.graph-container {
    width: 100%;
    max-width: 800px;
    margin-top: 20px;
}

.graph {
    height: 400px;
    margin-bottom: 20px;
}

</style>
<body>
<div class="container">
    <h1 class="text-center mt-5">ENVIRONMENT MONITORING</h1>
    <div class="row">
        <div class="col-md-6">
            <div class="graph-container">
                <div class="graph-scrollable">
                    <canvas id="temperatureChart" class="graph"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="graph-container">
                <div class="graph-scrollable">
                    <canvas id="humidityChart" class="graph"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="graph-container">
                <div class="graph-scrollable">
                    <canvas id="waterChart" class="graph"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="graph-container">
                <div class="graph-scrollable">
                    <canvas id="fireChart" class="graph"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>



    <script>
        var temperatureData = <?php echo json_encode($temperatureData); ?>;
        var humidityData = <?php echo json_encode($humidityData); ?>;
        var waterData = <?php echo json_encode($waterData); ?>;
        var fireData = <?php echo json_encode($fireData); ?>;
        var labels = <?php echo json_encode($labels); ?>; // Dynamic time labels

        var temperatureCtx = document.getElementById('temperatureChart').getContext('2d');
        var temperatureChart = new Chart(temperatureCtx, {
            type: 'line',
            data: {
                labels: labels, // Use dynamic time labels
                datasets: [{
                    label: 'Temperature (°C)',
                    data: temperatureData,
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        scaleLabel: {
                            display: true,
                            labelString: 'Temperature (°C)'
                        },
                        ticks: {
                            beginAtZero: true,
                            suggestedMax: 50 // Set the maximum value for y-axis
                        }
                    }],
                    xAxes: [{
                        scaleLabel: {
                            display: true,
                            labelString: 'Time (seconds)'
                        }
                    }]
                }
            }
        });

        var humidityCtx = document.getElementById('humidityChart').getContext('2d');
        var humidityChart = new Chart(humidityCtx, {
            type: 'line',
            data: {
                labels: labels, // Use dynamic time labels
                datasets: [{
                    label: 'Humidity (%)',
                    data: humidityData,
                    backgroundColor: 'rgba(255, 206, 86, 0.2)',
                    borderColor: 'rgba(255, 206, 86, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        scaleLabel: {
                            display: true,
                            labelString: 'Humidity (%)'
                        },
                        ticks: {
                            beginAtZero: true,
                            suggestedMax: 100 // Set the maximum value for y-axis
                        }
                    }],
                    xAxes: [{
                        scaleLabel: {
                            display: true,
                            labelString: 'Time (seconds)'
                        }
                    }]
                }
            }
        });

    var waterCtx = document.getElementById('waterChart').getContext('2d');
        var waterChart = new Chart(waterCtx, {
            type: 'line',
            data: {
                labels: labels, // Use dynamic time labels
                datasets: [{
                    label: 'Water Sensor',
                    data: waterData,
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        scaleLabel: {
                            display: true,
                            labelString: 'Water'
                        },
                        ticks: {
                            beginAtZero: true,
                            suggestedMax: 100 // Set the maximum value for y-axis
                        }
                    }],
                    xAxes: [{
                        scaleLabel: {
                            display: true,
                            labelString: 'Time (seconds)'
                        }
                    }]
                }
            }
        });

    var fireCtx = document.getElementById('fireChart').getContext('2d');
        var fireChart = new Chart(fireCtx, {
            type: 'line',
            data: {
                labels: labels, // Use dynamic time labels
                datasets: [{
                    label: 'Flame Sensor',
                    data: fireData,
                    backgroundColor: 'rgba(255, 159, 64, 0.2)',
                    borderColor: 'rgba(255, 159, 64, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        scaleLabel: {
                            display: true,
                            labelString: 'Fire'
                        },
                        ticks: {
                            beginAtZero: true,
                            suggestedMax: 100 // Set the maximum value for y-axis
                        }
                    }],
                    xAxes: [{
                        scaleLabel: {
                            display: true,
                            labelString: 'Time (seconds)'
                        }
                    }]
                }
            }
        });
    </script>

    <script>
        // Function to reload the page every 5 seconds
        setInterval(function() {
            location.reload();
        }, 5000);
    </script>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>
