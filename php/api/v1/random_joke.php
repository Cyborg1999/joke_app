#!/usr/bin/env php 8

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

require_once "../../config/connection.php";
// Try moving this file to a retrieve file 


// Fetch a random joke from the database
$query = 'SELECT * FROM jokes ORDER BY RAND() LIMIT 1';
$stmt = $pdo->query($query);
$joke = $stmt->fetch(PDO::FETCH_ASSOC);

// Create the response data
$responseData = [
    'id' => $joke['id'],
    'content' => $joke['content'],
    'category' => $joke['category'],
    'author' => $joke['author'],
    'timestamp' => $joke['timestamp'],
];

// Set the response content type to JSON
header('Content-Type: application/json');

// Send the JSON response
echo json_encode($responseData);

