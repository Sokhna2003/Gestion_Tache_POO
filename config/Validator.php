<?php

class Validator {
    private $errors = [];

    
    public function isEmpty(string $key, $value, string $msg = "Ce champ est obligatoire"): self {
        if (empty($value) || trim((string)$value) === "") {
            $this->errors[$key] = $msg;
        }
        return $this; 
    }

    // Vérifier la logique des dates (Date fin doit être après Date début)
    public function validateDates(string $startKey, $startDate, string $endKey, $endDate, string $msg = "La date de fin doit être ultérieure à la date de début"): self {
        // On ne valide que si les deux dates sont renseignées et qu'il n'y a pas déjà d'erreur dessus
        if (!isset($this->errors[$startKey]) && !isset($this->errors[$endKey])) {
            if (!empty($startDate) && !empty($endDate)) {
                if (strtotime($endDate) < strtotime($startDate)) {
                    $this->errors[$endKey] = $msg;
                }
            }
        }
        return $this;
    }

    // Récupérer le tableau complet des erreurs
    public function getErrors(): array {
        return $this->errors;
    }

    // Renvoyer vrai s'il n'y a aucune erreur détectée
    public function isValid(): bool {
        return count($this->errors) === 0;
    }
}
