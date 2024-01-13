<?php

require_once __DIR__.'/../../Database.php';

class Repository {
    public $database;

    public function __construct()
    {
        $this->database = new Database();
    }
}
