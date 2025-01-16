<div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> Form elements </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Forms</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Form elements</li>
                </ol>
              </nav>
            </div>
            <div class="row">
              <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Add Category</h4>                   
                    <form class="forms-sample" method="post" action="<?php echo base_url('lands/insert_category')?>">
                      <div class="form-group">
                        <label for="exampleInputUsername1">Category Name</label>
                        <input name="category" type="text" class="form-control" id="exampleInputUsername1" placeholder="Category Name">
                      </div>                 
                      <button type="submit" class="btn btn-gradient-primary mr-2">Submit</button>
                    </form>

					<?php if ($this->session->flashdata('error')): ?>
                        <div class="error_message">
                            <?php echo $this->session->flashdata('error'); ?>
                        </div>
                    <?php endif; ?>
					<?php if ($this->session->flashdata('success')): ?>
                        <div class="success_message">
                            <?php echo $this->session->flashdata('success'); ?>
                        </div>
                    <?php endif; ?>
                  </div>
                </div>
              </div>

  <!-- ----popup start----- -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <!-- Input Field 1 -->
          <div class="form-group">
            <label for="input1">Category Name</label>
            <input type="text" value="" name="category_name" class="form-control" id="input1" placeholder="Enter value">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<!-- ------popup end-------- -->


			  
              <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Land Categories</h4>
                  <!-- <p class="card-description">
                    Add class <code>.table</code>
                  </p> -->
          <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Category</th>
                  <th>Action</th>				
                </tr>
              </thead>
              <tbody> 
							<?php if (!empty($categories)): ?>
								<?php 
								$counter = 1; // Initialize the counter
								foreach ($categories as $category): ?>
									<tr>
										<td><?= $counter; ?></td> <!-- Increment the counter dynamically -->
										<td><?= $category['Category']; ?></td>
										<td>
											<a href="<?= base_url('lands/edit/').$category['id']; ?>"  type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Edit</a>
											<a href="<?= base_url('lands/delete/').$category['id']; ?>" class="btn btn-danger btn-sm">Delete</a>
										</td>
									</tr>
									<?php 
									$counter++; // Increment the counter after each row
								endforeach; ?>
							<?php else: ?>
								<tr>
									<td colspan="3" class="text-center">No categories found.</td>
								</tr>
							<?php endif; ?>                    
						</tbody>
					</table>
                  </div>
                </div>
              </div>
            </div>
			  
            </div>
          </div>
<script>
$(document).ready(function () {
	new DataTable('#example');
});
</script>