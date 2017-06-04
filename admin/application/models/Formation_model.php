<?php
class Formation_model extends CI_Model {
 
    public function __construct()
    {
        $this->load->database();
    }
    
    public function record_count() {
        return $this->db->count_all("rd_formation");
    }
     
   
    public function get_formation($nom = FALSE, $limit, $start)
    {
        if ($nom === FALSE)
        {
            
            $this->db->select('rd_formation.id as id, type_periode.nom as nom_periode, nbre_entreprise, '
                    . 'nbre_ecole, libelle as libelle,niveau, composante.nom as nom_c, filiere.nom as nom_f, '
                    . 'type_formation.nom as nom_typ,type_stage.nom as nom_stage,'
                    . 'nbre_ecole,nbre_semaine, debut_stage, fin_stage,'
                    . 'diplome.nom as nom_d, domaine.nom as nom_do, '
                    . 'site.nom as nom_site, rd_formation.detail_stage as detail_s');    
            $this->db->from('rd_formation');
            $this->db->join('composante', 'composante.id = rd_formation.id_composante');  
            $this->db->join('filiere', 'filiere.id = rd_formation.id_filiere'); 
            $this->db->join('type_formation', 'type_formation.id = rd_formation.id_type_formation');  
            $this->db->join('diplome', 'diplome.id = rd_formation.id_diplome');   
            $this->db->join('domaine', 'domaine.id = rd_formation.id_domaine');
            $this->db->join('site', 'site.id = rd_formation.id_site');    
            $this->db->join('type_periode', 'type_periode.id = rd_formation.id_rythme'); 
            $this->db->join('type_stage', 'type_stage.id = rd_formation.id_type_stage');  
            $this->db->limit($limit, $start);   
            $query = $this->db->get();
            return $query->result_array();
              
        }
       
        
         $this->db->select('rd_formation.id as id, type_periode.nom as nom_periode, rd_formation.nbre_entreprise, '
                    . 'rd_formation.nbre_ecole, libelle as libelle,niveau, composante.nom as nom_c, filiere.nom as nom_f, '
                    . 'type_formation.nom as nom_typ,type_stage.nom as nom_stage,'
                    . 'rd_formation.nbre_ecole,rd_formation.nbre_semaine, rd_formation.debut_stage, rd_formation.fin_stage,'
                    . 'diplome.nom as nom_d, domaine.nom as nom_do, '
                    . 'site.nom as nom_site, rd_formation.detail_stage as detail_s');    
            $this->db->from('rd_formation');
            $this->db->join('composante', 'composante.id = rd_formation.id_composante');  
            $this->db->join('filiere', 'filiere.id = rd_formation.id_filiere'); 
            $this->db->join('type_formation', 'type_formation.id = rd_formation.id_type_formation');  
            $this->db->join('diplome', 'diplome.id = rd_formation.id_diplome');   
            $this->db->join('domaine', 'domaine.id = rd_formation.id_domaine');
            $this->db->join('site', 'site.id = rd_formation.id_site');    
            $this->db->join('type_periode', 'type_periode.id = rd_formation.id_rythme'); 
            $this->db->join('type_stage', 'type_stage.id = rd_formation.id_type_stage');   
            $this->db->join('fi', 'fi.id = rd_formation.id');    
            $this->db->where('rd_formation.id' , $nom);  
            $query = $this->db->get();
             return $query->row_array(); 
    }


     
    public function get_formation_bad($libelle = FALSE)
    {
        if ($libelle=== FALSE)
        {

            $this->db->select('formation.id, libelle, niveau, filiere.nom as nom_f, domaine.nom as nom_do,  '
               // . 'type_formation.nom as nom_typ,'
               // . 'diplome.nom as nom_d,'
                . 'composante.nom as nom_c,'
                . 'site.nom as nom_site');
            $this->db->from('formation');
            $this->db->join('filiere', 'filiere.id = formation.id_filiere');
            $this->db->join('domaine', 'domaine.id = formation.id_domaine');
            //$this->db->join('type_formation', 'type_formation.id = formation.id_type_formation');
            //$this->db->join('diplome', 'diplome.id = formation.id_diplome');
            $this->db->join('composante', 'composante.id = formation.id_composante');
            $this->db->join('site', 'site.id = formation.id_site');
            $query = $this->db->get();
            return $query->result_array();

        }

        $query = $this->db->get_where('formation', array('libelle' => $libelle));
        return $query->row_array();
    }


