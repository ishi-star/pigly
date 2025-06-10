@extends('layouts.app')
<style>
  th {
    background-color: #289ADC;
    color: white;
    padding: 5px 40px;
  }

  tr:nth-child(odd) td {
    background-color: #FFFFFF;
  }

  td {
    padding: 25px 40px;
    background-color: #EEEEEE;
    text-align: center;
  }

  svg.w-5.h-5 {
    /*paginateメソッドの矢印の大きさ調整のために追加*/
    width: 30px;
    height: 30px;
  }
</style>
@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
<div class="weight__goal">
  <h2>PiGLy</h2>
  <a href="{{ route('weight_target.create') }}">
    <button>目標体重設定</button>
  </a>
  <form action="{{ route('logout') }}" method="POST">
    @csrf
    <button type="submit">ログアウト</button>
  </form>
</div>

<form action="{{ route('weight_logs.index') }}" method="GET">
    <input type="date" name="start_date" value="{{ request('start_date') }}" required />
    <input type="date" name="end_date" value="{{ request('end_date') }}" required />
    <input type="submit" value="検索" />
</form>



<div class="weight__content">
  <p>目標体重</p>
  <p>目標まで</p>
  <p>最新体重</p>

  <div class="weight-table">
    <table class="weight-table__inner">
      <tr class="weight-table__row">
        <td class="weight-table__item">日付</td>
        <td class="weight-table__item">体重</td>
        <td class="weight-table__item">食事摂取カロリー</td>
        <td class="weight-table__item">運動時間</td>
      </tr>
      @foreach ($weightLogs as $weightLog)
      <tr>
          <td class="weight-table__item">{{ $weightLog->date }}</td>
          <td class="weight-table__item">{{ $weightLog->weight }}</td>
          <td class="weight-table__item">{{ $weightLog->calories ?? '未入力' }}</td>
          <td class="weight-table__item">{{ $weightLog->exercise_time ?? '未入力' }}</td>
      </tr>
      @endforeach
    </table>
    {{ $weightLogs->links() }}
  </div>
</div>
@endsection

