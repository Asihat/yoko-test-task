<?php

namespace App\Services\JsonHandler;

class SecondJsonHandler implements JsonHandler
{

    public function toBookJson($json)
    {
        $list = [];
        if (!empty($json)) {
            foreach ($json as $value) {
                $list[] = new Book($value['title'], $value['desc'], $value['author'], null);
            }
        }
        return $list;
    }
}
