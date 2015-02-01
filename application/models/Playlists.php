<?php

/**
 * A mock database model similiar to one one from lab3, contains data
 * for all the playlists
 */
class Playlists extends CI_Model {

    // mock data. Will be replaced with a sql data source eventually
    var $data = array(
        array('id' => '1', 'creator' => '1', 'name' => 'My playlist',
            'private' => 'false', 
            'content' => array(
                'https://www.youtube.com/watch?v=qycqF1CWcXg',
                'https://www.youtube.com/watch?v=CcsUYu0PVxY',
                'https://www.youtube.com/watch?v=WVP3fUzQHcg',
                'https://www.youtube.com/watch?v=FOIjvHjK0Rw')
            ),
        array('id' => '2', 'creator' => '2', 'name' => 'unknown',
            'private' => 'true', 
            'content' => array(
                'https://www.youtube.com/watch?v=nb9x_8pgl4Q',
                'https://www.youtube.com/watch?v=M9A5WdqM__g',
                'https://www.youtube.com/watch?v=pnD76ZLWEz8',
                'https://www.youtube.com/watch?v=MX6YekfDnKA')
            ),
        array('id' => '3', 'creator' => '1', 
           'private' => 'false', 'name' => 'Classical Music',
            'content' => array(
                'https://www.youtube.com/watch?v=75uRFWqbs58',
                'https://www.youtube.com/watch?v=_CFBh7uWPgU',
                'https://www.youtube.com/watch?v=nEDDawTTXOo')
            )
    );

    // Constructor
    public function __construct() {
        parent::__construct();
    }

    // retrieve a single playlist identified by the playlist id
    public function get($which) {
        // iterate over the data until we find the one we want
        foreach ($this->data as $playlist) {
            if ($playlist['id'] == $which) {
                return $playlist;
            }
        }
        return null;
    }
    
    //fetch all the playlists created by a given creator
    public function getByCreator($creator) {
        
        $playlists = array();
        
        //look through all playlists and find the ones that match creator id
        foreach($this->data as $playlist) {
            if ($playlist['creator'] == $creator) {
                array_push($playlists, $playlist);
            }
        } 
        return $playlists;
    }

    //retrieve all playlists that's public
    public function all() {
        $playlists = array();
        foreach($this->data as $playlist) {
            if ($playlist['private'] == 'false') {
                array_push($playlists, $playlist);
            }
        } 
        return $playlists;
    }
}
