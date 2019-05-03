<?php

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

    /* WIP
    public function userSelectionCorrect($userSelection) {

    }
    */
}

class prode {

    public function __construct($characters,$userSelection) {
        $this->characters = $characters;
        $this->userSelection = $userSelection;

        /* WIP
        foreach ($this->characters as $character) {

            }
        }
        */
    }

    public function characters() {
        return  $this->characters;
    }
}