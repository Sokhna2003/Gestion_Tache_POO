<?php
require_once ROOT . "repository/TacheRepository.php";

class TacheController {
    private $tacheRepository;

    public function __construct() {
        $this->tacheRepository = new TacheRepository();
    }

    public function liste() {
        $taches = $this->tacheRepository->findAll();
        $total_taches = $this->tacheRepository->countAll();
        loadView("tache/liste", ["taches" => $taches, "total_taches" => $total_taches]);
    }

    public function ajout() {
        $errors = [];
        
        if (isset($_POST["ajout"])) {
            // Instanciation de l'objet Validator
            $validator = new Validator();

            // Exécution des règles de validation
            $validator->isEmpty("libelle", $_POST["libelle"], "Veuillez renseigner le libellé")
                      ->isEmpty("date_debut", $_POST["date_debut"], "Veuillez renseigner la date de début")
                      ->isEmpty("date_fin", $_POST["date_fin"], "Veuillez renseigner la date de fin")
                      ->isEmpty("description", $_POST["description"], "Veuillez renseigner la description")
                      ->isEmpty("statut", $_POST["statut"], "Veuillez renseigner le statut");

            // Vérification de la cohérence des dates
            $validator->validateDates("date_debut", $_POST["date_debut"], "date_fin", $_POST["date_fin"]);

            // Si les données sont valides, on enregistre en BDD
            if ($validator->isValid()) {
                $tache = [
                    "libelle"     => $_POST["libelle"],
                    "date_debut"  => $_POST["date_debut"],
                    "date_fin"    => $_POST["date_fin"],
                    "description" => $_POST["description"],
                    "statut"      => $_POST['statut']
                ];
                $this->tacheRepository->save($tache);
                redirectTo("tache", "liste");
            } else {
                // Sinon, on récupère le tableau d'erreurs pour l'injecter dans la vue
                $errors = $validator->getErrors();
            }
        }
        
        loadView("taches/ajout", ["errors" => $errors]);
    }

    public function detail() {
        $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
        $tache = $this->tacheRepository->findById($id);
        if (empty($tache)) { die("Tâche introuvable"); }
        loadView("taches/detail", ["tache" => $tache]);
    }

    public function terminer() {
        $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
        if ($id > 0) { $this->tacheRepository->markAsCompleted($id); }
        redirectTo("tache", "liste");
    }

    public function supprimer() {
        $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
        if ($id > 0) { $this->tacheRepository->delete($id); }
        redirectTo("tache", "liste");
    }
}
