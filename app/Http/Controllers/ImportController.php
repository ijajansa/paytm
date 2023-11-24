<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use App\Models\User;
use App\Imports\CustomerImport;
use App\Models\CImport;
use Excel;


class ImportController extends Controller
{
    public function all(Request $request)
    {
    	if($request->ajax())
    	{
    		$data = CImport::join('customers','customers.mobile_number','imports.contact_number')
    		->orderBy('imports.id','ASC')
    		->join('users','customers.agent_id','users.id')
    		->select('customers.name as full_name','imports.*','users.agent_id')
    		->get();
    		return DataTables::of($data)->make(true);
    	}
    	return view('imports.all');
    }

    public function add()
    {
    	return view('imports.add');
    }

    public function insert(Request $request)
    {
    	$file = $request->file('file');
        Excel::import(new CustomerImport, $file);
        return redirect('import-excel')->with('success', 'Data imported successfully!');
    }
}
