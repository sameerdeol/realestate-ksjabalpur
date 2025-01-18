       <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          <footer class="footer">
            <div class="container-fluid clearfix">
              <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © bootstrapdash.com 2020</span>
              <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a href="https://www.bootstrapdash.com/bootstrap-admin-template/" target="_blank">Bootstrap admin templates </a> from Bootstrapdash.com</span>
            </div>
          </footer>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
        
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <script>
        $(document).ready(function () {
            // Fade out messages after 4 seconds
            setTimeout(function () {
                $('.error_message, .success_message').fadeOut('slow');
            }, 1000); // 4000ms = 4 seconds
        });
    </script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<script src="https://cdn.datatables.net/2.2.1/js/dataTables.js"></script>
	<script src="https://cdn.datatables.net/2.2.1/js/dataTables.bootstrap4.js"></script>
    <!-- container-scroller -->
     
    <!-- plugins:js -->
    <script src="<?php echo base_url('template'); ?>/assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="<?php echo base_url('template'); ?>/assets/vendors/chart.js/Chart.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="<?php echo base_url('template'); ?>/assets/js/off-canvas.js"></script>
    <script src="<?php echo base_url('template'); ?>/assets/js/hoverable-collapse.js"></script>
    <script src="<?php echo base_url('template'); ?>/assets/js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="<?php echo base_url('template'); ?>/assets/js/dashboard.js"></script>
    <script src="<?php echo base_url('template'); ?>/assets/js/todolist.js"></script>
    <script src="<?php echo base_url('template'); ?>/assets/js/file-upload.js"></script>
    <!-- End custom js for this page -->
  </body>
</html>