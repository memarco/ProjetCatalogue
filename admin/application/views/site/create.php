 
<div class="container">
    <?php $this->load->view('templates/menu_top') ?>
    <div class="row">
        <!-- menuleft-->
        <?php $this->load->view('templates/menu_left') ?>
        <!--endmenuleft-->

        <!--maincontent-->
        <?php $this->load->view('templates/head_form') ?>
                    <?php echo form_open('site/create'); ?>

                    <div class="form-group">
                        <label for="title" class="col-sm-2 control-label">Nom</label>
                        <div class="col-sm-10">
                            <input type="input" id="email" class="form-control" value="<?php echo set_value('nom'); ?>" name="nom">
                            <?php echo form_error('nom', '<div class="text-danger">', '</div>'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="text" class="col-sm-2 control-label">Adresse</label>
                        <div class="col-sm-10">
                            <input type="text" id="text" class="form-control" name="adresse" value="<?php echo set_value('adresse'); ?>"  >
                            <?php echo form_error('adresse', '<div class="text-danger">', '</div>'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                            <label for="text" class="col-sm-2 control-label">Code Postal</label>
                        <div class="col-sm-10">
                            <input  type="text" id="text" class="form-control" name="cp_site" value="<?php echo set_value('cp_site'); ?>" >
                            <?php echo form_error('cp_site', '<div class="text-danger">', '</div>'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="text" class="col-sm-2 control-label">Ville</label>
                        <div class="col-sm-10">
                            <input type="text" id="text" class="form-control" name="ville" >
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-3">
                            <button type="submit" name="submit" class="btn btn-info btn-block">Valider</button>
                        </div>
                        <div class="col-sm-offset-2 col-sm-3">
                            <a class="btn btn-danger btn-block" href="<?php echo site_url('site/'); ?>" role="button">Annuler</a>
                        </div>
                    </div>
                    </form>

                </div>
            </div>

        </div>
        <!--endmaincontent-->
    </div>


    <?php $this->load->view('templates/footer') ?>
