<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WeightTarget;

class WeightTargetController extends Controller
{
    public function create()
    {
        return view('weight_logs.goal_setting'); // ビューを表示
    }

    public function store(Request $request)
    {
        $request->validate([
            'weight_target' => 'required|numeric|min:30|max:200',
        ]);

        WeightTarget::create([
            'user_id' => auth()->id(),
            'weight_target' => $request->weight_target,
        ]);

        return redirect()->route('weight_logs.index')->with('success', '目標体重を設定しました！');
    }

    public function goalSetting()
    {
        return view('weight_logs.goal_setting');
    }


}
