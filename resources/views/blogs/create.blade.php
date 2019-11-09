@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create new Blog</div>

                <div class="card-body">
                      
                  <form action="" method="post">
                        @csrf 
                        <div class="form-group">
                                <label for="exampleFormControlInput1">Title</label>
                                <input type="text" name="title" class="form-control" id="exampleFormControlInput1" placeholder="Title">
                              </div>
                        <div class="form-group">
                                <label for="exampleFormControlTextarea1">Description</label>
                                <textarea class="form-control" name="body" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>
                        <button type="submit" name="submit" value="submit" class="btn btn-primary mb-2">Create Blog</button>
                        <a href="{{ route('blog:index')}}" class="btn btn-link">Cancel</a>
                  </form>

                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
