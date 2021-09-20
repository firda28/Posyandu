<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class M_status_gizi extends CI_Model
{
    
    function __construct()
    {
        parent::__construct();
    }

    function get(){
        $query = $this->db->query('SELECT nama FROM status_gizi INNER JOIN posyandu ON status_gizi = status_gizi');
        return $query->result();
    }
}
?>