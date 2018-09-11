<?php
class Playlists_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }

		public function get_playlist($id = FALSE)
		{
		
		        if ($id === FALSE)
		        {
		        		$this->db->select('id, titulo, year');
		                $query = $this->db->get('playlists');
		                return $query->result_array();
		        }
		        $query = $this->db->order_by('fecha', 'ASC')->get_where('playlists', array('id' => $id));
		        return $query->row_array();
		}

		public function get_playlist_year($year)
		{
				$this->db->select('id, titulo');
		        $query = $this->db->order_by('fecha', 'ASC')->get_where('playlists', array('year' => $year));
		        //echo $this->db->last_query();
		        return $query->result_array();
		}		  

        public function get_year()
        {
        	$query = $this->db->query("SHOW COLUMNS FROM playlists WHERE Field = 'year'");
        	$year_array = $query->row( 0 )->Type;
			preg_match("/^enum\(\'(.*)\'\)$/", $year_array, $matches);
			$enum = explode("','", $matches[1]);        	
			return $enum;
        }		
}