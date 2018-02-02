
<div class="container">
    <?php $this->load->view('templates/menu_top') ?>
    <div class="row">
        <!-- menuleft-->
        <?php $this->load->view('templates/menu_left') ?>
        <!--endmenuleft-->

        <!--maincontent-->

        <?php $this->load->view('templates/head_form') ?>

                    <?php echo validation_errors(); ?>

                    <?php echo form_open('filiere/edit/' . $filiere_item['id']); ?>
                     <div class="form-group">
                     <label for="title" class="col-sm-2 control-label">Domaine</label>
                     <div class="col-sm-10">
                    <select name="id_domaine" class="form-control">
                        <option value="<?php echo $filiere_item['id_domaine']?>"><?php echo $filiere_item['nom_d'] ?></option>
                        <?php
                        foreach($domaine as $domaine_item)
                        {
                            ?>
                            <option value="<?php echo $domaine_item['id']?>"><?php echo $domaine_item['nom'] ?></option>
                            <?php
                        }
                        ?>
                        </select></div>
                    </div>
                    <div class="form-group">
                        <label for="title" class="col-sm-2 control-label">Nom</label>
                        <div class="col-sm-10">
                            <input type="input" id="email" class="form-control" name="nom" value="<?php echo $filiere_item['nom_f'] ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-3">
                            <button type="submit" name="submit" class="btn btn-info btn-block">Valider</button>
                        </div>
                        <div class="col-sm-offset-2 col-sm-3">
                            <a class="btn btn-danger btn-block" href="<?php echo site_url('filiere/'); ?>" role="button">Annuler</a>
                        </div>
                    </div>
                    </form>

                </div>
            </div>

        </div>
        <!--endmaincontent-->
    </div>


    <?php $this->load->view('templates/footer') ?>
