 <?php 

class IndexEmployee_model extends CI_Model  
{ 
	function add_employees($data)
	{
		$query = $this->db->query('CALL `InsertEmployees`(?,?,?,?,?,?)',$data);
        mysqli_next_result($this->db->conn_id);
       	return $query;
	}	

	function fetch_details($qrCode){

		$query = $this->db->query('CALL `SelectEmpDetails`(?)',$qrCode);
		mysqli_next_result($this->db->conn_id);
		return $query;
		
	}	

}

?>