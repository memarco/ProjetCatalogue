<?php

class Formation_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function record_count($key)
    {
        return $this->db->from('rd_formation')
            ->join('composante', 'composante.id = rd_formation.id_composante')
            ->join('filiere', 'filiere.id = rd_formation.id_filiere')
            ->join('diplome', 'diplome.id = rd_formation.id_diplome')
            ->join('domaine', 'domaine.id = rd_formation.id_domaine')
            ->join('site', 'site.id = rd_formation.id_site')
            ->join('type_periode', 'type_periode.id = rd_formation.id_rythme')
            ->join('type_stage', 'type_stage.id = rd_formation.id_type_stage')
            ->or_like('libelle', $key)
            ->or_like('filiere.nom', $key)
            ->or_like('type_stage.nom', $key)
            ->or_like('domaine.nom', $key)
            ->or_like('diplome.nom', $key)
            ->or_like('site.nom', $key)
            ->or_like('composante.nom', $key)
            ->or_like('rd_formation.detail_stage', $key)
            ->or_like('rd_formation.detail_alt', $key)
            ->or_like('filiere.nom', $key)->count_all_results();
    }

    public function get_formation($id = FALSE, $limit, $start,$key) {
        if ($id === FALSE) {
            $this->db->select('rd_formation.id as id, type_periode.nom as nom_periode,rd_formation.id_rythme as id_rythme, nbre_entreprise, rd_formation.id_domaine,'
                . 'nbre_ecole, libelle as libelle,niveau,skills,  composante.nom as nom_c, composante.sigle as nom_s,filiere.nom as nom_f, rd_formation.id_type_formation,'
                . ' type_stage.nom as nom_stage,rd_formation.id_diplome, rd_formation.id_site, regex_stage, regex_alternance,'
                . 'nbre_ecole,nbre_semaine, debut_stage, fin_stage, rd_formation.est_alternance,rd_formation.id_filiere,'
                . 'diplome.nom as nom_d, domaine.nom as nom_do,rd_formation.id_composante, '
                . 'site.nom as nom_site, rd_formation.detail_stage, rd_formation.detail_alt, rd_formation.nbre_modif');
            $this->db->from('rd_formation');
            $this->db->join('composante', 'composante.id = rd_formation.id_composante');
            $this->db->join('filiere', 'filiere.id = rd_formation.id_filiere');
            $this->db->join('diplome', 'diplome.id = rd_formation.id_diplome');
            $this->db->join('domaine', 'domaine.id = rd_formation.id_domaine');
            $this->db->join('site', 'site.id = rd_formation.id_site');
            $this->db->join('type_periode', 'type_periode.id = rd_formation.id_rythme');
            $this->db->join('type_stage', 'type_stage.id = rd_formation.id_type_stage');
            if($key == ''){
                $this->db->limit($limit, $start);}
            $this->db->or_like('libelle', $key);
            $this->db->or_like('domaine.nom', $key);
            $this->db->or_like('composante.nom', $key);
            $this->db->or_like('filiere.nom', $key);
            $this->db->or_like('type_stage.nom', $key);
            $this->db->or_like('diplome.nom', $key);
            $this->db->or_like('site.nom', $key);
            $this->db->or_like('rd_formation.detail_stage', $key);
            $this->db->or_like('rd_formation.detail_alt', $key);
            $query = $this->db->get();
            return $query->result_array();
        }else{
            $this->db->select('rd_formation.id as id, type_periode.nom as nom_periode, rd_formation.id_rythme as id_rythme, rd_formation.nbre_entreprise, '
                . 'rd_formation.nbre_ecole, libelle as libelle,niveau, composante.nom as nom_c, composante.sigle as nom_s, filiere.nom as nom_f, rd_formation.id_type_formation,rd_formation.id_domaine ,'
                . ' type_stage.nom as nom_stage, regex_stage, regex_alternance,'
                . 'rd_formation.nbre_ecole,rd_formation.nbre_semaine,rd_formation.est_alternance, rd_formation.debut_stage, rd_formation.fin_stage, rd_formation.id_filiere,rd_formation.id_diplome,'
                . 'diplome.nom as nom_d, domaine.nom as nom_do,rd_formation.id_composante, rd_formation.id_site,'
                . 'site.nom as nom_site, rd_formation.detail_stage, rd_formation.detail_alt,rd_formation.nbre_modif');
            $this->db->from('rd_formation');
            $this->db->join('composante', 'composante.id = rd_formation.id_composante');
            $this->db->join('filiere', 'filiere.id = rd_formation.id_filiere');
            $this->db->join('diplome', 'diplome.id = rd_formation.id_diplome');
            $this->db->join('domaine', 'domaine.id = rd_formation.id_domaine');
            $this->db->join('site', 'site.id = rd_formation.id_site');
            $this->db->join('type_periode', 'type_periode.id = rd_formation.id_rythme');
            $this->db->join('type_stage', 'type_stage.id = rd_formation.id_type_stage');
            $this->db->join('fa', 'fa.id = rd_formation.id', 'left outer');
            $this->db->join('fi', 'fi.id = rd_formation.id', 'left outer');
            $this->db->where('rd_formation.id', $id);
            $query = $this->db->get();
            return $query->row_array();}
    }

    public function get_formation_by_filter($id_type_formation,$id_domaine,$id_composante,$id_filiere,$id_diplome,$id_site,$key) {

            $this->db->select('rd_formation.id as id, type_periode.nom as nom_periode,rd_formation.id_rythme as id_rythme, nbre_entreprise, rd_formation.id_domaine,'
                . 'nbre_ecole, libelle as libelle,niveau,skills,  composante.nom as nom_c, composante.sigle as nom_s,filiere.nom as nom_f, rd_formation.id_type_formation,'
                . ' type_stage.nom as nom_stage,rd_formation.id_diplome, rd_formation.id_site, regex_stage, regex_alternance,'
                . 'nbre_ecole,nbre_semaine, debut_stage, fin_stage, rd_formation.est_alternance,rd_formation.id_filiere,'
                . 'diplome.nom as nom_d, domaine.nom as nom_do,rd_formation.id_composante, '
                . 'site.nom as nom_site, rd_formation.detail_stage, rd_formation.detail_alt, rd_formation.nbre_modif');
            $this->db->from('rd_formation');
            $this->db->join('composante', 'composante.id = rd_formation.id_composante');
            $this->db->join('filiere', 'filiere.id = rd_formation.id_filiere');
            $this->db->join('diplome', 'diplome.id = rd_formation.id_diplome');
            $this->db->join('domaine', 'domaine.id = rd_formation.id_domaine');
            $this->db->join('site', 'site.id = rd_formation.id_site');
            $this->db->join('type_periode', 'type_periode.id = rd_formation.id_rythme');
            $this->db->join('type_stage', 'type_stage.id = rd_formation.id_type_stage');
            $this->db->or_like('(libelle', $key);
            $this->db->or_like('domaine.nom', $key);
            $this->db->or_like('composante.nom', $key);
            $this->db->or_like('filiere.nom', $key);
            $this->db->or_like('type_stage.nom', $key);
            $this->db->or_like('diplome.nom', $key);
            $this->db->or_like('site.nom', $key);
            $this->db->or_like('rd_formation.detail_stage', $key);
            $this->db->or_like('rd_formation.detail_alt', $key);
            $this->db->or_like('type_stage.nom', $key);
            $this->db->or_like('rd_formation.detail_stage', $key);
            $this->db->or_like('rd_formation.detail_alt', $key);
            $this->db->bracket('close','like');
            if($id_type_formation != 0){
            $this->db->where("rd_formation.id IN (SELECT id_formation from formation_type_formation where id_type_formation=$id_type_formation)", NULL, FALSE);
    }
            if($id_domaine != 0){
            $this->db->where('rd_formation.id_domaine', $id_domaine);}
            if($id_diplome != 0){
            $this->db->where('rd_formation.id_diplome', $id_diplome);}
            if($id_composante != 0){
            $this->db->where('rd_formation.id_composante', $id_composante);}
            if($id_site != 0){
            $this->db->where('rd_formation.id_site', $id_site);}
            if($id_filiere != 0){
            $this->db->where('rd_formation.id_filiere', $id_filiere);}
            $query = $this->db->get();
        return $query->result();

    }


    public function get_formation_bad($libelle = FALSE) {
        if ($libelle === FALSE) {

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
    public function get_formation_by_id($id = 0){
        $this->db->select('rd_formation.id as id, type_periode.nom as nom_periode,rd_formation.id_rythme as id_rythme, nbre_entreprise, rd_formation.id_domaine,'
            . 'nbre_ecole, libelle as libelle,niveau,skills,  composante.nom as nom_c, composante.sigle as nom_s,filiere.nom as nom_f, rd_formation.id_type_formation,'
            . ' type_stage.nom as nom_stage,rd_formation.id_diplome, rd_formation.id_site, regex_stage, regex_alternance,'
            . 'nbre_ecole,nbre_semaine, debut_stage, fin_stage, rd_formation.est_alternance,rd_formation.id_filiere,'
            . 'diplome.nom as nom_d, domaine.nom as nom_do,rd_formation.id_composante,detail_stage, '
            . 'site.nom as nom_site, site.adresse,site.cp_site, site.ville, regex_alternance, rd_formation.detail_stage, rd_formation.detail_alt, rd_formation.nbre_modif');
        $this->db->from('rd_formation');
        $this->db->join('composante', 'composante.id = rd_formation.id_composante');
        $this->db->join('filiere', 'filiere.id = rd_formation.id_filiere');
        $this->db->join('diplome', 'diplome.id = rd_formation.id_diplome');
        $this->db->join('domaine', 'domaine.id = rd_formation.id_domaine');
        $this->db->join('site', 'site.id = rd_formation.id_site');
        $this->db->join('type_periode', 'type_periode.id = rd_formation.id_rythme');
        $this->db->join('type_stage', 'type_stage.id = rd_formation.id_type_stage');
        $this->db->where('rd_formation.id', $id);
        $query = $this->db->get();
        return $query->row_array();
    }
    public function get_formation_by_id_for_detail($id = 0) {
        $this->db->select('rd_formation.id as id, type_periode.nom as nom_periode,rd_formation.id_rythme as id_rythme, nbre_entreprise, rd_formation.id_domaine,'
            . 'nbre_ecole, libelle as libelle,niveau,skills,  composante.nom as nom_c, composante.sigle as nom_s,filiere.nom as nom_f, rd_formation.id_type_formation,'
            . ' type_stage.nom as nom_stage,rd_formation.id_diplome, rd_formation.id_site, regex_stage, regex_alternance,'
            . 'nbre_ecole,nbre_semaine, debut_stage, fin_stage, rd_formation.est_alternance,rd_formation.id_filiere,'
            . 'diplome.nom as nom_d, domaine.nom as nom_do,rd_formation.id_composante,detail_stage, '
            . 'site.nom as nom_site, site.adresse,site.cp_site, site.ville, regex_alternance, rd_formation.detail_stage, rd_formation.detail_alt, rd_formation.nbre_modif');
        $this->db->from('rd_formation');
        $this->db->join('composante', 'composante.id = rd_formation.id_composante');
        $this->db->join('filiere', 'filiere.id = rd_formation.id_filiere');
        $this->db->join('diplome', 'diplome.id = rd_formation.id_diplome');
        $this->db->join('domaine', 'domaine.id = rd_formation.id_domaine');
        $this->db->join('site', 'site.id = rd_formation.id_site');
        $this->db->join('type_periode', 'type_periode.id = rd_formation.id_rythme');
        $this->db->join('type_stage', 'type_stage.id = rd_formation.id_type_stage');
        $this->db->where('rd_formation.id', $id);
        $query = $this->db->get();
        return $query->result();
    }

    public function set_formation($id = 0) {
        $this->load->helper('url');

        $mail1 = url_title($this->input->post('mention'), 'dash', TRUE);
        $data = array(
            'libelle' => $this->input->post('mention'),
            'id_type_formation' => $this->input->post('id_type_formation'),
            'id_domaine' => $this->input->post('id_domaine'),
            'id_filiere' => $this->input->post('id_filiere'),
            'id_diplome' => $this->input->post('id_diplome'),
            'est_alternance' => $this->input->post('est_alternance'),
            'niveau' => $this->input->post('niveau'),
            'id_composante' => $this->input->post('id_composante'),
            'id_site' => $this->input->post('id_site')
        );
        $id_type_stage = $this->input->post('id_type_stage');
        $nbre_semaine = $this->input->post('nbre_semaine');
        $debut_stage = $this->input->post('debut_stage');
        $fin_stage = $this->input->post('fin_stage');
        $id_rythme = $this->input->post('id_rythme');
        $nbre_ecole = $this->input->post('nbre_ecole');
        $nbre_entreprise = $this->input->post('nbre_entreprise');
        $choice = $this->input->post('entrep_choix');

        if ($id == 0) {
            if ($choice == 2) {
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
            'est_alternance' => $this->input->post('est_alternance'),
                    'id_site' => $this->input->post('id_site'),
                    'id_type_stage' => $this->input->post('id_type_stage'),
                    'nbre_semaine' => $this->input->post('nbre_semaine'),
                    'debut_stage' => $this->input->post('debut_stage'),
                    'fin_stage' => $this->input->post('fin_stage'),
                    'id_rythme' => $this->input->post('id_rythme'));
                $this->db->query('INSERT INTO fi(id,nbre_semaine,debut_stage,fin_stage,id_type_stage) '
                        . 'VALUES("' . $formation_id . '","' . $nbre_semaine . '","' . $debut_stage . '",'
                        . '"' . $fin_stage . '","' . $id_type_stage . '")');
                $this->db->insert('rd_formation', $data2);
                $this->db->trans_complete();
            } elseif ($choice == 1) {
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
            'est_alternance' => $this->input->post('est_alternance'),
                    'id_site' => $this->input->post('id_site'),
                    'id_rythme' => $this->input->post('id_rythme'),
                    'regex_alternance' => $this->input->post('regex_alternance'),
                    'detail_alt' => $this->input->post('detail_alt'));
                $this->db->query('INSERT INTO fa(id,id_rythme,nbre_ecole,nbre_entreprise) '
                        . 'VALUES("' . $formation_id . '","' . $id_rythme . '","' . $nbre_ecole . '",'
                        . '"' . $nbre_entreprise . '")');
                $this->db->insert('rd_formation', $data2);
                $this->db->trans_complete();
            }
        } else {
            $this->db->where('id', $id);
            return $this->db->update('rd_formation', $data);
        }
    }

    public function get_to_mouchard($nom = FALSE, $limit, $start) {
        $this->db->select('rd_formation.id as id, rd_formation.id_rythme as id_rythme, '
                . 'libelle as libelle,niveau, rd_formation.id_type_formation,rd_formation.id_domaine ,'
                . 'regex_stage, regex_alternance,skills, '
                . 'rd_formation.debut_stage, rd_formation.fin_stage,  rd_formation.est_alternance, rd_formation.id_filiere,rd_formation.id_diplome,'
                . 'rd_formation.id_composante, rd_formation.id_site,'
                . 'rd_formation.detail_stage, rd_formation.detail_alt');
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
        $this->db->where('rd_formation.id', $nom);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function update_formation($id = 0) {
        $this->load->helper('url');

        $data = array(
            'libelle' => $this->input->post('libelle'),
            'id_type_formation' => implode(",",$this->input->post('id_type_formation')),
            'id_domaine' => $this->input->post('id_domaine'),
            'id_filiere' => $this->input->post('id_filiere'),
            'id_diplome' => $this->input->post('id_diplome'),
            'id_composante' => $this->input->post('id_composante'),
            'est_alternance' => $this->input->post('est_alternance'),
            'id_site' => $this->input->post('id_site'),
            'regex_stage' => $this->input->post('regex_stage'),
            'regex_alternance' => $this->input->post('regex_alternance'),
            'skills' => $this->input->post('skills')
        );
        $id_type_stage = $this->input->post('id_type_stage');
        $nbre_semaine = $this->input->post('nbre_semaine');
        $debut_stage = $this->input->post('debut_stage');
        $fin_stage = $this->input->post('fin_stage');
        $id_rythme = $this->input->post('id_rythme');
        $nbre_ecole = $this->input->post('nbre_ecole');
        $nbre_entreprise = $this->input->post('nbre_entreprise');
        $reg_stage = $this->input->post('regex_stage');
        $reg_alt = $this->input->post('regex_alternance');
        $choice = $this->input->post('entrep_choix');

        if ($id == 0) {
            if ($choice == 2) {

            } elseif ($choice == 1) {

            }
        } else {
            $data2 = array(
                'libelle' => $this->input->post('mention'),
                'id_type_formation' => implode(",",$this->input->post('id_type_formation')),
                'id_domaine' => $this->input->post('id_domaine'),
                'id_filiere' => $this->input->post('id_filiere'),
                'id_diplome' => $this->input->post('id_diplome'),
                'niveau' => $this->input->post('niveau'),
                'id_composante' => $this->input->post('id_composante'),
                'id_site' => $this->input->post('id_site'),
                'id_type_stage' => $this->input->post('id_type_stage'),
                'est_alternance' => $this->input->post('est_alternance'),
                'nbre_semaine' => $this->input->post('nbre_semaine'),
                'debut_stage' => $this->input->post('debut_stage'),
                'fin_stage' => $this->input->post('fin_stage'),
                'id_rythme' => $this->input->post('id_rythme'),
                'regex_stage' => $this->input->post('regex_stage'),
                'detail_alt' => $this->input->post('detail_alt'),
                'detail_stage' => $this->input->post('detail_stage'),
                'regex_alternance' => $this->input->post('regex_alternance'),
                'skills' => $this->input->post('skills'));

            $date_modif = date('Y-m-d H:i:s');
            $nom_table = 'formation';
            $id_user = $this->session->userdata('id');
            $data = $this->formation_model->get_to_mouchard($id, 1, 1);

            $CI = & get_instance();
            $CI->load->model('historique_model');
            $CI->load->model('formation_type_formation_model');
            foreach ($data as $field_name => $value) {
                if ($field_name != 'id' && $field_name != 'niveau' && $value != $data2[$field_name]) {
                    $CI->historique_model->set_historique($date_modif, $nom_table, $id_user, $id, $field_name, $data2[$field_name], $value, 0);
                    $this->db->query('UPDATE rd_formation  SET nbre_modif=nbre_modif+1 WHERE id ='.$id.'');
                }
            }

            $CI->formation_type_formation_model->delete($id);
            $list_type_formation = $this->input->post('id_type_formation');
            for($i=0;$i<count($list_type_formation);$i++){
                $CI->formation_type_formation_model->set($id,$list_type_formation[$i]);
            }
            $this->db->where('id', $id);
            $this->db->update('rd_formation', $data2);
        }
    }

    public function delete_formation($id) {
                  $CI = & get_instance();
                  $CI->load->model('historique_model');
                  $date_modif = date('Y-m-d H:i:s');
                  $nom_table = 'rd_formation';
                  $id_user = $this->session->userdata('id');
                  $data = $this->formation_model->get_to_mouchard($id, 1, 1);
                  foreach ($data as $field_name => $value) {

                          $CI->historique_model->set_historique($date_modif, $nom_table, $id_user, $id, $field_name, $data[$field_name], $value, 0);

                  }
        $this->db->where('id', $id);
        return $this->db->delete('rd_formation');
    }

}
