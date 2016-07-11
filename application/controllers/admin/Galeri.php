<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Galeri extends MY_controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct()
    {
        parent::__construct();
        $this->load->model('Galeri_model');

    }
	public function index()
	{
		$data2=$this->Galeri_model->getGaleri();
		$custom_js=$this->custom_js();

		$this->load->view('template/header');
		$this->load->view('template/menu_header');
		$this->load->view('galeri/content',array('data'=>$data2,'custom_js'=>$custom_js));
		// $data2="asas";
		$this->load->view('template/footer');			
	}

	public function addGaleri()
	{

		$this->load->view('template/header');
		$this->load->view('template/menu_header');
		$this->load->view('galeri/addgaleri');
		$this->load->view('template/footer');			
	}

	public function addGaleriProses(){
		$config['upload_path']          = './assets/uploads/galeri/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 200;
		$config['max_width']            = 1024;
		$config['max_height']           = 768;
		$this->load->library('upload', $config);
                
                if ( ! $this->upload->do_upload('gambar'))
                {
                        $report_err =  $this->upload->display_errors();
                        //$gambar = $this->input->post('gambar_temp');
                }
                else
                {
                		// unlink($config['upload_path'].$this->input->post('gambar_temp'));
                        $report_done = "Gambar Berhasil di Upload";
                        $data=array(
                        	'judul'=>$this->input->post('judul'),
                        	'deskripsi'=>$this->input->post('deskripsi'),
                        	'gambar'=>$this->upload->data('file_name')
                        	);
                        $this->Galeri_model->insertGaleri($data);
                }
        if (isset($report_err)) {
        	$redirect='galeri/addgaleri';
        	$status=$report_err;
        	$data="";
        }else{
        	$redirect='galeri/content';
        	$status=$report_done;
        	$data=$this->Galeri_model->getGaleri();
        }

        $custom_js=$this->custom_js();
		$this->load->view('template/header');
		$this->load->view('template/menu_header');
		$this->load->view($redirect,array(
				"status"=>$status,
				"custom_js"=>$custom_js,
				"data"=>$data));
		$this->load->view('template/footer');				

	}

	public function editGaleriProses(){
		$config['upload_path']          = './assets/uploads/galeri/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 200;
		$config['max_width']            = 1024;
		$config['max_height']           = 768;
		$this->load->library('upload', $config);
                
                if ( ! $this->upload->do_upload('gambar'))
                {
                        $report_err =  $this->upload->display_errors();
                        //$gambar = $this->input->post('gambar_temp');
                        $data=array(
                        	'judul'=>$this->input->post('judulgambar'),
                        	'deskripsi'=>$this->input->post('deskripsigambar'),
                        	);
                        $id=$this->input->post('idgambar');
                        $this->Galeri_model->updateGaleri($id,$data);
                }
                else
                {
                		unlink($config['upload_path'].$this->input->post('gambar_temp'));
                        $report_done = "Gambar Berhasil di Update";
                        $data=array(
                        	'judul'=>$this->input->post('judulgambar'),
                        	'deskripsi'=>$this->input->post('deskripsigambar'),
                        	'gambar'=>$this->upload->data('file_name')
                        	);
                        $id=$this->input->post('idgambar');
                        $this->Galeri_model->updateGaleri($id,$data);
                }

        if (isset($report_err)) {
        	$redirect='galeri/content';
        	$status=$report_err;
        	$data=$this->Galeri_model->getGaleri();
        }else{
        	$redirect='galeri/content';
        	$status=$report_done;
        	$data=$this->Galeri_model->getGaleri();
        }

        $custom_js=$this->custom_js();
		$this->load->view('template/header');
		$this->load->view('template/menu_header');
		$this->load->view($redirect,array(
				"status"=>$status,
				"data"=>$data,
				"custom_js"=>$custom_js));
		$this->load->view('template/footer');


	}

	public function deleteGaleri($id){
		$this->Galeri_model->deleteGaleri($id);

        $custom_js=$this->custom_js();	
        $data=$this->Galeri_model->getGaleri();
		$this->load->view('template/header');
		$this->load->view('template/menu_header');
		$this->load->view('galeri/content',array(
				"status"=>'data berhasil dihapus',
				"data"=>$data,
				"custom_js"=>$custom_js));
		$this->load->view('template/footer');
	}

	public function custom_js(){
	    $custom_js="
		$('#editGaleri').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget) // Button that triggered the modal
		  var idgambar = button.data('idgambar') // Extract info from data-* attributes
		  var judulgambar = button.data('judul') // Extract info from data-* attributes
		  var deskripsigambar = button.data('deskripsi') // Extract info from data-* attributes
		  var gambar = button.data('gambar') // Extract info from data-* attributes
		  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
		  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
		  var modal = $(this)
		  modal.find('.modal-title').text('id Gambar ' + idgambar)
		  modal.find('.modal-body #idgambar').val(idgambar)
		  modal.find('.modal-body #judulgambar').val(judulgambar)
		  modal.find('.modal-body #gambar_temp').val(gambar)
		  modal.find('.modal-body #deskripsigambar').val(deskripsigambar)
		  modal.find('.modal-body #gambar').attr('src','".base_url()."assets/uploads/galeri/' + gambar)
		})

		  $('#deleteGaleri').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget) // Button that triggered the modal
		  var link = button.data('link') // Extract info from data-* attributes
		  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
		  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
		  var modal = $(this)
		  modal.find('.modal-footer a').attr('href',link)
		})
        ";

		return $custom_js;
	}

}
