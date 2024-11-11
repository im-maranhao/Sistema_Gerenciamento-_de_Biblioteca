<?php
// biblioteca/Infrastructure/Repositories/BookRepositorySQLite.php

namespace Infrastructure\Repositories;

use Domain\Repositories\BookRepository;
use Domain\Entities\Book;
use Domain\ValueObjects\ISBN;
use PDO;

class BookRepositorySQLite implements BookRepository
{
    private PDO $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    public function save($book): void
    {
        $stmt = $this->db->prepare("INSERT INTO books (title, author, isbn, is_available) VALUES (:title, :author, :isbn, :isAvailable)");
        $stmt->bindValue(':title', $book->getTitle());
        $stmt->bindValue(':author', $book->getAuthor());
        $stmt->bindValue(':isbn', (string) $book->getISBN());
        $stmt->bindValue(':isAvailable', $book->isAvailable() ? 1 : 0);
        $stmt->execute();
    }

    public function find($id): ?Book
    {
        $stmt = $this->db->prepare("SELECT * FROM books WHERE id = :id");
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        $data = $stmt->fetch();

        return $data ? new Book($data['title'], $data['author'], new ISBN($data['isbn'])) : null;
    }

    public function findByISBN(string $isbn): ?Book
    {
        $stmt = $this->db->prepare("SELECT * FROM books WHERE isbn = :isbn");
        $stmt->bindValue(':isbn', $isbn);
        $stmt->execute();
        $data = $stmt->fetch();

        return $data ? new Book($data['title'], $data['author'], new ISBN($data['isbn'])) : null;
    }

    public function findAll(): array
    {
        $stmt = $this->db->query("SELECT * FROM books");
        $books = [];

        while ($data = $stmt->fetch()) {
            $books[] = new Book($data['title'], $data['author'], new ISBN($data['isbn']));
        }

        return $books;
    }

    public function delete($id): void
    {
        $stmt = $this->db->prepare("DELETE FROM books WHERE id = :id");
        $stmt->bindValue(':id', $id);
        $stmt->execute();
    }
}
