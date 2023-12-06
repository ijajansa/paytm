<!DOCTYPE html>
<!--=== Coding by CodingLab | www.codinglabweb.com === -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="<?php echo e(asset('style2.css')); ?>">
    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <title>Responsive Regisration Form </title> 

    <style>
        .text-center{
            display: block;
            margin-left: auto;
            margin-right: auto;
            width: 30%;
        }
        .container{
            width: 450px !important;height: auto !important
        }

        form .fields .input-field {
            display: flex;
            width: 100%;
            flex-direction: column;
            margin: 4px 0;
        }

        .nextBtn{
            display: inline !important;
        }
        body{
            justify-content: space-around !important;
        }
        .con2 {
            width: 55% !important
        }
        
        @media(max-width: 600px){
        .con2 {
            width: 100% !important
        }    
        body{
            display: block !important;
        }
        }
    </style>
</head>
<body>

<div class="container con2" style="background-color: transparent;box-shadow: none;">
    <div style="text-align: center;width: 62%;margin-left: 20%">
        <p align="center"><img src="<?php echo e(asset('assets/images/qr-code.jpeg')); ?>" style="width: 120px;border-radius: 10px"></p>
    <h3 style="font-weight: bold">VISIONINDIA TECH SERVICE LIMITED</h3>
    <hr style="border-top: 1px solid #aba5a5;
    margin: 12px 0;">
    </div>
  <h5 style="color: black;font-size: 13px">* Dear Agents Please note below points.</h5>
  <ol style="color: black;list-style-type: none;font-size: 13px;">
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

    <div class="container" style="">
      <div >
        <img  class="text-center"  src="<?php echo e(asset('img/icon_main.png')); ?>" alt="">
    </div>
    <header style="text-align: center;">PAYTM UPI Registration Form</header>
    <form action="<?php echo e(url('add-customer')); ?>" method="POST" style="min-height: auto;">
        <?php echo csrf_field(); ?>
        <div class="form first" style="position: relative !important;">
            <div class="details personal">

             <!-- <div class="fields">
                <div class="">  <span class="title"></span></div>
                <div class="" > <a class="nextBtn" style="height: 28px;" href="/index.html">link text</a> </div>
                <div class="" ><button type="button" onclick=window.location.href='<?php echo e(url("login")); ?>' style="height: 28px;width: 200px">Agent Login</button></div>
            </div> -->
            <?php echo $__env->make('admin-layouts.flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="fields">
                <div class="input-field">
                    <label>Agent ID</label>
                    <input type="text" name="agent_id" class="<?php $__errorArgs = ['agent_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('agent_id')); ?>" placeholder="Enter agent id">
                    <?php $__errorArgs = ['agent_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="invalid"><?php echo e($message); ?></span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <div class="input-field">
                    <label>Customer Name</label>
                    <input type="text" name="customer_name" class="<?php $__errorArgs = ['customer_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('customer_name')); ?>" placeholder="Enter customer name" onkeypress="return (event.charCode > 64 && 
                    event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode ==32)">
                    <?php $__errorArgs = ['customer_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="invalid"><?php echo e($message); ?></span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <div class="input-field">
                    <label>Customer Mobile Number</label>
                    <input type="text" name="mobile_number" class="<?php $__errorArgs = ['mobile_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('mobile_number')); ?>" maxlength="10" onkeypress='return event.charCode >= 48 && event.charCode <= 57' placeholder="Enter customer number">
                    <?php $__errorArgs = ['mobile_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="invalid"><?php echo e($message); ?></span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

            </div>
        </div>

        <div class="details ID">
         <p style="text-align: center;margin: 0;padding: 0" class="w3-animate-right"> <button class="nextBtn" type="submit">
            <span class="btnText">Submit</span>
        </button>
    </p>
</div>
<p align="center" style="margin-top: 0px;">or</p>
<p style="text-align: center;margin-top: 5px;"><a href="<?php echo e(url('login')); ?>">Agent Login</a></p> 
</div>


</form>
</div>


<script src="<?php echo e(asset('script.js')); ?>"></script>
</body>
</html><?php /**PATH F:\xampp1\htdocs\paytm\resources\views/form.blade.php ENDPATH**/ ?>