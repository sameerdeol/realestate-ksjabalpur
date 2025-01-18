  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<div class="content-wrapper">
          
  <div class="row">
  <div class="col-12 grid-margin stretch-card">
<<<<<<< HEAD
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Basic form elements</h4>
            <p class="card-description"> Basic form elements </p>
            <form class="forms-sample" method="post" action="<?php echo base_url('properties/submitPropertyDetail'); ?>" enctype="multipart/form-data">
                <div class="row">
                    <!-- First column (left side) -->
                    <div class="col-md-6">
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
                            <label for="property_images">Upload Banner Property Image</label>
                            <input type="file" class="form-control" name="main_property_image" id="main_property_image">
                        </div>
                        <div id="single_image_preview" style="width:100%;">
                            
                          </div>
                    </div>
                    <!-- Second column (right side) -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleSelectGender">Land Types</label>
                            <select class="form-control" id="exampleSelectGender" name="land_category">
                                <?php if (!empty($categories)): ?>
                                    <?php foreach ($categories as $cat): ?>
                                        <option value="<?= $cat['id']; ?>"><?= $cat['Category']; ?></option>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <option value="">No categories available</option>
                                <?php endif; ?>
                            </select>
                        </div>
                        <!-- <div class="form-group">
                            <label for="property_images">Upload Property Images</label>
                            <input type="file" class="form-control upload__inputfile" name="property_images[]" id="property_images" multiple>
                        </div> -->
                        <div class="form-group">
                          <label for="images">Upload Property Images</label>
                          <input type="file" name="property_images[]" id="images" multiple class="form-control" required>
                        </div>
                        <div class="form-group">
                          <div id="image_preview" style="width:100%;">
                            
                          </div>
                        </div>
                        <div class="upload__img-wrap"></div>
                        <div id="image-preview-container" class="d-flex flex-wrap"></div>
                        <div class="form-group">
                            <label for="exampleInputCity1">Area (in sqft)</label>
                            <input type="text" name="property_area" class="form-control" id="exampleInputCity1" placeholder="Area">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputCity1">Constructed Date</label>
                            <input type="date" name="Constructed_date" class="form-control" id="exampleInputCity1" placeholder="Constructed Date">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputCity1">Builder Name</label>
                            <input type="text" name="builder_name" class="form-control" id="exampleInputCity1" placeholder="Builder Name">
                        </div>
                        <div class="form-group">
                            <label for="exampleSelectGender">Finance Approval</label>
                            <select class="form-control" id="exampleSelectGender" name="finance_aproval">
                                <option>Yes</option>
                                <option>No</option>
                            </select>
                        </div>
                    </div>
=======
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Basic form elements</h4>
                    <p class="card-description"> Basic form elements </p>
                    <form class="forms-sample" method= "post" action="<?php echo base_url('properties/submitPropertyDetail'); ?>" enctype="multipart/form-data">
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
                        <select class="form-control" id="exampleSelectGender" name= "land_category">
                            <?php if (!empty($categories)): ?>
                                <?php foreach ($categories as $cat): ?>
                                    <option value="<?= $cat['id']; ?>"><?= $cat['Category']; ?></option>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <option value="">No categories available</option>
                            <?php endif; ?>
                        </select>
                    </div>
                      <!-- <div class="form-group">
                        <label>File upload</label>
                        <input type="file" name="img[]" class="file-upload-default" multiple>
                        <div class="input-group col-xs-12">
                          <input type="text" class="form-control file-upload-info"  placeholder="Upload Image" multiple>
                          <span class="input-group-append">
                            <button class="file-upload-browse btn btn-gradient-primary" type="button">Upload</button>
                          </span>
                        </div>
                      </div> -->
                      <div class="form-group">
                        <label for="property_images">Upload Property Images</label>
                        <input type="file" class="form-control" name="property_images[]" id="property_images" multiple>
                    </div>
                      <div class="form-group">
                        <label for="exampleInputCity1">Area (in sqft)</label>
                        <input type="text" name="property_area" class="form-control" id="exampleInputCity1" placeholder="area">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputCity1">Constructed Date</label>
                        <input type="text" name="Constructed_date" class="form-control" id="exampleInputCity1" placeholder="Constructed Date">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputCity1">Builder Name</label>
                        <input type="text" name="builder_name" class="form-control" id="exampleInputCity1" placeholder="Builder Name">
                      </div>
                      <!-- <div class="form-group">
                        <label for="exampleTextarea1">Textarea</label>
                        <textarea class="form-control" id="exampleTextarea1" rows="4"></textarea>
                      </div> -->
                      <div class="form-group">
                        <label for="exampleSelectGender">Finance Aproval</label>
                        <select class="form-control" id="exampleSelectGender" name= "finance_aproval">
                          <option>Yes</option>
                          <option>No</option>
                        </select>
                      </div>
                      <button type="submit" class="btn btn-gradient-primary mr-2">Submit</button>
                      <button class="btn btn-light">Cancel</button>
                    </form>
                  </div>
