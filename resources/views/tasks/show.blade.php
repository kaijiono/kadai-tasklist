@extends('layouts.app')

@section('content')

<h1>id = {{ $task->id }} タスク詳細ページ</h1>

    <p>{{ $task->content }}</p>
    
    {!! link_to_route('tasks.edit', 'このタスクの編集', ['id' => $task->id]) !!}
    
    {!! Form::model($task, ['route' => ['tasks.destroy', $task->id], 'method' => 'delete']) !!}
        {!! Form::submit('削除') !!}
    {!! Form::close() !!}

@endsection