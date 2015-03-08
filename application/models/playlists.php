<?php

/**
 * A mock database model similiar to one one from lab3
 */
class Playlists extends MY_Model {

    // mock data. Will be replaced with a sql data source eventually
    var $data = array(
        array('id' => '1', 'creator' => '1', 'private' => 'false',
            'name' => 'Music videos',
            'content' => array(
                'https://www.youtube.com/watch?v=qycqF1CWcXg',
                'https://www.youtube.com/watch?v=CcsUYu0PVxY',
                'https://www.youtube.com/watch?v=WVP3fUzQHcg',
                'https://www.youtube.com/watch?v=FOIjvHjK0Rw',
                'https://www.youtube.com/watch?v=E2LM3ZlcDnk'
            )
        ),
        array('id' => '2', 'creator' => '2', 'private' => 'false',
            'name' => 'My playlist',
            'content' => array(
                'https://www.youtube.com/watch?v=vCYk9CRx0g8',
                'https://www.youtube.com/watch?v=hDhTqF3_JWs',
                'https://www.youtube.com/watch?v=BuzrLx-fRco',
                'https://www.youtube.com/watch?v=YrddaP6ml1M'
            )
        ),
        array('id' => '3', 'creator' => '1', 'private' => 'false',
            'name' => 'My playlist 2',
            'content' => array(
                'https://www.youtube.com/watch?v=vCYk9CRx0g8',
                'https://www.youtube.com/watch?v=hDhTqF3_JWs',
                'https://www.youtube.com/watch?v=BuzrLx-fRco',
                'https://www.youtube.com/watch?v=YrddaP6ml1M'
            )
        )
    );

    // Constructor
    public function __construct() {
        parent::__construct('playlist', 'id');
    }

    public function getByCreator($which) {
        
        $this->db->where('creator', $which);
        $query = $this->db->get($this->_tableName);
        if ($query->num_rows() < 1)
            return array();
        return $query->result_array();
    }
    
    // retrieve all users
    public function all() {
        return $this->data;
    }
}