    public function get_formation_by_id($id = 0)
    {
        if ($id === 0)
        {
               $this->db->select('*');
            $this->db->from('formation');
            $this->db->join('composante', 'composante.id = formation.id_composante');
            $this->db->join('filiere', 'filiere.id = formation.id_filiere');
            $this->db->join('type_formation', 'type_formation.id = formation.id_type_formation');
            $this->db->join('diplome', 'diplome.id = formation.id_diplome');
            $this->db->join('domaine', 'domaine.id = formation.id_domaine');
            $this->db->join('fa', 'fa.id = formation.id','left outer');
            $this->db->join('fi', 'fi.id = formation.id','left outer');
            $this->db->join('type_periode', 'type_periode.id = fa.id_rythme');
            $this->db->join('site', 'site.id = formation.id_site');
                $this->db->where('formation.id',$id);
            $query = $this->db->get();
            return $query->result_array();
        }

        $this->db->select('*');
            $this->db->from('formation');
            $this->db->join('composante', 'composante.id = formation.id_composante');
            $this->db->join('filiere', 'filiere.id = formation.id_filiere'); 
            $this->db->join('type_formation', 'type_formation.id = formation.id_type_formation');  
            $this->db->join('diplome', 'diplome.id = formation.id_diplome');   
            $this->db->join('domaine', 'domaine.id = formation.id_domaine');
            $this->db->join('site', 'site.id = formation.id_site'); 
        $this->db->where('formation.id',$id); 
        $query = $this->db->get();
        return $query->row_array();
    }
    
    public function set_formation($id = 0)
    {
        $this->load->helper('url');
 
        $mail1 = url_title($this->input->post('libelle'), 'dash', TRUE);
        $data = array(
            'libelle' => $this->input->post('libelle'),
            'id_type_formation' => $this->input->post('id_type_formation'),
            'id_domaine' => $this->input->post('id_domaine'),
            'id_filiere' => $this->input->post('id_filiere'),
            'id_diplome' => $this->input->post('id_diplome'),
            'niveau' => $this->input->post('niveau'), 
            'id_composante' => $this->input->post('id_composante'),
            'id_site' => $this->input->post('id_site')     
        ); 
        $id_type_stage= $this->input->post('id_type_stage');
        $nbre_semaine= $this->input->post('nbre_semaine');
        $debut_stage= $this->input->post('debut_stage');
        $fin_stage= $this->input->post('fin_stage'); 
        $id_rythme=$this->input->post('id_rythme');
        $nbre_ecole=$this->input->post('nbre_ecole');
        $nbre_entreprise=$this->input->post('nbre_entreprise');  
        $choice= $this->input->post('entrep_choix');
     
        if ($id == 0) {
            if($choice==2){
            $this->db->trans_start();
            $this->db->insert('formation', $data);
            $formation_id = $this->db->insert_id();  
            $data2 = array('id' => $this->db->insert_id(),
            'libelle' => $this->input->post('mention'),
            'id_type_formation' => $this->input->post('id_type_formation'),
            'id_domaine' => $this->input->post('id_domaine'),
            'id_filiere' => $this->input->post('id_filiere'),
            'id_diplome' => $this->input->post('id_diplome'),
            'niveau' => $this->input->post('niveau'), 
            'id_composante' => $this->input->post('id_composante'),
            'id_site' => $this->input->post('id_site'),
            'id_type_stage' => $this->input->post('id_type_stage'),
            'nbre_semaine' => $this->input->post('nbre_semaine'),
            'debut_stage' => $this->input->post('debut_stage'),
            'fin_stage' => $this->input->post('fin_stage'),
            'id_rythme' => $this->input->post('id_rythme')  );
            $this->db->query('INSERT INTO fi(id,nbre_semaine,debut_stage,fin_stage,id_type_stage) '
                                . 'VALUES("'.$formation_id.'","'.$nbre_semaine.'","'.$debut_stage.'",'
                                    . '"'.$fin_stage.'","'.$id_type_stage.'")');
            $this->db->insert('rd_formation', $data2);
            $this->db->trans_complete(); 
            
            }elseif($choice==1){
                    $this->db->trans_start();
                    $this->db->insert('formation', $data);
                    $formation_id = $this->db->insert_id();  
                    $data2 = array('id' => $this->db->insert_id(),
            'libelle' => $this->input->post('libelle'),
            'id_type_formation' => $this->input->post('id_type_formation'),
            'id_domaine' => $this->input->post('id_domaine'),
            'id_filiere' => $this->input->post('id_filiere'),
            'id_diplome' => $this->input->post('id_diplome'),
            'niveau' => $this->input->post('niveau'), 
            'id_composante' => $this->input->post('id_composante'),
            'id_site' => $this->input->post('id_site'),  
            'id_rythme' => $this->input->post('id_rythme'),
            'nbre_ecole' => $this->input->post('nbre_ecole'),
            'nbre_entreprise' => $this->input->post('nbre_entreprise')  );
                    $this->db->query('INSERT INTO fa(id,id_rythme,nbre_ecole,nbre_entreprise) '
                                        . 'VALUES("'.$formation_id.'","'.$id_rythme.'","'.$nbre_ecole.'",'
                                            . '"'.$nbre_entreprise.'")');
                    $this->db->insert('rd_formation', $data2);
                    $this->db->trans_complete(); 
            }
            
            
        } else {
            $this->db->where('id', $id);
            return $this->db->update('formation', $data);
        }
    }
    
    public function delete_formation($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('formation');
    }
}
