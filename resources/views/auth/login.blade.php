<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!----======== CSS ======== -->
  <link rel="stylesheet" href="{{asset('style2.css')}}">
  <!----===== Iconscout CSS ===== -->
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

  <title>Admin Login </title> 

  <style>
    .text-center{
      display: block;
      margin-left: auto;
      margin-right: auto;
      width: 11%;
    }
    form .fields .input-field{
      display: flex;
      width: calc(100% / 1 );
      flex-direction: column;
      margin: 4px 0;
    }
    .container{
      width:30%;
      height: 470px;
    }
    .container form{
      min-height: 310px !important;
    }
    .invalid-feedback strong{
      font-size: 12px;
      color: red;
      margin-top: 0px !important;
    }

    @media(max-width: 600px)
    {
      .container{
        width: 100% !important;
        height: 100% !important
      }
      .container form {
        height: 100% !important;
      }
      body{
        display: block !important;
      }

      .container {
    max-width: 100%;
    width: 100%;
    border-radius: 6px;
    padding: 30px;
     margin: 0 0; 
    background-color: #fff;
    box-shadow: 0 5px 10px rgba(0,0,0,0.1);
}
.con2{
    margin-top: 10px;
}
    }
    ol li {
      font-size: 13px;
    }

  </style>
</head>
<body>
  <div class="container">
    <div >
      <a href="{{url('/')}}"><img  class="text-center"  src="{{asset('img/icon_main.png')}}" style="width: 140px;" alt=""></a>
    </div>
    <header style="text-align: center;">PAYTM UPI Agent Login</header>
    <form action="{{url('agent-login')}}" method="POST">
      @csrf
      <div class="form first">
        <div class="details personal">
<!-- 
         <div class="fields">
          <div class="">  <span class="title">Agent Information</span></div>
        </div> -->

        <div class="fields">

          <div class="input-field">
            <label>Agent ID</label>
            <input type="text" placeholder="Enter Agent ID" class="@error('agent_id') is-invalid @enderror" value="{{old('agent_id')}}" name="agent_id">
            @error('agent_id')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
          <div class="input-field">
            <label>Agent's Password</label>
            <input type="password" placeholder="Enter Password" name="password">
          </div>

        </div>
      </div>

      <div class="details ID">
        <p align="center" style="margin:0;padding: 0" class="w3-animate-right">
          <button type="submit" class="nextBtn " style="margin-bottom: 2px !important">
            <span class="btnText">Login</span>
          </button>
        </p>
      </div> 
      <p align="center" style="margin-top: 10px;">or</p>
      <p style="text-align: center;margin-top: 5px;"><a href="{{url('admin/login')}}">Admin Login</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="{{url('customer')}}">Register Now</a></p>


    </div>


  </form>
</div>
<div class="container con2">
  <h5 style="color: green;">* Dear Agents Please note below points.</h5>
  <ol>
    <li>सफलतापूर्वक पंजीकृत होने के बाद सभी एजेंटों को ग्राहक से दिए गए  QR Code पर 1 रुपये का आउटगोइंग  लेनदेन करना है। (जो भुगतान के लिए पात्र हैं)</li>

    <li>Status COMPLETED और  Status2 ACTIVE दर्शाती है कि यूपीआई बनाया गया है और दिए गए  QR Code पर एक आउटगोइंग लेनदेन भी किया गया है। (जो भुगतान के लिए पात्र हैं)
    </li>
    <li>User Type में  NEW_USER और  DORMANT_USER दोनों  UPI निर्माण और दिए  गए  QR Code पर एक आउटगोइंग लेनदेन के बाद संबंधित (जो भुगतान के लिए पात्र हैं)
    </li>
    <li>Status ACTIVE या - और Status2 जैसा कि HANDLE_CREATION दर्शाता है कि UPI बनाया गया है, हालांकि दिए गए QR Code पर एक आउटगोइंग लेनदेन नहीं हुआ है। (जो भुगतान के लिए पात्र नहीं हैं)
    </li>
    <li>Status & status2 में FAILURE बताती है कि ग्राहक पहले से ही Paytm पर है और सक्रिय है। (जो भुगतान के लिए पात्र नहीं हैं)</li>

    <li>स्टेटस Overridden का मतलब है कि ग्राहक पहले ही अन्य लिंक के साथ यूपीआई का प्रयास कर चुके हैं। (जो भुगतान के लिए पात्र नहीं हैं)</li>

    <li>Referee id जो  PayTm की आंतरिक अद्वितीय उपयोगकर्ता संदर्भ आईडी है।</li>
  </ol>
</div>
<script src="{{asset('script.js')}}"></script>
</body>
</html>