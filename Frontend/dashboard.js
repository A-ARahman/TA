document.addEventListener('DOMContentLoaded', function() {
    const rankingContainer = document.getElementById('ranking-container');

    fetch('http://localhost:3000/dashboard_metrics')
    .then(response => response.json())
    .then(data => {
        // Initialize the table with headers
        let tableHTML = `<table class="min-w-full divide-y divide-blue-600">
                            <thead class="bg-gray-700">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                        Rank
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                        User ID
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                        Name
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                        Power
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                        Load
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                        Speed
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-gray-600 divide-y divide-blue-600">`;

        // Map each ranking into a table row
        tableHTML += data.rankings.map(rank => `
            <tr>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-white">${rank.rank}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-white">${rank.userId}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-white">${rank.name}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-white">${rank.power}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-white">${rank.load}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-white">${rank.speed}</td>
            </tr>
        `).join('');

        // Close the table tags
        tableHTML += `</tbody></table>`;

        // Set the innerHTML of the container
        rankingContainer.innerHTML = tableHTML;
    })
    .catch(error => {
        console.error('Error loading rankings:', error);
        rankingContainer.innerHTML = '<div class="text-red-500">Error loading data</div>';
    });
});
