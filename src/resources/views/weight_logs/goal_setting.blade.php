@extends('layouts.app')

@section('content')
<div class="goal-setting">
    <h2>目標体重設定</h2>
    <form action="{{ route('weight_target.store') }}" method="POST">
        @csrf
        <div>
            <input type="number" name="weight_target" step="0.1" required>
            <p>kg</p>
        </div>
        <button type="submit">保存</button>
        <button>更新</button>
    </form>
</div>
@endsection