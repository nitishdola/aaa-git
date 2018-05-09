<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB, Validator, Redirect, Auth, Crypt, Input, Excel;

use App\Models\Packages\Package;

class ExcelController extends Controller
{
    public function upload() {
    	return view('excel.upload');
    }

    public function process(Request $request) {

    	$path = $request->file('mis_excel')->getRealPath();
    	$data = Excel::load($path, function($reader) {})->get();
    	//dd($data->toArray());

    	$excel_array = [];

    	$cstatus = [];

    	foreach($data->toArray() as $k => $v) {
			if($v['ccn'] != ''):
				$cstatus[] = $v['current_status'];
			endif;
		}
		$unique_current_status = array_unique($cstatus);
		//dd($unique_current_status);

		$admission_submitted = $arogyamitra_out_patient = 0;
		$discharge_summary_submitted = $in_patient_case_registered = 0;

		$preauth_approved = $preauth_pending_by_tpa = $preauth_rejected = 0;

		$pending_preauth_replied_by_hospital = 0;

		$claims_pending_by_tpa = $claims_approved = 0;

		$preauth_request_sent = 0;

		$billing_submitted = 0;

		$additional_package_request =0;

		$total = 0;

		$res = [];

		$count = 1;

		foreach($data->toArray() as $k => $v) {
			if($v['ccn'] != ''):
				$excel_array[$k]['Sl No'] 				= ($k+1);
				$excel_array[$k]['Num Case No'] 		= (int)$v['num_case_no'];
				$excel_array[$k]['CCN'] 				= $v['ccn'];
				$excel_array[$k]['Patient Name'] 		= $v['patient_name'];
				$excel_array[$k]['Current Status'] 		= ucwords($v['current_status']);
				$excel_array[$k]['District'] 			= ucwords($v['district']);
				$excel_array[$k]['Patient Complaint'] 	= strtoupper($v['patient_complaint']);
				$excel_array[$k]['Category'] 			= strtoupper($v['category']);
				$excel_array[$k]['Hosp Diagnosis'] 		= ucwords($v['hosp_diagnosis']);
				$excel_array[$k]['Hospital Name'] 		= ucwords($v['hospital_name']);
				$excel_array[$k]['Remarks'] 			= ucwords($v['remarks']);
				$excel_array[$k]['Entry Date'] 			= date('d-m-Y h:i A', strtotime($v['entry_date']));

				if($v['current_status'] == 'Admission submitted') {
					$admission_submitted++;
				}

				if($v['current_status'] == 'ArogyaMitra Out Patient') {
					$arogyamitra_out_patient++;
				}

				if($v['current_status'] == 'Pending Preauth Replied By Hospital') {
					$pending_preauth_replied_by_hospital++;
				}

				if($v['current_status'] == 'PreAuth Request Sent') {
					$preauth_request_sent++;
				}

				if($v['current_status'] == 'Discharge Summary Submitted') {
					$discharge_summary_submitted++;
				}

				if($v['current_status'] == 'In Patient Case Registered') {
					$in_patient_case_registered++;
				}

				if($v['current_status'] == 'Preauth Approved') {
					$preauth_approved++;
				}

				if($v['current_status'] == 'Preauth Pending By TPA') {
					$preauth_pending_by_tpa++;
				}

				if($v['current_status'] == 'Preauth Rejected') {
					$preauth_rejected++;
				}

				if($v['current_status'] == 'Claims Pending By TPA') {
					$claims_pending_by_tpa++;
				}

				if($v['current_status'] == 'Claims Approved') {
					$claims_approved++;
				} 

				if($v['current_status'] == 'Additional Package Request') {
					$additional_package_request++;
				} 

				if($v['current_status'] == 'Billing Submitted') {
					$billing_submitted++;
				} 
 
				$total++;

				$count++;
				//$excel_array[100]['Total'] = $total;
			endif;
		}

		
		$res[$count]['Total'] 							= $total;
		
		$res[$count]['Under Process'] 					= $preauth_request_sent;

		$res[$count]['Approved'] 						= $preauth_approved;

		$res[$count]['Addtional Submitted'] 			= $additional_package_request;

		$res[$count]['Additional Info Required'] 		= $preauth_pending_by_tpa;

		$res[$count]['Additional Info Replied'] 		= $pending_preauth_replied_by_hospital;

		$res[$count]['Rejected'] 						= $preauth_rejected;


		////////*************************////

		$res[$count]['Admission Submitted'] 			= $admission_submitted;

		$res[$count]['Discharge Submitted'] 			= $discharge_summary_submitted;

		$res[$count]['Billing Submitted'] 				= $billing_submitted;

		$res[$count]['ArogyaMitra Out Patient'] 		= $arogyamitra_out_patient;
		
		$res[$count]['In Patient Case Registered'] 		= $in_patient_case_registered;

		$res[$count]['Claims Pending By TPA'] 			= $claims_pending_by_tpa;

		$res[$count]['Claims Approved'] 				= $claims_approved;
		
		//////************************////////

		$res_cell =$count+1;

		$output_cell = $res_cell + 1;
		
	// /dd('ddd');

		Excel::create('MIS_AAAS-'.date('d.m.Y'), function( $excel) use($excel_array, $res, $res_cell, $output_cell){
			$excel->sheet('MIS_AAAS-'.date('d.m.Y'), function($sheet) use($excel_array, $res, $res_cell, $output_cell){
			  	$sheet->setTitle('MIS_AAAS-'.date('d.m.Y'));
			  	
			  	$sheet->setAutoFilter('B1:K1');

				$sheet->cells('A1:K1', function($cells) {
					$cells->setBackground('#159121');
					$cells->setFontSize(14);
					$cells->setFontColor('#ffffff');
				});
			  
			  	
			  	$sheet->cells("A$res_cell:P$res_cell", function($cells) {
					$cells->setBackground('#A90909');
					$cells->setFontColor('#ffffff');
					$cells->setAlignment('center');
				});

				$sheet->cells("A$output_cell:P$output_cell", function($cells) {
					$cells->setBackground('#444444');
					$cells->setFontColor('#ffffff');
					$cells->setFontWeight('bold');
					$cells->setAlignment('center');
					//$cells->setBorder('thin');
				});

			  $sheet->fromArray($excel_array, null, 'A1', false, true);
			  $sheet->fromArray($res, null, 'A1', false, true);
			  
			});
		})->download('xlsx');


		


		//dd($res);
		//return view('excel.report', compact('res'));

    }

