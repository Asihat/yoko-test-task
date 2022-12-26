<?php

namespace App\Services\JsonHandler;

class Book
{
    public $name;
    public $description;
    public $author;
    public $created_at;
    function __construct($name, $description, $author, $created_at) {
        $this->name = $name;
        $this->description = $description;
        $this->author = $author;
        $this->created_at = $created_at;
    }
}
