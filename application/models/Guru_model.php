<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Guru_model extends CI_Model
{
  
  public function  guru(){

   
    $query = "SELECT * FROM user WHERE role_id = 2";
  
    return $this->db->query($query)->result_array();        

  }
	public function hitungJumlahAsset()
		{   
		    $query = $this->db->get('user');
		    if($query->num_rows()>0)
		    {
		      return $query->num_rows();
		    }
		    else
		    {
		      return 0;
		    }
	}

	public function hitung()
		{   
		    $query = $this->db->get('mahasantri');
		    if($query->num_rows()>0)
		    {
		      return $query->num_rows();
		    }
		    else
		    {
		      return 0;
		    }
	}
}