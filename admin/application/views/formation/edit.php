<?php $this->load->view('templates/header') ?>

<div class="container">
    <?php $this->load->view('templates/menu_top') ?>
    <div class="row">
        <!-- menuleft-->
        <?php $this->load->view('templates/menu_left') ?>
        <!--endmenuleft-->

        <!--maincontent-->
        <div class="col-sm-9 col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading"><h2><?php echo $title; ?></h2> </div>
                <div class="panel-body" style="margin:20px">

                    <?php echo validation_errors(); ?>

                    <?php echo form_open('formation/edit/' . $formation_item['id']); ?>
                    <div class="form-group">
                     <label for="title" class="col-sm-2 control-label">Type formation</label>
                     <?php foreach($domaine as $domaine_item) {echo $domaine_item;}?>
                     <div class="col-sm-10">
                    <select name="id_type_formation" class="form-control">
                        <?php
                   foreach($type_formation as $type_formation_item): ?>
                       <option
                           <?php  if ($type_formation_item['id']== $formation_item['id_type_formation'])
                           {
                               echo 'selected';
                           }
                           ?>>
                           <?php echo $type_formation_item['nom'];?>
                       </option>
                   <?php endforeach ?>
                        </select>
                          </div>
                    </div>
                    <div class="form-group">
                    <label for="title" class="col-sm-2 control-label">Domaine</label>
                    <div class="col-sm-10">
                   <select name="id_domaine" class="form-control">
                       <?php
                  foreach($domaine as $domaine_item): ?>
                      <option
                          <?php  if ($domaine_item['id']== $formation_item['id_domaine'])
                          {
                              echo 'selected';
                          }
                          ?>>
                          <?php echo $domaine['nom'];?>
                      </option>
                  <?php endforeach ?>
                     </div>
                   </div>
                    <div class="form-group">
                    <label for="title" class="col-sm-2 control-label">Filière</label>
                    <div class="col-sm-10">
                   <select name="id_filiere" class="form-control">
                       <?php
                       foreach($filiere as $filiere_item)
                       {
                           ?>
                           <option value="<?php echo $filiere_item['id']?>"><?php echo $filiere_item['nom'] ?></option>
                           <?php
                       }
                       ?>
                       </select></div>
                   </div>
                    <div class="form-group">
                    <label for="title" class="col-sm-2 control-label">Diplôme préparé</label>
                    <div class="col-sm-10">
                   <select name="id_diplome" class="form-control">
                       <option value="0">- Choisir -</option>
                       <?php
                       foreach($diplome as $diplome_item)
                       {
                           ?>
                           <option value="<?php echo $diplome_item['id']?>"><?php echo $diplome_item['nom'] ?></option>
                           <?php
                       }
                       ?>
                       </select></div>
                   </div>
                    <div class="form-group">
                    <label for="title" class="col-sm-2 control-label">Année</label>
                    <div class="col-sm-10">
                   <select name="niveau" class="form-control">
                       <option value="0">- Choisir -</option>
                           <option value="Annee 1">Annee 1</option>
                           <option value="Annee 2">Annee 2</option>
                           <option value="Annee 3">Annee 3</option>
                       </select></div>
                   </div>
                   <div class="form-group">
                       <label for="title" class="col-sm-2 control-label"><abbr title="(Libellé de la formation)">Mention</abbr> <span class="h"></span></label>
                       <div class="col-sm-10">
                           <input type="input" id="email" class="form-control" value="<?php echo $formation_item['libelle'] ; ?>" name="mention">
                           <?php echo form_error('mention', '<div class="text-danger">', '</div>'); ?>
                       </div>
                   </div>
                   <div class="form-group">
                    <label for="title" class="col-sm-2 control-label">Composante</label>
                    <div class="col-sm-10">
                   <select name="id_composante" class="form-control">
                       <option value="0">- Choisir -</option>
                       <?php
                       foreach($composante as $composante_item)
                       {
                           ?>
                           <option value="<?php echo $composante_item['id']?>"><?php echo $composante_item['nom'] ?></option>
                           <?php
                       }
                       ?>
                       </select></div>
                   </div>
                   <div class="form-group">
                    <label for="title" class="col-sm-2 control-label">Site</label>
                    <div class="col-sm-10">
                   <select name="id_site" class="form-control">
                       <option value="0">- Choisir -</option>
                       <?php
                       foreach($site as $site_item)
                       {
                           ?>
                           <option value="<?php echo $site_item['id']?>"><?php echo $site_item['nom'] ?></option>
                           <?php
                       }
                       ?>
                   </select>
                    </div>
                   </div>
                  <div class="form-group">
                    <label for="title" class="col-sm-2 control-label">En entreprise</label>
                    <div class="col-sm-10">
                   <select id="entrepselector" class="form-control" name="entrep_choix">
                       <option value="0">- Choisir -</option>
                           <option value="2">Stage</option>
                           <option value="1">Alternance</option>
                       </select></div>
                   </div>


                   <div id="1" class='choix' style="display:none">
                   <div class="page-header text-primary"><b>ALTERNANCE</b></div>
                   <div class="form-group">
                    <label for="title" class="col-sm-2 control-label">Rythme</label>
                    <div class="col-sm-10">
                   <select name="id_rythme" class="form-control">
                       <option value="0">- Choisir -</option>
                       <?php
                       foreach($type_periode as $type_periode_item)
                       {
                           ?>
                           <option value="<?php echo $type_periode_item['id']?>"><?php echo $type_periode_item['nom'] ?></option>
                           <?php
                       }
                       ?>
                   </select>
                    </div>
                   </div>
                   <div class="form-group">
                       <label for="title" class="col-sm-2 control-label"><abbr title="(Nombre de temps en entreprise)">Nombre en entreprise</abbr> <span class="h"></span></label>
                       <div class="col-sm-10">
                           <input type="input" id="email" class="form-control" value="<?php echo set_value('nbre_ecole'); ?>" name="nbre_ecole">

                       </div>
                   </div>
                   <div class="form-group">
                       <label for="title" class="col-sm-2 control-label"><abbr title="(Nombre de temps à l'école)">Nombre à l'école</abbr> <span class="h"></span></label>
                       <div class="col-sm-10">
                           <input type="input" id="email" class="form-control" value="<?php echo set_value('nbre_entreprise'); ?>" name="nbre_entreprise">

                       </div>
                   </div>
                   </div>

                   <div id="2" class='choix' style="display:none">
                   <div class="page-header text-primary"><b>STAGE</b></div>
                   <div class="form-group">
                    <label for="title" class="col-sm-2 control-label">Type de stage</label>
                    <div class="col-sm-10">
                   <select name="id_type_stage" class="form-control">
                       <option value="0">- Choisir -</option>
                       <?php
                       foreach($type_stage as $type_stage_item)
                       {
                           ?>
                           <option value="<?php echo $type_stage_item['id']?>"><?php echo $type_stage_item['nom'] ?></option>
                           <?php
                       }
                       ?>
                   </select>
                    </div>
                   </div>
                   <div class="form-group">
                       <label for="title" class="col-sm-2 control-label"><abbr title="(Durée du stage)">Nombre de semaine</abbr> <span class="h"></span></label>
                       <div class="col-sm-10">
                           <input type="input" id="nbre_semaine" class="form-control" value="<?php echo set_value('nbre_semaine'); ?>" name="nbre_semaine">

                       </div>
                   </div>
                   <div class="form-group">
                       <label for="title" class="col-sm-2 control-label"><abbr title="(Mois de début du stage)">Début</abbr> <span class="h"></span></label>
                       <div class="col-sm-10">
                           <select name="debut_stage" class="form-control">
                               <option value="0">- Choisir -</option>
                               <option value="Janvier">Janvier</option>
                               <option value="Février">Février</option>
                               <option value="Mars">Mars</option>
                               <option value="Avril">Avril</option>
                               <option value="Mai">Mai</option>
                               <option value="Juin">Juin</option>
                               <option value="Juillet">Juillet</option>
                               <option value="Août">Août</option>
                               <option value="Septembre">Septembre</option>
                               <option value="Octobre">Octobre</option>
                               <option value="Novembre">Novembre</option>
                               <option value="Décembre">Décembre</option>

                   </select>
                       </div>
                   </div>
                   <div class="form-group">
                       <label for="title" class="col-sm-2 control-label"><abbr title="(Mois de fin du stage)">Fin</abbr> <span class="h"></span></label>
                       <div class="col-sm-10">
                           <select name="fin_stage" class="form-control">
                               <option value="0">- Choisir -</option>
                               <option value="Janvier">Janvier</option>
                               <option value="Février">Février</option>
                               <option value="Mars">Mars</option>
                               <option value="Avril">Avril</option>
                               <option value="Mai">Mai</option>
                               <option value="Juin">Juin</option>
                               <option value="Juillet">Juillet</option>
                               <option value="Août">Août</option>
                               <option value="Septembre">Septembre</option>
                               <option value="Octobre">Octobre</option>
                               <option value="Novembre">Novembre</option>
                               <option value="Décembre">Décembre</option>

                   </select>
                       </div>
                   </div>
                   </div>
                   <div class="form-group">
                       <div class="col-sm-offset-2 col-sm-3">
                           <button type="submit" name="submit" class="btn btn-info btn-block">Valider</button>
                       </div>
                       <div class="col-sm-offset-2 col-sm-3">
                           <a class="btn btn-danger btn-block" href="<?php echo site_url('formation/'); ?>" role="button">Annuler</a>
                       </div>
                   </div>
                    </form>

                </div>
            </div>

        </div>
        <!--endmaincontent-->
    </div>


    <?php $this->load->view('templates/footer') ?>
