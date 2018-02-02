
  <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css">

<div class="container">
    <?php $this->load->view('templates/menu_top') ?>
    <div class="row">
        <!-- menuleft-->
        <?php $this->load->view('templates/menu_left') ?>
        <!--endmenuleft-->

        <!--maincontent-->
        <?php $this->load->view('templates/head_form') ?>

                    <?php echo validation_errors(); ?>

                    <?php echo form_open('formation/create'); ?>
                    <div class="form-group">
                     <label for="title" class="col-sm-2 control-label">Type formation</label>
                     <div class="col-sm-10">

                    <select name="id_type_formation" class="form-control"  id="multiple-checkboxes"  >
                        <?php
                   foreach($type_formation as $type_formation_item): ?>
                       <option value="<?php echo $type_formation_item['id']; ?>"
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
                     <label for="title" class="col-sm-2 control-label">Alternance</label>
                     <div class="col-sm-10">
                    <div  class="btn-group" >
                        <label  class="btn btn-default  <?php  if (1 == $formation_item['est_alternance'])
                          {
                              echo 'active';
                          }
                          ?>"><input type="radio" name="est_alternance" value="1" id="oui_alternance"
                                                                       <?php  if (1 == $formation_item['est_alternance'])
                          {
                              echo 'checked';
                          }
                          ?>> OUI</label>
                        <label  class="btn btn-default  <?php  if (0 == $formation_item['est_alternance'])
                          {
                              echo 'active';
                          }
                          ?>"><input type="radio" name="est_alternance" value="0" id="non_alternance"
                            <?php  if (0 == $formation_item['est_alternance'])
                          {
                              echo 'checked';
                          }
                          ?>> NON</label>
                    </div>
                    </div>
                    </div>
                    <div class="form-group">
                    <label for="title" class="col-sm-2 control-label">Domaine</label>
                    <div class="col-sm-10">
                   <select name="id_domaine" class="form-control">
                       <?php
                  foreach($domaine as $domaine_item): ?>
                      <option value="<?php echo $domaine_item['id']; ?>"
                          <?php  if ($domaine_item['id']== $formation_item['id_domaine'])
                          {
                              echo 'selected';
                          }
                          ?>>
                          <?php echo $domaine_item['nom'];?>
                      </option>
                  <?php endforeach ?>
                   </select>
                     </div>
                   </div>
                    <div class="form-group">
                    <label for="title" class="col-sm-2 control-label">Filière</label>
                    <div class="col-sm-10">
                   <select name="id_filiere" class="form-control">
                              <?php
                  foreach($filiere as $filiere_item): ?>
                      <option value="<?php echo $filiere_item['id']; ?>"
                          <?php  if ($filiere_item['id']== $formation_item['id_filiere'])
                          {
                              echo 'selected';
                          }
                          ?>>
                          <?php echo $filiere_item['nom'];?>
                      </option>
                  <?php endforeach ?>
                       </select></div>
                   </div>
                    <div class="form-group">
                    <label for="title" class="col-sm-2 control-label">Diplôme préparé</label>
                    <div class="col-sm-10">
                     <select name="id_diplome" class="form-control">
                              <?php
                  foreach($diplome as $diplome_item): ?>
                      <option value="<?php echo $diplome_item['id']; ?>"
                          <?php  if ($diplome_item['id']== $formation_item['id_diplome'])
                          {
                              echo 'selected';
                          }
                          ?>>
                          <?php echo $diplome_item['nom'];?>
                      </option>
                  <?php endforeach ?>
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
                              <?php
                  foreach($composante as $composante_item): ?>
                      <option value="<?php echo $composante_item['id']; ?>"
                          <?php  if ($composante_item['id']== $formation_item['id_composante'])
                          {
                              echo 'selected';
                          }
                          ?>>
                          <?php echo $composante_item['nom'];?>
                      </option>
                  <?php endforeach ?>
                       </select></div>
                   </div>
                   <div class="form-group">
                    <label for="title" class="col-sm-2 control-label">Site</label>
                    <div class="col-sm-10">
                        <select name="id_site" class="form-control">
                              <?php
                  foreach($site as $site_item): ?>
                      <option value="<?php echo $site_item['id']; ?>"
                          <?php  if ($site_item['id']== $formation_item['id_site'])
                          {
                              echo 'selected';
                          }
                          ?>>
                          <?php echo $site_item['nom'];?>
                      </option>
                  <?php endforeach ?>
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
                    <label for="title" class="col-sm-2 control-label"><abbr title="(Entreprise/Ecole)">Rythme</abbr></label>
                    <div class="col-sm-10">
                     <input type="input" id="email" class="form-control" value="<?php echo $formation_item['regex_alternance']; ?>" name="regex_alternance" placeholder="(Ent/Univ) ex: 2mois/2mois  ou 4 sem/4 sem.  ou 2j /3j ">
                    </div>
                   </div>
          <div class="form-group">
                    <label for="title" class="col-sm-2 control-label"><abbr title="Autre détail">Autre détail</abbr></label>
                    <div class="col-sm-10">
                           <textarea type="input" id="autre_detail" class="form-control" name="detail_alt"><?php echo $formation_item['detail_alt']; ?></textarea>
                    </div>
                   </div>
                   </div>

                   <div id="2" class='choix' style="display:none">
                   <div class="page-header text-primary"><b>STAGE</b></div>
                   <div class="form-group">
                   </div>
                   <div class="form-group">
                       <label for="title" class="col-sm-2 control-label"><abbr title="4|SEM|1$1|OPT">Détail du stage</abbr> <span class="h"></span></label>
                       <div class="col-sm-10">
                           <input type="input" id="nbre_semaine" class="form-control"  name="regex_stage" placeholder="NBRE|TEMPS|SEMESTRE|OPT ex: 4|SEM|1$1|OPT" value="<?php echo $formation_item['regex_stage']; ?>">

                       </div>
                   </div>
                   <div class="form-group">
                       <label for="title" class="col-sm-2 control-label"><abbr title="(Autres détails)">Commentaire</abbr> <span class="h"></span></label>
                       <div class="col-sm-10">
                           <textarea type="input" id="autre_detail" class="form-control" name="detail_stage"><?php echo $formation_item['detail_stage']; ?></textarea>

                       </div>
                   </div>
                   <div class="form-group">
                       <label for="title" class="col-sm-2 control-label"><abbr title="(Mois de début du stage)">Début</abbr> <span class="h"></span></label>
                       <div class="col-sm-10">
                               <select name="debut_stage" class="form-control">
                                     <option value="">-Choisir-</option>
                              <?php