>>>>>>> 311645cad6a6f531e472a467b564ef451706ad87
                </div>
                <button type="submit" class="btn btn-gradient-primary mr-2">Submit</button>
                <button class="btn btn-light">Cancel</button>
            </form>
        </div>
    </div>
</div>

              <?php if ($this->session->flashdata('success_message')): ?>
                <script type="text/javascript">
                    alert('<?= $this->session->flashdata('success_message'); ?>');
                </script>
            <?php endif; ?>
            <?php if ($this->session->flashdata('error_message')): ?>
                <script type="text/javascript">
                    alert('<?= $this->session->flashdata('error_message'); ?>');
                </script>
            <?php endif; ?>

            <!-- <div class="row">   -->
              <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Land Categories</h4>
                  <!-- <p class="card-description">
                    Add class <code>.table</code>
                  </p> -->
                  <div class="">
                    <table id="example" class=" table-responsive table table-striped table-bordered" style="width:100%">
						<thead>
							<tr>
								<th>ID</th>
								<th>Property Name</th>
                <th>Land Type</th>
                <th>Current Price</th>
                <th>Previous Price</th>
                <th>Property Address</th>
                <th>Property Area (in sqft)</th>
                <th>Constructed Date</th>
                <th>Builder Name</th>
                <th>Finance Approval</th>
								<th>Action</th>				
							</tr>
						</thead>
                <tbody> 
                  <?php 
                  $counter = 1;
                  foreach ($property_details as $property){
                  ?>
                    <tr id="proper_row_<?php echo $property['id']; ?>">
                      <td><?php echo $counter; ?></td>
                      <td><?php echo $property['property_name']; ?></td>
                      <td><?php echo $property['land_category']; ?></td>
                      <td><?php echo $property['current_price']; ?></td>
                      <td><?php echo $property['previous_price']; ?></td>
                      <td><?php echo $property['property_address']; ?></td>
                      <td><?php echo $property['property_area']; ?></td>
                      <td><?php echo $property['Constructed_date']; ?></td>
                      <td><?php echo $property['builder_name']; ?></td>
                      <td><?php echo $property['finance_aproval']; ?></td>
                      <td>
                      <a href="<?php echo base_url('properties/edit_property/'.$property['id']); ?>" class="btn btn-danger btn-sm delete-btn" data-id="<?= $property['id']; ?>">Edit</a>
                      <a href="javascript:void(0);" class="btn btn-danger btn-sm delete-btn" data-id="<?php echo $property['id']; ?>">Delete</a>
                      </td>
                    </tr>
                  <?php
                    $counter++;
                    }
                  ?>
                  	                 
                    </tbody>
                  </table>
                  </div>
                </div>
              </div>
            </div>
            <!-- </div> -->
          </div>
