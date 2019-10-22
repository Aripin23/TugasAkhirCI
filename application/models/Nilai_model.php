<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Nilai_model extends CI_Model
{
  
  public function  nilai(){

    //melakukan join antara user submenu ke tabel menu

    $query = "SELECT  nilai.* , kelas.nama_kelas, mahasantri.nama
        FROM nilai JOIN kelas ON 
        nilai.kelas_id = kelas.id JOIN mahasantri ON nilai.mahasantri_id = mahasantri.id
    ";
  
    return $this->db->query($query)->result_array();
       
  }
  public function get_data()
        {
                $query = $this->db->get('nilai');
                return $query->result();
        }

  private $_tablenil = "nilai";
   public function getAll()
    {
        return $this->db->get($this->_tablenil)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_tablenil, ["id" => $id])->row();
    }
     public function update()
    {

        $post = $this->input->post();
        //var_dump($post); exit();
        $this->id = $post["id"];
        $this->tanggal = $post["tanggal"];
        $this->surah = $post["surah"];
        $this->ayat = $post["ayat"];
        $this->kelancaran = $post["kelancaran"];
        $this->kesalahan = $post["kesalahan"];
        $this->makna_ayat = $post["makna_ayat"];
        $this->nilai = $post["nilai"];
        $this->keterangan = $post["keterangan"];
        $this->mahasantri_id = $post["mahasantri"];
        $this->kelas_id = $post["kelas"];
        
       // var_dump($this); exit();
        $this->db->where('id', $this->id);
        $this->db->update($this->_tablenil, $this);
       
    }

    public function delete($id)
    {
        return $this->db->delete($this->_tablenil, array("id" => $id));
    }
}