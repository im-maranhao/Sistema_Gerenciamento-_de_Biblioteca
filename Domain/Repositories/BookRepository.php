<?php
// biblioteca/Domain/Repositories/BookRepository.php

namespace Domain\Repositories;

use Domain\Entities\Book;

interface BookRepository extends RepositoryInterface
{
    public function findByISBN(string $isbn): ?Book;
}
    