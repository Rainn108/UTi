<?php
header("Content-Type: application/json");

$data = json_decode(file_get_contents("php://input"), true);
$komentarBaru = ["nama" => $data["nama"], "komentar" => $data["komentar"]];

$file = "komentar.json";

if (file_exists($file)) {
    $komentar = json_decode(file_get_contents($file), true);
} else {
    $komentar = [];
}

$komentar[] = $komentarBaru;

file_put_contents($file, json_encode($komentar, JSON_PRETTY_PRINT));

echo json_encode(["status" => "success"]);
?>
