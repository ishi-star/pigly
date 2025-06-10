@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('content')
<div class="register-form__content">
  <div class="register-form__heading">
    <h2>PiGLy</h2>
  </div>
  <p>新規会員登録</p>
  <p>STEP2 体重データの入力</p>
  <form class="form" action="/register" method="post">
    @csrf
    <button>現在の体重</button>
    <button>目標の体重</button>

    <div class="form__button">
      <button class="form__button-submit" type="submit">アカウント作成</button>
    </div>
  </form>

</div>
@endsection
