<?php $this->load->view('templates/header') ?>

<div class="container"> 
<?php $this->load->view('templates/menu_top') ?>
<div class="row">
<!-- menuleft-->
<?php $this->load->view('templates/menu_left') ?>   
<!--endmenuleft-->

<!--maincontent-->        
<?php $this->load->view('templates/main_head') ?> 
               
              <p><a class="btn btn-primary" data-toggle="modal" data-target="#create-user">AJOUTER &nbsp;&nbsp;&nbsp;
                      <span class="glyphicon glyphicon-plus text-right" aria-hidden="true"></span></a>
                      <span style="float:right; font-weight: ">Nombre de site : <?php echo $total_type_formation;  ?></p>
<table  class="table table-bordered"> 
    <thead>
				<tr>
					<th>Nom</th>  
					<th>Action</th>
				</tr>
			</thead>
    <tbody>
        <tr dir-paginate="value in data | itemsPerPage:5" total-items="totalItems">          
            <td>{{ value.nom }}</td>          
            <td>
            <button data-toggle="modal" ng-click="edit(value.id)" data-target="#edit-data" class="btn btn-primary">Edit</button>
            <button ng-click="remove(value,$index)" class="btn btn-danger">Delete</button>
            </td>
        </tr>
    </tbody>

</table> 
   <dir-pagination-controls class="pull-right" on-page-change="pageChanged(newPageNumber)" template-url="templates/dirPagination.html" ></dir-pagination-controls>              
     <!-- Edit Modal -->
  
   <!-- Create Modal -->
<div class="modal fade" id="create-user" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="POST" name="addItem" role="form" ng-submit="saveAdd()">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Create Item</h4>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <strong>Nom : </strong>
                            <div class="form-group">
                                <input ng-model="form.nom" type="text" placeholder="Name" name="nom" class="form-control" required />
                                
                            </div>
                        </div>
                         
                    </div>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" ng-disabled="addItem.$invalid" class="btn btn-primary">Submit</button>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>  
     
     
<div class="modal fade" id="edit-data" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="POST" name="editItem" role="form" ng-submit="saveEdit()">
                <input ng-model="form.id" type="hidden" placeholder="Name" name="name" class="form-control" />
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Edit Item</h4>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="form-group">
                               <input ng-model="form.title" type="text" placeholder="Name" name="title" class="form-control" required />
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="form-group">
                               <textarea ng-model="form.description" class="form-control" required>
                                </textarea>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" ng-disabled="editItem.$invalid" class="btn btn-primary create-crud">Submit</button>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>                 
          </div>
        </div>

</div>
<!--endmaincontent-->
</div>
 
 
<?php $this->load->view('templates/footer') ?>   


