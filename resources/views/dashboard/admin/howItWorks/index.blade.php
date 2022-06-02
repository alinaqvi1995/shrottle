@extends('dashboard.admin.layout.app')

@section('page_title', 'Cobra Rider')

@section('head_style')
<!-- Ionicons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"> @endsection
@section('content')
<style>
    p,
    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
        margin: 0;
        padding: 0;
    }

    .table-header-panel .title-1 {
        font-size: 16px;
        line-height: 1;
        color: #999;
    }

    .table-header-panel .title-2 {
        font-size: 48px;
        color: #333;
    }

    .view-all-table {
        border-radius: 4px;
        background: #007ba7;
        color: #ffffff;
        padding: 10px 30px;
        margin-right: 10px;
        border: 1px solid transparent;
        cursor: pointer;
    }

    .table-header-panel .d-flex .first {
        flex: 0 0 auto;
        width: 75%;
    }

    .table-header-panel .d-flex .second {
        flex: 0 0 auto;
        width: 25%;
        margin-top: 26px;
    }

    .table-header-panel {
        border: 1px solid #dee2e6;
        padding: 24px;
        border-bottom: 0;
    }

    .table.border {
        border: 1px solid #dee2e6;
    }

    .color-primary {
        color: #3c7ba7;
    }

    .dashboard-card .card-title {
        font-weight: 500;
        margin-bottom: 0.75rem;
        font-size: 46px;
        color: #fff;
    }

    .card.dashboard-card.bg-one {
        background-color: #3c7ba7;
    }

    .card.dashboard-card.bg-two {
        background-color: #5fc2ba;
    }

    .card.dashboard-card.bg-three {
        background-color: #333;
    }

    .card.dashboard-card .card-text {
        font-size: 36px;
        line-height: 1.4;
        margin-bottom: 0;
        color: #fff;
    }

    .dashboard-card i {
        font-size: 80px;
        color: #fff;
    }

    .dashboard-card .d-flex .first {
        flex: 0 0 auto;
        width: 30%;
    }

    .dashboard-card .d-flex .second {
        flex: 0 0 auto;
        width: 70%;
    }

</style>


<div class="mb-5 col-md-12">
    <div class="table-responsive">
        <div class="table-header-panel">
            <div class="d-flex">
                <div class="first">
                    <h2 class="text-uppercase title-2">All 'How it work' Questions</h2>
                </div>
                <div class="align-self-center text-right second">
                    <a class="btn btn-primary" style="color:#FFF;" href="{{ route('admin.how.add') }}"> Add New Question</a>
                </div>
            </div>
        </div>
        <table class="table border">
            <thead>
                <tr>
                    <th></th>
                    <th>Question</th>
                    <th>Answer</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @if (count($how) > 0)
                    @foreach ($how as $key => $row)
                        <tr>
                            <td>{{ ++$key }}. </td>
                            <td>{{ $row->question }}</td>
                            <td>{{ $row->answer }}</td>
                            <td>
                                @if ($row->status == 1)
                                    Active
                                @else
                                    Inactive
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.how.edit', $row->id) }}" class="btn btn-primary btn-sm mt-2"><i class="fa fa-info"
                                        style="font-size:18px"></i></a>
                                <a href="" class="btn btn-danger btn-sm mt-2"><i class="fa fa-trash"
                                        style="font-size:18px"></i></a>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="6" allign="center">No data available</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>



@endsection @section('bottom_script') @endsection
