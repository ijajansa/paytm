<!DOCTYPE html>
<!--=== Coding by CodingLab | www.codinglabweb.com === -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="{{asset('style2.css')}}">
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
</style>
</head>
<body>
    <div class="container" style="width: 900px !important;height: 400px !important">
      <div >
        <img  class="text-center"  src="{{asset('img/icon_main.png')}}" alt="">
      </div>
        <header style="text-align: center;">PAYTM UPI Registration Form</header>
        <form action="{{url('add-customer')}}" method="POST" style="min-height: auto;">
            @csrf
            <div class="form first" style="position: relative !important;">
                <div class="details personal">
                   
                   <div class="fields">
                    <div class="">  <span class="title">Agent Information</span></div>
                    <!-- <div class="" > <a class="nextBtn" style="height: 28px;" href="/index.html">link text</a> </div> -->
                    <div class="" ><button type="button" onclick=window.location.href='{{url("login")}}' style="height: 28px;width: 200px">Agent Login</button></div>
                   </div>
                    @include('admin-layouts.flash')
                   <div class="fields">
                    <div class="input-field">
                        <label>Agent ID</label>
                        <input type="text" name="agent_id" class="@error('agent_id') is-invalid @enderror" value="{{old('agent_id')}}" placeholder="Enter agent id">
                        @error('agent_id')
                        <span class="invalid">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="input-field">
                        <label>Customer Name</label>
                        <input type="text" name="customer_name" class="@error('customer_name') is-invalid @enderror" value="{{old('customer_name')}}" placeholder="Enter customer name">
                        @error('customer_name')
                        <span class="invalid">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="input-field">
                        <label>Customer Mobile Number</label>
                        <input type="text" name="mobile_number" class="@error('mobile_number') is-invalid @enderror" value="{{old('mobile_number')}}" placeholder="Enter customer number">
                        @error('mobile_number')
                        <span class="invalid">{{$message}}</span>
                        @enderror
                    </div>
                       
                    </div>
                </div>

                <div class="details ID">
                    <button class="nextBtn" type="submit">
                        <span class="btnText">Submit</span>
                    </button>
                </div> 
            </div>

           
        </form>
    </div>

    <script src="{{asset('script.js')}}"></script>
</body>
</html>