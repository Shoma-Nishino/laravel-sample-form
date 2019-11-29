@extends('layouts.default')
@section('title', '詳細画面')
@section('content')
<h2>詳細画面です</h2>
    <p>お名前</p>
    <p>{{$post->name}}</p>

    <p>メールアドレス</p>
    <p>{{$post->email}}</p>

    <p>お問い合わせ内容</p>
    <p>{{$post->body}}</p>
    <a href="{{ url('/') }}">戻る</a>

    <h2>コメント一覧</h2>
    @forelse($post->comments as $comment)
        <p>{{$comment->body}}</p>
        <a href="{{ action('CommentsController@edit', [$post->id, $comment->id]) }}">編集画面</a>
        <form method="post" action="{{ action('CommentsController@destroy', [$post->id, $comment->id]) }}">
            {{ csrf_field() }}
            <input type="hidden" name="comment_id" value="{{ $comment->id }}">
            <button type="submit">削除</button>
        </form>
    @empty
        <p>まだコメントはありません。</p>
    @endforelse

    <form method="post" action="{{ action('CommentsController@store', $post->id) }}">
        {{ csrf_field() }}
        <input type="hidden" name="post_id" value="{{ $post->id }}">
        <p><textarea type="text" name="body" value="{{old('body')}}"></textarea></p>
        @if($errors->has('body'))
        {{$errors->first('body')}}
        @endif

        <input type="submit" value="コメント送信">
    </form>
@endsection