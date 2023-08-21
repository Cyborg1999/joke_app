<?php
/**
 * API file to call random jokes
 * PHP version * ^7
 * 
 * @category API
 * 
 * @package Null
 * 
 * @author "Andrew Tonui <Cyborg1999.github.com>"
 * 
 * @license * Null
 * 
 * @link * Null
 */

require_once "../../Autoload.php";
// Try moving this file to a retrieve file 

// if ($_SERVER['REQUEST_METHOD'] === 'GET' && $_SERVER['REQUEST_URI'] === '/api/random-joke') {
//     // Your endpoint logic here
// }
// Fetch a random joke from the database
$query = 'SELECT * FROM jokes ORDER BY RAND() LIMIT 1';
$stmt = $pdo->query($query);
$joke = $stmt->fetch(PDO::FETCH_ASSOC);

// Fetch a random joke from the database
$randomIndex = array_rand($jokes);
$randomJoke = $jokes[$randomIndex];

// Create the response data
$responseData = [
    'id' => $randomJoke['id'],
    'content' => $randomJoke['content'],
    'category' => $randomJoke['category'],
    'author' => $randomJoke['author'],
];

// Set the response content type to JSON
header('Content-Type: application/json');

// Send the JSON response
echo json_encode($responseData);
