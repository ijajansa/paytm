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
    	->select('customers.name','customers.mobile_number','users.agent_id','users.full_name','imports.agent_contact_number','imports.status','imports.status2','imports.is_payable')->get();
    }
    public function headings(): array
    {
    	return [
    		'Customer Name',
    		'Customer Contact Number',
    		'Agent ID',
            'Agent Name',
            'Agent Contact Number',
            'Status',
            'Status 2',
            'Payable'
    	];
    }
}
