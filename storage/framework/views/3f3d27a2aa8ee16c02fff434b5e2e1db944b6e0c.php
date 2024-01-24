<form class="form form-horizontal striped-rows form-bordered" action="<?php echo e(URL::to('/profile-settings/add-bank')); ?>" method="post" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
    <div class="form-body">
        <h4 class="form-section"><i class="fa fa-university"></i> <?php echo e(trans('labels.add_bank')); ?></h4>
        <div class="form-group row">
            <label class="col-md-2 label-control" for="bank_name"><?php echo e(trans('labels.bank_name')); ?></label>
            <div class="col-md-10">
                <input type="text" id="bank_name" class="form-control <?php $__errorArgs = ['bank_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="<?php echo e(trans('labels.enter_bank_name')); ?>" name="bank_name">
                <?php $__errorArgs = ['bank_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="text-danger" id="name_error"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-2 label-control" for="account_holder"><?php echo e(trans('labels.account_holder')); ?></label>
            <div class="col-md-10">
                <input type="text" id="account_holder" class="form-control <?php $__errorArgs = ['account_holder'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="<?php echo e(trans('labels.enter_account_holder')); ?>" name="account_holder">
                <?php $__errorArgs = ['account_holder'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="text-danger" id="name_error"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-2 label-control" for="account_type"><?php echo e(trans('labels.account_type')); ?></label>
            <div class="col-md-10">
                <input type="text" id="account_type" class="form-control <?php $__errorArgs = ['account_type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="<?php echo e(trans('labels.enter_account_type')); ?>" name="account_type">
                <?php $__errorArgs = ['account_type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="text-danger" id="name_error"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-2 label-control" for="account_number"><?php echo e(trans('labels.account_number')); ?></label>
            <div class="col-md-10">
                <input type="text" id="account_number" class="form-control <?php $__errorArgs = ['account_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="<?php echo e(trans('labels.enter_account_number')); ?>" name="account_number">
                <?php $__errorArgs = ['account_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="text-danger" id="name_error"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-2 label-control" for="routing_number"><?php echo e(trans('labels.routing_number')); ?></label>
            <div class="col-md-10">
                <input type="text" id="routing_number" class="form-control <?php $__errorArgs = ['routing_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="<?php echo e(trans('labels.enter_routing_number')); ?>" name="routing_number">
                <?php $__errorArgs = ['routing_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="text-danger" id="name_error"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
        </div>
    </div>
    <div class="form-actions">
        <?php if(env('Environment') == 'sendbox'): ?>
            <button type="button" onclick="myFunction()" class="btn btn-raised btn-primary"><i class="fa fa-paper-plane"></i> <?php echo e(trans('labels.add')); ?></button>
        <?php else: ?>
            <button type="submit" class="btn btn-raised btn-primary"><i class="fa fa-paper-plane"></i> <?php echo e(trans('labels.add')); ?></button>
        <?php endif; ?>
    </div>
</form><?php /**PATH /home/medgorid/widefieldmedical.com/resources/views/provider/bank_form.blade.php ENDPATH**/ ?>