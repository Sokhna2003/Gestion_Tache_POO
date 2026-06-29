<?php
require_once ROOT . "bd/Database.php";

class DashboardRepository {
    private $db;

    public function __construct() {
        // On récupère l'instance unique de la base de données
        $this->db = Database::getInstance();
    }

    // Compter les taches en cours
    public function countEnCours(): int {
        $sql = "SELECT COUNT(*) as total FROM taches WHERE statut = 'En cours'";
        return (int)$this->db->executeSelect($sql, [], true)["total"];
    }

    // Compter les taches terminées
    public function countTerminees(): int {
        $sql = "SELECT COUNT(*) as total FROM taches WHERE statut = 'Terminee'";
        return (int)$this->db->executeSelect($sql, [], true)["total"];
    }

    // Récupérer les 3 dernières taches
    public function findLast3(): array {
        $sql = "SELECT * FROM taches ORDER BY created_at DESC LIMIT 3";
        return $this->db->executeSelect($sql);
    }
}

