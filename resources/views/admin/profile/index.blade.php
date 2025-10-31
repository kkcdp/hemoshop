@extends('admin.layouts.app')

@section('contents')
    <div class="container-xl">
        <div class="card">
            <div class="card-header">
                <h3>Update Profile</h3>
            </div>
            <div class="card-body">
                {{-- <p class="mt-2">You can edit your account details here</p> --}}
                <form method="POST" action="{{ route('admin.profile.update') }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row mt-30">
                        <div class="form-group col-md-3">
                            <div class="mb-3">
                                {{-- default fallback ir norādīts DB, user tabulā, pie avatar lauka --}}
                                <x-input-image id="image-preview" name="avatar" :image="asset(auth('admin')->user()->avatar ?? asset('/defaults/avatar.jpg'))" />
                            </div>
                        </div>
                        <div class="form-group col-md-7">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label required">Name</label>
                                    <input type="text" class="form-control" name="name" placeholder=""
                                        value="{{ auth('admin')->user()->name }}" />
                                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <div class="mb-3">
                                    <label class="form-label required">Email</label>
                                    <input type="email" class="form-control" name="email" placeholder=""
                                        value="{{ auth('admin')->user()->email }}" />
                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-9">
                            <button type="submit" class="btn btn-primary" name="submit" value="Submit">Update
                                Account</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
        <div>Starpsiena</div>
        <div class="card mt-4">
            <div class="card-header">
                <h3>Change Password</h3>
            </div>
            <div class="card-body">
                {{-- <p class="mt-3">You can change your password here</p> --}}
                <form method="POST" action="{{ route('admin.profile.password.update') }}">
                    @csrf
                    @method('PUT')
                    <div class="row mt-30">
                        <div class="form-group col-md-9">
                            <div class="mb-3">
                                <label class="form-label required">Current Password</label>
                                <input type="password" class="form-control" name="current_password" placeholder="" />
                                <x-input-error :messages="$errors->get('current_password')" class="mt-2" />
                            </div>
                        </div>
                        <div class="form-group col-md-9">
                            <div class="mb-3">
                                <label class="form-label required">New Password</label>
                                <input type="password" class="form-control" name="password" placeholder="" />
                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            </div>
                        </div>
                        <div class="form-group col-md-9">
                            <div class="mb-3">
                                <label class="form-label required">Confirm Password</label>
                                <input type="password" class="form-control" name="password_confirmation" placeholder="" />
                                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                            </div>
                        </div>
                        <div class="form-group col-md-9">
                            <button type="submit" class="btn btn-primary" name="submit" value="Submit">Update
                                Password</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $.uploadPreview({
                input_field: "#image-upload", // Default: .image-upload
                preview_box: "#image-preview", // Default: .image-preview
                label_field: "#image-label", // Default: .image-label
                label_default: "Choose File", // Default: Choose File
                label_selected: "Change File", // Default: Change File
                no_label: false, // Default: false
                success_callback: null // Default: null
            });
        });
    </script>
@endpush
