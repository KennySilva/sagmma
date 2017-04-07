<?php

namespace Sagmma\Http\Controllers\PluginsControllers;
use Illuminate\Http\Request;
use Sagmma\Http\Requests;
use Sagmma\Http\Controllers\Controller;
use Typeofplace;
use Input;
use Redirect;
use DB;
use Excel;
use Employee;
class ExcelController extends Controller
{
    public function getEmployeeImport()
    {
        return view('exportation.excel.importEmployee');
    }

    public function postEmployeeImport()
    {
        Excel::load(Input::file('employee'), function($reader)
        {
            $reader->each(function($sheet){
                Employee::firstOrCreate($sheet->toArray());
            });
        });
        return Redirect::back();
    }

    public function getEmployeeExport()
    {
        $employees = Employee::all();
        Excel::create('Exportar dados do Funcionário para Excel', function($excel) use($employees){
            $excel->sheet('Excel sheet', function($sheet) use($employees){
                $sheet->fromArray($employees);
                // $sheet->setOrientation('landscape');
            });

        })->export('xls');
    }

    // public function deleteAll()
    // {
    //     DB::table('employees')->delete();
    //     return Redirect::back();
    //
    // }
}
