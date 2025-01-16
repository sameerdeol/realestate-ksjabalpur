<div class="content-wrapper">
          
  <div class="row">
  <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Basic form elements</h4>
                    <p class="card-description"> Basic form elements </p>
                    <form class="forms-sample">
                      <div class="form-group">
                        <label for="exampleInputName1">Property Name</label>
                        <input type="text" name="property_name" class="form-control" id="exampleInputName1" placeholder="Name">
                      </div>                
                      <div class="form-group">
                        <label for="exampleInputPassword4">Previous Price</label>
                        <input type="text" name="previous_price" class="form-control" id="exampleInputPassword4" placeholder="Previous Price">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword4">Current Price</label>
                        <input type="text" name="current_price" class="form-control" id="exampleInputPassword4" placeholder="Current Price">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail3">Property Address</label>
                        <input type="text" name="property_address" class="form-control" id="exampleInputEmail3" placeholder="Property Address">
                      </div>
                      <div class="form-group">
                        <label for="exampleSelectGender">Land Types</label>
                        <select class="form-control" id="exampleSelectGender">
                          <option>Commercial</option>
                          <option>Industrial</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>File upload</label>
                        <input type="file" name="img[]" class="file-upload-default" multiple>
                        <div class="input-group col-xs-12">
                          <input type="text" class="form-control file-upload-info"  placeholder="Upload Image" multiple>
                          <span class="input-group-append">
                            <button class="file-upload-browse btn btn-gradient-primary" type="button">Upload</button>
                          </span>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputCity1">City</label>
                        <input type="text" class="form-control" id="exampleInputCity1" placeholder="Location">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputCity1">Area (in sqft)</label>
                        <input type="text" class="form-control" id="exampleInputCity1" placeholder="area">
                      </div>
                      <div class="form-group">
                        <label for="exampleTextarea1">Textarea</label>
                        <textarea class="form-control" id="exampleTextarea1" rows="4"></textarea>
                      </div>
                      <button type="submit" class="btn btn-gradient-primary mr-2">Submit</button>
                      <button class="btn btn-light">Cancel</button>
                    </form>
                  </div>
                </div>
              </div>
  </div>

            <div class="row">  
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
							
							
									<tr>
										<td>1</td> <!-- Increment the counter dynamically -->
										<td>1</td>
										<td>
											<button class="btn btn-primary btn-sm">Edit</button>
											<button class="btn btn-danger btn-sm">Delete</button>
										</td>
									</tr>
								
								                 
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