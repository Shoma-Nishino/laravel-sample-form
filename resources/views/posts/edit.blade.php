@extends('layouts.default')
@section('title', '編集画面')
@section('content')
    <h2>編集画面です</h2>
    <form method="post" action="{{ url('/edit') }}">
    {{ csrf_field() }}
        <input type="hidden" name="id" value="{{ $post->id }}">
        <p><label for="name">名前</label></p>
        <p><input type="text" name="name" value="{{$post->name}}"></p>
        @if($errors->has('name'))
        {{$errors->first('name')}}
        @endif
        
        <p><label for="name">メールアドレス</label></p>
        <p><input type="text" name="email" value="{{$post->email}}"></p>
        @if($errors->has('email'))
        {{$errors->first('email')}}
        @endif

        <p><label for="name">お問い合わせ</label></p>
        <p><textarea type="text" name="body" value="{{$post->body}}"></textarea></p>
        @if($errors->has('body'))
        {{$errors->first('body')}}
        @endif

        <input type="submit" value="送信">
    </form>
@endsection