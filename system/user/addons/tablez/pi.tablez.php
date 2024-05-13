<?php
/**
 * 	TableZ
 *		Loop table, export as json or xl
 */
if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}

require $_SERVER['DOCUMENT_ROOT'].'/thirdparty/vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Tablez
{
	public $return_data = "";

	public function __construct()
	{
		// $this->return_data = '';
	}

	/**
	 *  data looper
	 *		Useage: 
	 *			required: table='[table]'
	 *			optional: limit='[int]'
	 *			optional: order_by='[int]'
	 *			optional: sort='[sort name| sort field]'
	 *			optional: search='[needle|field]'
	 */
	public function loop()
	{
		//	vars
		$variables = array();

		//	required		
		if ( ! ee()->TMPL->fetch_param('table')) {
		    ee()->output->fatal_error('The "table" parameter is required.');
		}
		$data_table = ee()->TMPL->fetch_param('table'); 

		//	optional: limit
		$limit = (int) ee()->TMPL->fetch_param('limit');
		if( $limit > 0 ) { 
		    ee()->db->limit($limit);
		}
		//	optional: order by
		$order_by = ee()->TMPL->fetch_param('order_by');
		if( $order_by != '' ) {
			$aTmp = explode('|', $order_by);
			$sort_name = $aTmp[0];
			$sort_order = $aTmp[1];
			ee()->db->order_by($sort_name, $sort_order);
		}
		// 	optional: search
		$search = ee()->TMPL->fetch_param('search');
		if( $search != '' ) {
			$aTmp = explode('|', $search);
			$search_col = $aTmp[1];
			$search_str = $aTmp[0];	
			ee()->db->where( $search_col, $search_str );
		}
		//	process
		$results = ee()->db->get( $data_table );
		if ( $results->num_rows() == 0 ) {
		  	return 'No Records Found';
		}   
		//  get fields
		$aFields = $this->getFields( $data_table);
		//  process results
		foreach( $results->result_array() as $k => $row ) {
		  	$variables[] = array_combine( $aFields, $row );
		}
		//  return it to the tag pair
		return ee()->TMPL->parse_variables( ee()->TMPL->tagdata, $variables );
	}
	/**
	 *  json generator
	 */
	public function json()
	{
		$data_table = ee()->TMPL->fetch_param('table'); 
		if ( ! ee()->TMPL->fetch_param('table')) {
		    ee()->output->fatal_error('The "table" parameter is required.');
		}
		$results = ee()->db->get( $data_table );
		if ($results->num_rows() == 0) {
			return 'No Records Found';
		}   
		$aFields = $this->getFields( $data_table);
		foreach( $results->result_array() as $row ) {    
			$aData[] = array_combine( $aFields, $row );  
		}
		// $this->return_data = json_encode( $aData );
		$json_data = json_encode( $aData );
		return $json_data;
		// header("Content-type: application/json; charset=utf-8");
	}

	/**
	 *  xl generator
	 *		Useage: 
	 *			required: table='[table]'
	 *			optional: select='[comma separated fields']
	 *			optional: search='[needle|field],[needle|field]'; 
	 *		EXAMPLE:
	 *		{exp:tablez:xl 
	 *			table		=	'members' 
	 *			select		=	'email,member_id'
	 *			search		=	'clifw3@comcast.net|email,1|member_id'
	 *			title		=	'MEMBERS DATA'
	 *			sheet_title	=	'SHEET NUMBER 1'
	 *			}
	 */
	public function xl() 
	{
		//	required
		if ( ! ee()->TMPL->fetch_param('table')) {
		    ee()->output->fatal_error('The "table" parameter is required.');
		}
		$data_table = ee()->TMPL->fetch_param('table');
		//	optional: select
		$select = ee()->TMPL->fetch_param('select');
		if( $select != '' ) {
			$aSelect = explode(',', $select);
			foreach( $aSelect as $k => $v ) {
				$v = trim( $v );
				ee()->db->select($v);
				$aFields[] = $v;
			}
		}
		//	optional: search: 	search|field,search|field etc.
		$search = ee()->TMPL->fetch_param('search');
		if( $search != '' ) {
			$outer_loop = explode( ',', $search );
			foreach( $outer_loop as $single_search ) {
				$aTmp = explode('|', $single_search);
				$search_str = $aTmp[0];	
				$search_col = $aTmp[1];			
				ee()->db->where( $search_col, $search_str );
			}
		}
		//	fields
		if( ! isset( $aFields ) ) {
			$aFields = $this->getFields( $data_table);
		}
		//	get data			
		$results = ee()->db->get( $data_table );		

		//	spreadsheet options
		$xl_title = ee()->TMPL->fetch_param('title', 'TITLE');
		$sheet_title = ee()->TMPL->fetch_param('sheet_title', 'SHEET TITLE');
		//	init spreadsheet
		$spreadsheet = new Spreadsheet();
		$spreadsheet->getProperties()->setTitle($xl_title);
		$spreadsheet->getDefaultStyle()->getFont()->setName('Sans-Serif');
		$spreadsheet->getDefaultStyle()->getFont()->setSize(12);
		$Excel_writer = new Xlsx($spreadsheet);
		//	sheet setup
		$spreadsheet->setActiveSheetIndex(0);
		$spreadsheet->getActiveSheet()->setTitle($sheet_title);
		$activeSheet = $spreadsheet->getActiveSheet();
		//	sheet header
		$aAlpha = $this->makeAlphas();
		$j = 0;
		foreach( $aFields as $v ) {  
			$alpha = $aAlpha[$j];
			$activeSheet->setCellValue($alpha . '1', $v); 
			$spreadsheet->getActiveSheet()->getColumnDimension($alpha)->setWidth(18); 
			$j++;
		}
		//	set style
	 	$spreadsheet->getActiveSheet()->getStyle("A1:".$alpha."1")->getFont()->setBold( true );
		//	set data rows
		$i = 2;  
		foreach( $results->result_array() as $row ) {
			$j = 0;    	  	
			foreach( $row as $k => $v ) {
		 		$alpha = $aAlpha[$j];
				$activeSheet->setCellValue($alpha.$i , $v);
		 		$j++;				
			}
			$i++;		
		}
		//	complete
		$spreadsheet->setActiveSheetIndex(0);
		$filename = $xl_title.'.xlsx';
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename='. $filename);
		header('Cache-Control: max-age=0');
		$Excel_writer->save('php://output');
	}

	//  get field names
	private function getFields( $data_table )
	{
		if (strpos($data_table, 'exp_') === false) {
			$data_table = "exp_$data_table";
		}
		$fields = ee()->db->query( "SHOW COLUMNS FROM $data_table" );
		foreach ( $fields->result() as $v ) {
			$aFields[] = $v->Field;
		}
		return $aFields;
	}

	//	xl alhpa array
	private function makeAlphas() 
	{
		$alphas = $cells = range('A', 'Z');
		foreach($alphas as $alpha) {
			foreach($alphas as $beta) {
				$cells[] = $alpha.$beta;
			}
		}
		return $cells;
	}

} //  end class


//	eof
