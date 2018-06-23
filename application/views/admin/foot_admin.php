<footer class="main-footer">
  <div class="pull-right hidden-xs">
    <b>Version</b> 2.4.0
  </div>
  <strong>Copyright &copy; 2018 <a href="https://adminlte.io">VokasiDev</a>.</strong> All rights
  reserved.
</footer>


<!-- Morris.js charts -->
<script src="<?php echo base_url('AdminLTE/bower_components/raphael/raphael.min.js') ?>"></script>
<script src="<?php echo base_url('AdminLTE/bower_components/morris.js/morris.min.js') ?>"></script>
<!-- Sparkline -->
<script src="<?php echo base_url('AdminLTE/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js') ?>"></script>
<!-- jvectormap -->
<script src="<?php echo base_url('AdminLTE/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') ?>"></script>
<script src="<?php echo base_url('AdminLTE/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') ?>"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url('AdminLTE/bower_components/jquery-knob/dist/jquery.knob.min.js') ?>"></script>
<!-- daterangepicker -->
<script src="<?php echo base_url('AdminLTE/bower_components/moment/min/moment.min.js') ?>"></script>
<script src="<?php echo base_url('AdminLTE/bower_components/bootstrap-daterangepicker/daterangepicker.js') ?>"></script>
<!-- datepicker -->
<script src="<?php echo base_url('AdminLTE/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') ?>"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo base_url('AdminLTE/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') ?>"></script>
<!-- Slimscroll -->
<script src="<?php echo base_url('AdminLTE/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') ?>"></script>
<!-- FastClick -->
<script src="<?php echo base_url('AdminLTE/bower_components/fastclick/lib/fastclick.js') ?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('AdminLTE/dist/js/adminlte.min.js') ?>"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url('AdminLTE/dist/js/pages/dashboard.js') ?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url('AdminLTE/dist/js/demo.js') ?>"></script>
<!-- DataTables -->
<script src="<?php echo base_url('AdminLTE/bower_components/datatables.net/js/jquery.dataTables.min.js') ?>"></script>
<script src="<?php echo base_url('AdminLTE/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') ?>"></script>
<!-- Select2 -->
<script src="<?php echo base_url('AdminLTE/bower_components/select2/dist/js/select2.full.min.js') ?>"></script>

	<script>
	
	/** add active class and stay opened when selected */
		var url = window.location;
		
		// for sidebar menu entirely but not cover treeview
		$('ul.sidebar-menu a').filter(function() {
			return this.href == url;
		}).parent().addClass('active');
		
		// for treeview
		$('ul.treeview-menu a').filter(function() {
			return this.href == url;
		}).parentsUntil(".sidebar-menu > .treeview-menu").addClass('active');
	</script>
	
	<script>
		$(function () {
			$('#example1').DataTable(),
			$('#example2').DataTable({
				'paging'      : true,
				'lengthChange': false,
				'searching'   : false,
				'ordering'    : true,
				'info'         : true,
				'autoWidth'   : false
			})
			
			//Initialize Select2 Elements
			$('.select2').select2()
			
		})
	</script>
</body>
</html>