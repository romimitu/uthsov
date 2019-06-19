<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;

class StockController extends Controller
{
    public function __construct()
    {
         $this->middleware('permission:stock-list');
         $this->middleware('permission:stock-create', ['only' => ['create','store']]);
         $this->middleware('permission:stock-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:stock-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        return view('admin.stock.index');
    }
}
