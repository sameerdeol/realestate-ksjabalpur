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
											<button class="btn btn-primary btn-sm">Edit</button>
											<button class="btn btn-danger btn-sm">Delete</button>
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

						<!-- <tfoot>
							<tr>
								<th>Name</th>
								<th>Position</th>
								<th>Office</th>
								<th>Age</th>
								<th>Start date</th>
								<th>Salary</th>
							</tr>
						</tfoot> -->
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