@php
    $userType = \App\Models\User::types;
@endphp

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('login_register/css/style1.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <title>Login Form</title>
    <style>
        .select2-container--default .select2-selection--single .select2-selection__rendered {
            color: #444;
            line-height: 48px;
            height: 100%;
        }

        .select2-container--default .select2-selection--single {
            background-color: #ffffff8a;
            border: 1px solid #aaa;
            border-radius: 4px;
            height: 50px;
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 45px;
            position: absolute;
            top: 1px;
            right: 1px;
            width: 20px;
        }
    </style>
</head>

<body>

    <div class="User-reg">
        <div class="container">
            <h1>Admin Registration</h1>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('admin_signup_store') }}" method="POST">

                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <label for="name">Full Name</label>
                        <input type="text" id="name" value="{{ old('name') }}" name="name"
                            placeholder="Enter your full name" required>
                    </div>

                    <div class="col-md-6">
                        <label for="email">Email </label>
                        <input type="email" id="email" value="{{ old('email') }}" name="email"
                            placeholder="Enter your email address">

                    </div>
                    <div class="col-md-6">
                        <label for="phone">Contact Number</label>
                        <input type="tel" id="phone" name="phone" value="{{ old('phone') }}"
                            placeholder="Enter your contact number" required>
                        {{-- <small class="note">* Enter your contact number.</small> --}}

                    </div>
                    <div class="col-md-6">
                        <label for="nid">National ID (NID)</label>
                        <input type="number" id="nid" name="nid" value="{{ old('nid') }}"
                            placeholder="Enter your National ID" required>

                    </div>
                    <div class="col-md-6">
                        <label for="division">Division</label>
                        <select onchange="getDistrict(this)" id="division" name="division_id" required>
                            <option value="">Select Division</option>
                            @foreach ($division as $item)
                                <option @selected(old('division_id') == $item->id) value="{{ $item->id }}">{{ $item->name }}
                                </option>
                            @endforeach

                        </select>

                    </div>
                    <div class="col-md-6">
                        <label for="district">District</label>
                        <select @selected(old('district_id')) onchange="getUpazila(this)" id="district"
                            name="district_id" required>
                            <option value="">Select District</option>

                        </select>

                    </div>
                    <div class="col-md-6">

                        <label for="upazila">Upazila</label>
                        <select @selected(old('upzila_id')) onchange="getUnion(this)" id="upazila" name="upzila_id"
                            required>

                            <option value="">Select Upazila</option>

                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="union">Union</label>
                        <select @selected(old('union_id')) id="union" name="union_id" required>
                            <option value="">Select Union</option>
                        </select>

                    </div>
                    {{-- <div class="col-md-6">
                        <label for="type">User Type</label>
                        <select id="type" name="type" required>
                            <option value="">Select User Type</option>
                            @foreach ($userType as $key => $item)
                                <option @selected(old('type') == $key) value="{{ $key }}">{{ $item }}
                                </option>
                            @endforeach

                        </select>

                    </div> --}}
                    <div class="col-md-12">
                        <label for="address">Address</label>
                        <textarea id="address" name="address" placeholder="Enter your full address" required> {{ old('address') }} </textarea>

                    </div>
                    {{-- <div class="col-md-6">
                        <label for="role">Role</label>
                        <input type="text" id="role" name="role" placeholder="Enter your role (e.g., Farmer, Employee)"
                            required>

                    </div> --}}
                    <div class="col-md-6">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" placeholder="Enter your password"
                            required>
                    </div>
                    <div class="col-md-6">
                        <label for="password_confirmation">Confirm Password</label>
                        <input type="password" id="password_confirmation" name="password_confirmation"
                            placeholder="Enter your password again" required>
                    </div>

                </div>

                <button type="submit" class="my-3">Register</button>
            </form>
            {{-- <p class="note">* All fields marked as required must be filled in.</p> --}}
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <!-- JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script>
        $(document).ready(function() {
            $('#division').select2();
            $('#district').select2();
            $('#upazila').select2();
            $('#union').select2();
        });

        function getDistrict(e) {
            var division_id = e.value;
            $.ajax({
                url: "{{ route('getDistrict') }}",
                type: 'POST',
                data: {
                    division_id: division_id,
                    _token: '{{ csrf_token() }}'
                },
                success: function(data) {
                    $('#district').html(data);
                }
            });
        }

        function getUpazila(e) {
            var division_id = e.value;
            $.ajax({
                url: "{{ route('getUpazila') }}",
                type: 'POST',
                data: {
                    division_id: division_id,
                    _token: '{{ csrf_token() }}'
                },
                success: function(data) {
                    $('#upazila').html(data);
                }
            });
        }

        function getUnion(e) {
            var division_id = e.value;
            $.ajax({
                url: "{{ route('getUnion') }}",
                type: 'POST',
                data: {
                    division_id: division_id,
                    _token: '{{ csrf_token() }}'
                },
                success: function(data) {
                    $('#union').html(data);
                }
            });
        }
    </script>
</body>

</html>
