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
                $data['playlists'] = $this->playlists_model->get_playlist();
                $data['title'] = 'Playlists';

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
}