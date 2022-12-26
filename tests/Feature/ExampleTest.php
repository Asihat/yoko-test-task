<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Services\JsonHandler\FirstJsonHandler;
use App\Services\JsonHandler\SecondJsonHandler;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_the_application_returns_a_successful_response()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function testBasicTest()
    {
        try {
            $firstJsonHandler = new FirstJsonHandler();
            $secondJsonHandler = new SecondJsonHandler();
            $firstJson = $this->readJsonFile('first_response.json');
            $secondJson = $this->readJsonFile('second_response.json');

            $first = $firstJsonHandler->toBookJson($firstJson);
            $second = $secondJsonHandler->toBookJson($secondJson);

            $data = array_merge($first, $second);
            $this->assertTrue(true);
        } catch (\Exception $e) {
            $this->assertNotTrue(true);
         }
    }

    public function test_empty_files() {
        try {
            $firstJsonHandler = new FirstJsonHandler();
            $secondJsonHandler = new SecondJsonHandler();
            $firstJson = $this->readJsonFile('first_empty_response.json');
            $secondJson = $this->readJsonFile('second_empty_response.json');

            $first = $firstJsonHandler->toBookJson($firstJson);
            $second = $secondJsonHandler->toBookJson($secondJson);

            $data = array_merge($first, $second);
            $this->assertTrue(true);
        } catch (\Exception $e) {
            $this->assertNotTrue(true);
        }
    }

    private function readJsonFile($filename): mixed
    {
        $path = public_path("data") . "/$filename";
        return json_decode(file_get_contents($path), true);
    }
}
