<?php
class Api_model extends Ci_model
{
	function fetch_all()
	{
		$this->db->order_by ('nim','DESC');
		return $this->db->get('mahasiswa');
	}

	function insert_api($data)
	{
		$this->db->insert ('mahasiswa', $data);
	}

	function fetch_single_user($nim)
	{
		$this->db->where ('nim', $nim);
		$query = $this->db->get('mahasiswa');
		return $query->result_array();
	}

	function update_api ($nim, $data)
	{
		$this->db->where ('nim', $nim);
		$this->db->update ('mahasiswa', $data);
	}

	function delete_single_user($nim)
	{
		$this->db->where ('nim', $nim);
		$this->db->delete ('mahasiswa');
		if($this->db->affected_rows() > 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
}
?>