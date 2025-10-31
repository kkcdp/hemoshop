@extends('frontend.dashboard.dashboard-app')

@section('dashboard_contents')
    <div id="account-detail" role="tabpanel" aria-labelledby="account-detail-tab">
        <div class="card">
            <div class="card-header p-0">
                <h4>Account Details</h4>
            </div>
            <div class="card-body p-0">
                <p class="mt-2">You can edit your account details here</p>
                <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row mt-30">
                        {{-- default fallback ir norādīts DB, user tabulā, pie avatar lauka --}}
                        <x-input-image id="image-preview" name="avatar" :image="auth('web')->user()->avatar ?? asset('/defaults/avatar.jpg')" />

                        <div class="form-group col-md-12">
                            <label>Name<span class="required">*</span></label>
                            <input required="" class="form-control" name="name" type="text"
                                value="{{ auth('web')->user()->name }}" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>
                        <div class="form-group col-md-12">
                            <label>Email Address <span class="required">*</span></label>
                            <input required="" class="form-control" name="email" type="email"
                                value="{{ auth('web')->user()->email }}" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-fill-out submit font-weight-bold" name="submit"
                                value="Submit">Save Changes</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="card mt-4">
            <div class="card-header p-0">
                <h5>Change Password</h5>
            </div>
            <div class="card-body p-0">
                <p class="mt-3">You can change your password here</p>
                <form method="POST" action="{{ route('password.update') }}">
                    @csrf
                    @method('PUT')
                    <div class="row mt-30">

                        <div class="form-group col-md-12">
                            <label>Current Password <span class="required">*</span></label>
                            <input required="" class="form-control" name="current_password" type="password" />
                            <x-input-error :messages="$errors->get('current_password')" class="mt-2" />
                        </div>
                        <div class="form-group col-md-12">
                            <label>New Password <span class="required">*</span></label>
                            <input required="" class="form-control" name="password" type="password" />
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>
                        <div class="form-group col-md-12">
                            <label>Confirm Password <span class="required">*</span></label>
                            <input required="" class="form-control" name="password_confirmation" type="password" />
                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                        </div>


                        <div class="col-md-12">
                            <button type="submit" class="btn btn-fill-out submit font-weight-bold" name="submit"
                                value="Submit">Save Changes</button>
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
