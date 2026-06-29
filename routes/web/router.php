<?php

$controllers = [
    "tache"     => "TacheController",
    "dashboard" => "DashboardController"
];

$controller = $_REQUEST["controller"] ?? "dashboard";

if (array_key_exists($controller, $controllers)) {
    $fileName = $controllers[$controller] . ".php";
    require_once ROOT . "controller/" . $fileName;

    // Instanciation de la classe 
    $className = $controllers[$controller];
    $controllerObject = new $className();

    // Détermination de l'action par défaut
    $defaultAction = ($controller === "tache") ? "liste" : "dashboard";
    $action = $_REQUEST["action"] ?? $defaultAction;

    // Exécution dynamique de la méthode de l'objet
    if (method_exists($controllerObject, $action)) {
        $controllerObject->$action();
    } else {
        http_response_code(404);
        die("L'action '$action' n'existe pas dans le contrôleur $className.");
    }
} else {
    http_response_code(404);
    die("Contrôleur introuvable");
}
