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
        $this->type = 'anggaran';
    }

    public function index(Request $request)
    {
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
            
                Excel::import(new AnggaranImport(), $request->file('file'));

                // Excel::load($request->file('file'), function($reader) {
                //     $reader->each(function($sheet) {
                //         $sheet->each(function($row) {
                //             $rowArray = $row->toArray();
                //             $uniqueValues = array_unique($rowArray);
                //             dd( $uniqueValues);
                //             $model = new AnggaranImport;
                //             $model->fill($uniqueValues);
                //             $model->save();
                //         });
                //     });
                // });
                return response()->json(['success' => 'update success']);
            }
        } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
            throw $e;
        } catch (\Exception $e) {
            throw $e;
        }
        
    }
}