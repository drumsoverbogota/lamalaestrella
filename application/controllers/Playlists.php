<?php
class Playlists extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('playlists_model');
                $this->load->helper('url_helper');
        }

        public function index()
        {
                $data['year'] = $this->playlists_model->get_year();
                $data['title'] = 'La Mala Estrella';

                $playlists_array = array();
                $year_array = array();
                foreach ($data['year'] as $year){
                        
                        $p_year = $this->playlists_model->get_playlist_year($year);
                        
                        if($p_year){
                                array_unshift($playlists_array , $p_year);
                                array_unshift($year_array , $year);
                        }
                }
                
                $data['playlists'] = $playlists_array;
                $data['year_array'] = $year_array;
                


                $this->load->view('templates/header', $data);
                $this->load->view('playlists/index', $data);
                $this->load->view('templates/footer');
                
        }

        public function view($id = NULL)
        {
                $data['playlist_item'] = $this->playlists_model->get_playlist($id);

                if (empty($data['playlist_item']))
                {
                        show_404();
                }

                $data['title'] = $data['playlist_item']['titulo'];

                $this->load->view('templates/header', $data);
                $this->load->view('playlists/view', $data);
                $this->load->view('templates/footer');
        }


        public function create()
        {
                $this->load->helper('form');
                $this->load->library('form_validation');
                

                $this->form_validation->set_rules('titulo', 'Titulo', 'required');
                $this->form_validation->set_rules('contenido', 'Contenido', '');
                $this->form_validation->set_rules('year', 'Año', '');
                
                $data['title'] = "Crear";
                $data['year'] = $this->playlists_model->get_year();

                if ($this->form_validation->run() === FALSE)
                {
                        $this->load->view('templates/header', $data);
                        $this->load->view('playlists/create', $data);
                        $this->load->view('templates/footer');    

                }
                else
                {
                        $row = $this->playlists_model->set_playlist();     
                        $this->view($row);                                      
                }                

            

        }        
}