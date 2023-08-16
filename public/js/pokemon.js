// Pokemon Data Extraction

document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('pokemon-form');
    const responseContainer = document.getElementById('response-container');
    const spriteContainer = document.getElementById('sprite-container');

    form.addEventListener('submit', async function (e) {
        e.preventDefault();

        const nameInput = document.getElementById('name');
        const pokemonName = nameInput.value;

        responseContainer.innerHTML = '';
        spriteContainer.innerHTML = '';

        try {
            const response = await fetch(`https://pokeapi.co/api/v2/pokemon/${pokemonName}`);
            const data = await response.json();

            // Extract and organize stats
            const statLabels = data.stats.map(stat => stat.stat.name);
            const statValues = data.stats.map(stat => stat.base_stat);

            // Get the name from the JSON response
            const pokemonNameFromJson = data.name.charAt(0).toUpperCase() + data.name.slice(1);

            // Get the sprites from the JSON response
            const spriteUrls = Object.values(data.sprites).filter(sprite => typeof sprite === 'string' && sprite !== '');

            // Create a canvas for the chart
            const chartContainer = document.createElement('canvas');
            chartContainer.style.width = '80%'; // Adjust the width as needed
            chartContainer.style.height = '400px'; // Adjust the height as needed
            responseContainer.appendChild(chartContainer);

            // Create a radar chart
            new Chart(chartContainer, {
                type: 'radar',
                data: {
                    labels: statLabels,
                    datasets: [{
                        label: `${pokemonNameFromJson} Stats`,
                        data: statValues,
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 2,
                        pointBackgroundColor: 'rgba(75, 192, 192, 1)',
                        pointRadius: 4,
                        pointHoverRadius: 6
                    }]
                },
                options: {
                    scales: {
                        r: {
                            beginAtZero: true
                        }
                    }
                }
            });

            // Create <img> elements for each sprite
            spriteUrls.forEach(spriteUrl => {
                const spriteImg = document.createElement('img');
                spriteImg.src = spriteUrl;
                spriteImg.classList.add('pokemon-sprite'); // Apply the CSS class
                spriteContainer.appendChild(spriteImg);
            });
            
        } catch (error) {
            console.error('Error fetching data:', error);
        }
    });
});


// Random Pokemon Generator

const randomPokemonButton = document.getElementById('random-pokemon-button');

randomPokemonButton.addEventListener('click', async function () {
    const responseContainer = document.getElementById('response-container');
    const spriteContainer = document.getElementById('sprite-container');

    responseContainer.innerHTML = '';
    spriteContainer.innerHTML = '';

    try {
    
        const randomPokemonId = Math.floor(Math.random() * 1010) + 1;
        const response = await fetch(`https://pokeapi.co/api/v2/pokemon/${randomPokemonId}`);
        const data = await response.json();
        // Extract and organize stats
        const statLabels = data.stats.map(stat => stat.stat.name);
        const statValues = data.stats.map(stat => stat.base_stat);

        // Get the name from the JSON response
        const pokemonNameFromJson = data.name.charAt(0).toUpperCase() + data.name.slice(1);

        // Get the sprites from the JSON response
        const spriteUrls = Object.values(data.sprites).filter(sprite => typeof sprite === 'string' && sprite !== '');

        // Create a canvas for the chart
        const chartContainer = document.createElement('canvas');
        chartContainer.style.width = '80%'; // Adjust the width as needed
        chartContainer.style.height = '400px'; // Adjust the height as needed
        responseContainer.appendChild(chartContainer);

        // Create a radar chart
        new Chart(chartContainer, {
            type: 'radar',
            data: {
                labels: statLabels,
                datasets: [{
                    label: `${pokemonNameFromJson} Stats`,
                    data: statValues,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 2,
                    pointBackgroundColor: 'rgba(75, 192, 192, 1)',
                    pointRadius: 4,
                    pointHoverRadius: 6
                }]
            },
            options: {
                scales: {
                    r: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Create <img> elements for each sprite
        spriteUrls.forEach(spriteUrl => {
            const spriteImg = document.createElement('img');
            spriteImg.src = spriteUrl;
            spriteImg.classList.add('pokemon-sprite'); // Apply the CSS class
            spriteContainer.appendChild(spriteImg);
        });
        
    }  catch (error) {
        console.error('Error fetching data:', error);
    }
});

