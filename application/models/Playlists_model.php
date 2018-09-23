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
		        $query = $this->db->order_by('fecha', 'DESC')->get_where('playlists', array('id' => $id));
		        return $query->row_array();
		}

		public function get_playlist_year($year)
		{
				$this->db->select('id, titulo');
		        $query = $this->db->order_by('fecha', 'DESC')->get_where('playlists', array('year' => $year));
		        //echo $this->db->last_query();
		        return $query->result_array();
		}		  

		public function set_playlist()
		{

			$this->load->helper('url');
			date_default_timezone_set('America/Bogota');

			$data = array(
				'titulo' => $this->input->post('titulo'),
				'contenido' => $this->input->post('contenido'),
				'year' => $this->input->post('year'),
				'fecha' => date('Y-m-d H:i:s'),
			);

			$this->db->insert('playlists', $data);
			return $this->db->insert_id();

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