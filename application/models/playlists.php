<?php

/**
 * A mock database model similiar to one one from lab3
 */
class Playlists extends MY_Model {

    // Constructor
    public function __construct() {
        parent::__construct('playlist', 'id');
    }

    public function getByCreator($which) {
        
        $this->db->where('creator', $which);
        $query = $this->db->get($this->_tableName);
        if ($query->num_rows() < 1)
            return array(); //returns an empty array so that the view doesn't break on 0 entry
        return $query->result_array();
    }
    
    public function getCreator($which) {
        $this->db->where('id', $which);
        $query = $this->db->get($this->_tableName);
        if ($query->num_rows() < 1)
            return -1; 
        $result = $query->row_array(); 
        return $result['creator'];
    }
}
