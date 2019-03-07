 
<div class="container">
    <?php $this->load->view('templates/menu_top') ?>
    <div class="row">
        <!-- menuleft-->
        <?php $this->load->view('templates/menu_left') ?>
        <!--endmenuleft-->

        <!--maincontent-->
        <?php $this->load->view('templates/head_form') ?>

                    <?php echo form_open('niveau/create'); ?>

                    <div class="form-group">
                        <label for="title" class="col-sm-2 control-label">Nom</label>
                        <div class="col-sm-10">
                            <input type="input" id="email" class="form-control" value="<?php echo set_value('nom_niveau'); ?>" name="nom_niveau">
                            <?php echo form_error('nom_niveau', '<div class="text-danger">', '</div>'); ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-3">
                            <button type="submit" name="submit" class="btn btn-info btn-block">Valider</button>
                        </div>
                        <div class="col-sm-offset-2 col-sm-3">
                            <a class="btn btn-danger btn-block" href="<?php echo site_url('niveau/'); ?>" role="button">Annuler</a>
                        </div>
                    </div>
                    </form>

                </div>
            </div>

        </div>
        <!--endmaincontent-->
    </div>


    <?php $this->load->view('templates/footer') ?>
