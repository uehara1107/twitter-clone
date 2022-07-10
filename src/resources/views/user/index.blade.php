@extends('../layouts.app')

@section('user_index')
    ユーザー一覧<br>
    <table>
        <tr><th>ID</th><th>名前</th><th>メールアドレス</th><th>パスワード</th></tr>
    @foreach($users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->password }}</td>
        </tr>
    @endforeach
    </table>
@endsection