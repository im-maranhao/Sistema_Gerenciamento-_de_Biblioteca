<?php
// biblioteca/Infrastructure/Repositories/BookRepositorySQLite.php

namespace Infrastructure\Repositories;

use Domain\Repositories\BookRepository;
use Domain\Entities\Book;
use PDO;

class BookRepositorySQLite implements BookRepository
{
    private PDO $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    public function save(Book $book): void
    {
        $stmt = $this->db->prepare("INSERT INTO books (title, author, isbn) VALUES (?, ?, ?)");
        $stmt->execute([$book->getTitle(), $book->getAuthor(), $book->getISBN()]);
    }

    public function findByISBN(string $isbn): ?Book
    {
        $stmt = $this->db->prepare("SELECT * FROM books WHERE isbn = ?");
        $stmt->execute([$isbn]);
        $data = $stmt->fetch();
        return $data ? new Book($data['title'], $data['author'], new ISBN($data['isbn'])) : null;
    }
}
