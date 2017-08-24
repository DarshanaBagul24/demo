<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class CustomersController extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function __construct() {
        parent::__construct();
        $this->load->helper("url");
        $this->load->library('pagination');
        $this->load->model('CustomerModel');
    }

    public function index($offset = 0) {
        $conditions = array();
        $config['total_rows'] = $this->db->count_all_results('customers');
        $config['base_url'] = site_url("CustomersController/index");
        $config['per_page'] = 5;
        $config['use_page_numbers'] = TRUE;
        $this->pagination->initialize($config);
        //$config['num_links'] = $this->db->count_all_results('customers');
        
        if ($this->input->post()) {
            $data = $this->input->post();
            if (isset($_POST['search'])) {
                if (isset($_POST['search_by']) && !empty($_POST['search_by'])) {
                    //$this->db->like($data['search_by'], $data['search_text']);
                    $conditions[$data['search_by'] . " LIKE"] = '%' . $data['search_text'] . '%';
                }
                if (isset($_POST['search_by_age']) && !empty($_POST['search_by_age'])) {
                    $cur_Date = date('Y-m-d');
                    $prv_date = date('Y-m-d', strtotime('-25 years', strtotime($cur_Date)));

                    if ($_POST['search_by_age'] == 'less_than_25') {
                        $conditions['c_dob >'] = $prv_date;
                    } else if ($_POST['search_by_age'] == 'greater_than_25') {
                        $conditions['c_dob <'] = $prv_date;
                        //$res= $this->db->get_where('customers', array('c_dob < ' => $prv_date))->result_array();
                    }
                }

                if ((empty($_POST['search_by']) && empty($_POST['search_text']) && empty($_POST['search_by_age'])) || (!empty($_POST['search_by']) && empty($_POST['search_text']) && empty($_POST['search_by_age']))) {
                    $this->session->set_flashdata('flashError', 'Enter text to be search.');
                }
                //print_r($conditions);

                $query = $this->CustomerModel->getCustomer($config["per_page"], $offset, $conditions);
                $config['total_rows'] = $query['count'];
                $page_data['customers'] = $query['result'];
                unset($query['count']);
                //$res = $this->db->get_where('customers', $conditions)->result_array();
                if (isset($query) && !(empty($query))) {
                    $page_data['customers'] = $query['result'];
                } else {
                    $this->session->set_flashdata('flashError', 'No Records Found.');
                }
            }
            if (isset($_POST['clear'])) {
                $page_data['customers'] = $this->db->get('customers')->result_array();
                redirect(base_url() . 'index.php/CustomersController/');
            }
        } else {
            $query = $this->CustomerModel->getCustomer($config["per_page"], $offset);
            $config['total_rows'] = $query['count'];
            $page_data['customers'] = $query['result'];
            unset($query['count']);
        }
        //$this->pagination->initialize($config);
        $page_data['pagination'] = $this->pagination->create_links();
        $page_data['page_name'] = 'customers/list_customers';

        $this->load->view('index', $page_data);
    }

    public function add_customer() {
        if ($this->input->post()) {
            $data = $this->input->post();
            $this->CustomerModel->save($data);

            $this->session->set_flashdata('flashSuccess', 'The customer has been added successfuly.');
            redirect(base_url() . 'index.php/CustomersController/', 'refresh');
        }

        $page_data['page_name'] = 'customers/add_customer';
        $this->load->view('index', $page_data);
    }

}
