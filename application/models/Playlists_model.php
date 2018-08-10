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
		                $query = $this->db->get('playlists');
		                return $query->result_array();
		        }

		        $query = $this->db->get_where('playlists', array('id' => $id));
		        return $query->row_array();
		}
		public function get_playlist_year($year)
		{
		        $query = $this->db->get_where('playlists', array('year' => $year));
		        return $query->row_array();
		}		  
}