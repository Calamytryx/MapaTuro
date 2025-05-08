<?php

$allowedUris = array(
    "/mapaturorevamp",
    "/mapaturorevamp/game",
    "/mapaturorevamp/Learn",
    "/mapaturorevamp/About",
    "/mapaturorevamp/Analytics"
);

$currentUri = rtrim($_SERVER['REQUEST_URI'], '/');

if (!in_array($currentUri, $allowedUris)) {
    header("Location: /mapaturorevamp");
    exit;
}

