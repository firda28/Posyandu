<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class M_imunisasi extends CI_Model
{
    
    function __construct()
    {
        parent::__construct();
    }

    function get(){
        $query = $this->db->query('SELECT vaksin FROM imunisasi INNER JOIN posyandu ON imunisasi = imunisasi');
        return $query->result();
    }
}
?>
