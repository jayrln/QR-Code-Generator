 <?php 

class IndexLogin_model extends CI_Model  
{ 
	function fetch_details($data)
	{
		$query = $this->db->query('CALL `SelectUserDetails`(?,?)',$data);
        mysqli_next_result($this->db->conn_id);
       	return $query;
	}	

}

?>