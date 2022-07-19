<?php defined('BASEPATH') OR exit('No direct script access allowed');

class pagination extends CI_Controller {

    public function __construct() {
        parent:: __construct();

        $this->load->helper('url');
        $this->load->model('pagination_model');
        $this->load->library("pagination");
    }

    public function index() {
        $config = array();
        $config["base_url"] = base_url() . "pagination";
        $config["total_rows"] = $this->pagination_model->get_count();
        $config["per_page"] = 10;
        $config["uri_segment"] = 2;

        $this->pagination->initialize($config);

        $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;

        $data["links"] = $this->pagination->create_links();

        $data['pagination'] = $this->pagination_model->get_pagination($config["per_page"], $page);
// print_r($data);
// exit();
        $this->load->view('pagination', $data);
    }
}