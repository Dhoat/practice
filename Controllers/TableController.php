<?php
    namespace App\Http\Controllers;
    use Illuminate\Http\Request;
    use App\Models\Table;
    use App\Models\File;
    use Illuminate\Support\Facades\DB;
    use DataTables;

    class TableController extends Controller
    {
        public function index() {
            return view('table');
        }

        #show Table
        public function ShowDataTable() {
            return view('datatable');
        }
        #get data in Datatable
        public function getTableData(Request $request) {
            if($request->ajax()) {
                $data = Table::select(['id', 'name', 'Position', 'office']);
                return DataTables::of($data)->make(true);
            }
        }

        public function ajax(Request $request)
        {
            //dd($request);
            $columns = ['id', 'name', 'Position', 'office'];
            $limit = $request->input('length');
            $start = $request->input('start');
            $search = $request->input('search.value');
            $order_column = $columns[$request->input('order.0.column')];
            $order_dir = $request->input('order.0.dir');

            // $start = 0;
            // $limit = 10;
            $tables = Table::select('id', 'name', 'Position', 'office')
                ->where('name', 'like', '%' . $search . '%')
                ->orWhere('Position', 'like', '%' . $search . '%')
                ->orderBy($order_column, $order_dir)
                ->skip($start)
                ->take($limit)
                ->get();
                
            $count = Table::count();
        
            $data = [];
            foreach ($tables as $table) {
                $data[  ] = [
                    'id' => $table->id,
                    'name' => $table->name,
                    'Position' => $table->Position,
                    'office' => $table->office,
                    'published_at' => date('Y-m-d', strtotime($table->published_at)),
                ];
            }

            return response()->json([
                'draw' => $request->input('draw'),
                'recordsTotal' => $count,
                'recordsFiltered' => $count,
                'data' => $data,
            ]);
        }
        public function getData(Request $request) {
        if($request->ajax()){
                $data = Table::all();
                dd( $data);
        }
        }



    }
?>
