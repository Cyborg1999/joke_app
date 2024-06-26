document.addEventListener('DOMContentLoaded', () => {
    const getJokeButton = document.getElementById('get-joke');
    const jokeContent = document.getElementById('joke-content');
    
    getJokeButton.addEventListener('click', () => {
        fetch('../index.php')
            .then(response => response.json())
            .then(data => {
                jokeContent.textContent = data.content;
            })
            .catch(error => {
                console.error('Error fetching joke:', error);
                jokeContent.textContent = 'An error occurred while fetching the joke.';
                console.log(error)
            });
    });
});
