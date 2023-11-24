<?php

namespace App\Exports;

use App\Models\CImport;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;


class CustomerExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
    	return CImport::join('customers','customers.mobile_number','imports.contact_number')
    	->join('users','users.id','customers.agent_id')
    	->select('customers.name','customers.mobile_number','users.agent_id','users.full_name')->get();
    }
    public function headings(): array
    {
    	return [
    		'Customer Name',
    		'Contact Number',
    		'Agent ID',
    		'Agent Name',
    	];
    }
}
