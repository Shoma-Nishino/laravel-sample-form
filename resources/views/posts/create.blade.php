@extends('layouts.default')
@section('title', 'お問い合わせ一覧')
@section('content')
    <form method="post" action="{{ url('/posts') }}">
    {{ csrf_field() }}
        <p><label for="name">名前</label></p>
        <p><input type="text" name="name" value="{{old('name')}}"></p>
        @if($errors->has('name'))
        {{$errors->first('name')}}
        @endif
        
        <p><label for="name">メールアドレス</label></p>
        <p><input type="text" name="email" value="{{old('email')}}"></p>
        @if($errors->has('email'))
        {{$errors->first('email')}}
        @endif

        <p><label for="name">お問い合わせ</label></p>
        <p><textarea type="text" name="body" value="{{old('body')}}"></textarea></p>
        @if($errors->has('body'))
        {{$errors->first('body')}}
        @endif

        <input type="submit" value="送信">
    </form>
@endsection