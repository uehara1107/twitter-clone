@extends('../layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @foreach ($all_users as $user)
                    <div class="card">
                        <div class="card-haeder p-3 w-100 d-flex">
                            <img src="{{ $user->profile_image }}" class="rounded-circle" width="50" height="50">
                            <div>
                                <p class="p-2">{{ $user->name }}</p>
                                <a href="{{ url('users/' .$user->id) }}" class="text-secondary">{{ $user->screen_id }}</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="my-4 d-flex justify-content-center">
            {{ $all_users->links('pagination::bootstrap-4') }}
        </div>
    </div>
@endsection