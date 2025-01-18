<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<div class="content-wrapper">
          
  <div class="row">
  <div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">App Banner Images</h4>
            <p class="card-description"> App Banner Images </p>
            <form class="forms-sample" method="post" action="<?php echo base_url('AppBanner/submitAppBannerImage'); ?>" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-12">       
                        <div class="form-group">
                          <label for="images">Upload Property Images</label>
                          <input type="file" name="AppBanner_images[]" id="AppBanner_images" multiple class="form-control" required>
                        </div>
                        <div class="form-group">
                          <div id="image_preview" style="width:100%;">
                 
                          </div>
                        </div>
                        <div class="upload__img-wrap"></div>
                        <div id="image-preview-container" class="d-flex flex-wrap"></div>                       
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
              </div>
            </div>
            <!-- </div> -->
          </div>
<script>
$(document).ready(function () {
	new DataTable('#example');
  
});


// Multiple Image Upload Preview
$(document).ready(function () {
  var multipleFileArr = [];
  $("#AppBanner_images").change(function () {
    if (multipleFileArr.length > 0) multipleFileArr = [];

    $("#image_preview").html("");
    var totalFile = document.getElementById("AppBanner_images").files;
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
    document.getElementById("AppBanner_images").files = FileListItem(multipleFileArr);
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
