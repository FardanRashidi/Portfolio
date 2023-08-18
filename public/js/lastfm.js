async function fetchTopTracks(username, period = 'overall', limit = 10) {
    const apiKey = "017a47e13e97a50f04dd755b028d823b";

    const url = `http://ws.audioscrobbler.com/2.0/?method=user.gettoptracks&user=${username}&period=${period}&limit=${limit}&api_key=${apiKey}&format=json`;

    const response = await fetch(url);
    const data = await response.json();

    return data.toptracks.track.map(track => track.name);
}


async function fetchWeeklyTrackChart(username, from, to) {
    const apiKey =  "017a47e13e97a50f04dd755b028d823b"; 

    const startDate = new Date(from * 1000);
    const endDate = new Date(to * 1000);
    const numberOfWeeks = Math.ceil((endDate - startDate) / (7 * 24 * 60 * 60 * 1000));

    const trackChartData = [];

    for (let i = 0; i < numberOfWeeks; i++) {
        const weekStart = Math.floor(startDate / 1000) + (i * 7 * 24 * 60 * 60);
        const weekEnd = weekStart + (7 * 24 * 60 * 60);

        const url = `http://ws.audioscrobbler.com/2.0/?method=user.getweeklytrackchart&user=${username}&from=${weekStart}&to=${weekEnd}&api_key=${apiKey}&format=json`;

        const response = await fetch(url);
        const data = await response.json();

        trackChartData.push(data);
    }

    return trackChartData;
}

document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('lastfm-form');
    const loadingIndicator = document.getElementById('loading-indicator');
    const trackList = document.getElementById('track-list');
    const chartContainer = document.getElementById('chart-container');

    form.addEventListener('submit', async (e) => {
        e.preventDefault();
    
        const username = document.getElementById('username').value;
        const from = Date.parse('2023-01-01') / 1000;
        const to = Date.parse('2023-07-31') / 1000;
        const limit = 5; // Set your desired limit here
    
        loadingIndicator.style.display = 'block';
    
        try {
            const topTracks = await fetchTopTracks(username, 'overall', limit); // Pass the limit parameter
            console.log('Top Tracks:', topTracks);
    
            const chartData = await fetchWeeklyTrackChart(username, from, to);
            console.log(JSON.stringify(chartData, null, 2));
    
            const filteredTracks = chartData.map(weekData => {
                const filteredTracks = weekData.weeklytrackchart.track.filter(track => topTracks.includes(track.name));
                return { ...weekData, weeklytrackchart: { track: filteredTracks } };
            });

             // Create an array of labels (weeks) and datasets for each track
             const labels = filteredTracks.map((_, index) => `Week ${index + 1}`);
             const datasets = filteredTracks[0].weeklytrackchart.track.map(track => {
                 return {
                     label: track.name,
                     data: filteredTracks.map(weekData => {
                         const foundTrack = weekData.weeklytrackchart.track.find(t => t.name === track.name);
                         return foundTrack ? parseInt(foundTrack.playcount) : 0;
                     }),
                     fill: false,
                     borderColor: getRandomColor(),
                     borderWidth: 2,
                 };
             });
 
             // Create the Chart.js line chart
             new Chart(chartContainer, {
                 type: 'line',
                 data: {
                     labels: labels,
                     datasets: datasets,
                 },
                 options: {
                    scales: {
                        x: {
                            type: 'linear',
                            position: 'bottom',
                            title: {
                                display: true,
                                text: 'Week',
                            },
                        },
                        y: {
                            title: {
                                display: true,
                                text: 'Play Count',
                            },
                        },
                    },
                },
            });

            // Display the filtered data list
            const trackDataHtml = filteredTracks.map((weekData, index) => {
                const tracks = weekData.weeklytrackchart.track.map(track => {
                    return `<p>Week ${index + 1}: ${track.name} - Plays: ${track.playcount}</p>`;
                });
                return tracks.join('');
            }).join('');

            trackList.innerHTML = trackDataHtml;
            trackList.style.display = 'block';

        } catch (error) {
            console.error(error);
        } finally {
            loadingIndicator.style.display = 'none';
        }
    });
});

function getRandomColor() {
    const letters = '0123456789ABCDEF';
    let color = '#';
    for (let i = 0; i < 6; i++) {
        color += letters[Math.floor(Math.random() * 16)];
    }
    return color;
}