// Tableau de mois
$arr = array('Janvier' => 'Janvier', 'Février' => 'Février', 'Mars' => 'Mars', 'Avril' => 'Avril', 'Mai' => 'Mai', 'Juin' => 'Juin', 'Juillet' => 'Juillet', 'Août' => 'Août', 'Septembre' => 'Septembre', 'Octobre' => 'Octobre', 'Novembre' => 'Novembre', 'Décembre' => 'Décembre');


                  foreach($arr as $key => $value): ?>
                      <option value="<?php echo $key; ?>"
                          <?php  if ($key== $formation_item['debut_stage'])
                          {
                              echo 'selected';
                          }
                          ?>>
                          <?php echo $key;?>
                      </option>
                  <?php endforeach ?>
                       </select>
                       </div>
                   </div>
                   <div class="form-group">
                       <label for="title" class="col-sm-2 control-label"><abbr title="(Mois de fin du stage)">Fin</abbr> <span class="h"></span></label>
                       <div class="col-sm-10">
                         <select name="fin_stage" class="form-control">
                           <option value="">-Choisir-</option>
                              <?php
                  foreach($arr as $key => $value): ?>
                      <option value="<?php echo $key; ?>"
                          <?php  if ($key== $formation_item['fin_stage'])
                          {
                              echo 'selected';
                          }
                          ?>>
                          <?php echo $key;?>
                      </option>
                  <?php endforeach ?>
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
