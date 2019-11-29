@extends('layouts.default')
@section('title', 'お問い合わせ一覧')
@section('content')
    <h2>お問い合わせ内容一覧</h2>
    <a href="{{ url('posts/create') }}">お問い合わせ新規作成</a>
    @forelse($posts as $post)
        <p>お名前</p>
        <p>{{$post->name}}</p>

        <p>メールアドレス</p>
        <p>{{$post->email}}</p>

        <p>お問い合わせ内容</p>
        <p>{{$post->body}}</p>
        <a href="{{ action('PostsController@show', $post->id) }}">詳細画面</a>
        <a href="{{ action('PostsController@edit', $post) }}">編集画面</a>
        <!-- <a href="{{ action('PostsController@destroy', $post->id) }}">削除する</a> -->
        <form method="post" action="/delete">
            {{ csrf_field() }}
            <input type="hidden" name="id" value="{{ $post->id }}">
            <button type="submit">削除</button>
        </form>
    @empty
        <p>まだ投稿はありません。</p>
    @endforelse
@endsection