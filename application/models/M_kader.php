<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class M_kader extends CI_Model
{
    
    function __construct()
    {
        parent::__construct();
    }

    function get($session){

        $query = $this->db->query('SELECT nama FROM kader INNER JOIN posyandu ON kader = kader WHERE id = $session');
        return $query->result();
    }
}
?>
