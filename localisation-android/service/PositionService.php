<?php

include_once __DIR__ . '/../dao/IDao.php';
include_once __DIR__ . '/../classe/Position.php';
include_once __DIR__ . '/../connexion/Connexion.php';

class PositionService implements IDao {

    private $connexion;

    public function __construct() {

        $this->connexion = new Connexion();
    }

    // INSERT
    public function create($position) {

        $sql = "INSERT INTO `position`(latitude, longitude, date, imei)
                VALUES (?, ?, ?, ?)";

        $stmt = $this->connexion
                     ->getConnextion()
                     ->prepare($sql);

        $stmt->execute([
            $position->getLatitude(),
            $position->getLongitude(),
            $position->getDate(),
            $position->getImei()
        ]);

        return true;
    }

    // SELECT *
    public function getAll() {

        $query = "SELECT * FROM position";

        $req = $this->connexion
                    ->getConnextion()
                    ->prepare($query);

        $req->execute();

        return $req->fetchAll(PDO::FETCH_ASSOC);
    }

    // Non utilisés dans ce TP

    public function update($obj) {

    }

    public function delete($obj) {

    }

    public function getById($obj) {

    }
}