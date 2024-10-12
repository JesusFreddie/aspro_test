<?php

namespace Modules\Bracket\Controllers;

use PDO;

class BracketController
{
    private PDO $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function getAll(): void {
        $sql = "SELECT * FROM `brackets`";

        $stmt = $this->pdo->query($sql);
        $bracketsList = [];

        while ($bracket = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $bracketsList[] = $bracket;
        }

        http_response_code(200);
        echo json_encode($bracketsList);
    }

    public function create($data): void {
        if (!isset($data['string']) || strlen($data['string']) < 1 ) {
            http_response_code(400);
            echo json_encode(["message" => "поле string не может быть пустым"]);
            return;
        }

        $string = $data['string'];
        $success = $this->bracketsParser($string);

        $sql = "INSERT INTO `brackets` (`string`, `success`) VALUES (:string, :success)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            'string' => $string,
            'success' => $success ? 1 : 0,
        ]);

        http_response_code(201);
        echo json_encode(['success' => $success]);
    }

    private function bracketsParser(string $string): bool {
        $brackets = array(
            '(' => ')',
            '[' => ']',
            '{' => '}',
            '<' => '>'
        );
        $bracket = [];

        for ($i = 0; $i < strlen($string); $i++) {
            $char = $string[$i];

            if (array_key_exists($char, $brackets)) {
                $bracket[] = $char;
            } elseif (in_array($char, array_values($brackets))) {
                if (count($bracket) > 0 && $brackets[end($bracket)] === $char) {
                    array_pop($bracket);
                } else {
                    return false;
                }
            }
        }

        return count($bracket) === 0;
    }
}