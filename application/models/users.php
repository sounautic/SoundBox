<?php

/**
 * A mock database model similiar to one one from lab3
 */
class Users extends MY_Model {

    // Constructor
    public function __construct() {
        parent::__construct('user_detail', 'id'); //references the user_detail table on id
    }

    function update_table($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('user_detail', $data);
    }

}
