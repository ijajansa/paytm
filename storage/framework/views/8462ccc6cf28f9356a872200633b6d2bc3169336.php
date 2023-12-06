
<?php $__env->startSection('content'); ?>
<!-- content @s -->
<div class="nk-content ">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <?php echo $__env->make('admin-layouts.flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">All Customers</h3>
                        </div><!-- .nk-block-head-content -->
                        <div class="nk-block-head-content">
                            <div class="toggle-wrap nk-block-tools-toggle">
                                <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1" data-target="pageMenu"><em class="icon ni ni-menu-alt-r"></em></a>
                                <div class="toggle-expand-content" data-content="pageMenu">
                                    <ul class="nk-block-tools g-3">
                                       
                                        <li class="nk-block-tools-opt d-none d-sm-block">
                                            <a id="status" class="btn btn-danger" style="display:none;"></a>
                                        </li>
                                       
                                        <!-- <li class="nk-block-tools-opt d-none d-sm-block">
                                            <a href="<?php echo e(url('sub-dsa/add')); ?>" class="btn btn-primary"><em class="icon ni ni-plus"></em><span>Add Sub DSA</span></a>
                                        </li>
                                        <li class="nk-block-tools-opt d-block d-sm-none">
                                            <a href="<?php echo e(url('sub-dsa/add')); ?>" class="btn btn-icon btn-primary"><em class="icon ni ni-plus"></em></a>
                                        </li> -->
                                    </ul>
                                </div>
                            </div><!-- .toggle-wrap -->
                        </div><!-- .nk-block-head-content -->
                    </div><!-- .nk-block-between -->
                </div><!-- .nk-block-head -->
                <div class="nk-block nk-block-lg">
                    <div class="card card-bordered card-preview">
                        <div class="card-inner">
                            <div class="row">
                                <div class="col-lg-3">
                                    <input type="text" placeholder="Type into Search" class="form-control" id="search" onkeyup="applyFilter()">
                                </div>
                                
                                <div class="col-lg-3">
                                    <select data-search="on" class="form-control form-select" name="agent_id" id="agent_id" onchange="applyFilter()">
                                                <option value="">Select Agents</option>
                                                <?php if(Auth::user()->role_id==1): ?>
                                                    <?php $__currentLoopData = $agents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $agent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($agent->id); ?>" <?php if(old('agent_id')==$agent->id): ?> selected  <?php endif; ?> ><?php echo e($agent->full_name); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php else: ?>
                                                <option value="<?php echo e(Auth::user()->id); ?>" selected ><?php echo e(Auth::user()->full_name); ?></option>
                                                <?php endif; ?>

                                            </select>
                                </div>
                                <div class="col-lg-3">
                                    <input type="date" class="form-control" id="date" onchange ="applyFilter()">
                                </div>
                                <div class="col-lg-12">
                                    <table class="table" id="myTable">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Customer Name</th>
                                        <th>CustomerContact Number</th>
                                        <th>Agent ID</th>
                                        <?php if(Auth::user()->role_id==1): ?>
                                        <th>Agent Name</th>
                                        <th>Agent Contact Number</th>
                                        <?php endif; ?>
                                        <th>Created Date</th>
                                    </tr>
                                </thead>
                            </table>
                                </div>
                            </div>
                            
                        </div>
                    </div><!-- .card-preview -->
                </div> <!-- nk-block -->
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        chartdataTable();
    });

    function applyFilter()
    {
        $("#myTable").DataTable().clear().destroy();
        chartdataTable();

    }
    function chartdataTable(){

        agent_id = $("#agent_id").val();
        keyword = $("#search").val();
        date = $("#date").val();

            NioApp.DataTable('#myTable', {
            "processing": true,
            "serverSide": true,
            "searching":false,
            "bLengthChange":false,

            ajax:"<?php echo e(url('customers')); ?>?agent_id="+agent_id+"&keyword="+keyword+"&date="+date,
            "order":[
            [0,"desc"]
            ],
            responsive: !0,
            autoFill: !0,
            keys: !0,
            lengthMenu: [
            [10, 100, 500, -1],
            [10, 100, 500, "All"]
            ],
            
            "columns":[
            {
                "mData":"id",
                render: function (data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                }
            },
            {
                "mData":"name"
            },
            {            
                "mData":"mobile_number"
            },
            {
                "mData":"agent_id"
            },
            <?php if(Auth::user()->role_id==1): ?>
            {
                "mData":"full_name"
            },
            {
                "mData":"agent_number"
            },
            <?php endif; ?>
            {
                "mData":"created_date"
            }
            ]

        });
        
    }
    
    /* Delete Status*/
    function deleteRecord(id) {
        if ($.trim(id)) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You want to delete this?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!'
            }).then(function (result) {
                if (result.value) 
                {
                    window.location.href="<?php echo e(url('customers/delete')); ?>/"+id;
                }
            });
        }
    }

</script>
<!-- content @e -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin-layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\xampp1\htdocs\paytm\resources\views/sub-dsa/all.blade.php ENDPATH**/ ?>