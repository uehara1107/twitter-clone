@extends('../layouts.app')
@section('title','ユーザー詳細')
@section('content')
<div class="container">
    @if(!empty($user))
    <table class="table table-striped table-hover">
    <thead>
    <tr>
    <!--<th></th>-->
        <th>ID</th>
        <th>名前</th>
        <th>メールアドレス</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
        <tr>
<!-- 
        <td>
            <div>
            @if(!empty($user->thumbnail))
            <img src="/storage/user/{{ $user->thumbnail }}" class="thumbnail">
            @endif
            </div>
        </td>
-->        
        <td>{{ $user->id }}</td>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td>
        </td>
        </tr>
    </tbody>
    </table>
    @endif
    <a href="{{ route('userIndex') }}" class="alert-link">戻る</a><br />
</div>
@endsection