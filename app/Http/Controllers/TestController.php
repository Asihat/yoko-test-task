<?php

namespace App\Http\Controllers;

use App\Services\JsonHandler\FirstJsonHandler;
use App\Services\JsonHandler\SecondJsonHandler;

class TestController extends Controller
{
    /**
     * @param FirstJsonHandler $firstJsonHandler
     * @param SecondJsonHandler $secondJsonHandler
     * @return bool|string
     */
    public function test(FirstJsonHandler $firstJsonHandler, SecondJsonHandler $secondJsonHandler): bool|string
    {
        $firstJson = $this->readJsonFile('first_response.json');
        $secondJson = $this->readJsonFile('second_response.json');

        $first = $firstJsonHandler->toBookJson($firstJson);
        $second = $secondJsonHandler->toBookJson($secondJson);

        return json_encode([
            'data' => array_merge($first, $second)
        ]);
    }

    private function readJsonFile($filename): mixed
    {
        $path = public_path("data") . "/$filename";
        return json_decode(file_get_contents($path), true);
    }
}
