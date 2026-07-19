<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ServiceConsumption;
use App\Models\AssdtSidebar;
use Illuminate\Support\Facades\DB;

class AssessmentController extends Controller
{
    public function question3()
    {
        $menus = AssdtSidebar::where('parent_id', 0)
            ->where('is_active', 1)
            ->orderBy('tab_order')
            ->with(['children' => function ($q) {
                $q->where('is_active', 1)->orderBy('tab_order');
            }])
            ->get();

        return view('pages.qthree', compact('menus'));
    }

//    public function question3Data(Request $request)
//     {
//         $from = $request->from_date;
//         $to   = $request->to_date;

//         $query = ServiceConsumption::query();

//         if ($from && $to) {
//             $query->whereBetween(DB::raw('DATE(req_dt)'), [$from, $to]);
//         }

//         $data = $query->get();

//         return response()->json($data);
//     }

// public function question3Data(Request $request)
// {
//     $from = $request->from_date;
//     $to   = $request->to_date;

//     // all services list (dynamic columns)
//     $services = ServiceConsumption::select('servicename')
//         ->distinct()
//         ->pluck('servicename')
//         ->toArray();

//     // base query
//     $data = ServiceConsumption::select(
//         'user_id',
//         'servicename',
//         DB::raw('SUM(transamt) as total')
//     )
//     ->when($from && $to, function($q) use ($from, $to) {
//         $q->whereBetween(DB::raw('DATE(req_dt)'), [$from, $to]);
//     })
//     ->groupBy('user_id', 'servicename')
//     ->get();

//     // pivot format
//     $result = [];

//     foreach ($data as $row) {

//         if (!isset($result[$row->user_id])) {

//             $result[$row->user_id]['user_id'] = $row->user_id;

//             foreach ($services as $service) {
//                 $result[$row->user_id][$service] = 0;
//             }
//         }

//         $result[$row->user_id][$row->servicename] = $row->total;
//     }

//     return response()->json([
//         'services' => $services,
//         'data' => array_values($result)
//     ]);
// }

public function question3Data(Request $request)
{
    // dd($request->from_date);
    $from = $request->from_date;
    $to   = $request->to_date;

    // Dynamic Services
    $services = ServiceConsumption::select('servicename')
        ->distinct()
        ->orderBy('servicename')
        ->pluck('servicename')
        ->toArray();

    // Dynamic Select
    $select = ["user_id"];

    foreach ($services as $service) {

        $serviceName = str_replace("'", "\\'", $service);

        $select[] = DB::raw("
            SUM(
                CASE
                    WHEN servicename = '{$serviceName}'
                    THEN transamt
                    ELSE 0
                END
            ) AS `" . $service . "`");
    }

    $query = ServiceConsumption::select($select);

    if (!empty($from) && !empty($to)) {
        $query->whereBetween(
            DB::raw('DATE(req_dt)'),
            [$from, $to]
        );
    }
// dd($query->toSql(), $query->getBindings());
    $data = $query
        ->groupBy('user_id')
        ->orderBy('user_id')
        ->get();

//     $data = DB::select($query->toSql(), $query->getBindings());

// dd($data);
// dd($query->toSql(), $query->getBindings());
    return response()->json([
        'services' => $services,
        'data' => $data
    ]);
}
}