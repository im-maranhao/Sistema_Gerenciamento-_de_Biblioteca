<?php
// biblioteca/Domain/Entities/Book.php

namespace Domain\Entities;

use ValueObjects\ISBN;

class Book {
    private string $title;
    private string $author;
    private ISBN $isbn;
    private bool $isVailable;

    public function __construct(string $title, string $author, ISBN $isbn){
        
        $this->title = $title;
        $this->author = $author;
        $this->isbn  = $isbn;
        $this->isAvailable = true;
        
    }
}