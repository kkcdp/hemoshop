@extends('admin.layouts.app')

@section('contents')
    <section class="section">
        <div class="text-left px-5">
            <h2>Language</h2>
        </div>
        <div class="card card-primary m-4">

            <div class="card-header d-flex justify-content-between">
                <h3 class="card-title">Create Language</h3>
            </div>

            <div class="card-body">
                <form action="">
                    <div class="form-group">
                        <label for="">Language</label>
                        <select name="" id="" class="form-control my-2">
                            <option value="">---Select---</option>
                            <option value=""></option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Slug</label>
                        <input readonly type="text" class="form-control mt-2">
                    </div>
                    <div class="form-group">
                        <label for="Is it default?"></label>
                        <select name="" id="" class="form-control">
                            <option value="0">No</option>
                            <option value="1">Yes</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="Status"></label>
                        <select name="" id="" class="form-control">
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-md btn-primary mt-4">Create</button>
                </form>
            </div>
            < </div>
    </section>
@endsection
