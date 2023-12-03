<!DOCTYPE html>
<!--=== Coding by CodingLab | www.codinglabweb.com === -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="{{asset('style.css')}}">

    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <title>Agent Regisration Form | Vision India</title> 


    <style>
        .text-center{
            display: block;
            margin-left: auto;
            margin-right: auto;
            width: 11%;
        }

        .mainwrapper {
            overflow: scroll;
        }
        ::placeholder {
            text-transform: capitalize !important;
        }
        .textUpper{
            text-transform: uppercase;
        }
        .container form {
            position: relative;
            margin-top: 16px;
            min-height: 900px;
            background-color: #fff;
            overflow: auto; 
        }
    </style>
</head>
<body>
    <div class="container">

      <div >
        <img  class="text-center"  src="{{asset('img/icon_main.png')}}" alt="">
    </div>


    <header style="text-align: center;">PAYTM Agent Registration Form</header>
    <div class="">
        <form action="{{url('add-agent')}}" method="POST">
            @csrf
            <div class="form first">
                <div class="details personal">

                   <div class="fields">
                    <div class="">  <span class="title">Personal Details</span></div>
                    <button type="button" onclick=window.location.href='{{url("/")}}' style="height: 28px;">Add Customer</button>
                    <!-- <div class="" > <a class="btn " style="height: 28px;" href="/home.html">link text</a> </div> -->
                </div>

                @include('admin-layouts.flash')
                <div class="fields">
                    <div class="input-field">
                        <label>Full Name</label>
                        <input type="text" placeholder="Enter your name" class="@error('full_name') is-invalid @enderror textUpper" value="{{old('full_name')}}"  name="full_name" onkeypress="return (event.charCode > 64 && 
                        event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode ==32)">
                        @error('full_name')
                        <span class="invalid">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="input-field">
                        <label>Date of Birth</label>
                        <input type="date" placeholder="Enter birth date" max="{{date('Y-m-d')}}" value="{{old('dob')}}" class="@error('dob') is-invalid @enderror textUpper" name="dob">
                        @error('dob')
                        <span class="invalid">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="input-field">
                        <label>Gender</label>
                        <select name="gender" class="@error('gender') is-invalid @enderror textUpper">
                            <option disabled selected>Select gender</option>
                            <option>Male</option>
                            <option>Female</option>
                            <option>Others</option>
                        </select>
                        @error('gender')
                        <span class="invalid">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="input-field">
                        <label>Residential Address</label>
                        <input type="text" value="{{old('address')}}" name="address" class="@error('address') is-invalid @enderror textUpper" placeholder="Enter your residential">
                        @error('address')
                        <span class="invalid">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="input-field">
                        <label>Street</label>
                        <input type="text" name="street" value="{{old('street')}}" class="@error('street') is-invalid @enderror textUpper" placeholder="Enter your street">
                        @error('street')
                        <span class="invalid">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="input-field">
                        <label>City</label>
                        <input type="text" name="city" value="{{old('city')}}" class="@error('city') is-invalid @enderror textUpper" placeholder="Enter your city" onkeypress="return (event.charCode > 64 && 
                        event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode ==32)">
                        @error('city')
                        <span class="invalid">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="input-field">
                        <label>State</label>
                        <input type="text" name="state" value="{{old('state')}}" class="@error('state') is-invalid @enderror textUpper" placeholder="Enter your state" onkeypress="return (event.charCode > 64 && 
                        event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode ==32)">
                        @error('state')
                        <span class="invalid">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="input-field">
                        <label>PIN Code</label>
                        <input type="text" name="pincode" value="{{old('pincode')}}" class="@error('pincode') is-invalid @enderror textUpper" placeholder="Enter your pin code"  onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength="6"> 
                        @error('pincode')
                        <span class="invalid">{{$message}}</span>
                        @enderror
                    </div>


                    <div class="input-field">
                        <label>Email Address</label>
                        <input type="email" name="email" value="{{old('email')}}" class="@error('email') is-invalid @enderror textUpper" placeholder="Enter your email" style="text-transform: none !important;">
                        @error('email')
                        <span class="invalid">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="input-field">
                        <label>Mobile Number</label>
                        <input type="text" maxlength="10" name="mobile_number" value="{{old('mobile_number')}}" class="@error('mobile_number') is-invalid @enderror textUpper" onkeypress='return event.charCode >= 48 && event.charCode <= 57' placeholder="Enter mobile number">
                        @error('mobile_number')
                        <span class="invalid">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="input-field">
                        <label>Aadhar Card No</label>
                        <input type="text" maxlength="12" onkeypress='return event.charCode >= 48 && event.charCode <= 57' name="aadhar_number" class="@error('aadhar_number') is-invalid @enderror textUpper" value="{{old('aadhar_number')}}" placeholder="Enter aadhar card no">
                        @error('aadhar_number')
                        <span class="invalid">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="input-field">
                        <label>PAN Card No</label>
                        <input type="text" name="pan_number" class="@error('pan_number') is-invalid @enderror textUpper" value="{{old('pan_number')}}" maxlength="10" placeholder="Enter pan card no">
                        @error('pan_number')
                        <span class="invalid">{{$message}}</span>
                        @enderror
                    </div>
                    <!-- <div class="input-field">
                        <label>Agent ID (To be filled for VISIONINDIA)</label>
                        <input type="number" name="agent_id" placeholder="Enter agent id">
                    </div> -->
                    <div class="input-field">
                        <label>Password</label>
                        <input type="password" name="password" class="@error('password') is-invalid @enderror textUpper password" placeholder="Enter password">
                        <p align="right" style="font-size: 12px;margin: 0;padding: 0"><a onclick="showPassword()" href="javascript:void(0)"><span class="sh">Show</span> password</a></p>
                        @error('password')
                        <span class="invalid">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="input-field">
                        <label>Confirm Password</label>
                        <input type="password" name="password_confirmation" class="@error('password') is-invalid @enderror textUpper password" placeholder="Enter confirm password">
                        <p align="right" style="font-size: 12px;margin: 0;padding: 0"><a onclick="showPassword()" href="javascript:void(0)"><span class="sh">Show</span> password</a></p>
                        
                    </div>
                    <div class="input-field">
                    </div>
                </div>
            </div>

            <div class="details ID">
                <span class="title">Bank Details</span>
                <div class="fields">
                    <div class="input-field">
                        <label>Bank Name</label>
                        <input type="text" name="bank_name" class="@error('bank_name') is-invalid @enderror textUpper" value="{{old('bank_name')}}" onkeypress="return (event.charCode > 64 && 
                        event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode ==32)" placeholder="Enter bank name">
                        @error('bank_name')
                        <span class="invalid">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="input-field">
                        <label>Account Holder Name</label>
                        <input type="text" name="accountant_name" class="@error('accountant_name') is-invalid @enderror textUpper"  value="{{old('accountant_name')}}" onkeypress="return (event.charCode > 64 && 
                        event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode ==32)" placeholder="Enter account holder name">
                        @error('accountant_name')
                        <span class="invalid">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="input-field">
                        <label>Account Number</label>
                        <input type="text" name="account_number" class="@error('account_number') is-invalid @enderror textUpper" value="{{old('account_number')}}"  onkeypress='return event.charCode >= 48 && event.charCode <= 57' placeholder="Enter account number">
                        @error('account_number')
                        <span class="invalid">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="input-field">
                        <label>IFSC Code</label>
                        <input type="text" name="ifsc_code" class="@error('ifsc_code') is-invalid @enderror textUpper" value="{{old('ifsc_code')}}" placeholder="Enter ifsc code">
                        @error('ifsc_code')
                        <span class="invalid">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <p align="center" style="margin:0;padding: 0">
                    <button class="nextBtn" type="submit">
                        <span class="btnText">Submit</span>
                    </button>
                </p>
            </div> 
        </div>
    </form>
</div>
</div>

<script src="{{asset('script.js')}}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<script type="text/javascript">
    function showPassword()
    {
        x = $(".password").attr('type');
        if (x === "password") {
            $(".sh").text('Hide');
            $(".password").attr('type','text');
        } else {
            $(".sh").text('Show');
            $(".password").attr('type','password');
        }
    }
</script>
</body>
</html>