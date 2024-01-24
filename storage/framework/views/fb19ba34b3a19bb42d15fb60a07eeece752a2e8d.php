<?php $__env->startSection('page_title',trans('labels.settings')); ?>
<?php $__env->startSection('content'); ?>
   <section id="basic-form-layouts">
      <div class="row">
         <div class="col-sm-12">
            <div class="content-header"><?php echo e(trans('labels.settings')); ?></div>
         </div>
      </div>
      <div class="row justify-content-md-center">
         <div class="col-md-12">
            <div class="card">
               <div class="card-body">
                  <div class="px-3">
                        <form class="form form-horizontal striped-rows form-bordered" id="edit_setting_form" action="<?php echo e(URL::to('settings/edit')); ?>" method="POST" enctype="multipart/form-data">
                           <?php echo csrf_field(); ?>
                           <div class="form-body">
                              <h4 class="form-section"><i class="ft-user"></i> Basic Info</h4>
                              <div class="form-group row">
                                 <label class="col-md-2 label-control" for="firebase_key"><?php echo e(trans('labels.firebase_key')); ?></label>
                                 <div class="col-md-10">
                                    <input type="text" id="edit_firebase_key" class="form-control" name="firebase_key" value="<?php echo e($settingdata->firebase_key); ?>" placeholder="<?php echo e(trans('labels.enter_firebase_key')); ?>">
                                    <?php $__errorArgs = ['firebase_key'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="text-danger" id="firebase_key_error"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                 </div>
                              </div>
                              <div class="form-group row">
                                 <label class="col-md-2 label-control" for="currency"><?php echo e(trans('labels.currency')); ?></label>
                                 <div class="col-md-10">
                                    <input type="text" id="edit_currency" class="form-control" name="currency" value="<?php echo e($settingdata->currency); ?>" placeholder="<?php echo e(trans('labels.enter_currency')); ?>">
                                    <?php $__errorArgs = ['currency'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="text-danger" id="currency_error"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                 </div>
                              </div>
                              <div class="form-group row last">
                                 <label class="col-md-2 label-control" for="currency_position"><?php echo e(trans('labels.currency_position')); ?></label>
                                 <div class="col-md-10">
                                    <div class="form-check form-check-inline">
                                       <input class="form-check-input" type="radio" name="currency_position" id="left" value="left" <?php if($settingdata->currency_position == "left"): ?> checked="checked" <?php endif; ?>>
                                       <label class="form-check-label" for="left"><?php echo e(trans('labels.left')); ?></label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                       <input class="form-check-input" type="radio" name="currency_position" id="right" value="right" <?php if($settingdata->currency_position == "right"): ?> checked="checked" <?php endif; ?>>
                                       <label class="form-check-label" for="right"><?php echo e(trans('labels.right')); ?></label>
                                    </div>
                                    <?php $__errorArgs = ['currency_position'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="text-danger" id="currency_position_error"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                 </div>
                              </div>
                              <div class="form-group row">
                                 <label class="col-md-2 label-control" for="referral_amount"><?php echo e(trans('labels.referral_amount')); ?></label>
                                 <div class="col-md-10">
                                       <input type="text" id="edit_referral_amount" class="form-control" name="referral_amount" value="<?php echo e($settingdata->referral_amount); ?>" placeholder="<?php echo e(trans('labels.enter_referral_amount')); ?>">
                                       <?php $__errorArgs = ['referral_amount'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="text-danger" id="referral_amount_error"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                 </div>
                              </div>
                              <div class="form-group row last">
                                 <label class="col-md-2 label-control" for="withdrawable_amount"><?php echo e(trans('labels.withdrawable_amount')); ?></label>
                                 <div class="col-md-10">
                                    <input type="text" id="edit_withdrawable_amount" class="form-control" name="withdrawable_amount" value="<?php echo e($settingdata->withdrawable_amount); ?>" placeholder="<?php echo e(trans('labels.enter_withdrawable_amount')); ?>">
                                    <?php $__errorArgs = ['withdrawable_amount'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="text-danger" id="withdrawable_amount_error"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                 </div>
                              </div>
                              <div class="form-group row last">
                                 <label class="col-md-2 label-control" for="timezone"><?php echo e(trans('labels.timezone')); ?> </label>
                                 <div class="col-md-10">
                                    <select class="form-control selectpicker" name="timezone" id="timezone" data-live-search="true">
                                       <option value="Pacific/Midway" <?php echo e($settingdata->timezone == "Pacific/Midway"  ? 'selected' : ''); ?>>(GMT-11:00) Midway Island, Samoa</option>
               <option value="America/Adak" <?php echo e($settingdata->timezone == "America/Adak"  ? 'selected' : ''); ?>>(GMT-10:00) Hawaii-Aleutian</option>
               <option value="Etc/GMT+10" <?php echo e($settingdata->timezone == "Etc/GMT+10"  ? 'selected' : ''); ?>>(GMT-10:00) Hawaii</option>
               <option value="Pacific/Marquesas" <?php echo e($settingdata->timezone == "Pacific/Marquesas"  ? 'selected' : ''); ?>>(GMT-09:30) Marquesas Islands</option>
               <option value="Pacific/Gambier" <?php echo e($settingdata->timezone == "Pacific/Gambier"  ? 'selected' : ''); ?>>(GMT-09:00) Gambier Islands</option>
               <option value="America/Anchorage" <?php echo e($settingdata->timezone == "America/Anchorage"  ? 'selected' : ''); ?>>(GMT-09:00) Alaska</option>
               <option value="America/Ensenada" <?php echo e($settingdata->timezone == "America/Ensenada"  ? 'selected' : ''); ?>>(GMT-08:00) Tijuana, Baja California</option>
               <option value="Etc/GMT+8" <?php echo e($settingdata->timezone == "Etc/GMT+8"  ? 'selected' : ''); ?>>(GMT-08:00) Pitcairn Islands</option>
               <option value="America/Los_Angeles" <?php echo e($settingdata->timezone == "America/Los_Angeles"  ? 'selected' : ''); ?>>(GMT-08:00) Pacific Time (US & Canada)</option>
               <option value="America/Denver" <?php echo e($settingdata->timezone == "America/Denver"  ? 'selected' : ''); ?>>(GMT-07:00) Mountain Time (US & Canada)</option>
               <option value="America/Chihuahua" <?php echo e($settingdata->timezone == "America/Chihuahua"  ? 'selected' : ''); ?>>(GMT-07:00) Chihuahua, La Paz, Mazatlan</option>
               <option value="America/Dawson_Creek" <?php echo e($settingdata->timezone == "America/Dawson_Creek"  ? 'selected' : ''); ?>>(GMT-07:00) Arizona</option>
               <option value="America/Belize" <?php echo e($settingdata->timezone == "America/Belize"  ? 'selected' : ''); ?>>(GMT-06:00) Saskatchewan, Central America</option>
               <option value="America/Cancun" <?php echo e($settingdata->timezone == "America/Cancun"  ? 'selected' : ''); ?>>(GMT-06:00) Guadalajara, Mexico City, Monterrey</option>
               <option value="Chile/EasterIsland" <?php echo e($settingdata->timezone == "Chile/EasterIsland"  ? 'selected' : ''); ?>>(GMT-06:00) Easter Island</option>
               <option value="America/Chicago" <?php echo e($settingdata->timezone == "America/Chicago"  ? 'selected' : ''); ?>>(GMT-06:00) Central Time (US & Canada)</option>
               <option value="America/New_York" <?php echo e($settingdata->timezone == "America/New_York"  ? 'selected' : ''); ?>>(GMT-05:00) Eastern Time (US & Canada)</option>
               <option value="America/Havana" <?php echo e($settingdata->timezone == "America/Havana"  ? 'selected' : ''); ?>>(GMT-05:00) Cuba</option>
               <option value="America/Bogota" <?php echo e($settingdata->timezone == "America/Bogota"  ? 'selected' : ''); ?>>(GMT-05:00) Bogota, Lima, Quito, Rio Branco</option>
               <option value="America/Caracas" <?php echo e($settingdata->timezone == "America/Caracas"  ? 'selected' : ''); ?>>(GMT-04:30) Caracas</option>
               <option value="America/Santiago" <?php echo e($settingdata->timezone == "America/Santiago"  ? 'selected' : ''); ?>>(GMT-04:00) Santiago</option>
               <option value="America/La_Paz" <?php echo e($settingdata->timezone == "America/La_Paz"  ? 'selected' : ''); ?>>(GMT-04:00) La Paz</option>
               <option value="Atlantic/Stanley" <?php echo e($settingdata->timezone == "Atlantic/Stanley"  ? 'selected' : ''); ?>>(GMT-04:00) Faukland Islands</option>
               <option value="America/Campo_Grande" <?php echo e($settingdata->timezone == "America/Campo_Grande"  ? 'selected' : ''); ?>>(GMT-04:00) Brazil</option>
               <option value="America/Goose_Bay" <?php echo e($settingdata->timezone == "America/Goose_Bay"  ? 'selected' : ''); ?>>(GMT-04:00) Atlantic Time (Goose Bay)</option>
               <option value="America/Glace_Bay" <?php echo e($settingdata->timezone == "America/Glace_Bay"  ? 'selected' : ''); ?>>(GMT-04:00) Atlantic Time (Canada)</option>
               <option value="America/St_Johns" <?php echo e($settingdata->timezone == "America/St_Johns" ? 'selected' : ''); ?>>(GMT-03:30) Newfoundland</option>
               <option value="America/Araguaina" <?php echo e($settingdata->timezone == "America/Araguaina"  ? 'selected' : ''); ?>>(GMT-03:00) UTC-3</option>
               <option value="America/Montevideo" <?php echo e($settingdata->timezone == "America/Montevideo"  ? 'selected' : ''); ?>>(GMT-03:00) Montevideo</option>
               <option value="America/Miquelon" <?php echo e($settingdata->timezone == "America/Miquelon"  ? 'selected' : ''); ?>>(GMT-03:00) Miquelon, St. Pierre</option>
               <option value="America/Godthab" <?php echo e($settingdata->timezone == "America/Godthab"  ? 'selected' : ''); ?>>(GMT-03:00) Greenland</option>
               <option value="America/Argentina/Buenos_Aires" <?php echo e($settingdata->timezone == "America/Argentina/Buenos_Aires"  ? 'selected' : ''); ?>>(GMT-03:00) Buenos Aires</option>
               <option value="America/Sao_Paulo" <?php echo e($settingdata->timezone == "America/Sao_Paulo"  ? 'selected' : ''); ?>>(GMT-03:00) Brasilia</option>
               <option value="America/Noronha" <?php echo e($settingdata->timezone == "America/Noronha"  ? 'selected' : ''); ?>>(GMT-02:00) Mid-Atlantic</option>
               <option value="Atlantic/Cape_Verde" <?php echo e($settingdata->timezone == "Atlantic/Cape_Verde"  ? 'selected' : ''); ?>>(GMT-01:00) Cape Verde Is.</option>
               <option value="Atlantic/Azores" <?php echo e($settingdata->timezone == "Atlantic/Azores"  ? 'selected' : ''); ?>>(GMT-01:00) Azores</option>
               <option value="Europe/Belfast" <?php echo e($settingdata->timezone == "Europe/Belfast"  ? 'selected' : ''); ?>>(GMT) Greenwich Mean Time : Belfast</option>
               <option value="Europe/Dublin" <?php echo e($settingdata->timezone == "Europe/Dublin"  ? 'selected' : ''); ?>>(GMT) Greenwich Mean Time : Dublin</option>
               <option value="Europe/Lisbon" <?php echo e($settingdata->timezone == "Europe/Lisbon"  ? 'selected' : ''); ?>>(GMT) Greenwich Mean Time : Lisbon</option>
               <option value="Europe/London" <?php echo e($settingdata->timezone == "Europe/London"  ? 'selected' : ''); ?>>(GMT) Greenwich Mean Time : London</option>
               <option value="Africa/Abidjan" <?php echo e($settingdata->timezone == "Africa/Abidjan"  ? 'selected' : ''); ?>>(GMT) Monrovia, Reykjavik</option>
               <option value="Europe/Amsterdam" <?php echo e($settingdata->timezone == "Europe/Amsterdam"  ? 'selected' : ''); ?>>(GMT+01:00) Amsterdam, Berlin, Bern, Rome, Stockholm, Vienna</option>
               <option value="Europe/Belgrade" <?php echo e($settingdata->timezone == "Europe/Belgrade"  ? 'selected' : ''); ?>>(GMT+01:00) Belgrade, Bratislava, Budapest, Ljubljana, Prague</option>
               <option value="Europe/Brussels" <?php echo e($settingdata->timezone == "Europe/Brussels"  ? 'selected' : ''); ?>>(GMT+01:00) Brussels, Copenhagen, Madrid, Paris</option>
               <option value="Africa/Algiers" <?php echo e($settingdata->timezone == "Africa/Algiers"  ? 'selected' : ''); ?>>(GMT+01:00) West Central Africa</option>
               <option value="Africa/Windhoek" <?php echo e($settingdata->timezone == "Africa/Windhoek"  ? 'selected' : ''); ?>>(GMT+01:00) Windhoek</option>
               <option value="Asia/Beirut" <?php echo e($settingdata->timezone == "Asia/Beirut"  ? 'selected' : ''); ?>>(GMT+02:00) Beirut</option>
               <option value="Africa/Cairo" <?php echo e($settingdata->timezone == "Africa/Cairo"  ? 'selected' : ''); ?>>(GMT+02:00) Cairo</option>
               <option value="Asia/Gaza" <?php echo e($settingdata->timezone == "Asia/Gaza"  ? 'selected' : ''); ?>>(GMT+02:00) Gaza</option>
               <option value="Africa/Blantyre" <?php echo e($settingdata->timezone == "Africa/Blantyre"  ? 'selected' : ''); ?>>(GMT+02:00) Harare, Pretoria</option>
               <option value="Asia/Jerusalem" <?php echo e($settingdata->timezone == "Asia/Jerusalem"  ? 'selected' : ''); ?>>(GMT+02:00) Jerusalem</option>
               <option value="Europe/Minsk" <?php echo e($settingdata->timezone == "Europe/Minsk" ? 'selected' : ''); ?>>(GMT+02:00) Minsk</option>
               <option value="Asia/Damascus" <?php echo e($settingdata->timezone == "Asia/Damascus" ? 'selected' : ''); ?>>(GMT+02:00) Syria</option>
               <option value="Europe/Moscow" <?php echo e($settingdata->timezone == "Europe/Moscow"  ? 'selected' : ''); ?>>(GMT+03:00) Moscow, St. Petersburg, Volgograd</option>
               <option value="Africa/Addis_Ababa" <?php echo e($settingdata->timezone == "Africa/Addis_Ababa"  ? 'selected' : ''); ?>>(GMT+03:00) Nairobi</option>
               <option value="Asia/Tehran" <?php echo e($settingdata->timezone == "Asia/Tehran"  ? 'selected' : ''); ?>>(GMT+03:30) Tehran</option>
               <option value="Asia/Dubai" <?php echo e($settingdata->timezone == "Asia/Dubai"  ? 'selected' : ''); ?>>(GMT+04:00) Abu Dhabi, Muscat</option>
               <option value="Asia/Yerevan" <?php echo e($settingdata->timezone == "Asia/Yerevan"  ? 'selected' : ''); ?>>(GMT+04:00) Yerevan</option>
               <option value="Asia/Kabul" <?php echo e($settingdata->timezone == "Asia/Kabul"  ? 'selected' : ''); ?>>(GMT+04:30) Kabul</option>
               <option value="Asia/Yekaterinburg" <?php echo e($settingdata->timezone == "Asia/Yekaterinburg"  ? 'selected' : ''); ?>>(GMT+05:00) Ekaterinburg</option>
               <option value="Asia/Tashkent" <?php echo e($settingdata->timezone == "Asia/Tashkent"  ? 'selected' : ''); ?>>(GMT+05:00) Tashkent</option>
               <option value="Asia/Kolkata" <?php echo e($settingdata->timezone == "Asia/Kolkata"  ? 'selected' : ''); ?>>(GMT+05:30) Chennai, Kolkata, Mumbai, New Delhi</option>
               <option value="Asia/Katmandu" <?php echo e($settingdata->timezone == "Asia/Katmandu"  ? 'selected' : ''); ?>>(GMT+05:45) Kathmandu</option>
               <option value="Asia/Dhaka" <?php echo e($settingdata->timezone == "Asia/Dhaka"  ? 'selected' : ''); ?>>(GMT+06:00) Astana, Dhaka</option>
               <option value="Asia/Novosibirsk" <?php echo e($settingdata->timezone == "Asia/Novosibirsk"  ? 'selected' : ''); ?>>(GMT+06:00) Novosibirsk</option>
               <option value="Asia/Rangoon" <?php echo e($settingdata->timezone == "Asia/Rangoon"  ? 'selected' : ''); ?>>(GMT+06:30) Yangon (Rangoon)</option>
               <option value="Asia/Bangkok" <?php echo e($settingdata->timezone == "Asia/Bangkok"  ? 'selected' : ''); ?>>(GMT+07:00) Bangkok, Hanoi, Jakarta</option>
               <option value="Asia/Kuala_Lumpur" <?php echo e($settingdata->timezone == "Asia/Kuala_Lumpur"  ? 'selected' : ''); ?>>(GMT+08:00) Kuala Lumpur</option>
               <option value="Asia/Krasnoyarsk" <?php echo e($settingdata->timezone == "Asia/Krasnoyarsk"  ? 'selected' : ''); ?>>(GMT+07:00) Krasnoyarsk</option>
               <option value="Asia/Hong_Kong" <?php echo e($settingdata->timezone == "Asia/Hong_Kong"  ? 'selected' : ''); ?>>(GMT+08:00) Beijing, Chongqing, Hong Kong, Urumqi</option>
               <option value="Asia/Irkutsk" <?php echo e($settingdata->timezone == "Asia/Irkutsk"  ? 'selected' : ''); ?>>(GMT+08:00) Irkutsk, Ulaan Bataar</option>
               <option value="Australia/Perth" <?php echo e($settingdata->timezone == "Australia/Perth"  ? 'selected' : ''); ?>>(GMT+08:00) Perth</option>
               <option value="Australia/Eucla" <?php echo e($settingdata->timezone == "Australia/Eucla"  ? 'selected' : ''); ?>>(GMT+08:45) Eucla</option>
               <option value="Asia/Tokyo" <?php echo e($settingdata->timezone == "Asia/Tokyo"  ? 'selected' : ''); ?>>(GMT+09:00) Osaka, Sapporo, Tokyo</option>
               <option value="Asia/Seoul" <?php echo e($settingdata->timezone == "Asia/Seoul"  ? 'selected' : ''); ?>>(GMT+09:00) Seoul</option>
               <option value="Asia/Yakutsk" <?php echo e($settingdata->timezone == "Asia/Yakutsk"  ? 'selected' : ''); ?>>(GMT+09:00) Yakutsk</option>
               <option value="Australia/Adelaide" <?php echo e($settingdata->timezone == "Australia/Adelaide"  ? 'selected' : ''); ?>>(GMT+09:30) Adelaide</option>
               <option value="Australia/Darwin" <?php echo e($settingdata->timezone == "Australia/Darwin"  ? 'selected' : ''); ?>>(GMT+09:30) Darwin</option>
               <option value="Australia/Brisbane" <?php echo e($settingdata->timezone == "Australia/Brisbane"  ? 'selected' : ''); ?>>(GMT+10:00) Brisbane</option>
               <option value="Australia/Hobart" <?php echo e($settingdata->timezone == "Australia/Hobart"  ? 'selected' : ''); ?>>(GMT+10:00) Hobart</option>
               <option value="Asia/Vladivostok" <?php echo e($settingdata->timezone == "Asia/Vladivostok"  ? 'selected' : ''); ?>>(GMT+10:00) Vladivostok</option>
               <option value="Australia/Lord_Howe" <?php echo e($settingdata->timezone == "Australia/Lord_Howe"  ? 'selected' : ''); ?>>(GMT+10:30) Lord Howe Island</option>
               <option value="Etc/GMT-11" <?php echo e($settingdata->timezone == "Etc/GMT-11"  ? 'selected' : ''); ?>>(GMT+11:00) Solomon Is., New Caledonia</option>
               <option value="Asia/Magadan" <?php echo e($settingdata->timezone == "Asia/Magadan"  ? 'selected' : ''); ?>>(GMT+11:00) Magadan</option>
               <option value="Pacific/Norfolk" <?php echo e($settingdata->timezone == "Pacific/Norfolk"  ? 'selected' : ''); ?>>(GMT+11:30) Norfolk Island</option>
               <option value="Asia/Anadyr" <?php echo e($settingdata->timezone == "Asia/Anadyr"  ? 'selected' : ''); ?>>(GMT+12:00) Anadyr, Kamchatka</option>
               <option value="Pacific/Auckland" <?php echo e($settingdata->timezone == "Pacific/Auckland"  ? 'selected' : ''); ?>>(GMT+12:00) Auckland, Wellington</option>
               <option value="Etc/GMT-12" <?php echo e($settingdata->timezone == "Etc/GMT-12"  ? 'selected' : ''); ?>>(GMT+12:00) Fiji, Kamchatka, Marshall Is.</option>
               <option value="Pacific/Chatham" <?php echo e($settingdata->timezone == "Pacific/Chatham"  ? 'selected' : ''); ?>>(GMT+12:45) Chatham Islands</option>
               <option value="Pacific/Tongatapu" <?php echo e($settingdata->timezone == "Pacific/Tongatapu"  ? 'selected' : ''); ?>>(GMT+13:00) Nuku'alofa</option>
               <option value="Pacific/Kiritimati" <?php echo e($settingdata->timezone == "Pacific/Kiritimati"  ? 'selected' : ''); ?>>(GMT+14:00) Kiritimati</option>
                                    </select>
                                    <?php $__errorArgs = ['timezone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="text-danger" id="timezone_error"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                 </div>
                              </div>
                              <div class="form-group row last">
                                 <label class="col-md-2 label-control" for="address"><?php echo e(trans('labels.address')); ?></label>
                                 <div class="col-md-10">
                                    <input type="text" name="address" class="form-control" placeholder="<?php echo e(trans('labels.address')); ?>" value="<?php echo e($settingdata->address); ?>">
                                    <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="text-danger" id="timezone_error"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                 </div>
                              </div>
                              <div class="form-group row last">
                                 <label class="col-md-2 label-control" for="contact"><?php echo e(trans('labels.contact')); ?></label>
                                 <div class="col-md-10">
                                    <input type="text" name="contact" class="form-control" placeholder="<?php echo e(trans('labels.contact')); ?>" value="<?php echo e($settingdata->contact); ?>">
                                    <?php $__errorArgs = ['contact'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="text-danger" id="timezone_error"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                 </div>
                              </div>
                              <div class="form-group row last">
                                 <label class="col-md-2 label-control" for="email"><?php echo e(trans('labels.email')); ?></label>
                                 <div class="col-md-10">
                                    <input type="text" name="email" class="form-control" placeholder="<?php echo e(trans('labels.enter_email')); ?>" value="<?php echo e($settingdata->email); ?>">
                                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="text-danger" id="timezone_error"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                 </div>
                              </div>
                              <div class="form-group row last">
                                 <label class="col-md-2 label-control" for="copyright"><?php echo e(trans('labels.copyright')); ?></label>
                                 <div class="col-md-10">
                                    <input type="text" name="copyright" class="form-control" placeholder="<?php echo e(trans('labels.enter_copyright')); ?>" value="<?php echo e($settingdata->copyright); ?>">
                                    <?php $__errorArgs = ['copyright'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="text-danger" id="timezone_error"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                 </div>
                              </div>
                              <div class="form-group row last">
                                 <label class="col-md-2 label-control" for="logo"><?php echo e(trans('labels.logo')); ?> </label>
                                 <div class="col-md-10">
                                    <?php $__errorArgs = ['logo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="text-danger" id="logo_error"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    <input type="file" id="edit_logo" class="form-control" name="logo" value="<?php echo e(old('logo')); ?>">
                                    <img src="<?php echo e(Helper::image_path($settingdata->logo)); ?>" alt="<?php echo e(trans('labels.logo')); ?>" class="rounded media-object round-media setting-profile mt-2">
                                 </div>
                              </div>
                              <div class="form-group row last">
                                 <label class="col-md-2 label-control" for="banner"><?php echo e(trans('labels.banner')); ?> </label>
                                 <div class="col-md-10">
                                    <?php $__errorArgs = ['banner'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="text-danger" id="banner_error"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    <input type="file" id="edit_banner" class="form-control" name="banner" value="<?php echo e(old('banner')); ?>">
                                    <img src="<?php echo e(Helper::image_path($settingdata->banner)); ?>" alt="<?php echo e(trans('labels.banner')); ?>" class="rounded media-object round-media setting-profile mt-2">
                                 </div>
                              </div>
                              <div class="form-group row last">
                                 <label class="col-md-2 label-control" for="favicon"><?php echo e(trans('labels.favicon')); ?> </label>
                                 <div class="col-md-10">
                                    <?php $__errorArgs = ['favicon'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="text-danger" id="favicon_error"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    <input type="file" id="edit_favicon" class="form-control" name="favicon" value="<?php echo e(old('favicon')); ?>">
                                    <img src="<?php echo e(Helper::image_path($settingdata->favicon)); ?>" alt="<?php echo e(trans('labels.favicon')); ?>" class="rounded media-object round-media setting-profile mt-2">
                                 </div>
                              </div>
                              <h4 class="form-section"><i class="fa fa-bar-chart"></i> <?php echo e(trans('labels.seo')); ?> </h4>
                              <div class="form-group row last">
                                 <label class="col-md-2 label-control" for="website_title"><?php echo e(trans('labels.website_title')); ?></label>
                                 <div class="col-md-10">
                                    <input type="text" name="website_title" class="form-control" placeholder="<?php echo e(trans('labels.enter_website_title')); ?>" value="<?php echo e($settingdata->website_title); ?>">
                                    <?php $__errorArgs = ['website_title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="text-danger" id="website_title_error"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                 </div>
                              </div>
                              <div class="form-group row last">
                                 <label class="col-md-2 label-control" for="meta_title"><?php echo e(trans('labels.meta_title')); ?></label>
                                 <div class="col-md-10">
                                    <input type="text" name="meta_title" class="form-control" placeholder="<?php echo e(trans('labels.enter_meta_title')); ?>" value="<?php echo e($settingdata->meta_title); ?>">
                                    <?php $__errorArgs = ['meta_title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="text-danger" id="meta_title_error"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                 </div>
                              </div>
                              <div class="form-group row last">
                                 <label class="col-md-2 label-control" for="meta_description"><?php echo e(trans('labels.meta_description')); ?></label>
                                 <div class="col-md-10">
                                    <textarea class="form-control" name="meta_description" placeholder="<?php echo e(trans('labels.enter_meta_description')); ?>"><?php echo e($settingdata->meta_description); ?></textarea>
                                    <?php $__errorArgs = ['meta_description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="text-danger" id="meta_description_error"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                 </div>
                              </div>
      
                              <div class="form-group row last">
                                 <label class="col-md-2 label-control" for="og_image"><?php echo e(trans('labels.og_image')); ?></label>
                                 <div class="col-md-10">
                                    <?php $__errorArgs = ['og_image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="text-danger" id="og_image_error"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    <input type="file" id="og_image" class="form-control" name="og_image" value="<?php echo e(old('og_image')); ?>">
                                    <img src="<?php echo e(Helper::image_path($settingdata->og_image)); ?>" alt="<?php echo e(trans('labels.og_image')); ?>" class="rounded media-object round-media setting-profile mt-2">
                                 </div>
                              </div>
                              <h4 class="form-section"><i class="fa fa-bar-chart"></i> <?php echo e(trans('labels.social_accounts')); ?> </h4>
                              <div class="form-group row last">
                                 <label class="col-md-2 label-control" for="facebook_link"><?php echo e(trans('labels.facebook')); ?></label>
                                 <div class="col-md-10">
                                    <input type="text" name="facebook_link" class="form-control" placeholder="<?php echo e(trans('labels.facebook')); ?>" value="<?php echo e($settingdata->facebook_link); ?>">
                                    <?php $__errorArgs = ['facebook_link'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="text-danger" id="facebook_link_error"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                 </div>
                              </div>
                              <div class="form-group row last">
                                 <label class="col-md-2 label-control" for="twitter_link"><?php echo e(trans('labels.twitter')); ?></label>
                                 <div class="col-md-10">
                                    <input type="text" name="twitter_link" class="form-control" placeholder="<?php echo e(trans('labels.twitter')); ?>" value="<?php echo e($settingdata->twitter_link); ?>">
                                    <?php $__errorArgs = ['twitter_link'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="text-danger" id="twitter_link_error"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                 </div>
                              </div>
                              <div class="form-group row last">
                                 <label class="col-md-2 label-control" for="instagram_link"><?php echo e(trans('labels.instagram')); ?></label>
                                 <div class="col-md-10">
                                    <input type="text" name="instagram_link" class="form-control" placeholder="<?php echo e(trans('labels.instagram')); ?>" value="<?php echo e($settingdata->instagram_link); ?>">
                                    <?php $__errorArgs = ['instagram_link'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="text-danger" id="instagram_link_error"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                 </div>
                              </div>
                              <div class="form-group row last">
                                 <label class="col-md-2 label-control" for="linkedin_link"><?php echo e(trans('labels.linkedin')); ?></label>
                                 <div class="col-md-10">
                                    <input type="text" name="linkedin_link" class="form-control" placeholder="<?php echo e(trans('labels.linkedin')); ?>" value="<?php echo e($settingdata->linkedin_link); ?>">
                                    <?php $__errorArgs = ['linkedin_link'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="text-danger" id="linkedin_link_error"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                 </div>
                              </div>
                           </div>
                           <div class="form-actions left">
                              <?php if(env('Environment') == 'sendbox'): ?>
                                 <button type="button" onclick="myFunction()" class="btn btn-raised btn-primary"> <i class="ft-edit"></i> <?php echo e(trans('labels.update')); ?> </button>
                              <?php else: ?>
                                 <button type="submit" id="btn_setting" class="btn btn-raised btn-primary"> <i class="ft-edit"></i> <?php echo e(trans('labels.update')); ?> </button>
                              <?php endif; ?>
                           </div>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/medgorid/widefieldmedical.com/resources/views/setting/show.blade.php ENDPATH**/ ?>