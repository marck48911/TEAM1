<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('usuario_model');
        $this->load->library('session');
        $this->load->library('form_validation');
    }

	public function index()
	{
		   $data['msg'] = $this->uri->segment(3);

        if ($this->session->userdata('email')) {
            $this->vista();
        } else {
            $this->load->view('Login_view', $data);
        }
        
        

	}
	  public function vista()
    {
        $listarusaurios = $this->usuario_model->listarusuarios();
        $data['usuarios'] = $listarusaurios;
        $this->load->view('inc/header_view');
        $this->load->view('Usuario_view', $data);
        $this->load->view('inc/foot_view');
    }
    public function validarusr2()
    {
        $email = 'holi_1023@hotmail.com';
        $password = md5('123456');
        $consulta = $this->usuario_model->validar($email, $password);

        if ($consulta->num_rows() > 0) {
            foreach ($consulta->result() as $row) {
                if (($row->email) == $email && ($row->password) == $password) {
                    $this->session->set_userdata('idusuario', $row->idusuario);
                    $this->session->set_userdata('email', $row->email);
                    $this->session->set_userdata('estado', $row->estado);
                    if (($row->estado) == 1) {
                       // redirect('usuario_curso/index', 'refresh');
                    } else if (($row->estado) == 2) {
                        redirect('curso/index', 'refresh');
                    } else if (($row->estado) == 3) {
                        redirect('Welcome/vista', 'refresh');
                    } else {
                        //redirect('Welcome/index', 'refresh');
                    }
                }
            }
        } else {
            redirect('Welcome/index', 'refresh');
        }
    }
	public function validarusr()
    {
        $email = $_POST['email'];
        $password = md5($_POST['password']);
        $consulta = $this->usuario_model->validar($email, $password);

        if ($consulta->num_rows() > 0) {
            foreach ($consulta->result() as $row) {
                if (($row->email) == $email && ($row->password) == $password) {
                    $this->session->set_userdata('idusuario', $row->idusuario);
                    $this->session->set_userdata('email', $row->email);
                    $this->session->set_userdata('estado', $row->estado);
                    if (($row->estado) == 1) {
                       // redirect('usuario_curso/index', 'refresh');
                    } else if (($row->estado) == 2) {
                        redirect('curso/index', 'refresh');
                    } else if (($row->estado) == 3) {
                        redirect('Welcome/vista', 'refresh');
                    } else {
                        //redirect('Welcome/index', 'refresh');
                    }
                }
            }
        } else {
            redirect('Welcome/index', 'refresh');
        }
    }
    public function logout()
    {
      
        $this->session->sess_destroy();
        redirect('Welcome/index', 'refresh');
    }


}
