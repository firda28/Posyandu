<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class M_kelainan extends CI_Model
{
    
    function __construct()
    {
        parent::__construct();
    }

    function get(){
        $query = $this->db->query('SELECT nama_kelainan FROM kelainan INNER JOIN posyandu ON kelainan = kelainan');
        return $query->result();
    }
}
?>
