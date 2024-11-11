<?php
// biblioteca/Application/LibraryApplication.php

namespace Application;

use Domain\Entities\Book;
use Domain\Entities\User;
use Domain\Entities\Loan;
use Domain\Repositories\BookRepository;
use Domain\Repositories\UserRepository;
use Domain\Services\LoanService;

class LibraryApplication
{
    private LoanService $loanService;

    public function __construct(LoanService $loanService)
    {
        $this->loanService = $loanService;
    }

    public function borrowBook(User $user, Book $book): bool
    {
        return $this->loanService->borrow($user, $book);
    }

    public function returnBook(Loan $loan): void
    {
        $this->loanService->returnBook($loan);
    }
}
