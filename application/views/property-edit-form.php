<div class="content-wrapper">
          
  <div class="row">
  <div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Edit Property</h4>
            <p class="card-description"> Edit Your Property details </p>
            <form class="forms-sample" method="post" action="<?php echo base_url('properties/update_property'.$property['id']); ?>" enctype="multipart/form-data">
                <div class="row">
                    <!-- First column (left side) -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputName1">Property Name</label>
                            <input type="text" value="<?php echo $property['property_name']; ?>"  name="property_name" class="form-control" id="exampleInputName1" placeholder="Name">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword4">Previous Price</label>
                            <input type="text" value="<?php echo $property['previous_price']; ?>" name="previous_price" class="form-control" id="exampleInputPassword4" placeholder="Previous Price">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword4">Current Price</label>
                            <input type="text" value="<?php echo $property['current_price']; ?>" name="current_price" class="form-control" id="exampleInputPassword4" placeholder="Current Price">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail3">Property Address</label>
                            <input type="text" value="<?php echo $property['property_address']; ?>" name="property_address" class="form-control" id="exampleInputEmail3" placeholder="Property Address">
                        </div>
                        <div class="form-group">
                            <label for="property_images">Upload Banner Property Images</label>
                            <input type="file" class="form-control" name="main_property_image" id="main_property_image">
                        </div>
                        <?php var_dump($property_images['main_img_path']); ?>
                        <?php if (!empty($property_images['main_img_path'])): ?>
                            
                            <div>
                                <img src="<?= base_url('uploads/' . $property_images['main_img_path']); ?>" 
                                    alt="Main Property Image" 
                                    style="max-width: 200px; height: auto; margin-bottom: 10px;">
                            </div>
                        <?php endif; ?>
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
                        <div class="form-group">
                            <label for="property_images">Upload Property Images</label>
                            <input type="file" class="form-control" name="property_images[]" id="property_images" multiple>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputCity1">Area (in sqft)</label>
                            <input type="text" value="<?php echo $property['property_area']; ?>" name="property_area" class="form-control" id="exampleInputCity1" placeholder="Area">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputCity1">Constructed Date</label>
                            <input type="date" value="<?php echo $property['Constructed_date']; ?>" name="Constructed_date" class="form-control" id="exampleInputCity1" placeholder="Constructed Date">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputCity1">Builder Name</label>
                            <input type="text" value="<?php echo $property['builder_name']; ?>" name="builder_name" class="form-control" id="exampleInputCity1" placeholder="Builder Name">
                        </div>
                        <div class="form-group">
                            <label for="exampleSelectGender">Finance Approval</label>
                            <select class="form-control" id="exampleSelectGender" name="finance_aproval">
                            <option value="Yes" <?php if($property['finance_aproval'] == 'Yes') echo 'selected'; ?>>Yes</option>
                            <option value="No" <?php if($property['finance_aproval'] == 'No') echo 'selected'; ?>>No</option>
                        </select>
                        </div>
                    </div>
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

           
          </div>
<script>
$(document).ready(function () {
	new DataTable('#example');
});
</script>