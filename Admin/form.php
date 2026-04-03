<?php 
include('header.php');
include('sidemenu.php');?> 
<style>
.mt-3 {
	display: inline-block;
	width: 50%;
	float: left;
	padding: 0 10px;
}
</style>
	<div class="content">
	   <?php include('top_bar.php');?>
                <div class="intro-y flex items-center mt-8">
                    <h2 class="text-lg font-medium mr-auto">
                        Add New Jobcard	
                    </h2>
                </div>
                <div class="grid grid-cols-12 gap-6 mt-5">
                    <div class="intro-y col-span-12 lg:col-span-12">
                        <!-- BEGIN: Input -->
                        <div class="intro-y box"> 
                            <div id="input" class="p-5">
                                <div class="preview">
                                    <div class="mt-3">
                                        <label for="regular-form-1" class="form-label">Select Name</label>
                                        <select class="form-control">
											<option>Elon Musk</option>
											<option>John Doe</option>
											<option>Ethan Logan</option>
											<option>Paul Madrock</option>
										<Select>
                                    </div>
                                    <div class="mt-3">
                                        <label for="regular-form-1" class="form-label">Job Type</label>
                                        <select class="form-control">
											<option>Select Job Type</option>
											<option>Pickup</option>
											<option>Drop</option>
											<option>Exchange</option>
										<Select>
                                    </div>
                                    <div class="mt-3">
                                        <label for="regular-form-2" class="form-label">Assigned to</label>
                                        <input id="regular-form-2" type="text" class="form-control" placeholder="Add Driver or Employee Name">
                                    </div> 
                                    <div class="mt-3">
                                        <label for="regular-form-2" class="form-label">Pickup Date</label>
                                        <input id="regular-form-2" type="text" class="form-control" placeholder="Enter time if client have specific date prefrence">
                                    </div> 
                                    <div class="mt-3">
                                        <label for="regular-form-2" class="form-label">Pickup Time</label>
                                        <input id="regular-form-2" type="text" class="form-control" placeholder="Enter time if client have specific time prefrence">
                                    </div>  
                                    <div class="mt-3">
                                        <label for="regular-form-2" class="form-label">Quantity</label>
                                        <input id="regular-form-2" type="text" class="form-control" placeholder="">
                                    </div>      <br/>
									<div style="margin-left: 10px;">
										<button class="btn btn-primary mt-5">Submit</button>
									</div>
                                </div> 
                            </div>
                        </div> 
					</div>
					 
                </div>
            </div>
            <!-- END: Content -->
        </div> 
        <script src="dist/js/app.js"></script>
        <!-- END: JS Assets-->
    </body>
</html>