<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WeightLog;



class WeightLogController extends Controller
{
    public function index(Request $request)
    {
        
            $query = WeightLog::query();

            if ($request->filled('start_date') && $request->filled('end_date')) {
                $query->whereBetween('date', [$request->start_date, $request->end_date]);
            }
        
        $weightLogs = WeightLog::Paginate(8); // 日付順で取得
        return view('weight_logs.index', compact('weightLogs'));
    }

    public function goalSetting()
    {
        return view('weight_logs.goal_setting');
    }

}
