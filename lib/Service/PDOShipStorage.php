<?php

class PDOShipStorage{
  private $pdo;
  
  public function __construct($pdo) {
    $this->pdo = $pdo;
  }
  
  public function fetchAllShipsData() {
    $statement = $this->pdo->prepare('SELECT * FROM ship');
    $statement->execute();
    
    return $statement->fetchAll(PDO::FETCH_ASSOC);   
  }
  
  public function fetchSingleShipData($id) {
    $statement = $this->getPDO()->prepare('SELECT * FROM ship WHERE id = :id');
    $statement->execute(array('id' => $id));
    $shipArray = $statement->fetch(PDO::FETCH_ASSOC);
    if (!$shipArray) {
      return null;
    }
    return $shipArray;  
  }
}

