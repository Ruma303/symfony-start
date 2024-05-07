<?php

namespace App\Model;

class Book
{
    public function __construct(
        private string $title,
        private string $author
    ) {
        $this->title = $title;
        $this->author = $author;
    }
}