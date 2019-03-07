<?php

class nFormation_model extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }

    public function record_count($key)
    {
        return $this->db->from('rd_formation')
            ->join('composante', 'composante.id = rd_formation.id_composante')
            ->join('filiere', 'filiere.id = rd_formation.id_filiere')
            ->join('formation_type_formation', 'formation_type_formation.id_formation = rd_formation.id_formation')
            ->join('type_formation', 'type_formation.id = formation_type_formation.id_type_formation')
            ->join('diplome', 'diplome.id = rd_formation.id_diplome')
            ->join('domaine', 'domaine.id = rd_formation.id_domaine')
            ->join('site', 'site.id = rd_formation.id_site')
            ->join('type_periode', 'type_periode.id = rd_formation.id_rythme')
            ->join('type_stage', 'type_stage.id = rd_formation.id_type_stage')
            ->or_like('libelle', $key)
            ->or_like('filiere.nom', $key)
            ->or_like('type_stage.nom', $key)
            ->or_like('type_formation.nom', $key)
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
                . 'nbre_ecole, libelle as libelle,niveau, composante.nom as nom_c, composante.sigle as nom_s,filiere.nom as nom_f, rd_formation.id_type_formation,'
                . 'type_formation.nom as nom_typ,type_stage.nom as nom_stage,rd_formation.id_diplome, rd_formation.id_site, regex_stage, regex_alternance,'
                . 'nbre_ecole,nbre_semaine, debut_stage, fin_stage, rd_formation.est_alternance,rd_formation.id_filiere,'
                . 'diplome.nom as nom_d, domaine.nom as nom_do,rd_formation.id_composante, '
                . 'site.nom as nom_site, rd_formation.detail_stage, rd_formation.detail_alt, rd_formation.nbre_modif');
            $this->db->from('rd_formation');
            $this->db->join('composante', 'composante.id = rd_formation.id_composante');
            $this->db->join('filiere', 'filiere.id = rd_formation.id_filiere');
            $this->db->join('formation_type_formation', 'formation_type_formation.id_formation = rd_formation.id_formation');
            $this->db->join('type_formation', 'type_formation.id = formation_type_formation.id_type_formation');
            $this->db->join('diplome', 'diplome.id = rd_formation.id_diplome');
            $this->db->join('domaine', 'domaine.id = rd_formation.id_domaine');
            $this->db->join('site', 'site.id = rd_formation.id_site');
            $this->db->join('type_periode', 'type_periode.id = rd_formation.id_rythme');
            $this->db->join('type_stage', 'type_stage.id = rd_formation.id_type_stage');
            if($key == ''){
                $this->db->limit($limit, $start);}
            $this->db->or_like('libelle', $key);
            $this->db->or_like('type_formation.nom', $key);
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
                . 'type_formation.nom as nom_typ,type_stage.nom as nom_stage, regex_stage, regex_alternance,'
                . 'rd_formation.nbre_ecole,rd_formation.nbre_semaine,rd_formation.est_alternance, rd_formation.debut_stage, rd_formation.fin_stage, rd_formation.id_filiere,rd_formation.id_diplome,'
                . 'diplome.nom as nom_d, domaine.nom as nom_do,rd_formation.id_composante, rd_formation.id_site,'
                . 'site.nom as nom_site, rd_formation.detail_stage, rd_formation.detail_alt,rd_formation.nbre_modif');
            $this->db->from('rd_formation');
            $this->db->join('composante', 'composante.id = rd_formation.id_composante');
            $this->db->join('filiere', 'filiere.id = rd_formation.id_filiere');
            $this->db->join('formation_type_formation', 'formation_type_formation.id_formation = rd_formation.id_formation');
            $this->db->join('type_formation', 'type_formation.id = formation_type_formation.id_type_formation');
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

}