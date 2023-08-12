<?php

namespace App\Imports;

use App\Student;

use Mail;
use App\Mail\SendMailTool;

use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SendmailExcel implements ToModel, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function model(array $row)
    {
    }
    
    public function headingRow(): int
    {
        return 1;
    }
}
