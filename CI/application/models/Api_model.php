<?php
class Api_model extends CI_Model
{
	funvtion fetch_all()
	{
		$this->db->order_by('nim','DESC');
		return $this->db->get('tbl_sample');
	}

	function insert_api($data)
	{
		$this->db->insert('tbl_sample',$data);
	}

	function fecth_single_user($nim)
	{
		$this->db->where('nim', $nim);
		$query = $this->db->get('tbl_sample');
		return $query->result_array();
	}

	function delete_single_user($nim)
	{
		$this->db->where('nim', $nim);
		$this->db->delete('tbl_sample');
		if($this->db->affected_rows()>0)
		{
			return true;
		}
		else{
			return false;
		}
	}
}
?>