    public function uploadExcelReport() {
		return view('excel.report.upload');
	}

	public function processExcelReport(Request $request) {
		$path = $request->file('mis_excel')->getRealPath();
    	$data = Excel::load($path, function($reader) {})->get();
    	

    	$excel_array = [];

    	$cstatus = $hsptl = [];

    	foreach($data->toArray() as $k => $v) {
			if($v['ccn'] != ''):
				$cstatus[] = $v['current_status'];
			endif;
		}
		$unique_current_status = array_unique($cstatus);


		foreach($data->toArray() as $k => $v) {
			if($v['hospital_name'] != ''):
				$hsptl[] = $v['hospital_name'];
			endif;
		}
		$unique_hospitals = array_unique($hsptl);
		//dd($unique_hospitals);

		$admission_submitted 			= $arogyamitra_out_patient 		= 0;
		$discharge_summary_submitted 	= $in_patient_case_registered 	= 0;
		$preauth_approved 				= $preauth_pending_by_tpa 		= $preauth_rejected = 0;
		$pending_preauth_replied_by_hospital = 0;$preauth_request_sent 	= 0;

		$claims_pending_by_tpa = 0;

		$billing_submitted = 0;


		$kamrup_rural = $kamrup_metro = $sivasagar = $nalbari = $lakhimpur = $udalguri = $golaghat = $barpeta = 0;
		$jorhat = $tinsukia = $darrang = $morigaon = $karbi_anglong = $cachar = $bongaigaon = $dima_hasao = $nagaon = 0;
		$dibrugarh = $sonitpur = $goalpara = $karimganj = $hailakandi = 0;

		$bbci = $gmch = $gmc_cancer = $smch = $nsh = $ash = $dth = $hayat = $marwari = 0;
		$jmc = $rtiics = $faamc = $amch = $cchrc = $nemcare = $gnrc_dispur = $narayana_hrid = $dpnh = 0;
		$hcgh = 0;

		$total = 0;

		foreach($data->toArray() as $k => $v) {
			if($v['ccn'] != ''):
				$total++;


				//HOSPITAL DATA
				//dump($v['hospital_name']);
				if($v['hospital_name'] == 'B. Barooah Cancer Institute') {
					$bbci++;
				}

				if($v['hospital_name'] == 'Nemcare Hospital') {
					$nemcare++;
				}

				if($v['hospital_name'] == 'Assam Medical College & Hospital') {
					$amch++;
				}

				if($v['hospital_name'] == 'Guwahati Medical College & Hospital') {
					$gmch++;
				}

				if($v['hospital_name'] == 'HCG Hospital') {
					$hcgh++;
				}

				if($v['hospital_name'] == 'GMC Cancer Hospital') {
					$gmc_cancer++;
				}

				if($v['hospital_name'] == 'Silchar Medical College & Hospital') {
					$smch++;
				} 

				if($v['hospital_name'] == 'Narayana Superspeciality Hospital') {
					$nsh++;
				}

				if($v['hospital_name'] == 'Ayursundra Superspeciality Hospital') {
					$ash++;
				}

				if($v['hospital_name'] == 'Downtown Hospital') {
					$dth++;
				}

				if($v['hospital_name'] == 'Marwari Hospitals') {
					$marwari++;
				}

				if($v['hospital_name'] == 'Hayat Hospital') {
					$hayat++;
				}

				if($v['hospital_name'] == 'Jorhat Medical College') {
					$jmc++;
				}

				if($v['hospital_name'] == 'Rabindranath Tagore International Institute Of Cardiac Sciences') {
					$rtiics++;
				}

				if($v['hospital_name'] == 'Dispur Polyclinic & Nursing Home') {
					$dpnh++;
				}

				if($v['hospital_name'] == 'Narayana Hrudalya') {
					$narayana_hrid++;
				}

				if($v['hospital_name'] == 'Narayana Hrudalya') {
					$narayana_hrid++;
				}


 
				//DIST DATA
				if(strtolower($v['district']) == 'kamrup') {
					$kamrup_rural++;
				}

				if(strtolower($v['district']) == 'kamrup metropolitan') {
					$kamrup_metro++;
				}

				if(strtolower($v['district']) == 'sivasagar') {
					$sivasagar++;
				}

				if(strtolower($v['district']) == 'Nalbari') {
					$nalbari++;
				}

				if(strtolower($v['district']) == 'lakhimpur') {
					$lakhimpur++;
				}

				if(strtolower($v['district']) == 'udalguri') {
					$udalguri++;
				}

				if(strtolower($v['district']) == 'golaghat') {
					$golaghat++;
				}

				if(strtolower($v['district']) == 'jorhat') {
					$jorhat++;
				}

				if(strtolower($v['district']) == 'tinsukia') {
					$tinsukia++;
				}

				if(strtolower($v['district']) == 'darrang') {
					$darrang++;
				}

				if(strtolower($v['district']) == 'morigaon') {
					$morigaon++;
				}

				if(strtolower($v['district']) == 'karbi anglong') {
					$karbi_anglong++;
				}

				if(strtolower($v['district']) == 'cachar') {
					$cachar++;
				}

				if(strtolower($v['district']) == 'bongaigaon') {
					$bongaigaon++;
				}

				if(strtolower($v['district']) == 'dima hasao') {
					$dima_hasao++;
				}

				if(strtolower($v['district']) == 'nagaon') {
					$nagaon++;
				}

				if(strtolower($v['district']) == 'dibrugarh') {
					$dibrugarh++;
				}

				if(strtolower($v['district']) == 'sonitpur') {
					$sonitpur++;
				}

				if(strtolower($v['district']) == 'goalpara') {
					$goalpara++;
				}

				if(strtolower($v['district']) == 'karimganj') {
					$karimganj++;
				}

				if(strtolower($v['district']) == 'hailakandi') {
					$hailakandi++;
				}




				//CURRENT STATUS DATA

				if($v['current_status'] == 'Admission submitted') {
					$admission_submitted++;
				}

				if($v['current_status'] == 'ArogyaMitra Out Patient') {
					$arogyamitra_out_patient++;
				}

				if($v['current_status'] == 'Pending Preauth Replied By Hospital') {
					$pending_preauth_replied_by_hospital++;
				}

				if($v['current_status'] == 'PreAuth Request Sent') {
					$preauth_request_sent++;
				}

				if($v['current_status'] == 'Discharge Summary Submitted') {
					$discharge_summary_submitted++;
				}

				if($v['current_status'] == 'In Patient Case Registered') {
					$in_patient_case_registered++;
				}

				if($v['current_status'] == 'Preauth Aprooved') {
					$preauth_approved++;
				}

				if($v['current_status'] == 'Preauth Pending By TPA') {
					$preauth_pending_by_tpa++;
				}

				if($v['current_status'] == 'Preauth Rejected') {
					$preauth_rejected++;
				}

				if($v['current_status'] == 'Claims Pending By TPA') {
					$claims_pending_by_tpa++;
				}
			endif;
		}

		
		return view('excel.report.report', compact('bbci','gmch','gmc_cancer','smch','nsh','ash','dth','hayat','marwari','jmc','rtiics','faamc','amch','cchrc','nemcare','gnrc_dispur','narayana_hrid','dpnh', 'kamrup_rural','kamrup_metro','sivasagar','nalbari','lakhimpur','udalguri','golaghat','barpeta','jorhat','tinsukia','darrang','morigaon','karbi_anglong','cachar','bongaigaon','dima_hasao','nagaon','dibrugarh','sonitpur','goalpara','karimganj','hailakandi','admission_submitted','arogyamitra_out_patient','discharge_summary_submitted','in_patient_case_registered','preauth_approved','preauth_pending_by_tpa','preauth_rejected','pending_preauth_replied_by_hospital','preauth_request_sent', 'total', 'claims_pending_by_tpa', 'hcgh'));

	}


