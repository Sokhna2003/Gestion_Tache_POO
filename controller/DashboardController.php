<?php
require_once ROOT . "repository/TacheRepository.php";
require_once ROOT . "repository/DashboardRepository.php";

class DashboardController {
    private $tacheRepository;
    private $dashboardRepository;

    public function __construct() {
        $this->tacheRepository = new TacheRepository();
        $this->dashboardRepository = new DashboardRepository();
    }

    public function dashboard() {
        $total    = $this->tacheRepository->countAll();
        $enCours  = $this->dashboardRepository->countEnCours();
        $terminer = $this->dashboardRepository->countTerminees();
        $recentTaches = $this->dashboardRepository->findLast3();

        $pourcentage = $total > 0 ? round(($terminer / $total) * 100) : 0;

        loadView("dashboard/dashboard", [
            "total"        => $total,
            "enCours"      => $enCours,
            "terminer"     => $terminer,
            "pourcentage"  => $pourcentage,
            "recentTaches" => $recentTaches
        ]);
    }
}
