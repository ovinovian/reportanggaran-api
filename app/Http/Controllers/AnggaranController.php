<?php

namespace App\Http\Controllers;

use App\Models\Anggaran;
use App\Models\Anggaran as DataDb;
use Illuminate\Http\Request;
use App\Imports\AnggaranImport;
use App\Http\Requests\UserImportRequest as ImportValidation;
use Maatwebsite\Excel\Facades\Excel;

class AnggaranController extends Controller
{
    /**
     * The url of resources.
     *
     * @var string
     */
    private $type;

    /**
     * __construct function.
     */
    public function __construct()
    {
        $this->type = 'realisasi';
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            return datatables(DataDb::query())
            ->addIndexColumn()
            ->editColumn('nilai_realisasi', function ($row) {
                return number_format($row->nilai_realisasi,0,",",".");
            })
            ->toJson();
        }

        return view($this->type . '.index', [
            'type' => $this->type,
        ]);
    }

    /**
     * import form.
     */
    public function importForm()
    {
        return view($this->type . '.import', [
            'type' => $this->type,
        ]);
    }

    /**
     * store import data.
     */
    public function importStore(ImportValidation $request)
    {
        try {
            if ($request->ajax()) {
                
                $request->validated();
            
                $test = Excel::import(new AnggaranImport(1), $request->file('file'));

               
                return response()->json(['success' => 'update success']);
            }
        } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
            throw $e;
        } catch (\Exception $e) {
            throw $e;
        }
        
    }
}