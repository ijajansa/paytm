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

    <title>Responsive Regisration Form </title> 

<style>
    .text-center{
        display: block;
    margin-left: auto;
    margin-right: auto;
    width: 11%;
    }
    .container{
        width: 900px !important;height: auto !important
    }

   
</style>
</head>
<body>
    <div class="container" style="">
      <div >
        <img  class="text-center"  src="<?php echo e(asset('img/icon_main.png')); ?>" alt="">
      </div>
        <header style="text-align: center;">PAYTM UPI Registration Form</header>
        <form action="<?php echo e(url('add-customer')); ?>" method="POST" style="min-height: auto;">
            <?php echo csrf_field(); ?>
            <div class="form first" style="position: relative !important;">
                <div class="details personal">
                   
                   <div class="fields">
                    <div class="">  <span class="title">Agent Information</span></div>
                    <!-- <div class="" > <a class="nextBtn" style="height: 28px;" href="/index.html">link text</a> </div> -->
                    <div class="" ><button type="button" onclick=window.location.href='<?php echo e(url("login")); ?>' style="height: 28px;width: 200px">Agent Login</button></div>
                   </div>
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
                    <button class="nextBtn" type="submit">
                        <span class="btnText">Submit</span>
                    </button>
                </div> 
            </div>

           
        </form>
    </div>

    <script src="<?php echo e(asset('script.js')); ?>"></script>
</body>
</html><?php /**PATH F:\xampp1\htdocs\paytm\resources\views/form.blade.php ENDPATH**/ ?>