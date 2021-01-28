					<!-- PAGE CONTENT ENDS -->
						</div><!-- /.col -->
					</div><!-- /.row -->
				</div><!-- /.page-content -->
			</div>
		</div><!-- /.main-content -->
		
		<div class="footer">
			<div class="footer-inner">
				<div class="footer-content">
					<span class="bigger-120">
					<div id="with_print">
						<span class="blue bolder"> Created By IT Department PT. L'ESSENTIAL</span>
						&nbsp;Application &copy; <?= date('Y'); ?>
					</span>
					&nbsp; &nbsp;
				</div>
			</div>
		</div>
		</div>
		
		<?php include 'components/modal-confirm.php'; ?>
		<?php include 'components/modal-investigasi.php'; ?>
		<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>
		</div><!-- /.main-container -->
 <script src="<?php echo base_url(); ?>assets/js/app.js"></script>
 <script src="<?php echo base_url(); ?>assets/template/js/bootstrap.min.js"></script>
 <!-- fullcalendatr -->
 <script src='<?php echo base_url(); ?>assets/fullcalendar/js/moment.min.js'></script>
 <script type="text/javascript" src="<?php echo base_url(); ?>assets/fullcalendar/js/bootstrapValidator.min.js"></script>
 <script src="<?php echo base_url(); ?>assets/js/fullcalendar.min.js"></script>
 <script src="<?php echo base_url() ?>assets/vendor/bootstrap-select/main.min.js" charset="utf-8"></script>