	public function createPackageList() {
		return view('excel.package_upload');
	}

	public function savePackageList(Request $request) {

    	$path = $request->file('package_excel')->getRealPath();
    	$data1 = Excel::load($path, function($reader) {})->get();
//dd($data1);
		foreach($data1->toArray() as $k => $v) {
			if($v['category_name'] != '') {
				$data = [];

				/*if($v['banglore_nabh'] != ''):
					$data['category']   		= $v['category_name'];
					$data['sub_category']		= $v['sub_category_name'];
					$data['procdure_code'] 		= $v['procdure_code']; 	
					$data['procedure_name']     = $v['procedure_name'];
					$data['guwahati_nabh'] 		= $v['nabh']; 
					$data['guwahati_non_nabh'] 	= $v['nonnabh'];

					$data['banglore_nabh'] 		= $v['banglore_nabh'];
					$data['banglore_non_nabh'] 	= $v['banglore_nonnabh']; 
					$data['mumbai_non_nabh'] 	= $v['mumbai_nonnabh']; 
					$data['mumbai_nabh'] 		= $v['mumbai_nabh'];
					$data['chennai_non_nabh'] 	= $v['chennai_nonnabh']; 
					$data['chennai_nabh'] 		= $v['chennai_nabh'];
					$data['kolkatta_non_nabh'] 	= $v['kolkatta_nonnabh']; 
					$data['kolkatta_nabh'] 		= $v['kolkatta_nabh'];
					$data['delhi_non_nabh'] 	= $v['delhi_nonnabh']; 
					$data['delhi_nabh'] 		= $v['delhi_nabh'];

					Package::create($data);
				else:
					echo '<br> banglore is empty '.($k+1);
				endif;*/
				if($v['procdure_code'] == 'ASMK00108'):

					$data['category']   		= $v['category_name'];
					$data['sub_category']		= $v['sub_category_name'];
					$data['procdure_code'] 		= $v['procdure_code']; 	
					$data['procedure_name']     = $v['procedure_name'];
					$data['guwahati_nabh'] 		= $v['nabh']; 
					$data['guwahati_non_nabh'] 	= $v['nonnabh'];

					$data['banglore_nabh'] 		= 'NA';
					$data['banglore_non_nabh'] 	= 'NA';
					$data['mumbai_non_nabh'] 	= $v['mumbai_nonnabh']; 
					$data['mumbai_nabh'] 		= $v['mumbai_nabh'];
					$data['chennai_non_nabh'] 	= $v['chennai_nonnabh']; 
					$data['chennai_nabh'] 		= $v['chennai_nabh'];
					$data['kolkatta_non_nabh'] 	= $v['kolkatta_nonnabh']; 
					$data['kolkatta_nabh'] 		= $v['kolkatta_nabh'];
					$data['delhi_non_nabh'] 	= $v['delhi_nonnabh']; 
					$data['delhi_nabh'] 		= $v['delhi_nabh'];

					Package::create($data);
				endif;

			}
		}

	}
}


