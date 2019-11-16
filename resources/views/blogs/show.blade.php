@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Show {{$blog->title}}</div>

                <div class="card-body">
                        <div class="form-group">
                            Title: 
                            {{ $blog->title}}
                        </div>
                        <div class="form-group">
                            Body: 
                            {{ $blog->body }}
                        </div>
                        <div class="form-group">
                            Written by: 
                            {{ $blog->author}}
                        </div>
                       
                        <div class="form-group">
                            <a href="{{ route('blog:index')}}" class="btn btn-link">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 