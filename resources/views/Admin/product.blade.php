@extends('Admin.master')

@section('title')
    Product
@endsection

@section('content')

<div class="container-fluid">
    <div class="row mb-3">
        <div class="col-md-11 m-auto">
            <div class="card">
                <div class="card-header" style="background-color: white;">
                <h5 class="float-left">View Products</h5>
                <h5 class="float-right">
                    <button class="btn btn-info btn-sm">Add Product</button>
                </h5>
                </div>
                <div class="card-body" style="background-color:whitesmoke">
                    <form>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6 mb-2">
                                    <label for="categoryId">Select Category</label>
                                    <select name="category_id" class="form-control" id="categoryId">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label for="image">Choose Image (s)</label>
                                    <input type="file" name="image" id="image" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6 mb-2">
                                    <label for="name">Product Name</label>
                                    <input type="text" name="name" id="name" class="form-control" placeholder="Product Name">
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label for="title">Product Title</label>
                                    <input type="text" name="title" id="title" class="form-control" placeholder="Product Title">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6 mb-2">
                                    <label for="shortDescription">Short Description</label>
                                    <input type="text" name="short" id="shortDescription" class="form-control" placeholder="Short Description">
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label for="longDescription">Long Description</label>
                                    <input type="text" name="long" id="longDescription" class="form-control" placeholder="Long Description">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12 mb-2">
                                    <label>Publication Status</label><br>
                                    <input type="radio" name="status" id="active" value="Active" id="Active">
                                    <label for="active">Active</label>
                                    <input type="radio" name="status" id="deactive" value="Deactive" id="Deactive">
                                    <label for="deactive">Deactive</label>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-body" style="background-color: white;">
                    <table class="table table-hover text-center">
                        <thead>
                            <tr>
                                <th scope="col">SL</th>
                                <th scope="col">Category</th>
                                <th scope="col">Image</th>
                                <th scope="col">Name</th>
                                <th scope="col">Title</th>
                                <th scope="col">Short Description</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                                <td>@mdo</td>
                                <td>@mdo</td>
                                <td>
                                    <div class="badge badge-pill badge-success">Active</div>
                                </td>
                                <td>
                                    <a href="" class="btn btn-success btn-sm">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a href="" class="btn btn-info btn-sm">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="" class="btn btn-danger btn-sm">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection