const fetch = require('node-fetch'); // This assumes you have the 'node-fetch' package installed

describe('Joke Generator App', () => {
    it('should connect to the endpoint', async () => {
        const response = await fetch('../api/v1/random_joke.php');
        expect(response.ok).toBe(true);
    });

    it('should fetch a joke', async () => {
        const response = await fetch('../api/v1/random_joke.php');
        const data = await response.json();
        expect(data).toBeDefined();
        expect(data.content).toBeTruthy();
    });

    it('should handle endpoint down', async () => {
        try {
            const response = await fetch('../api/v1/missing_endpoint.php');
            expect(response.ok).toBe(false);
        } catch (error) {
            expect(error).toBeDefined();
        }
    });

    it('should handle unexpected API response', async () => {
        const response = await fetch('../api/v1/random_joke.php');
        const data = await response.json();
        expect(data).toBeDefined();
        expect(data.content).toBeTruthy();
        expect(data.nonExistentField).toBeUndefined();
    });
});