<script src="<?= base_url()?>assets/vendor/dist/js/select2.min.js"></script>
 
 <script src="<?php echo base_url(); ?>assets/fullcalendar/js/bootstrap-colorpicker.min.js"></script>
 <script src="<?php echo base_url(); ?>assets/fullcalendar/js/bootstrap-timepicker.min.js"></script>
 <script src="<?php echo base_url(); ?>assets/fullcalendar/js/main.js"></script>
 <script src="<?php echo base_url(); ?>assets/js/_my-custom.js"></script>

 <!-- ace scripts -->
 <script src="<?php echo base_url(); ?>assets/js/bootstrap-multiselect.min.js"></script>
 <script src="<?php echo base_url(); ?>assets/template/js/ace-elements.min.js"></script>
 <script src="<?php echo base_url(); ?>assets/template/js/ace.min.js"></script>	
 <!-- page specific plugin scripts -->
 <script src="<?php echo base_url(); ?>assets/js/jquery.maskedinput.min.js"></script> 
 <script src="<?php echo base_url(); ?>assets/template/js/jquery-ui.min.js"></script>
 <script src="<?php echo base_url(); ?>assets/template/js/jquery.ui.touch-punch.min.js"></script>
 <script src="<?php echo base_url(); ?>assets/template/js/bootstrap-datepicker.min.js"></script>
 <script src="<?php echo base_url(); ?>assets/template/js/jquery.dataTables.min.js"></script>
 <script src="<?php echo base_url(); ?>assets/template/js/jquery.dataTables.bootstrap.min.js"></script>
 <script src="<?php echo base_url(); ?>assets/template/js/dataTables.tableTools.min.js"></script>
 <script src="<?php echo base_url(); ?>assets/template/js/dataTables.colVis.min.js"></script>
 <script src="<?php echo base_url(); ?>assets/js/ColReorderWithResize.js"></script>
 <script src="<?php echo base_url(); ?>assets/template/js/jquery.validate.min.js"></script>
 <script src="<?php echo base_url(); ?>assets/parsley/dist/parsley.js"></script>
 <script src="<?php echo base_url(); ?>assets/parsley/dist/parsley-fields-comparison-validators.js"></script>
 <!-- inline scripts related to this page -->
 <script type="text/javascript"> 
		 //jquery accordion
		 $('#time2').timepicker({
        minuteStep: 5,
        showInputs: false,
        disableFocus: true,
        showMeridian: false
    });  // Timepicker
				$( "#accordion" ).accordion({
					collapsible: true ,
					heightStyle: "content",
					animate: 250,
					header: ".accordion-header"
				}).sortable({
					axis: "y",
					handle: ".accordion-header",
					stop: function( event, ui ) {
						// IE doesn't register the blur when sorting
						// so trigger focusout handlers to remove .ui-state-focus
						ui.item.children( ".accordion-header" ).triggerHandler( "focusout" );
					}
				});
		$('[data-rel=tooltip]').tooltip();
		$('[data-rel=popover]').popover({html:true});
		$('.input-daterange').datepicker({
			autoclose:true,
			format: 'dd-mm-yyyy'
		});
		$('.scrollable').each(function () {
					var $this = $(this);
					$(this).ace_scroll({
						size: $this.attr('data-size') || 100,
						//styleClass: 'scroll-left scroll-margin scroll-thin scroll-dark scroll-light no-track scroll-visible'
					});
				});
      $('#sl , #ijazah , #transkip , #ktp , #paklaring , #npwp , #kk , #rb').ace_file_input({
          no_file:'No File ...',
          btn_choose:'Choose',
          btn_change:'Change',
          droppable:false,
          onchange:null,
          thumbnail: 'large',
          whitelist:'gif|png|jpg|jpeg',
          blacklist:'exe|php',
          onchange:''
          //
        });
      $('#modal-form').on('shown.bs.modal', function () {
					if(!ace.vars['touch']) {
						$(this).find('.chosen-container').each(function(){
							$(this).find('a:first-child').css('width' , '565px');
							$(this).find('.chosen-drop').css('width' , '565px');
							$(this).find('.chosen-search input').css('width' , '555px');
						});
					}
				})
      $('#id-input-file-3').ace_file_input({
					style:'well',
					btn_choose:'Pilih Foto',
					btn_change:null,
					no_icon:'ace-icon fa fa-cloud-upload',
					droppable:true,
					thumbnail:'large'
				});      	
       $('.date-picker').datepicker({
			autoclose: true,
			todayHighlight: true
		})
       $('.multi-date').datepicker({
			multidate: true,
			todayHighlight: true
		})
			$(document).ready(function() {
    		$('.example').DataTable( { 
    		"sDom": "Rlfrtip",  		
    		"scrollY":        "340px",
        	"scrollCollapse": true, 
        	"scrollX": true,		
      		"language": {
            "lengthMenu": "Tampilkan _MENU_ Baris",
            "zeroRecords": "Data Tidak Ada",
            "info": "Halaman _PAGE_ Dari _PAGES_",
            "infoEmpty": "Data Tidak Ada",
            "infoFiltered": "(Total Jumlah Data _MAX_ records)"
            
                     }
                 } );
             } );
            // $(document).ready(function() {
    		// $('#example2').DataTable( {  
    		// "scrollY":        "340px",
        	// "scrollCollapse": true, 
			// "scrollX": true, 
      		// "language": {
			// 	"lengthMenu": "Tampilkan _MENU_ Baris",
			// 	"zeroRecords": "Data Tidak Ada",
			// 	"info": "Halaman _PAGE_ Dari _PAGES_",
			// 	"infoEmpty": "Data Tidak Ada",
			// 	"infoFiltered": "(Total Jumlah Data _MAX_ records)",            
			// 		},
			// 	} );
			//  } );
			$(document).ready(function() {
				var table = $('#example2').DataTable( {
					fixedHeader: {
						header: true,
						footer: true
					},
					language: {
						url: "https://cdn.datatables.net/plug-ins/1.10.22/i18n/Indonesian.json"
					},
					ordering: false
				} );
			} );

			$(document).ready(function() {
    		$('#example3').DataTable( {  
    		"scrollY":        "340px",
        	"scrollCollapse": true, 
        	"scrollX": true, 		
      		"language": {
            "lengthMenu": "Tampilkan _MENU_ Baris",
            "zeroRecords": "Data Tidak Ada",
            "info": "Halaman _PAGE_ Dari _PAGES_",
            "infoEmpty": "Data Tidak Ada",
            "infoFiltered": "(Total Jumlah Data _MAX_ records)",            
                     }
                 } );
             } );
			 $(document).ready(function() {
    		$('#example4').DataTable( {  
    		"scrollY":        "340px",
        	"scrollCollapse": true, 
			"scrollX": true, 		
      		"language": {
				"lengthMenu": "Tampilkan _MENU_ Baris",
				"zeroRecords": "Data Tidak Ada",
				"info": "Halaman _PAGE_ Dari _PAGES_",
				"infoEmpty": "Data Tidak Ada",
				"infoFiltered": "(Total Jumlah Data _MAX_ records)",            
					},
				} );
			 } );
			$(document).ready(function() {
    		$('#example7').DataTable( {      		
    		"sDom": "Rlfrtip",    		
    		"scrollY":        "340px",
        	"scrollCollapse": true, 
        	"scrollX": true, 		
      		"language": {
            "lengthMenu": "Tampilkan _MENU_ Baris",
            "zeroRecords": "Data Tidak Ada",
            "info": "Halaman _PAGE_ Dari _PAGES_",
            "infoEmpty": "Data Tidak Ada",
            "infoFiltered": "(Total Jumlah Data _MAX_ records)",            
                     }

                 } );
             } );	
             jQuery(function($) {
             	$('#id-disable-check').on('click', function() {
					var inp = $('#form-input-readonly').get(0);
					if(inp.hasAttribute('disabled')) {
						inp.setAttribute('disabled' , 'false');
						inp.removeAttribute('disabled');
						inp.value="";
					}
					else {
						inp.setAttribute('disabled' , 'disabled');
						inp.removeAttribute('readonly');
						inp.value="Karyawan Ini Akan Kembali Aktif";
					}
				});
				if(!ace.vars['touch']) {
					$('.chosen-select').chosen({allow_single_deselect:true}); 
					//resize the chosen on window resize			
					$(window)
					.off('resize.chosen')
					.on('resize.chosen', function() {
						$('.chosen-select').each(function() {
							 var $this = $(this);
							 $this.next().css({'width': $this.parent().width()});
						})
					}).trigger('resize.chosen');
					//resize chosen on sidebar collapse/expand
					$(document).on('settings.ace.chosen', function(e, event_name, event_val) {
						if(event_name != 'sidebar_collapsed') return;
						$('.chosen-select').each(function() {
							 var $this = $(this);
							 $this.next().css({'width': $this.parent().width()});
						})
					});
					$('#chosen-multiple-style .btn').on('click', function(e){
						var target = $(this).find('input[type=radio]');
						var which = parseInt(target.val());
						if(which == 2) $('#form-field-select-4').addClass('tag-input-style');
						 else $('#form-field-select-4').removeClass('tag-input-style');
					});
				}
			});
		$('.angka').mask('999.999.999.999.999.999.999');
		$('.npwp').mask('99-999-999-9-999-999');
		 /* Tanpa Rupiah */
		//   var tanpa_rupiah = document.getElementById('tanpa-rupiah');
		//   tanpa_rupiah.addEventListener('keyup', function(e)
		//   {
		//     tanpa_rupiah.value = formatRupiah(this.value);
		//   });
		  /* Tanpa Rupiah */
		//   var tanpa_rupiah = document.getElementById('tanpa-rupiah2');
		//   tanpa_rupiah.addEventListener('keyup', function(e)
		//   {
		//     tanpa_rupiah.value = formatRupiah(this.value);
		//   });
		  /* Dengan Rupiah */
		//   var dengan_rupiah = document.getElementById('dengan-rupiah');
		//   dengan_rupiah.addEventListener('keyup', function(e)
		//   {
		//     dengan_rupiah.value = formatRupiah(this.value, 'Rp. ');
		//   });
		  /* Fungsi */
		  function formatRupiah(angka, prefix)
		  {
		    var number_string = angka.replace(/[^,\d]/g, '').toString(),
		      split = number_string.split(','),
		      sisa  = split[0].length % 3,
		      rupiah  = split[0].substr(0, sisa),
		      ribuan  = split[0].substr(sisa).match(/\d{3}/gi);
		    if (ribuan) {
		      separator = sisa ? '.' : '';
		      rupiah += separator + ribuan.join('.');
		    }
		    rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
		    return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
		  }
	</script>			
  </body>
</html>