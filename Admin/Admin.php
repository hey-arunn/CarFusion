<?php 
// session_start();
include('header.php');
include('sidemenu.php');?> 
<div class="content">
<?php include('top_bar.php');?>
 <style>
th.whitespace-nowrap.ID {
    padding-left: 70px;
}
th.whitespace-nowrap.Name {
    padding-left: 33px;
}
th.whitespace-nowrap.Email {
    padding-left: 214px;
}
td.text-center.idd {
    width: 13%;
}
 </style> 
	<h2 class="intro-y text-lg font-medium mt-10">
		All Admin
	</h2>
	<div class="grid grid-cols-12 gap-6 mt-5">
		<div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
			<button class="btn btn-primary shadow-md mr-2"><a href="Admin_Form.php">Add New Admin</a></button>
			<!-- <div class="dropdown">
				<button class="dropdown-toggle btn px-2 box" aria-expanded="false" data-tw-toggle="dropdown">
					<span class="w-5 h-5 flex items-center justify-center"> <i class="w-4 h-4" data-lucide="plus"></i> </span>
				</button>
				<div class="dropdown-menu w-40">
					<ul class="dropdown-content">
						<li>
							<a href="" class="dropdown-item"> <i data-lucide="printer" class="w-4 h-4 mr-2"></i> Print </a>
						</li>
						<li>
							<a href="" class="dropdown-item"> <i data-lucide="file-text" class="w-4 h-4 mr-2"></i> Export to Excel </a>
						</li>
						<li>
							<a href="" class="dropdown-item"> <i data-lucide="file-text" class="w-4 h-4 mr-2"></i> Export to PDF </a>
						</li>
					</ul>
				</div> -->
			</div> 
			
		</div>
		<!-- BEGIN: Data List -->
		<div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
			<table class="table table-report -mt-2">
				<thead>
					<tr> 
						<th class="whitespace-nowrap ID">ID</th> 
						<th class="whitespace-nowrap Name">Name</th> 
						<th class="whitespace-nowrap Email">Email</th>
						<th class="text-center whitespace-nowrap Status">STATUS</th>
						<th class="text-center whitespace-nowrap Action">ACTIONS</th>
					</tr>
				</thead>
				<tbody>
				<?php 
				
				include("admin_data_fetch.php");
				?>
				</tbody>
			</table>
		</div> 
	</div>
	<!-- BEGIN: Delete Confirmation Modal -->
	<div id="delete-confirmation-modal" class="modal" tabindex="-1" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-body p-0">
					<div class="p-5 text-center">
						<i data-lucide="x-circle" class="w-16 h-16 text-danger mx-auto mt-3"></i> 
						<div class="text-3xl mt-5">Are you sure?</div>
						<div class="text-slate-500 mt-2">
							Do you really want to delete these records? 
							<br>
							This process cannot be undone.
						</div>
					</div>
					<div class="px-5 pb-8 text-center">
						<button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-24 mr-1">Cancel</button>
						<button type="button" class="btn btn-danger w-24">Delete</button>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- END: Delete Confirmation Modal -->
 </div> 
        <script src="dist/js/app.js"></script>
        <!-- END: JS Assets-->
    </body>
</html>
</html>