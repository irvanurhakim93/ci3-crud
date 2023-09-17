<?php 
class Murid_model extends CI_Model
{
    public function __construct() {
        $this->load->database();
        $this->load->helper('url');
    }

    public function get_all() 
    {
        $murid = $this->db->get("murid")->result();
        return $murid;    
    }

    public function store() {
        $data = [
            'nama' => $this->input->post('nama'),
            'kelas' => $this->input->post('kelas')
        ];

        $result = $this->db->insert('murid',$data);
        return $result;
    }

    public function get($id) {
        $getmurid = $this->db->get_where('murid',['id' => $id])->row();
        return $getmurid;
    }

    public function update($id,$data) {
        // return $this->db->update($this->table, $data,$array('id',$id));
        return $this->db->where('id',$id)->update('murid',$data);
    }

    public function delete($id) 
    { 
        return $this->db->delete('murid',array('id' => $id));    
    }

}