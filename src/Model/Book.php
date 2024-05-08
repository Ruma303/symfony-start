<?php

namespace App\Model;

class Book
{
    public function __construct(
        private int $id,
        private string $title,
        private string $author
    ) {
        $this->id = $id;
        $this->title = $title;
        $this->author = $author;
    }
    public function getId() : int
    {
        return $this->id;
    }

    public function setId($id) : int
    {
        return $this->id = $id;
    }
    public function getTitle() : string
    {
        return $this->title;
    }
    public function setTitle($title) : string
    {
        return $this->title = $title;
    }
    public function getAuthor() : string
    {
        return $this->author;
    }
    public function setAuthor($author) : string
    {
        return $this->author = $author;
    }
}