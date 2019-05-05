<?php
require_once "character.php";

class Scoring {

    private $users;
    private $characters;

    public function __construct() {
        $this->users = $this->getUsers();
        $this->characters = $this->getCharacters();
    }

    private function getCharacters() {
        $characters = [];

        $link = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
        $sql = "SELECT * FROM characters";
        $result = mysqli_query($link,$sql);

        while($row=mysqli_fetch_assoc($result)) {
            $character = new Character($row['id'], $row['name'],$row['short_name'],$row['id_status'],$row['locked']);
            array_push($characters, $character);
        }

        mysqli_close($link);

        return $characters;
    }

    private function getUsers() {
        $users = [];

        $link = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
        $sql = "SELECT * FROM users";
        $result = mysqli_query($link,$sql);

        while($row=mysqli_fetch_assoc($result)) {
            $user = new User($row['id'], $row['username']);
            array_push($users, $user);
        }

        mysqli_close($link);

        return $users;
    }

    public function updateAllScores() {
        foreach ($this->users as $user) {
            $user->updateScore($this->characters);
        }
    }
}

$scoring = new Scoring();
$scoring->updateAllScores();
?>