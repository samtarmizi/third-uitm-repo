@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Blog Dashboard
                    <div class="float-right">
                        <a href="{{ route('blog:create')}}" class="btn btn-primary">New</a>
                        </div>
                </div>
               

                <div class="card-body">
                        @if (session()->has('alert'))
                        <div class="alert {{ session()->get('alert-type')}}">
                            {{session()->get('alert')}}
                        </div>
                    @endif
                    Display all the blog here

                    <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Created</th>
                                    <th>Submitted by</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($blogs as $blog)
                                    <tr>
                                        <td>{{ $blog->id}}</td>
                                        <td>{{ $blog->title}}</td>
                                        <td>{{ $blog->created_at->diffForHumans()}}</td>
                                        <td>{{ $blog->author}}</td>
                                        <td>
                                            <a href="{{ route('blog:show',$blog) }}" class="btn btn-success">Show</a>
                                        <a href="{{ route('blog:edit',$blog) }}" class="btn btn-primary">Edit</a>
                                        <a href="{{ route('blog:delete', $blog)}}" class="btn btn-danger"
                                                onclick="return confirm('Are you sure?')">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $blogs->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
