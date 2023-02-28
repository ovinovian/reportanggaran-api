<?php

namespace App\Http\Controllers;

use App\Models\Anggaran2;

use App\Models\ViewAnggaran2;
use App\Models\ViewAnggaran2 as DataDb;
use Illuminate\Http\Request;
use App\Imports\Anggaran2Import;
use App\Http\Requests\UserImportRequest as ImportValidation;
use Maatwebsite\Excel\Facades\Excel;

class Anggaran2Controller extends Controller
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
        $this->type = 'anggaran2';
        // dd(Anggaran2::where('urusan','1 URUSAN PEMERINTAHAN WAJIB YANG BERKAITAN DENGAN PELAYANAN DASAR')->get());
    }

    public function index(Request $request)
    {
        if(!session()->has('uuid') || !session()->has('username')){
            return redirect()->route('login.user');
        } else {
           
        if ($request->ajax()) {
            return datatables(DataDb::query())
            ->addIndexColumn()
            ->editColumn('created_at', function ($row) {
                return [
                    'display' => $row->created_at->isoFormat('DD MMMM Y HH:mm:ss'),
                    'timestamp' => $row->created_at->timestamp,
                ];
            })
            ->editColumn('updated_at', function ($row) {
                return [
                    'display' => $row->updated_at->isoFormat('DD MMMM Y HH:mm:ss'),
                    'timestamp' => $row->updated_at->timestamp,
                ];
            })
            ->toJson();
        }

        

        return view($this->type . '.index', [
            'type' => $this->type,
        ]);
        }

    }

    /**
     * import form.
     */
    public function importForm()
    {
        
        if(!session()->has('uuid') || !session()->has('username')){
            return redirect()->route('login.user');
        } else {
            return view($this->type . '.import', [
                'type' => $this->type,
            ]);
        }
    }

    /**
     * store import data.
     */
    public function importStore(ImportValidation $request)
    {
        try {
            if ($request->ajax()) {
                
                $request->validated();
            // 
                $test = Excel::import(new Anggaran2Import(), $request->file('file'));

                return response()->json(['success' => 'update success']);
            }
        } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
            throw $e;
        } catch (\Exception $e) {
            throw $e;
        }
        
    }
}