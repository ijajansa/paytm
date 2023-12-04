<!DOCTYPE html>
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
      width: calc(100% / 1 - 15px);
      flex-direction: column;
      margin: 4px 0;
    }
    .container{
      width:30%;
      height: 495px;
    }
    .container form{
      min-height: 320px !important;
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
    }

  </style>
</head>
<body>
  <div class="container">
    <div >
      <a href="<?php echo e(url('/')); ?>"><img  class="text-center"  src="<?php echo e(asset('img/icon_main.png')); ?>" style="width: 140px;" alt=""></a>
    </div>
    <header style="text-align: center;">PAYTM UPI Admin Login</header>
    <form action="<?php echo e(route('login')); ?>" method="POST">
      <?php echo csrf_field(); ?>
      <div class="form first">
        <div class="details personal">

        <!--  <div class="fields">
          <div class="">  <span class="title">Admin Information</span></div>
        </div>
 -->
        <div class="fields">

          <div class="input-field">
            <label>Email</label>
            <input type="email" placeholder="Enter Email Address" class="<?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('email')); ?>" name="email">
            <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <span class="invalid-feedback" role="alert">
              <strong><?php echo e($message); ?></strong>
            </span>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
          </div>
          <div class="input-field">
            <label>Password</label>
            <input type="password" placeholder="Enter Password" name="password">
          </div>

        </div>
      </div>

      <div class="details ID">
        <p align="center" style="margin: 0;padding: 0"  class="w3-animate-right">
        <button type="submit" class="nextBtn" style="margin-bottom: 2px !important">
          <span class="btnText">Login</span>
        </button>
        </p>
      </div> 
      <p align="center" style="margin-top: 10px;">or</p>
      <p style="text-align: center;margin-top: 5px;"><a href="<?php echo e(url('login')); ?>">Agent Login</a></p>
      
    </div>


  </form>
</div>

<script src="<?php echo e(asset('script.js')); ?>"></script>
</body>
</html><?php /**PATH F:\xampp1\htdocs\paytm\resources\views/auth/admin.blade.php ENDPATH**/ ?>