<?php
class Query_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();

        $this->load->database();


	}
	
	public function save_model($table,$attribute)
	{
	    //save data to database
		$this->db->insert($table, $attribute);
        return $this->db->insert_id();
//		if($this->db->affected_rows() > 0){
//
//		}
	}

	//get all data from database
	public function page_list($table)
	{
		$query = $this->db->get($table);

		if ($query->num_rows() > 0)
		{
			foreach ($query->result() as $row)
			{
				$data[] = $row;
			}
			return $data;	
		}
		return false;
	}

	//delete data from database with 1 condition
	public function delete_model($table_name,$table_row,$value)
	{
		$this->db->where($table_row, $value)
				 ->delete($table_name); 
	}

    //delete data from database with 2 conditions
	public function delete_model_two($table_name,$table_row_f,$value_f,$table_row_s,$value_s)
	{
		$this->db->where($table_row_f, $value_f)
		 		 ->where($table_row_s, $value_s)
				 ->delete($table_name); 
	}

    //get data from database with 1 condition
	public function get_row($table_name,$table_row,$value)
	{
		$query = $this->db->select('*')
			->from($table_name)
			->where($table_row, $value)
			->get();
		return $query;
	}

    //get data from database with 2 conditions
	public function where_two_row($table_name,$table_row_f,$value_f,$table_row_s,$value_s)
	{
		$query = $this->db->select('*')
			->from($table_name)
			->where($table_row_f, $value_f)
			->where($table_row_s, $value_s)
			->get();
		return $query;
	}


    //get data from database with multiple conditions
	public function get_rows_where($table_name,$values)
	{
        $this->db->select('*')->from($table_name);

        foreach ($values as $key => $value){
            $this->db->where($key, $value);
        }

        $query = $this->db->get();
		return $query;
	}


    //update data of table with 1 condition
	public function update_model($table_name, $table_row,$value, $attribute){
		$this->db->where($table_row, $value )
				 ->update($table_name, $attribute);;
	}

	//update data of table with 2 conditions
	public function update_two_column($table_name, $attribute,$col_one, $val_one,$col_two, $val_two){
		$this->db->where($col_one, $val_one )
				 ->where($col_two, $val_two )
				 ->update($table_name, $attribute);
	}
}