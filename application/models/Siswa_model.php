
<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Siswa_model extends CI_Model
{
  
  public function  getSiswa(){

    //melakukan join antara user submenu ke tabel menu

    $query = "SELECT  mahasantri.* , kelas.nama_kelas
        FROM mahasantri JOIN kelas ON 
        mahasantri.kelas_id = kelas.id 
    ";
  
    return $this->db->query($query)->result_array();      

  }

  private $_table = "mahasantri";
   public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id" => $id])->row();
    }
    public function update()
    {

        $post = $this->input->post();
        //var_dump($post); exit();
      	$this->id = $post["id"];
        $this->nim = $post["nim"];
        $this->nama = $post["nama"];
        $this->alamat = $post["alamat"];
        $this->tgl_lahir = $post["tgl_lahir"];
        $this->kelas_id = $post["kelas"];
       
        
       // var_dump($this); exit();
        $this->db->where('id', $this->id);
        $this->db->update($this->_table, $this);
       
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id" => $id));
    }
}