@extends('Admin.master')

@section('title')
    Slider
@endsection

@php
    $route = 'admin.slider.'
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
                <h5 class="float-left">{{ $page == 'edit' ? 'Edit Slider' : 'View Sliders'}}</h5>
                <h5 class="float-right">
                @if($page == 'edit')
                    <a href="{{ route($route.'index') }}" class="btn btn-info btn-sm">Go Back</a>
                @else
                    <button class="btn btn-info btn-sm" type="button" data-toggle="collapse" data-target="#collapseSlider">Add Slider</button>
                @endif
                </h5>
                </div>
                <div class="card-body {{ $errors->any() || $page == 'edit' ? 'show' : 'collapse' }}" style="background-color: whitesmoke;" id="collapseSlider">
                    <form action="{{ $page == 'edit' ? route($route.'update', $data->id) : route($route.'store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if($page == 'edit')
                        @method('PATCH')
                    @endif
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6 mb-2">
                                    <label for="categoryId">Select Category</label>
                                    <select name="category_id" class="form-control" id="categoryId">
                                    @foreach($categories as $category)
                                        <option {{ isset($data->category_id) && $data->category_id == $category->id || old('category_id') == $category->id ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                    </select>
                                    <span class="text-danger">
                                        @error('category_id')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label for="image">Choose Image</label>
                                    <input type="file" name="image" id="image" class="form-control">
                                    <span class="text-danger">
                                        @error('image')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6 mb-2">
                                    <label for="testOne">Text One</label>
                                    <input type="text" name="text_one" value="{{ isset($data->text_one) ? $data->text_one : old('text_one') }}" id="testOne" class="form-control" placeholder="Text one">
                                    <span class="text-danger">
                                        @error('text_one')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label for="textTwo">Text two</label>
                                    <input type="text" name="text_two" value="{{ isset($data->text_two) ? $data->text_two : old('text_two') }}" id="textTwo" class="form-control" placeholder="Text two">
                                    <span class="text-danger">
                                        @error('text_two')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6 mb-2">
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
                                @if($page == 'edit')
                                <div class="col-md-6 mb-2">
                                    <img src="{{ asset('slider_images/'.$data->image) }}" style="height: 80px; width: auto;">
                                </div>
                                @endif
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
                                <th scope="col">Slider Image</th>
                                <th scope="col">Category</th>
                                <th scope="col">Text One</th>
                                <th scope="col">Text Two</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $slider)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td><img src="{{ asset('slider_images/'.$slider->image) }}" style="height: 70px; width: auto;"></td>
                                <td>{{ $slider->categories->name }}</td>
                                <td>{{ $slider->text_one }}</td>
                                <td>{{ $slider->text_two }}</td>
                                <td>
                                    <div class="badge badge-pill {{ $slider->status == 'Active' ? 'badge-success' : 'badge-danger' }}">{{ $slider->status }}</div>
                                </td>
                                <td>
                                    <a href="{{ route($route.'edit', $slider->id) }}" class="btn btn-info btn-sm">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <form action="{{ route($route.'destroy', $slider->id) }}" method="post" style="display: inline;">
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
                                <td></td>
                                <td>
                                    @if($data->hasPages())
                                        {{ $data->links() }}
                                    @endif
                                </td>
                                <td></td>
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