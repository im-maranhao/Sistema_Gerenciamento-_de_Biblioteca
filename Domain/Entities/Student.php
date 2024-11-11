<?php
// biblioteca/Domain/Entities/Student.php

namespace Domain\Entities;

class Student extends User
{
    public function getLoanLimit(): int
    {
        return 3;
    }
}

namespace Domain\Entities;

class Teacher extends User
{
    public function getLoanLimit(): int
    {
        return 5; // Professores podem pegar 5 livros
    }
}

?>