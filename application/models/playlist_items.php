<?php

/**
 * A mock database model similiar to one one from lab3
 */
class Playlist_items extends MY_Model {


    // Constructor
    public function __construct() {
        parent::__construct('playlist_item', 'playlist_id');
    }
}
