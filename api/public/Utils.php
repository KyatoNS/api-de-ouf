<?php

function isPath(string $route): bool
{
    $path = $_SERVER["REQUEST_URI"];
    $pathSeparatorPattern = "#/#";

    $routeParts = preg_split($pathSeparatorPattern, trim($route, "/"));
    $pathParts = preg_split($pathSeparatorPattern, trim($path, "/")); // Créer des tableau de l'uri et de la route comparer

    if (count($routeParts) !== count($pathParts)) { //vérifie que la toute choisie et l'uri on la même taille
        return false;
    }

    foreach ($routeParts as $routePartIndex => $routePart) { // Navigue dans la route pour vérifier le chemin
        $pathPart = $pathParts[$routePartIndex];

        if (str_starts_with($routePart, ":")) { // Si il y a un :, alors c'est un argument, on sort du foreach
            continue;
        }

        if ($routePart !== $pathPart) { // si  les routes diffèrents, alors la route n'est pas valide
            return false;
        }
    }

    return true;
}

function isGetMethod(): bool
{
    return $_SERVER["REQUEST_METHOD"] === "GET";
}

function isPostMethod(): bool
{
    return $_SERVER["REQUEST_METHOD"] === "POST";
}

function isPutMethod(): bool
{
    return $_SERVER["REQUEST_METHOD"] === "PUT";
}

function isDeleteMethod(): bool
{
    return $_SERVER["REQUEST_METHOD"] === "DELETE";
}

function getBody()
{
    return json_decode(file_get_contents("php://input"), true);
}


function jsonResponse($statusCode, $body)
{
    // Modifie le code de statut
    http_response_code($statusCode);

    header("Content-Type: application/json");
    
    // On renvoie une réponse (contenu)
    return json_encode($body);
}
