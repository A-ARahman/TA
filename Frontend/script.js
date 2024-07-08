document.addEventListener('DOMContentLoaded', function() {
    const setActiveUserButton = document.getElementById('set-active-user');
    const userSelect = document.getElementById('user-select');
    const feedbackElement = document.getElementById('feedback');
    const metricsContainer = document.getElementById('metrics-container');

    let powerChart, loadChart, speedChart;

    if (userSelect.value) {
        fetchMetrics(userSelect.value);
    }

    setActiveUserButton.addEventListener('click', function() {
        const selectedUserId = userSelect.value;
        if (!selectedUserId) {
            feedbackElement.textContent = 'Please select a user.';
            feedbackElement.classList.add('text-red-500');
            feedbackElement.classList.remove('text-green-500');
            return;
        }

        fetch(`http://localhost:3000/set_active_user`, {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ userId: selectedUserId }),
            credentials: 'include'
        })
        .then(response => {
            if (!response.ok) {
                throw new Error(`Server responded with a status: ${response.status}`);
            }
            return response.json();
        })
        .then(data => {
            feedbackElement.textContent = 'Active user set successfully: ' + data.message;
            feedbackElement.classList.add('text-green-500');
            feedbackElement.classList.remove('text-red-500');
            fetchMetrics(selectedUserId);  // Fetch metrics after setting the active user
        })
        .catch(error => {
            console.error('Failed to set active user:', error);
            feedbackElement.textContent = `Failed to set active user: ${error.message}`;
            feedbackElement.classList.add('text-red-500');
            feedbackElement.classList.remove('text-green-500');
        });
    });

    function fetchMetrics(userId) {
        fetch(`http://localhost:3000/metrics?userId=${userId}`)
        .then(response => {
            if (!response.ok) throw new Error('Failed to fetch metrics');
            return response.json();
        })
        .then(data => {
            // Assuming data.lastTwenty is received latest first
            updateMetricsSection(data);
            setupCharts(data.lastTwenty.reverse());
        })
        .catch(error => {
            metricsContainer.innerHTML = `<p class="text-red-500">Error: ${error.message}</p>`;
        });
    }

    function updateMetricsSection(metrics) {
        const { latest, highest, averages } = metrics;
        metricsContainer.innerHTML = `
            <div class="grid grid-cols-3 gap-2 text-white">
                <div class="p-4 bg-blue-800 rounded">
                    <h3 class="text-lg font-semibold">Latest Values</h3>
                    <p>Power: ${latest.power}</p>
                    <p>Load: ${latest.highest_load}</p>
                    <p>Speed: ${latest.highest_speed}</p>
                </div>
                <div class="p-4 bg-blue-800 rounded">
                    <h3 class="text-lg font-semibold">Highest Values</h3>
                    <p>Power: ${highest.max_power}</p>
                    <p>Load: ${highest.max_load}</p>
                    <p>Speed: ${highest.max_speed}</p>
                </div>
                <div class="p-4 bg-blue-800 rounded">
                    <h3 class="text-lg font-semibold">Average Values</h3>
                    <p>Power: ${averages.avg_power}</p>
                    <p>Load: ${averages.avg_load}</p>
                    <p>Speed: ${averages.avg_speed}</p>
                </div>
                <div class="col-span-3 bg-gray-700 p-4 rounded">
                    <canvas id="powerChart"></canvas>
                    <canvas id="loadChart"></canvas>
                    <canvas id="speedChart"></canvas>
                </div>
            </div>
        `;
    }

    function setupCharts(lastTwenty) {
        const options = {
            scales: {
                x: {
                    grid: {
                        color: 'black'
                    },
                    ticks: {
                        color: 'white'
                    }
                },
                y: {
                    grid: {
                        color: 'black'
                    },
                    ticks: {
                        color: 'white'
                    }
                }
            },
            plugins: {
                legend: {
                    labels: {
                        color: 'white'
                    }
                }
            }
        };
    
        var ctxPower = document.getElementById('powerChart').getContext('2d');
        var ctxLoad = document.getElementById('loadChart').getContext('2d');
        var ctxSpeed = document.getElementById('speedChart').getContext('2d');
        powerChart = new Chart(ctxPower, { type: 'line', data: getChartData(lastTwenty, 'power'), options: options });
        loadChart = new Chart(ctxLoad, { type: 'line', data: getChartData(lastTwenty, 'highest_load'), options: options });
        speedChart = new Chart(ctxSpeed, { type: 'line', data: getChartData(lastTwenty, 'highest_speed'), options: options });
    }

    function getChartData(lastTwenty, metric) {
        return {
            labels: lastTwenty.map((_, index) => index + 1),
            datasets: [{
                label: `${metric.charAt(0).toUpperCase() + metric.slice(1)}`,
                data: lastTwenty.map(entry => entry[metric]),
                backgroundColor: 'rgba(1, 100, 255, 0.5)',
                borderColor: 'rgba(1, 100, 255, 1)',
                borderWidth: 1
            }]
        };
    }

    
    setInterval(() => {
        const selectedUserId = userSelect.value;
        if (selectedUserId) {
            fetchMetrics(selectedUserId);
        }
    }, 2500);
});
