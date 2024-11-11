<?php
// biblioteca/Domain/Entities/Book.php

namespace Domain\Entities;

use ValueObjects\ISBN;

class Book {
    private string $title;
    private string $author;
    private ISBN $isbn;
    private bool $isAvailable;

    public function __construct(string $title, string $author, ISBN $isbn){
        
        $this->title = $title;
        $this->author = $author;
        $this->isbn  = $isbn;
        $this->isAvailable = true;
        
    }

    public function borrow(): bool{
        if($this->isAvailable){
            $this->isAvailable = false;
            return true;
        }
    }

    
    public function returnBook(): void
    {
        $this->isAvailable = true;
    }

    public function getTitle(): string
    {
        return $this->title;
    }
    
    public function isAvailable(): bool
    {
        return $this->isAvailable;
    }
}