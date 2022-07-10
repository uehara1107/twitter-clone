@extends('../layouts.app')

@section('user_index')
    ユーザー一覧<br>
    <table>
    @if(!empty($users))
        @foreach($users as $user)
            <a href="{{ route('userShow', $user->id) }}" class="alert-link">{{ $user->name }}</a><br />
        @endforeach
    @endif
    </table>
@endsection