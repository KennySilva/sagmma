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
use Caffeinated\Flash\Facades\Flash;
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
        Flash::success('O Ficheiro foi armazenado na Base de Dados com Sucesso');
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
        Flash::success('Ficheiro Execel DEscarregado com sucesso');
        return Redirect::back();

    }



}
