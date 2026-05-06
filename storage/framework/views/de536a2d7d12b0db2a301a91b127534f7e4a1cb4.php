<style>
    .contact-form-wrapper {
        background: #fff;
        padding: 50px;
        border-radius: 20px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    }

    .career-info-card {
        background: #f8f9fa;
        padding: 30px;
        border-radius: 15px;
        border-left: 5px solid #0B1B48;
    }

    .career-title {
        color: #0B1B48;
        font-size: 24px;
        font-weight: 600;
        margin-bottom: 10px;
    }

    .category-badge {
        background: #F5A623;
        color: white;
        padding: 5px 15px;
        border-radius: 20px;
        font-size: 14px;
        font-weight: 500;
    }

    .career-description {
        color: #666;
        line-height: 1.6;
    }

    .form-label {
        font-weight: 600;
        color: #0B1B48;
        margin-bottom: 8px;
    }

    .form-control {
        border: 2px solid #e9ecef;
        border-radius: 10px;
        padding: 12px 15px;
        font-size: 16px;
        transition: all 0.3s ease;
    }

    .form-control:focus {
        border-color: #0B1B48;
        box-shadow: 0 0 0 0.2rem rgba(11, 27, 72, 0.25);
    }

    .btn-primary {
        background: #0B1B48;
        border: none;
        padding: 15px 40px;
        border-radius: 25px;
        font-weight: 600;
        color: #fff;
        transition: all 0.3s ease;
    }

    .btn-primary:hover {
        background: #cfa40c;
        color: #0B1B48;
        transform: translateY(-2px);
    }

    .text-danger {
        font-size: 14px;
        margin-top: 5px;
    }

    .form-text {
        font-size: 12px;
        margin-top: 5px;
    }

    /* Custom SweetAlert Styling */
    /* .swal2-popup {
        border-radius: 20px !important;
        font-family: inherit !important;
    }
    
    .swal2-title {
        color: #0B1B48 !important;
        font-weight: 600 !important;
    }
    
    .swal2-confirm {
        background-color: #0B1B48 !important;
        border-radius: 25px !important;
        padding: 10px 30px !important;
        font-weight: 600 !important;
    }
    
    .swal2-confirm:hover {
        background-color: #cfa40c !important;
        color: #0B1B48 !important;
    }
    
    .swal2-success {
        border-color: #0B1B48 !important;
    }
    
    .swal2-success-ring {
        border-color: #0B1B48 !important;
    }
    
    .swal2-success-line-tip,
    .swal2-success-line-long {
        background-color: #0B1B48 !important;
    } */
    .travel-img-wrapper img {
        border-radius: 20px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        margin-bottom: 20px;
        max-height: 390px;
        object-fit: cover;
    }

    /*
     * Bootstrap .form-control sets appearance:none on selects, which breaks <optgroup>
     * labels in Chromium (Popular/Luxury headers often missing; only River/Specialty show).
     * Force native menu so group labels (Popular, Luxury, River, Specialty) render.
     */
    select.form-control.cruise-line {
        -webkit-appearance: menulist;
        -moz-appearance: menulist;
        appearance: auto;
        background-image: none;
        padding-right: 12px;
    }