<script>
$(document).ready(function () {
	new DataTable('#example');
  
});
// Preview for single image upload
// Single Image Upload Preview
$(document).ready(function () {
  var singleFileArr = [];
  $("#main_property_image").change(function () {
    if (singleFileArr.length > 0) singleFileArr = [];

    $("#single_image_preview").html("");
    var totalFile = document.getElementById("main_property_image").files;
    if (!totalFile.length) return;
    for (var i = 0; i < totalFile.length; i++) {
      if (totalFile[i].size > 1048576) {
        alert("File size exceeds 1MB");
        return false;
      } else {
        singleFileArr.push(totalFile[i]);
        $("#single_image_preview").append(
          "<div class='img-div' id='single-img-div" +
            i +
            "'><img src='" +
            URL.createObjectURL(totalFile[i]) +
            "' class='img-responsive image img-thumbnail' title='" +
            totalFile[i].name +
            "'><div class='middle'><button id='action-icon-single' value='single-img-div" +
            i +
            "' class='btn btn-danger' role='" +
            totalFile[i].name +
            "'><i class='fa fa-trash'></i></button></div></div>"
        );
      }
    }
  });

  $("body").on("click", "#action-icon-single", function (evt) {
    var divName = this.value;
    var fileName = $(this).attr("role");
    $(`#${divName}`).remove();

    for (var i = 0; i < singleFileArr.length; i++) {
      if (singleFileArr[i].name === fileName) {
        singleFileArr.splice(i, 1);
      }
    }
    document.getElementById("main_property_image").files = FileListItem(singleFileArr);
    evt.preventDefault();
  });

  function FileListItem(file) {
    file = [].slice.call(Array.isArray(file) ? file : arguments);
    for (var c, b = c = file.length, d = true; b-- && d; ) d = file[b] instanceof File;
    if (!d) throw new TypeError("expected argument to FileList is File or array of File objects");
    for (b = (new ClipboardEvent("")).clipboardData || new DataTransfer(); c--; ) b.items.add(file[c]);
    return b.files;
  }
});

// Multiple Image Upload Preview
$(document).ready(function () {
  var multipleFileArr = [];
  $("#images").change(function () {
    if (multipleFileArr.length > 0) multipleFileArr = [];

    $("#image_preview").html("");
    var totalFile = document.getElementById("images").files;
    if (!totalFile.length) return;
    for (var i = 0; i < totalFile.length; i++) {
      if (totalFile[i].size > 1048576) {
        alert("File size exceeds 1MB");
        return false;
      } else {
        multipleFileArr.push(totalFile[i]);
        $("#image_preview").append(
          "<div class='img-div' id='multi-img-div" +
            i +
            "'><img src='" +
            URL.createObjectURL(totalFile[i]) +
            "' class='img-responsive image img-thumbnail' title='" +
            totalFile[i].name +
            "'><div class='middle'><button id='action-icon-multi' value='multi-img-div" +
            i +
            "' class='btn btn-danger' role='" +
            totalFile[i].name +
            "'><i class='fa fa-trash'></i></button></div></div>"
        );
      }
    }
  });

  $("body").on("click", "#action-icon-multi", function (evt) {
    var divName = this.value;
    var fileName = $(this).attr("role");
    $(`#${divName}`).remove();

    for (var i = 0; i < multipleFileArr.length; i++) {
      if (multipleFileArr[i].name === fileName) {
        multipleFileArr.splice(i, 1);
      }
    }
    document.getElementById("images").files = FileListItem(multipleFileArr);
    evt.preventDefault();
  });

  function FileListItem(file) {
    file = [].slice.call(Array.isArray(file) ? file : arguments);
    for (var c, b = c = file.length, d = true; b-- && d; ) d = file[b] instanceof File;
    if (!d) throw new TypeError("expected argument to FileList is File or array of File objects");
    for (b = (new ClipboardEvent("")).clipboardData || new DataTransfer(); c--; ) b.items.add(file[c]);
    return b.files;
  }
});

</script>
