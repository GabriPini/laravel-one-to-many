@extends('layouts.admin')

@section('content')


<div class="container">
    <h1 class="pe-5">All Categories</h1>
    @include('partials.error')
    @if(session('message'))
    <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>

    @endif
    <div class="row  d-flex flex-column">
        <div class="col pe-5">
            <form action="" method="POST" class="d-flex  justify-content-center align-items-center p-4">
                @csrf
                <div class="input-group mb-3 ">
                    <input type="text" name="name" id="name" class="form-control" placeholder="Add a category" aria-describedby="NameHelper">
                    <button type="submit" class="btn btn-primary">Add</button>

                  </div>

            </form>
        </div>
        <div class="col">
           <table class="table table-striped table-inverse table-responsive">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Slug</th>
                    <th>Post Count</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($cats as $category)
                <tr>
                    <td scope="row">{{$category->id}}</td>
                    <td>
                        <form id="category-{{$category->id}}" action="{{route('admin.categories.update', $category->slug)}}" method="POST" >
                            @csrf
                            @method('PATCH')
                            <input class="border-0 bg-transparent" type="text" name="name" value="{{$category->name}}">
                        </form>

                    </td>
                    <td>{{$category->slug}}</td>
                    <td><span class="badge badge-info bg-dark"> {{count($category->posts)}}</span></td>
                    <td class="d-flex">
                        <button form="category-{{$category->id}}" type="submit" class="btn btn-primary">Update</button>

                        <form action="{{route('admin.categories.destroy', $category->slug)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"> Delete</button>
                        </form>

                    </td>
                </tr>

                @empty
                <tr>
                    <td scope="row"> No Category</td>
                    <td></td>
                    <td></td>
                </tr>

                @endforelse
            </tbody>
           </table>
        </div>
    </div>
</div>


@endsection
