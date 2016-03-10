@extends('app')

@section('page-header')
    <h2>Orientation Video</h2>

    <div class="right-wrapper pull-right">
        <ol class="breadcrumbs">
            <li>
                <a href="{{ url('home') }}">
                    <i class="fa fa-home"></i>
                </a>
            </li>
            <li><span>Orientation Video</span></li>
            <li class="active"><span>All Videos</span></li>
        </ol>

        <div class="sidebar-right-toggle"></div>
    </div>
@endsection

@section('content')
    <section class="panel">
        <header class="panel-heading">
            <div class="panel-actions">
                <a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
                <a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss></a>
            </div>

            <h2 class="panel-title">All Videos</h2>
        </header>

        <div class="panel-body">
            @include('elements.event')

            <section class="table-responsive">
                <form action="{{ url('videos/update-order') }}" method="post">
                    <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">

                    <input type="submit" value="Update" class="btn btn-success">

                    <br><br>

                    <table class="table table-hover table-bordered table-striped table-condensed">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Order</th>
                                <th></th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($videos as $video)
                                <tr>
                                    <input type="hidden" name="id[]" value="{{ $video->id }}">
                                    <td>{{$video->order_number}}</td>
                                    <td>
                                        <a href="{{ url('videos/' . $video->order_number . '-' . $video->slug . '/view') }}">{{ $video->title }}</a>
                                    </td>
                                    <td>{{ $video->description }}</td>
                                    <td width="10%">
                                        <input type="number" name="order_number[]" id="order_number" class="form-control"
                                               value="{{ $video->order_number }}">
                                    </td>
                                    <td width="20%">
                                        <a href="{{ url('videos/' . $video->order_number . '-' . $video->slug . '/edit') }}"
                                           class="btn btn-default">Edit</a>
                                        <a href="{{ url('videos/' . $video->order_number . '-' . $video->slug . '/delete') }}"
                                           class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </form>
            </section>
        </div>
    </section>
@stop