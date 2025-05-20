@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Список постов</h1>
        <a href="{{ route('posts.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Создать пост
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Заголовок</th>
                    <th>Автор</th>
                    <th>Действия</th>
                </tr>
            </thead>
            <tbody>
                @forelse($posts as $post)
                    <tr>
                        <td>{{ $post['id'] }}</td>
                        <td>{{ $post['title'] }}</td>
                        <td>{{ $post['user']['name'] ?? 'Неизвестен' }}</td>
                        <td>
                            <div class="btn-group" role="group">
                                <a href="{{ route('posts.edit', $post['id']) }}" class="btn btn-sm btn-primary">
                                    <i class="fas fa-edit"></i> Редактировать
                                </a>
                                <a href="{{ route('posts.show', $post['id']) }}" class="btn btn-sm btn-info">
                                    <i class="fas fa-eye"></i> Просмотр
                                </a>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">Посты не найдены</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>
@endsection