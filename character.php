<?php
require_once "config.php";

class character {

    public function __construct($char_id, $name, $shortName,$status) {
        $this->id = $char_id;
        $this->name = $name;
        $this->shortName = $shortName;
        $this->status = $status;
    }

    public function id() {
        return  $this->id;
    }
    public function name() {
        return  $this->name;
    }
    public function shortName() {
        return  $this->shortName;
    }
    public function status() {
        return  $this->status;
    }

    public function isSelectionCorrect($selectionForCharacter) {
        return ($this->status == $selectionForCharacter) ? true : false;
    }
}

class prode {

    private $user;
    private $characters;
    private $userSelection;
    private $ranking;

    public function __construct($user) {
        $this->user = $user;
        $this->characters = $this->getCharacters();
        $this->userSelection = $user->selection();
        $this->ranking = $this->getRanking();
    }

    public function characters() {
        return  $this->characters;
    }

    public function ranking() {
        return  $this->ranking;
    }

    public function shouldCharacterBeChecked($character, $status_option) {
        $char_id = $character->id();
        return ($this->user->getCharacterSelectionByID($char_id) == $status_option) ? true : false;
    }

    private function getRanking() {
        $ranking = [];

        $link = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
        $sql = "SELECT username,score FROM users ORDER BY score DESC LIMIT 20";
        $result = mysqli_query($link,$sql);

        while($row=mysqli_fetch_assoc($result)) {
            array_push($ranking, $row);
        }

        mysqli_close($link);

        return  $ranking;
    }

    private function getCharacters() {
        $characters = [];

        $link = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
        $sql = "SELECT * FROM characters";
        $result = mysqli_query($link,$sql);

        while($row=mysqli_fetch_assoc($result)) {
            $character = new Character($row['id'], $row['name'],$row['short_name'],$row['id_status']);
            array_push($characters, $character);
        }

        mysqli_close($link);

        return $characters;
    }

    public function characterStatusOptions() {
        $options = [];

        $link = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
        $sql = "SELECT * FROM status";
        $result = mysqli_query($link,$sql);
        while($row=mysqli_fetch_assoc($result)) {
            array_push($options, $row);
        }

        mysqli_close($link);

        return $options;
    }

    public function updateAllScores() {
        return $this->user->updateScore($this->characters);
    }
}

class User {
    public function __construct($user_id,$user_username) {
        $this->id = $user_id;
        $this->username = $user_username;
        $this->score = $this->getScore();
        $this->selection = $this->getSelection();
    }

    public function id() {
        return  $this->id;
    }

    public function username() {
        return  $this->username();
    }

    public function score() {
        return  $this->score;
    }
    public function selection() {
        return  $this->selection;
    }

    private function getScore() {
        $link = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
        $sql = "SELECT score FROM users WHERE id = $this->id";
        $result = mysqli_query($link,$sql);
        $row = mysqli_fetch_assoc($result);
        mysqli_close($link);
        return  $row["score"];
    }

    private function getSelection() {
        $link = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
        $sql = "SELECT * FROM prode WHERE id_user = $this->id";
        $result = mysqli_query($link,$sql);
        mysqli_close($link);
        return mysqli_fetch_row($result);
    }

    public function printWelcomeMessage() {
        return htmlspecialchars($this->username) . " " . "($this->score puntos)";
    }

    public function getCharacterSelectionByID($character_id) {
        return $this->selection[$character_id+1]; // DARK! - El index de selections se matchear al char_id (ej: jon es 1 y esta en index 2 de selection)
    }

    public function updateScore($characters) {
        $score = 0;

        foreach ($characters as $character) {
           $score = ($character->isSelectionCorrect($this->getCharacterSelectionByID($character->id()))) ? $score+1 : $score;
        }

        $link = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
        $sql = "UPDATE users SET score = $score WHERE id = $this->id;";

        if (mysqli_query($link, $sql)) {
            echo "Record updated successfully\n";
        } else {
            echo "Error updating record: " . mysqli_error($link) . "\n";
        }
    }
}