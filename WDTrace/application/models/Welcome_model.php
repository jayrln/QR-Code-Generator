 <?php 

class Welcome_model extends CI_Model  
{  
		function add_customer($data) {  

			$query = $this->db->query('CALL `InsertCustomer`(?,?,?,?,?,?,?)',$data);
	        mysqli_next_result($this->db->conn_id);
	       	return $query;
		}

		function fetch_details($qrCode){

			$query = $this->db->query('CALL `SelectCustDetails`(?)',$qrCode);
	        mysqli_next_result($this->db->conn_id);
	       	return $query;
	       	
		}	

		function insert_customerlogs($data) {

			$query = $this->db->query('CALL `InsertCustomerLog`(?,?)',$data);
	        mysqli_next_result($this->db->conn_id);
	       	return $query;

		}
}
