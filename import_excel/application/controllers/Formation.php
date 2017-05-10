<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Formation extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library(array('PHPExcel','PHPExcel/IOFactory'));
	}

	public function index()
	{
		$this->load->view('formation/import');
	}

	public function upload(){
		$fileName = time().$_FILES['file']['name'];

		//Config upload
		$config['upload_path'] = './upload/'; //buat folder dengan nama assets di root folder
        $config['file_name'] = $fileName;
        $config['allowed_types'] = 'xls|xlsx|csv';
        $config['max_size'] = 10000;

        $this->load->library('upload');
        $this->upload->initialize($config);

        if (!$this->upload->do_upload('file'))
        {
            $error = array('error' => $this->upload->display_errors());
            print_r($error);
        }else{
            $media = $this->upload->data('file');
            //Upload file excel
        	$inputFileName = './upload/'.$fileName;
        	//reading excel
        	try {
        		$inputFileType = IOFactory::identify($inputFileName);
                $objReader = IOFactory::createReader($inputFileType);
                $objPHPExcel = $objReader->load($inputFileName);
        	} catch (Exception $e) {
        		die('Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
        	}

        	$sheet = $objPHPExcel->getSheet(0);
            $highestRow = $sheet->getHighestRow();
            $highestColumn = $sheet->getHighestColumn();

              //on vide la table
                $this->db->empty_table('formation');
                $this->db->empty_table('rd_formation');
                $this->db->empty_table('fi');
            for ($row = 2; $row <= $highestRow; $row++){
            	//  Read a row of data into an array
                $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row,
                                               '',
                                                TRUE,
                                                FALSE);

                //enregistrer
                $data = array(
                    /*"idimport"=> $rowData[0][0],*/
                    //"nama"=> $rowData[0][0],
                    // "alamat"=> $rowData[0][1],
                    // "kontak"=> $rowData[0][2]

                     "id_domaine"=> $rowData[0][0],
                     "id_composante"=> $rowData[0][1],
                     "libelle"=> $rowData[0][2],
                     "niveau"=> $rowData[0][4],
                     "id_diplome"=> $rowData[0][4],
                     "id_filiere"=> $rowData[0][6],
                     "est_alternance"=> $rowData[0][7],
                     "recrutement_particulier"=> $rowData[0][8],
                     "id_site"=> $rowData[0][11],
                     "detail_stage"=> $rowData[0][10]


//                     "nom"=> $rowData[0][1],
//                     "cp_site"=> $rowData[0][2],
//                     "adresse"=> $rowData[0][3],
//                     "ville"=> $rowData[0][4]

                );


                //$insert = $this->db->insert("import_data",$data);
                //$insert = $this->db->insert("domaine",$data);
                //$insert = $this->db->insert("composante",$data); 
                $this->db->insert('formation', $data);
                $formation_id = $this->db->insert_id();  
                $data2 = array(
                    'id' => $formation_id,   
                     "id_domaine"=> $rowData[0][0],
                     "id_composante"=> $rowData[0][1],
                     "libelle"=> $rowData[0][2],
                     "niveau"=> $rowData[0][4],
                     "id_diplome"=> $rowData[0][4],
                     "id_filiere"=> $rowData[0][6],
                     "est_alternance"=> $rowData[0][7],
                     "recrutement_particulier"=> $rowData[0][8],
                     "id_site"=> $rowData[0][11],
                     "detail_stage"=> $rowData[0][10]
                ); 
            $this->db->query('INSERT INTO fi(id) '
                                . 'VALUES("'.$formation_id.'")');
               $this->db->insert('rd_formation', $data2);
            }

            $this->delete_file($media['file_path']);
            echo "Import Succèss!!";
            //redirect( base_url() . 'index.php');
        }
	}

	function delete_file($file) {
		if (file_exists($file) && is_file($file)){
			unlink($file);
		}
	}
}
