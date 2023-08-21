document.addEventListener('DOMContentLoaded', () => {
    const jokeContent = document.getElementById('joke-content');
    const getJokeButton = document.getElementById('get-joke');

    getJokeButton.addEventListener('click', async () => {
        const response = await fetch('http://localhost/joke_app/php/api/v1/random_joke.php');
        const data = await response.json();

        jokeContent.textContent = data.content;
    });
});
