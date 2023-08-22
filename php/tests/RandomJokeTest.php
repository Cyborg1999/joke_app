#!/usr/bin/env php 8 
<?php
/**
 * Test file
 * PHP version * ^7
 * 
 * @category Test
 *  
 * @package Null
 * 
 * @author "Andrew Tonui <Cyborg1999.github.com>"
 *  
 * @license * Null
 *   
 * @link * Null
 */
use PHPUnit\Framework\TestCase;

/**
 * DbConnection Class file in the project
 * PHP version: *^8
 * 
 * @category Class
 *  
 * @package Null
 * 
 * @author "Andrew Tonui <Cyborg1999.github.com>"
 *  
 * @license * Null
 *   
 * @link localhost
 */

class RandomJokeTest extends TestCase
{
    /**
     * Function testEndpointConnection()
     * 
     * @var    this this 
     * @return String response
     */  
    public function testEndpointConnection()
    {
        $response = file_get_contents('/api/v1/random_joke.php');
        $this->assertNotFalse($response);
    }

    /**
     * Function testFetchOperation()
     * 
     * @var    data fetched data from API
     * @var    repsonse API call
     * @var    this this 
     * @return String response
     */ 
    public function testFetchOperation()
    {
        $response = file_get_contents('../api/v1/random_joke.php');
        $data = json_decode($response, true);
        $this->assertNotNull($data);
        $this->assertArrayHasKey('content', $data);
        $this->assertNotEmpty($data['content']);
    }

    /**
     * Function testEndpointDown()
     * 
     * @var    respose API call
     * @var    this this 
     * @return String response
     */ 
    public function testEndpointDown()
    {
        $this->expectException(\Exception::class);
        $response = file_get_contents('../api/v1/missing_endpoint.php');
    }

    /**
     * Function testUnexpectedResponse()
     * 
     * @var    data fetched data from API
     * @var    repsonse API call
     * @var    this this 
     * @return String response
     */ 
    public function testUnexpectedResponse()
    {
        $response = file_get_contents('../api/v1/random_joke.php');
        $data = json_decode($response, true);
        $this->assertNotNull($data);
        $this->assertArrayHasKey('content', $data);
        $this->assertNotEmpty($data['content']);
        $this->assertArrayNotHasKey('nonExistentField', $data);
    }
}
