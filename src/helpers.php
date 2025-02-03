<?php

function inspect($value) {
    echo '<pre>';
    var_dump($value);
    echo '</pre>';
}

function inspectAndDie($value) {
    echo '<pre>';
    die(var_dump($value));
    echo '</pre>';
}

function basePath($path) {
    return __DIR__ . "/../" . $path;
}

function errorReporting() {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
}

function shortenText($text, $wordCount) {

    $words = explode(' ', $text);
    $shortendWords = array_slice($words, 0, $wordCount);
    $shortendText = implode(' ', $shortendWords);

    if (count($words) > $wordCount) {
        $shortendText = $shortendText . '...';
    }
    
    return $shortendText;
}

function sanitize(string $string): string {
    return htmlspecialchars($string);
}

function formatDate(string $timestamp) {
    $created_at_date = new DateTime($timestamp);
    $now = new DateTime();

    $diff = $now->diff($created_at_date);

    if ($diff->y > 0) {
    echo "vor " . $diff->y . " Jahr(en)";
    } elseif ($diff->m > 1) {
    echo "vor " . $diff->m . " Monaten";
    } elseif ($diff->m > 0) {
    echo "vor " . $diff->m . " Monat";
    } elseif ($diff->d > 1) {
    echo "vor " . $diff->d . " Tagen";
    } elseif ($diff->d > 0) {
    echo "vor " . $diff->d . " Tag";
    } elseif ($diff->h > 1) {
    echo "vor " . $diff->h . " Stunden";
    } elseif ($diff->h > 0) {
    echo "vor " . $diff->h . " Stunde";
    } elseif ($diff->i > 1) {
    echo "vor " . $diff->i . " Minuten";
    } elseif ($diff->i > 0) {
    echo "vor " . $diff->i . " Minute";
    } else {
    echo "gerade eben";
    }
}
