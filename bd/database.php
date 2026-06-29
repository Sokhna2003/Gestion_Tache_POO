<?php

class Database {
    private static $instance = null;
    private $pdo;

    // Le constructeur est privé pour empêcher l'instanciation directe (Singleton)
    private function __construct() {
        try {
            $this->pdo = new PDO(
                'mysql:host=localhost;dbname=gestion_taches;charset=utf8', 
                'root', 
                '',
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                ]
            );
        } catch (PDOException $e) {
            die('Erreur de connexion : ' . $e->getMessage());
        }
    }

    // Récupérer l'instance unique de la connexion
    public static function getInstance(): self {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function executeSelect(string $sql, array $data = [], bool $one = false): array {
        $statement = $this->pdo->prepare($sql);
        $statement->execute($data);
        
        if ($one) {
            $result = $statement->fetch();
            return $result ? $result : [];
        }
        
        return $statement->fetchAll();
    }

    public function executeUpdate(string $sql, array $data): int {
        $statement = $this->pdo->prepare($sql);
        $statement->execute($data);
        return $statement->rowCount();
    }
}
