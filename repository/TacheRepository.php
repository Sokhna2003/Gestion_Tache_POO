<?php
require_once ROOT . "bd/Database.php";

class TacheRepository {
    private $db;

    public function __construct() {
        // On récupère l'instance unique de la base de données
        $this->db = Database::getInstance();
    }

    public function findAll(): array {
        $sql = "SELECT * FROM taches ORDER BY created_at DESC";
        return $this->db->executeSelect($sql);
    }

    public function findById(int $id): array {
        $sql = "SELECT * FROM taches WHERE id_tache = :id";
        return $this->db->executeSelect($sql, ["id" => $id], true);
    }

    public function save(array $tache): int {
        $sql = "INSERT INTO taches(libelle, date_debut, date_fin, description, statut) 
                VALUES(:libelle, :date_debut, :date_fin, :description, :statut)";
        return $this->db->executeUpdate($sql, $tache);
    }

    public function delete(int $id): int {
        $sql = "DELETE FROM taches WHERE id_tache = :id";
        return $this->db->executeUpdate($sql, ["id" => $id]);
    }

    public function markAsCompleted(int $id): int {
        $sql = "UPDATE taches SET statut = 'Terminee' WHERE id_tache = :id";
        return $this->db->executeUpdate($sql, ["id" => $id]);
    }

    public function countAll(): int {
        $sql = "SELECT COUNT(*) as total FROM taches";
        return (int)$this->db->executeSelect($sql, [], true)["total"];
    }

   
}
