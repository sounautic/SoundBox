<?php

/**
 * A mock database model similiar to one one from lab3
 */
class Playlist_items extends MY_Model {


    // Constructor
    public function __construct() {
        //all the items in this database belongs to a playlist.
        //as we will be searching by playlist id the model uses playlist_id as key
        parent::__construct('playlist_item', 'playlist_id');
    }
}