</style>
<section class="contact-sec py-150">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="travel-img-wrapper">
                    <img src="<?php echo e(asset('public/assets/website/images')); ?>/travel-experience.jpeg"
                        alt="Travel & Experience" width="100%">
                </div>
                <div class="contact-form-wrapper">
                    <div class="row justify-content-center text-center">
                        <div class="col-lg-8">
                            <h2 class="heading fs-74 mb-30" data-aos="flip-left" data-aos-easing="ease-out-cubic"
                                data-aos-duration="1000">
                                Travel <span>& Experience</span>
                            </h2>
                        </div>
                    </div>

                    <form action="<?php echo e(route('send.inquiry')); ?>" method="POST" enctype="multipart/form-data"
                        data-aos="fade-up" data-aos-easing="ease-out-cubic" data-aos-duration="1000"
                        id="journey-expert-form" <?php if(auth()->guard()->check()): ?> data-logged-in="1" <?php endif; ?>>
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="title" id="title"
                            value="You have received new journey expert user inquiry from">
                        <input type="hidden" name="identifier" id="identifier" value="journey_expert">
                        <?php if(auth()->guard()->check()): ?>
                        <input type="hidden" name="name" value="<?php echo e(old('name', Auth::user()->name ?? '')); ?>">
                        <input type="hidden" name="email" value="<?php echo e(old('email', Auth::user()->email ?? '')); ?>">
                        <input type="hidden" name="phone" value="<?php echo e(old('phone', Auth::user()->phone ?? '')); ?>">
                        <?php endif; ?>
                        <?php if(auth()->guard()->guest()): ?>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group mb-30">
                                    <label for="name" class="form-label">Full Name *</label>
                                    <input type="text" name="name" id="name" class="form-control"
                                        placeholder="Enter your full name" value="<?php echo e(old('name')); ?>" required>
                                    <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="text-danger"><?php echo e($message); ?></span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group mb-30">
                                    <label for="email" class="form-label">Email Address *</label>
                                    <input type="email" name="email" id="email" class="form-control"
                                        placeholder="Enter your email" value="<?php echo e(old('email')); ?>" required>
                                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="text-danger"><?php echo e($message); ?></span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                        </div>

                        <div class="form-group mb-30">
                            <label for="phone" class="form-label">Phone Number</label>
                            <input type="tel" name="phone" id="phone" class="form-control"
                                placeholder="Enter your phone number" value="<?php echo e(old('phone')); ?>">
                            <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="text-danger"><?php echo e($message); ?></span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <?php endif; ?>
                        <div class="row travel-type-wrapper">
                            <div class="col-md-6 col-lg-4 travel-type-field">
                                <div class="form-group mb-30">
                                    <select name="travel_type" id="" class="form-control show-arrow" required>
                                        <option value="" selected disabled>Select Travel Type</option>
                                        <option value="cruise">Cruise</option>
                                        <option value="tour">Tour</option>
                                        <option value="all_inclusive">All Inclusive</option>
                                    </select>
                                    <?php $__errorArgs = ['travel_type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="text-danger"><?php echo e($message); ?></span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4 cruise-line-wrapper" style="display: none;">
                                <div class="form-group mb-30">
                                    <select class="form-control show-arrow cruise-line" id="searchbar-bottom_cruise_lines" aria-label="Cruise Line" name="any_cruise_line" disabled>
                                        <option value="" selected disabled>Any Cruise Line</option>
                                        <optgroup label="Popular">
                                            <option value="Carnival Cruise Line">Carnival Cruise Line</option>
                                            <option value="Celebrity Cruises - Ocean">Celebrity Cruises - Ocean</option>
                                            <option value="Costa Cruises">Costa Cruises</option>
                                            <option value="Disney Cruise Line">Disney Cruise Line</option>
                                            <option value="Holland America Line">Holland America Line</option>
                                            <option value="MSC Cruises">MSC Cruises</option>
                                            <option value="Norwegian Cruise Line">Norwegian Cruise Line</option>
                                            <option value="Princess Cruises">Princess Cruises</option>
                                            <option value="Royal Caribbean International">Royal Caribbean International</option>
                                            <option value="Virgin Voyages">Virgin Voyages</option>
                                        </optgroup>
                                        <optgroup label="Luxury">
                                            <option value="Azamara">Azamara</option>
                                            <option value="Crystal Cruises">Crystal Cruises</option>
                                            <option value="Cunard Line">Cunard Line</option>
                                            <option value="Explora Journeys">Explora Journeys</option>
                                            <option value="Oceania Cruises">Oceania Cruises</option>
                                            <option value="Regent Seven Seas Cruises">Regent Seven Seas Cruises</option>
                                            <option value="Seabourn">Seabourn</option>
                                            <option value="Silversea Cruises">Silversea Cruises</option>
                                            <option value="The Ritz-Carlton Yacht Collection">The Ritz-Carlton Yacht Collection</option>
                                            <option value="Viking Ocean Cruises">Viking Ocean Cruises</option>
                                        </optgroup>
                                        <optgroup label="River">
                                            <option value="AMA Waterways">AMA Waterways</option>
                                            <option value="American Cruise Lines">American Cruise Lines</option>
                                            <option value="Avalon Waterways">Avalon Waterways</option>
                                            <option value="Emerald Cruises">Emerald Cruises</option>
                                            <option value="Scenic Cruises">Scenic Cruises</option>
                                            <option value="Tauck Cruise">Tauck Cruise</option>
                                            <option value="Uniworld Boutique River Cruise Collection">Uniworld Boutique River Cruise Collection</option>
                                            <option value="Viking River Cruises">Viking River Cruises</option>
                                        </optgroup>
                                        <optgroup label="Specialty">
                                            <option value="Atlas Ocean Voyages">Atlas Ocean Voyages</option>
                                            <option value="Celestyal Cruises">Celestyal Cruises</option>
                                            <option value="Emerald Yacht Cruises">Emerald Yacht Cruises</option>
                                            <option value="Hurtigruten">Hurtigruten</option>
                                            <option value="HX">HX</option>
                                            <option value="Lindblad Expeditions">Lindblad Expeditions</option>
                                            <option value="Margaritaville at Sea">Margaritaville at Sea</option>
                                            <option value="Paul Gauguin Cruises">Paul Gauguin Cruises</option>
                                            <option value="Ponant">Ponant</option>
                                            <option value="Quark Expeditions">Quark Expeditions</option>
                                            <option value="Scenic Ocean Cruises">Scenic Ocean Cruises</option>
                                            <option value="SeaDream Yacht Club">SeaDream Yacht Club</option>
                                            <option value="Star Clippers">Star Clippers</option>
                                            <option value="Windstar Cruises">Windstar Cruises</option>
                                        </optgroup>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-4 duration-field">
                                <div class="form-group mb-30">
                                    <select name="duration" id="" class="form-control show-arrow" required>
                                        <option value="" selected disabled>Select Duration</option>
                                        <option value="1_2">1-2 Nights</option>
                                        <option value="3_5">3-5 Nights</option>
                                        <option value="6_9">6-9 Nights</option>
                                        <option value="10_14">10-14 Nights</option>
                                        <option value="15">15+ Nights</option>
                                        <option value="cruise">Cruise</option>
                                    </select>
                                    <?php $__errorArgs = ['duration'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="text-danger"><?php echo e($message); ?></span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>

                            </div>
                            <div class="col-md-6 col-lg-4 country-field display-none">
                                <div class="form-group mb-30">
                                    <select name="country" id="" class="form-control show-arrow" required>
                                        <option value="" selected="1">Select a country</option>
                                        <option value="276">Antigua and Barbuda</option>
                                        <option value="257">Aruba</option>
                                        <option value="12">Bahamas, The</option>
                                        <option value="15">Barbados</option>
                                        <option value="18">Belize</option>
                                        <option value="24">Brazil</option>
                                        <option value="225">British Virgin Islands</option>
                                        <option value="26">Bulgaria</option>
                                        <option value="31">Canada</option>
                                        <option value="37">Colombia</option>
                                        <option value="41">Costa Rica</option>
                                        <option value="281">Curacao</option>
                                        <option value="50">Dominican Republic</option>
                                        <option value="60">France</option>
                                        <option value="66">Greece</option>
                                        <option value="67">Grenada</option>
                                        <option value="253">Guadeloupe</option>
                                        <option value="82">Italy</option>
                                        <option value="83">Jamaica</option>
                                        <option value="106">Maldives</option>
                                        <option value="254">Martinique</option>
                                        <option value="112">Mexico</option>
                                        <option value="280">Montenegro</option>
                                        <option value="132">Panama</option>
                                        <option value="138">Portugal</option>
                                        <option value="235">Puerto Rico</option>
                                        <option value="144">Saint Lucia</option>
                                        <option value="145">Saint Vincent and the Grenadines</option>
                                        <option value="160">Spain</option>
                                        <option value="275">St. Martin</option>
                                        <option value="166">Switzerland</option>
                                        <option value="233">Turks and Caicos Islands</option>
                                        <option value="246">U.S. Virgin Islands</option>
                                        <option value="183">United States</option>
                                    </select>
                                    <?php $__errorArgs = ['country'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="text-danger"><?php echo e($message); ?></span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4 destination-field">
                                <div class="form-group mb-30">
                                    <select name="destination" id="" class="form-control show-arrow"
                                        required>
                                        <option value="" selected="1">Any Destination</option>
                                        <option value="r14">Alaska</option>
                                        <option value="r8">Asia</option>
                                        <option value="r2">Atlantic Seaboard</option>
                                        <option value="r15">Australia/New Zealand</option>
                                        <option value="r16">Bermuda</option>
                                        <option value="r1">Caribbean</option>
                                        <option value="r6">Europe</option>
                                        <option value="r17">Hawaii and South Pacific</option>
                                        <option value="r7">Mediterranean</option>
                                        <option value="r12">Mexico</option>
                                        <option value="r19">North American Waterways</option>
                                        <option value="r3">Pacific Seaboard</option>
                                        <option value="r4">Panama Canal</option>
                                        <option value="r18">Polar Regions</option>
                                        <option value="r13">Repositioning</option>
                                        <option value="r10">River Cruises</option>
                                        <option value="r5">South America</option>
                                        <option value="r9">Trans-Ocean</option>
                                        <option value="0">-------------------------------------</option>
                                        <option value="s33">Africa - Middle East - India</option>
                                        <option value="s8">Alaska</option>
                                        <option value="s44">Alaska - Inside Passage</option>
                                        <option value="s43">Alaska - Northbound</option>
                                        <option value="s45">Alaska - Southbound</option>
                                        <option value="s16">Amazon River</option>
                                        <option value="s17">Antarctica</option>
                                        <option value="s66">Arctic</option>
                                        <option value="s31">Australia</option>
                                        <option value="s1">Bahamas</option>
                                        <option value="s21">Baltic Sea</option>
                                        <option value="s6">Bermuda</option>
                                        <option value="s26">Black Sea</option>
                                        <option value="s20">British Isles</option>
                                        <option value="s46">Canada - New England</option>
                                        <option value="s59">Canary Islands</option>
                                        <option value="s47">Caribbean</option>
                                        <option value="s2">Caribbean - Eastern</option>
                                        <option value="s50">Caribbean - Extended</option>
                                        <option value="s4">Caribbean - Southern</option>
                                        <option value="s3">Caribbean - Western</option>
                                        <option value="s19">Central America</option>
                                        <option value="s29">China - Japan - Korea</option>
                                        <option value="s38">Chinese Rivers</option>
                                        <option value="s5">Eastern Canada</option>
                                        <option value="s23">European Coast</option>
                                        <option value="s37">European Rivers</option>
                                        <option value="s18">Galapagos Islands</option>
                                        <option value="s9">Hawaiian Islands</option>
                                        <option value="s27">Holy Lands</option>
                                        <option value="s51">Mediterranean</option>
                                        <option value="s25">Mediterranean - Eastern</option>
                                        <option value="s24">Mediterranean - Western</option>
                                        <option value="s54">Mexico</option>
                                        <option value="s55">Mexico - Baja</option>
                                        <option value="s56">Mexico - Round Trip</option>
                                        <option value="s61">New Zealand</option>
                                        <option value="s53">North Europe</option>
                                        <option value="s22">Norwegian Fjords</option>
                                        <option value="s52">Panama Canal</option>
                                        <option value="s60">Russian Coast</option>
                                        <option value="s40">Russian Rivers</option>
                                        <option value="s15">South American Coast</option>
                                        <option value="s32">South Pacific</option>
                                        <option value="s30">Southeast Asia</option>
                                        <option value="s28">Suez Canal</option>
                                        <option value="s63">Tahiti</option>
                                        <option value="s49">Trans-Atlantic</option>
                                        <option value="s36">Trans-Pacific</option>
                                        <option value="s7">U.S. East Coast</option>
                                        <option value="s39">U.S. Rivers</option>
                                        <option value="s10">U.S. West Coast</option>
                                        <option value="s41">World Cruise (Exotic)</option>
                                    </select>
                                    <?php $__errorArgs = ['destination'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="text-danger"><?php echo e($message); ?></span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4 amenity-field display-none">
                                <div class="form-group mb-30">
                                    <select name="amenity" id="" class="form-control show-arrow" required>
                                        <option value="" selected="1">Select an amenity</option>
                                        <option value="adults_only">Adults Only</option>
                                        <option value="beach_access">Beach Access</option>
                                        <option value="casino">Casino</option>
                                        <option value="child_facilities">Family Friendly</option>
                                        <option value="couples_only">Couples Only</option>
                                        <option value="fitness_center">Fitness Center</option>
                                        <option value="golf">Golf</option>
                                        <option value="gratuities_included">Gratuities Included</option>
                                        <option value="handicap_accessible">Accessible</option>
                                        <option value="parking_included">Parking Included</option>
                                        <option value="pets">Pets Allowed</option>
                                        <option value="pickleball">Pickleball</option>
                                        <option value="scuba">Scuba Available</option>
                                        <option value="skiing">Ski</option>
                                        <option value="spa">Spa Available</option>
                                        <option value="tennis">Tennis</option>
                                        <option value="waterpark">Water Park</option>
                                        <option value="wifi">Wifi Included</option>
                                    </select>
                                    <?php $__errorArgs = ['amenity'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="text-danger"><?php echo e($message); ?></span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4 budget-field display-none">
                                <div class="form-group mb-30">
                                    <select name="budget" id="" class="form-control show-arrow" required>
                                        <option value="" selected="1">Select a budget</option>
                                        <option value="contemporary">Contemporary ($)</option>
                                        <option value="premium">Premium ($$)</option>
                                        <option value="luxury">Luxury ($$$)</option>
                                        <option value="ultra_luxury">Ultra Luxury ($$$$)</option>
                                    </select>
                                    <?php $__errorArgs = ['budget'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="text-danger"><?php echo e($message); ?></span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group mb-30">
                                    
                                    <input type="text" name="date" id="date" class="form-control date_range" placeholder="Select a date" required>
                                    <?php $__errorArgs = ['date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="text-danger"><?php echo e($message); ?></span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-30">
                            <label for="message" class="form-label">Message</label>
                            <textarea name="message" id="message" class="form-control" rows="6" placeholder="Tell us ..."><?php echo e(old('message')); ?></textarea>
                            <?php $__errorArgs = ['message'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="text-danger"><?php echo e($message); ?></span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary btn-lg"> Send Inquiry <i
                                    class="fas fa-paper-plane ms-2"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>



<?php if(session('success')): ?>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        Swal.fire({
            icon: 'success',
            title: 'Inquiry Submitted!',
            text: '<?php echo e(session('
            success ')); ?>',
            timer: 5000,
            showConfirmButton: true,
            confirmButtonText: 'OK',
            confirmButtonColor: '#0B1B48'
        });
    });
</script>
<?php endif; ?>

<?php if(session('error')): ?>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        Swal.fire({
            icon: 'error',
            title: 'Error!',
            text: '<?php echo e(session('
            error ')); ?>',
            timer: 5000,
            showConfirmButton: true,
            confirmButtonText: 'OK',
            confirmButtonColor: '#d33'
        });
    });
</script>
<?php endif; ?>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.getElementById('journey-expert-form');
        if (!form) return;
        const submitBtn = form.querySelector('button[type="submit"]');
        const isLoggedIn = form.getAttribute('data-logged-in') === '1';

        if (submitBtn) {
            form.addEventListener('submit', function(e) {
                if (!isLoggedIn) {
                    const name = (form.querySelector('input[name="name"]') || {}).value.trim();
                    const email = (form.querySelector('input[name="email"]') || {}).value.trim();
                    const phone = (form.querySelector('input[name="phone"]') || {}).value.trim();
                    if (!name || !email) {
                        e.preventDefault();
                        Swal.fire({
                            icon: 'warning',
                            title: 'Missing Information',
                            text: 'Please fill in all required fields.',
                            confirmButtonColor: '#0B1B48'
                        });
                        return;
                    }
                    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                    if (!emailRegex.test(email)) {
                        e.preventDefault();
                        Swal.fire({
                            icon: 'warning',
                            title: 'Invalid Email',
                            text: 'Please enter a valid email address.',
                            confirmButtonColor: '#0B1B48'
                        });
                        return;
                    }
                }
                submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Submitting...';
                submitBtn.disabled = true;
            });
        }
    });
    // let travelTypeWrapper = document.querySelector('.travel-type-wrapper');
    // travelTypeWrapper.addEventListener('change', function(e) {
    //     if (e.target.value === 'all_inclusive') {
    //         document.querySelector('.country-field').style.display = 'block';
    //         document.querySelector('.amenity-field').style.display = 'block';
    //         document.querySelector('.budget-field').style.display = 'block';
    //         document.querySelector('.destination-field').style.display = 'none';
    //         document.querySelector('.duration-field').style.display = 'none';

    //     } else {
    //         document.querySelector('.country-field').style.display = 'none';
    //         document.querySelector('.amenity-field').style.display = 'none';
    //         document.querySelector('.budget-field').style.display = 'none';
    //         document.querySelector('.destination-field').style.display = 'block';
    //         document.querySelector('.duration-field').style.display = 'block';
    //     }
    // });

    const travelType = document.querySelector('[name="travel_type"]');
    const tourFields = document.querySelectorAll('.duration-field, .destination-field');
    const allInclusiveFields = document.querySelectorAll('.country-field, .amenity-field, .budget-field');
    const cruiseLineWrapper = document.querySelector('.cruise-line-wrapper');
    const cruiseLineSelect = document.querySelector('select.cruise-line');
    const country = document.querySelector('[name="country"]');
    const amenity = document.querySelector('[name="amenity"]');
    const budget = document.querySelector('[name="budget"]');
    const duration = document.querySelector('[name="duration"]');
    const destination = document.querySelector('[name="destination"]');

    function toggleFields(value) {
        if (value === 'all_inclusive') {
            allInclusiveFields.forEach(el => el.style.display = 'block');
            tourFields.forEach(el => el.style.display = 'none');
            country.required = true;
            amenity.required = true;
            budget.required = true;
            duration.required = false;
            destination.required = false;
            if (cruiseLineWrapper) cruiseLineWrapper.style.display = 'none';
            if (cruiseLineSelect) {
                cruiseLineSelect.required = false;
                cruiseLineSelect.disabled = true;
            }

        } else {
            allInclusiveFields.forEach(el => el.style.display = 'none');
            tourFields.forEach(el => el.style.display = 'block');
            country.required = false;
            amenity.required = false;
            budget.required = false;
            duration.required = true;
            destination.required = true;
            if (value === 'cruise') {
                if (cruiseLineWrapper) cruiseLineWrapper.style.display = 'block';
                if (cruiseLineSelect) {
                    cruiseLineSelect.disabled = false;
                    cruiseLineSelect.required = true;
                }
            } else {
                if (cruiseLineWrapper) cruiseLineWrapper.style.display = 'none';
                if (cruiseLineSelect) {
                    cruiseLineSelect.required = false;
                    cruiseLineSelect.disabled = true;
                }
            }
        }
    }
    travelType.addEventListener('change', function(e) {
        toggleFields(e.target.value);
    });
    toggleFields(travelType.value);
</script><?php /**PATH D:\xamp-new\htdocs\never-forget\resources\views/website/partials/_journey_expert.blade.php ENDPATH**/ ?>