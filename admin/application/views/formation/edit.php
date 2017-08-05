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
                     <label for="title" class="col-sm-2 control-label">Mention</label>
                     <div class="col-sm-10">
                    <select name="" class="form-control">
                        <option value="<?php echo $formation_item['id']?>"><?php echo $formation_item['libelle'] ?></option> 
                        <?php
                        foreach($formation as $formation_item)
                        {
                            ?>
                            <option value="<?php echo $formation_item['id']?>"><?php echo $formation_item['libelle'] ?></option> 
                            <?php
                        }
                        ?>
                        </select>
                     </div>
                    </div> 
                    
                    <div class="form-group">
                     <label for="title" class="col-sm-2 control-label">Filiere</label>
                     <div class="col-sm-10">
                    <select name="id_filiere" class="form-control">
                        <option value="<?php echo $formation_item['id_filiere']?>"><?php echo $formation_item['nom_f'] ?></option> 
                        <?php
                        foreach($filiere as $filiere_item)
                        {
                            ?>
                            <option value="<?php echo $filiere_item['id']?>"><?php echo $filiere_item['nom_f'] ?></option> 
                            <?php
                        }
                        ?>
                        </select></div>
                    
                    
                    
                    <div class="form-group">
                         
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


