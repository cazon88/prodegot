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

    public function __construct($characters,$userSelection, $user) {
        $this->user = $user;
        $this->characters = $characters;
        $this->userSelection = $userSelection;
    }

    public function characters() {
        return  $this->characters;
    }

    public function shouldCharacterBeChecked($character, $status_option) {
        $char_id = $character->id();
        return ($this->user->getCharacterSelectionByID($char_id) == $status_option) ? true : false;
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

    public function getScore() {
        $link = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
        $sql = "SELECT score FROM users WHERE id = $this->id";
        $result = mysqli_query($link,$sql);
        $row = mysqli_fetch_assoc($result);
        return  $row["score"];
    }

    public function getSelection() {
        $link = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
        $sql = "SELECT * FROM prode WHERE id_user = $this->id";
        $result = mysqli_query($link,$sql);
        return mysqli_fetch_row($result);
    }

    public function printWelcomeMessage() {
        return htmlspecialchars($this->username) . " " . "($this->score puntos)";
    }

    public function getCharacterSelectionByID($character_id) {
        return $this->selection[$character_id+1]; // DARK! - El index de selections se matchear al char_id (ej: jon es 1 y esta en index 2 de selection)
    }
}