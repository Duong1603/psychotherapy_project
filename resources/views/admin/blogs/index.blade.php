@extends('admin.master')
@section('content')
<!-- partial -->
<div class="main-panel">
    @if(Session::has('message'))
    <p class="alert alert-info">{{ Session::get('message') }}</p>
    @endif
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                    <i class="mdi mdi-blogger"></i>
                </span> Blogs
            </h3>
            <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">
                        <span></span>Blogs <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                    </li>
                </ul>
            </nav>
            <!-- <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">
                        <span></span><a type="button" class="btn btn-inverse-dark btn-fw" href="/admin/blogs/create">ADD NEW</a>
                    </li>
                </ul>
            </nav> -->
        </div>
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <div id="card-title-btn-blogs">
                            <h4 class="card-title">Blogs</h4>
                            <a type="button" class="btn btn-gradient-danger btn-fw" href="/admin/blogs/create">ADD NEW</a>
                        </div>
                        <div class="table-responsive">
                            <table class="table" style="width: 100%">
                                <col style="width:20%">
                                <col style="width:10%">
                                <!-- <col style="width:10%"> -->
                                <col style="width:40%">
                                <col style="width:10%">
                                <col style="width:10%">
                                <col style="width:10%">
                                <thead>
                                    <tr>
                                    <th id="sort">Title
                                            <form action="">
                                                @csrf
                                                <select style="color:black;border:2px solid grey;outline:none" name="sort_title" id="sort_title" class="form-control">
                                                    <option selected value="{{ Request::url() }}?sort_by=none">Filter</option>
                                                    <option value="{{ Request::url() }}?sort_by=kytu_az_by_name" style="color:black;">A đến Z</option>
                                                    <option value="{{ Request::url() }}?sort_by=kytu_za_by_name" style="color:black;">Z đến A</option>
                                                </select>
                                            </form>
                                        </th>
                                        <th>Image</th>
                                        <!-- <th>Emotion</th> -->
                                        <th>Content</th>
                                        <th>Status</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                @foreach ($posts as $post)
                                <tbody>
                                    <tr>
                                        <th>{{ $post->title }}</th>
                                        <td>
                                        <img src="/img/{{ $post->image }}" class="me-2" alt="Avatar" />
                                        </td>
                                        <!-- <td>{{ $post->emotion }} <i class="mdi mdi-heart text-danger"></i></td> -->
                                        <td id="content">
                                            <p>{{ $post->content }}</p>
                                        </td>
                                        <td>
                                            <input id="action" name="active" value="{{ $post->id }}" onchange='changeStatus("{{$post->id}}")' {{$post->status === 'show'? 'checked': ''}} class="switch" type="checkbox">
                                        </td>
                                        <td>
                                            <a href="/admin/blogs/update/{{ $post->id }}" onclick="return confirm('Bạn có muốn sửa!')"><i class="mdi mdi-pencil-box"></i></a>
                                        </td>
                                        <td>
                                            <a href="/admin/blogs/delete/{{ $post->id }}" onclick="return confirm('Bạn có muốn xóa!')"><i class="mdi mdi-delete"></i></a>
                                        </td>
                                    </tr>
                                </tbody>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        const changeStatus = (index) => {
            window.location.href = `/admin/blogs/update-status/${index}`;
        };
        document.getElementById('sort_title').onchange = function(e) {
            var url = $(this).val();
            // alert(url);
            if (url) {
                window.location = url;
            }
            return false;
        };
    </script>
    <!-- main-panel ends -->
    @endsection