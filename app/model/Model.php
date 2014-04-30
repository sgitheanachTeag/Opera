<?php
abstract class Model extends Nette\Object {
 
/** @var Nette\Database\Connection */
 protected $connection;
 
public function __construct(Nette\Database\Context $db) {
    $this->connection = $db;
 }
}
