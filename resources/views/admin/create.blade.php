@extends('layouts.admin-layout')
@section('title')
    Add New Employee
@endsection
@section('page-name')
    Add New Employee
@endsection

@section('main-content')
<div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
    <div class="widget-content widget-content-area br-6">
        <form class="needs-validation" novalidate action="{{route('donzy.add-new-employee')}}" method="post">
            @csrf
            <div class="form-row">
                <div class="col-md-4 mb-4">
                    <label for="validationCustom01">First name</label>
                    <input type="text" class="form-control" value="{{old('first_name')}}" name="first_name"  placeholder="First name"  required>
                    <div class="invalid-feedback">
                        Please enter first name
                    </div>
                    @error('first_name')
                        <i class="text-danger mt-2">{{$message}}</i>
                    @enderror
                </div>
                <div class="col-md-4 mb-4">
                    <label for="validationCustom02">Surname</label>
                    <input type="text" class="form-control" value="{{old('surname')}}" name="surname" placeholder="Surname" required>
                    <div class="invalid-feedback">
                        Please enter surname
                    </div>
                    @error('surname')
                        <i class="text-danger mt-2">{{$message}}</i>
                    @enderror
                </div>
                <div class="col-md-4 mb-4">
                    <label for="validationCustomUsername">Email Address</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupPrepend">@</span>
                        </div>
                        <input type="text" class="form-control" value="{{old('email')}}" name="email" placeholder="Email address" aria-describedby="inputGroupPrepend" required>
                        <div class="invalid-feedback">
                            Please a valid email address.
                        </div>
                        @error('email')
                            <i class="text-danger mt-2">{{$message}}</i>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-4 mb-4">
                    <label for="validationCustom03">Mobile No.</label>
                    <input type="text" class="form-control" value="{{old('mobile_no')}}" name="mobile_no"  placeholder="Mobile No." required>
                    <div class="invalid-feedback">
                        Please a valid Mobile no.
                    </div>
                    @error('mobile_no')
                        <i class="text-danger mt-2">{{$message}}</i>
                    @enderror
                </div>
                <div class="col-md-4 mb-4">
                    <label for="validationCustom04">Role</label>
                    <select name="role" id="role" class="form-control">
                        <option disabled selected>Select role</option>
                        @foreach ($roles as $role)
                            <option value="{{$role->id ?? ''}}">{{$role->name ?? ''}}</option>
                        @endforeach
                    </select>
                    <div class="invalid-feedback">
                        Please assign role to employee
                    </div>
                    @error('role')
                        <i class="text-danger mt-2">{{$message}}</i>
                    @enderror
                </div>
                <div class="col-md-4 mb-4">
                    <label for="validationCustom04">Gender</label>
                    <select name="gender" id="gender" class="form-control">
                        <option disabled selected>Select gender</option>
                        <option value="1">Male</option>
                        <option value="2">Female</option>
                    </select>
                    <div class="invalid-feedback">
                        Please select gender
                    </div>
                    @error('gender')
                        <i class="text-danger mt-2">{{$message}}</i>
                    @enderror
                </div>
                <div class="col-md-12 mb-4">
                    <label for="validationCustom04">Address</label>
                    <textarea name="address" class="form-control" style="resize: none;" placeholder="Enter a valid residential address">{{old('address')}}</textarea>
                    <div class="invalid-feedback">
                        Please enter a valid residential <address></address>
                    </div>
                    @error('first_name')
                        <i class="text-danger mt-2">{{$message}}</i>
                    @enderror
                </div>
                <div class="col-md-12 d-flex justify-content-center">
                    <div class="btn-group ">
                        <button class="btn btn-primary btn-sm mt-3" type="submit">Submit</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@section('extra-scripts')
    <script>
        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, true);
            });
        }, true);
    </script>
@endsection
