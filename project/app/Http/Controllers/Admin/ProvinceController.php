<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Province;
use Illuminate\Http\Request;
use Datatables;

class ProvinceController extends Controller
{
    public function index()
    {
        return view('admin.province.index');
    }

    public function datatable()
    {
        $province = Province::orderBy('id','desc')->get();

        return Datatables::of($province)
            ->addIndexColumn()
            ->addColumn('action', function($row){
                $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editProvince">Edit</a>';
                $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteProvince">Delete</a>';
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }
}
