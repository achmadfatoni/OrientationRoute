@extends('app')

@section('page-header')
    @include('elements.page-header', ['section_title' => 'Orientation Video', 'page_title' => 'Users List'])
@endsection

@section('content')
    <section class="panel">
        <header class="panel-heading">
            <div class="panel-actions">
                <a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
                <a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss></a>
            </div>

            <h2 class="panel-title">Users List</h2>
        </header>

        <div class="panel-body">
            <section class="table-responsive">
                <table class="table table-hover table-bordered table-striped table-condensed">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Watched Videos</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($users as $key => $user)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td><a href="{{ url('videos/users/' . $user->getRouteKey() . '/view') }}">{{ $user->name }}</a>
                            </td>
                            <td>{{ count($user->watchedVideo) }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </section>
        </div>
    </section>
@endsection