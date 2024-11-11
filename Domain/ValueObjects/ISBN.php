<?PHP
// biblioteca/Domain/ValueObjects/ISBN.php

namespace ValueObjects;

class ISBN {
    private string $isbn;

    public function __construct(string $isbn){
        if(!$this->isValidISBN($isbn)){
            throw new \InvalidArgumentException("Invalid ISBN.");
        }
        $this->isbn = $isbn;
    }

    private function isValidISBN(string $isbn): bool
    {
        return true;
    }

    public function __toString(): string
    {
        return $this->isbn;
    }
}

?>