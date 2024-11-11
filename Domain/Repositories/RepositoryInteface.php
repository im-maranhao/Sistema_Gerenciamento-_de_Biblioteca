<?php
// biblioteca/Domain/Repositories/RepositoryInterface.php

namespace Domain\Repositories;

interface RepositoryInterface
{
    public function save($entity): void;
    public function find($id);
    public function findAll(): array;
    public function delete($id): void;
}
