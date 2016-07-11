<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    class AddReport extends MY_Controller {
        public function index() {
			$this->data = array(
							'title' => 'Reports',
							'box_title_1' => 'Add Report',
							'sub_box_title_1' => 'Adding new report',
							'box_title_2' => 'Projects List',
							'sub_box_title_2' => 'List of projects',
							'box_title_3' => 'Finished Projects List',
							'sub_box_title_3' => 'List of Finished projects',
							'box_title_4' => 'Droped Projects List',
							'sub_box_title_4' => 'List of Droped projects'
						);
			$this->page_css  = array(
							'vendors/iCheck/skins/flat/green.css',
							'vendors/datatables.net-bs/css/dataTables.bootstrap.min.css',
							'vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css',
							'vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css',
							'vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css',
							'vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css',
							'vendors/select2/dist/css/select2.min.css'

						);
			$this->page_js  = array(
							'vendors/iCheck/icheck.min.js',
							'vendors/datatables.net/js/jquery.dataTables.min.js',
							'vendors/datatables.net-bs/js/dataTables.bootstrap.min.js',
							'vendors/datatables.net-buttons/js/dataTables.buttons.min.js',
							'vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js',
							'vendors/datatables.net-buttons/js/buttons.flash.min.js',
							'vendors/datatables.net-buttons/js/buttons.html5.min.js',
							'vendors/datatables.net-buttons/js/buttons.print.min.js',
							'vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js',
							'vendors/datatables.net-keytable/js/dataTables.keyTable.min.js',
							'vendors/datatables.net-responsive/js/dataTables.responsive.min.js',
							'vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js',
							'vendors/datatables.net-scroller/js/datatables.scroller.min.js',
							'vendors/jszip/dist/jszip.min.js',
							'vendors/pdfmake/build/pdfmake.min.js',
							'vendors/pdfmake/build/vfs_fonts.js',
							'vendors/select2/dist/js/select2.full.min.js',
							'vendors/moment/moment.min.js',
							'vendors/datepicker/daterangepicker.js',
							'page/reports/addreport.js'
						);
            $this->contents = 'reports/addreport'; // its your view name, change for as per requirement.
            $this->layout();
        }
    }