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

                    <?php echo form_open('diplome/edit/' . $diplome_item['id']); ?> 
                     <div class="form-group">
                     <label for="title" class="col-sm-2 control-label">Niveau</label>
                     <div class="col-sm-10">
                    <select name="id_niveau" class="form-control">
                        <option value="<?php echo $diplome_item['id_niveau']?>"><?php echo $diplome_item['nom_niveau'] ?></option> 
                        <?php
                        foreach($niveau as $niveau_item)
                        {
                            ?>
                            <option value="<?php echo $niveau_item['id']?>"><?php echo $niveau_item['nom_niveau'] ?></option> 
                            <?php
                        }
                        ?>
                        </select></div>
                    </div> 
                    <div class="form-group">
                        <label for="title" class="col-sm-2 control-label">Nom</label>
                        <div class="col-sm-10">
                            <input type="input" id="email" class="form-control" name="nom" value="<?php echo $diplome_item['nom'] ?>">
                        </div>
                    </div> 

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-3">
                            <button type="submit" name="submit" class="btn btn-info btn-block">Valider</button>
                        </div>   
                        <div class="col-sm-offset-2 col-sm-3"> 
                            <a class="btn btn-danger btn-block" href="<?php echo site_url('diplome/'); ?>" role="button">Annuler</a>
                        </div>
                    </div>
                    </form>

                </div>
            </div>

        </div>
        <!--endmaincontent-->
    </div>


    <?php $this->load->view('templates/footer') ?>   


