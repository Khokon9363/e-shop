@extends('Admin.master')

@section('title')
    Category
@endsection

@php
    $route = 'admin.category.'
@endphp

@section('content')

<div class="container-fluid">
    <div class="row mb-3">
        <div class="col-md-11 m-auto">
            <div class="card">
            @if(session('success') || session('delete'))
                <div class="card-body col-md-6 m-auto">
                    <div class="alert {{ session('success') ? 'alert-success' : 'alert-danger' }} alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        {{ session('delete') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            @endif
                <div class="card-header" style="background-color: white;">
                <h5 class="float-left">{{ $page == 'edit' ? 'Edit Category' : 'View Categories'}}</h5>
                <h5 class="float-right">
                @if($page == 'edit')
                    <a href="{{ route($route.'index') }}" class="btn btn-info btn-sm">Go Back</a>
                @else
                    <button class="btn btn-info btn-sm" type="button" data-toggle="collapse" data-target="#collapseCategory">Add Category</button>
                @endif
                </h5>
                <div class="card-body {{ $errors->any() || $page == 'edit' ? 'show' : 'collapse' }} col-md-6 m-auto" style="background-color:whitesmoke" id="collapseCategory">
                    <form action="{{ $page == 'edit' ? route($route.'update', $data->id) : route($route.'store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if($page == 'edit')
                        @method('PATCH')
                    @endif
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="categoryName">Category Name</label>
                                    <input type="text" name="name" id="categoryName" value="{{ isset($data->name) ? $data->name : old('name') }}" class="form-control" placeholder="Category Name">
                                <span class="text-danger">
                                    @error('name')
                                        {{ $message }}
                                    @enderror
                                </span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <label>Publication Status</label><br>
                                    <input type="radio" {{ old('status') == 'Active' || isset($data->status) && $data->status == 'Active' ? 'checked' : '' }} name="status" id="active" value="Active" id="Active">
                                    <label for="active">Active</label>
                                    <input type="radio" {{ old('status') == 'Deactive' || isset($data->status) && $data->status == 'Deactive' ? 'checked' : '' }} name="status" id="deactive" value="Deactive" id="Deactive">
                                    <label for="deactive">Deactive</label><br>
                                <span class="text-danger">
                                    @error('status')
                                        {{ $message }}
                                    @enderror
                                </span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-success btn-sm">{{ $page == 'edit' ? 'Update' : 'Save' }}</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                @if($page == 'index')
                <div class="card-body" style="background-color: white;">
                    <table class="table table-hover text-center">
                        <thead>
                            <tr>
                                <th scope="col">SL</th>
                                <th scope="col">Category name</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $category)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $category->name }}</td>
                                <td>
                                    <div class="badge badge-pill {{ $category->status == 'Active' ? 'badge-success' : 'badge-danger' }}">{{ $category->status }}</div>
                                </td>
                                <td>
                                    <a href="{{ route($route.'edit', $category->id) }}" class="btn btn-info btn-sm">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <form action="{{ route($route.'destroy', $category->id) }}" method="post" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td></td>
                                <td></td>
                                <td>
                                    @if($data->hasPages())
                                        {{ $data->links() }}
                                    @endif
                                </td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>

@endsection