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

    <title>Responsive Regisration Form </title> 


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
                        <input type="text" placeholder="Enter your name" class="@error('full_name') is-invalid @enderror" value="{{old('full_name')}}" name="full_name">
                        @error('full_name')
                        <span class="invalid">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="input-field">
                        <label>Date of Birth</label>
                        <input type="date" placeholder="Enter birth date" value="{{old('dob')}}" class="@error('dob') is-invalid @enderror" name="dob">
                        @error('dob')
                        <span class="invalid">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="input-field">
                        <label>Gender</label>
                        <select name="gender" class="@error('gender') is-invalid @enderror">
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
                        <input type="text" value="{{old('address')}}" name="address" class="@error('address') is-invalid @enderror" placeholder="Enter your residential">
                        @error('address')
                        <span class="invalid">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="input-field">
                        <label>Street</label>
                        <input type="text" name="street" value="{{old('street')}}" class="@error('street') is-invalid @enderror" placeholder="Enter your street">
                        @error('street')
                        <span class="invalid">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="input-field">
                        <label>City</label>
                        <input type="text" name="city" value="{{old('city')}}" class="@error('city') is-invalid @enderror" placeholder="Enter your city">
                        @error('city')
                        <span class="invalid">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="input-field">
                        <label>State</label>
                        <input type="text" name="state" value="{{old('state')}}" class="@error('state') is-invalid @enderror" placeholder="Enter your state">
                        @error('state')
                        <span class="invalid">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="input-field">
                        <label>PIN Code</label>
                        <input type="text" name="pincode" value="{{old('pincode')}}" class="@error('pincode') is-invalid @enderror" placeholder="Enter your pin code">
                        @error('pincode')
                        <span class="invalid">{{$message}}</span>
                        @enderror
                    </div>


                    <div class="input-field">
                        <label>Email Address</label>
                        <input type="email" name="email" value="{{old('email')}}" class="@error('email') is-invalid @enderror" placeholder="Enter your email">
                        @error('email')
                        <span class="invalid">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="input-field">
                        <label>Mobile Number</label>
                        <input type="number" name="mobile_number" value="{{old('mobile_number')}}" class="@error('mobile_number') is-invalid @enderror" placeholder="Enter mobile number">
                        @error('mobile_number')
                        <span class="invalid">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="input-field">
                        <label>Aadhar Card No</label>
                        <input type="number" name="aadhar_number" class="@error('aadhar_number') is-invalid @enderror" value="{{old('aadhar_number')}}" placeholder="Enter aadhar card no">
                        @error('aadhar_number')
                        <span class="invalid">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="input-field">
                        <label>PAN Card No</label>
                        <input type="text" name="pan_number" class="@error('pan_number') is-invalid @enderror" value="{{old('pan_number')}}" placeholder="Enter pan card no">
                        @error('pan_number')
                        <span class="invalid">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="input-field">
                        <label>Agent ID (To be filled for VISIONINDIA)</label>
                        <input type="number" name="agent_id" placeholder="Enter agent id">
                    </div>
                    <div class="input-field">
                        <label>Password</label>
                        <input type="password" name="password" class="@error('password') is-invalid @enderror" placeholder="Enter password">
                        @error('password')
                        <span class="invalid">{{$message}}</span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="details ID">
                <span class="title">Bank Details</span>
                <div class="fields">
                    <div class="input-field">
                        <label>Bank Name</label>
                        <input type="text" name="bank_name" class="@error('bank_name') is-invalid @enderror" value="{{old('bank_name')}}" placeholder="Enter bank name">
                        @error('bank_name')
                        <span class="invalid">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="input-field">
                        <label>Account Holder Name</label>
                        <input type="text" name="accountant_name" class="@error('accountant_name') is-invalid @enderror"  value="{{old('accountant_name')}}" placeholder="Enter account holder name">
                        @error('accountant_name')
                        <span class="invalid">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="input-field">
                        <label>Account Number</label>
                        <input type="text" name="account_number" class="@error('account_number') is-invalid @enderror" value="{{old('account_number')}}" placeholder="Enter account number">
                        @error('account_number')
                        <span class="invalid">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="input-field">
                        <label>IFSC Code</label>
                        <input type="text" name="ifsc_code" class="@error('ifsc_code') is-invalid @enderror" value="{{old('ifsc_code')}}" placeholder="Enter ifsc code">
                        @error('ifsc_code')
                        <span class="invalid">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <button class="nextBtn" type="submit">
                    <span class="btnText">Submit</span>
                </button>
            </div> 
        </div>
    </form>
</div>
</div>

<script src="{{asset('script.js')}}"></script>
</body>
</html>