<?php

namespace App\Imports;

use App\Models\CImport;
use App\Models\Customer;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\OnEachRow;
use Maatwebsite\Excel\Row;
use Illuminate\Validation\ValidationException;



class CustomerImport implements ToModel,WithHeadingRow,OnEachRow
{

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new CImport([
            'contact_number' => substr($row['mobile_number'],0,10),
            'is_available' => 1
        ]);
    }

    public function onRow(Row $row)
    {
        // Perform database validation before importing
        $rowData = $row->toArray();
        $isEmptyRow = empty(array_filter($rowData, 'strlen'));

        if ($isEmptyRow) {
            return;
        }
        if (!$this->isValid($rowData)) {
            return;// throw ValidationException::withMessages(['Skipped row due to validation error.']);
        }
    }

    protected function isValid(array $rowData)
    {
        $check = Customer::where('mobile_number',$rowData['mobile_number'])->first();
        if($check)
        {
            $check1 = CImport::where('contact_number',$rowData['mobile_number'])->first();
            if($check1)
            {   
                return false;
            }
            else
            {
                return true;
            }
        }
    }

}
