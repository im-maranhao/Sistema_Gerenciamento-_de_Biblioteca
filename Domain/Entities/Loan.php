<?php
// biblioteca/Domain/Entities/Loan.php

namespace Domain\Entities;

class Loan
{
    private Book $book;
    private User $user;
    private \DateTime $borrowDate;
    private ?\DateTime $returnDate = null;

    public function __construct(Book $book, User $user)
    {
        $this->book = $book;
        $this->user = $user;
        $this->borrowDate = new \DateTime();
    }

    public function returnBook(): void
    {
        $this->returnDate = new \DateTime();
        $this->book->returnBook();
    }

    public function getBook(): Book
    {
        return $this->book;
    }
}

?>