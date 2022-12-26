<?php

namespace App\Services\JsonHandler;

class FirstJsonHandler implements JsonHandler
{

    public function toBookJson($json)
    {
        $list = [];
        if (!empty($json)) {
            foreach ($json['data'] as $value) {
                $list[] = new Book($value['name'], $value['description'], null, $value['createdAt']);
            }
        }
        return $list;
    }
}
