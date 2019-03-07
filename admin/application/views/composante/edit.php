<div class="container"> 
    <?php $this->load->view('templates/menu_top') ?>
    <div class="row">
        <!-- menuleft-->
        <?php $this->load->view('templates/menu_left') ?>
        <!--endmenuleft-->

        <!--maincontent-->
        <?php $this->load->view('templates/head_form') ?>

                    <?php echo validation_errors(); ?>

                    <?php echo form_open('composante/edit/' . $composante_item['id']); ?>
                    <div class="form-group">
                        <label for="title" class="col-sm-2 control-label">Nom</label>
                        <div class="col-sm-10">
                            <input type="input" id="email" class="form-control" name="nom" value="<?php echo $composante_item['nom'] ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="text" class="col-sm-2 control-label">Mail 1</label>
                        <div class="col-sm-10">
                            <input type="text" id="text" class="form-control" name="mail1" value="<?php echo $composante_item['mail1'] ?>">
                        </div>
                    </div>
                    <div class="form-group">
                            <label for="text" class="col-sm-2 control-label">Mail 2</label>
                        <div class="col-sm-10">
                            <input type="text" id="text" class="form-control" name="mail2" value="<?php echo $composante_item['mail2'] ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="text" class="col-sm-2 control-label">Sigle</label>
                        <div class="col-sm-10">
                            <input type="text" id="text" class="form-control" name="sigle" value="<?php echo $composante_item['sigle'] ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-3">
                            <button type="submit" name="submit" class="btn btn-info btn-block">Valider</button>
                        </div>
                        <div class="col-sm-offset-2 col-sm-3">
                            <a class="btn btn-danger btn-block" href="<?php echo site_url('composante/'); ?>" role="button">Annuler</a>
                        </div>
                    </div>
                    </form>

                </div>
            </div>

        </div>
        <!--endmaincontent-->
    </div>


    <?php $this->load->view('templates/footer') ?>
