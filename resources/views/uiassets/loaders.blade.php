
<!--login loaders-->
	<!--facebook login loader-->
		<div class="modal" id="facebookLoginModal">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-body">
						<center>
							<img src="{{asset('assets/images/shots/facebook.gif')}}" width="90px" height="90px">
							<br>
							<h5 class="text-muted"> Authenticating using facebook...</h5>
						</center>
					</div>
				</div>
			</div>
		</div>
	<!--facebok login loader-->

	<!--- logout loader-->
		<div class="modal" id="logoutModal">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-body bg-light">
						<center>
							<img src="{{asset('images/log2.gif')}}" class="rounded-circle" width="90px" height="90px">
							<br>
							<h6 class="text-muted" id="logText"> System logging  out due to inactivity in the last 5 minutes...</h6>
							<button class="btn btn-success" onclick="reloaderr()"><i class="fas fa-redo"></i> Refresh my Session</button>&nbsp<button class="btn btn-danger" onclick="
            document.getElementById('logout-form').submit();"><i class="fas fa-times"></i> Close</button>
						</center>
					</div>
				</div>
			</div>
		</div>
	<!-- logout loader-->

		<!--twitter login loader-->
		<div class="modal" id="twitterLoginModal">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-body">
						<center>
							<img src="{{asset('assets/images/shots/twitter.gif')}}" width="70px" height="60px">
							<br><br> 
							<h5 class="text-muted"> Authenticating using twitter...</h5>
						</center>
					</div>
				</div>
			</div>
		</div>
	<!--twitter login loader-->

		<!--google login loader-->
		<div class="modal" id="googleLoginModal">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-body">
						<center>
							<img src="{{asset('assets/images/shots/google.gif')}}" width="90px" height="90px">
							<br>
							<h5 class="text-muted"> Authenticating using google...</h5>
						</center>
					</div>
				</div>
			</div>
		</div>
	<!--google login loader-->

		<!--email login loader-->
		<div class="modal" id="emailLoginModal">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-body">
						<center>
							<img src="{{asset('assets/images/shots/email3.gif')}}" width="70px" height="80px">
							<br><br> 
							<h5 class="text-muted"> Authenticating using email...</h5>
						</center>
					</div>
				</div>
			</div>
		</div>
	<!--email login loader-->

		<!-reset login loader-->
		<div class="modal" id="resetPasswordModal">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-body">
						<center>
							<img src="{{asset('assets/images/shots/reset.gif')}}" width="90px" height="90px">
							<br><br> 
							<h5 class="text-muted"> Sending a password reset link...</h5>
						</center>
					</div>
				</div>
			</div>
		</div>
	<!-reset login loader-->

<!--login loaders-->

<!--message modals-->
	<!--Employee add modal-->
		<div class="modal" id="SuccessModal">
			<div class="modal-dialog bg-white">
				<div class="modal-content">
					<div class="modal-body">
						<center>
							<img src="{{asset('images/shots/18.gif')}}" width="90px" height="90px">
							<br><br> 
							<h5 class="text-muted">
							<strong>Alert!</strong> 
							{{session('recordAdd')}}</h5>

							<br>
							<br>
							<button class="btn btn-primary" data-dismiss="modal">Ok, close!</button>
						</center>
					</div>
				</div>
			</div>
		</div>
	<!--Employee add modal-->

	<!--Employee add modal-->
		<div class="modal" id="ApproveModal">
			<div class="modal-dialog bg-white">
				<div class="modal-content">
					<div class="modal-body">
						<center>
							<img src="{{asset('images/shots/18.gif')}}" width="90px" height="90px">
							<br><br> 
							<h5 class="text-muted">
							<strong>Alert!</strong> 
							{{session('recordApproved')}}</h5>

							<br>
							<br>
							<button class="btn btn-primary" data-dismiss="modal">Ok, close!</button>
						</center>
					</div>
				</div>
			</div>
		</div>
	<!--Employee add modal-->

	<!--Employee add modal-->
		<div class="modal" id="RejectedModal">
			<div class="modal-dialog bg-white">
				<div class="modal-content">
					<div class="modal-body">
						<center>
							<img src="{{asset('images/shots/18.gif')}}" width="90px" height="90px">
							<br><br> 
							<h5 class="text-muted">
							<strong>Alert!</strong> 
							{{session('recordRejected')}}</h5>

							<br>
							<br>
							<button class="btn btn-primary" data-dismiss="modal">Ok, close!</button>
						</center>
					</div>
				</div>
			</div>
		</div>
	<!--Employee add modal-->

	<!--Employee edit modal-->
		<div class="modal" id="SuccessEditModal">
			<div class="modal-dialog bg-white">
				<div class="modal-content">
					<div class="modal-body">
						<center>
							<img src="{{asset('images/shots/18.gif')}}" width="90px" height="90px">
							<br><br> 
							<h5 class="text-muted">
							<strong>Alert!</strong> 
							{{session('recordEdit')}}</h5>

							<br>
							<br>
							<button class="btn btn-primary" data-dismiss="modal">Ok, close!</button>
						</center>
					</div>
				</div>
			</div>
		</div>
	<!--Employee edit modal-->

	<!--Employee delete modal-->
		<div class="modal" id="SuccessDeleteModal">
			<div class="modal-dialog bg-white">
				<div class="modal-content">
					<div class="modal-body">
						<center>
							<img src="{{asset('images/shots/18.gif')}}" width="90px" height="90px">
							<br><br> 
							<h5 class="text-muted">
							<strong>Alert!</strong> 
							{{session('recordDelete')}}</h5>

							<br>
							<br>
							<button class="btn btn-primary" data-dismiss="modal">Ok, close!</button>
						</center>
					</div>
				</div>
			</div>
		</div>
	<!--Employee delete modal-->

	<!--Email sent modal-->
		<div class="modal" id="SuccessModal">
			<div class="modal-dialog bg-white">
				<div class="modal-content">
					<div class="modal-body">
						<center>
							<img src="{{asset('images/shots/18.gif')}}" width="90px" height="90px">
							<br><br> 
							<h5 class="text-muted">
							<strong>Alert!</strong> 
							{{session('emailSent')}}</h5>

							<br>
							<br>
							<button class="btn btn-primary" data-dismiss="modal">Ok, close!</button>
						</center>
					</div>
				</div>
			</div>
		</div>
	<!--Email sent modal-->

	<!--Email failed modal-->
		<div class="modal" id="SuccessEmailModal">
			<div class="modal-dialog bg-white">
				<div class="modal-content">
					<div class="modal-body">
						<center>
							<img src="{{asset('images/shots/18.gif')}}" width="90px" height="90px">
							<br><br> 
							<h5 class="text-muted">
							<strong>Alert!</strong> 
							{{session('emailFailed')}}</h5>

							<br>
							<br>
							<button class="btn btn-primary" data-dismiss="modal">Ok, close!</button>
						</center>
					</div>
				</div>
			</div>
		</div>
	<!--Email failed modal-->




		<!--mail loader-->
		<div class="modal" id="mailNotificationModal">
			<div class="modal-dialog" style="margin-top: 150px !important;">
				<div class="modal-content">
					<div class="modal-body">
						<center>
							<img src="{{asset('images/email2.gif')}}" width="90px" height="90px">
							<br><br> 
							<strong class="text-muted"> Preparing recipients emails, just a moment...</strong>
						</center>
					</div>
				</div>
			</div>
		</div>
	<!--mail loader-->


		<!--mail loader-->
		<div class="modal" id="smsNotificationModal">
			<div class="modal-dialog" style="margin-top: 150px !important;">
				<div class="modal-content">
					<div class="modal-body">
						<center>
							<img src="{{asset('images/sms4.gif')}}" width="120px" height="120px">
							<br><br> 
							<strong class="text-muted"> Preparing and verifying recipients contacts, just a moment...</strong>
						</center>
					</div>
				</div>
			</div>
		</div>
	<!--mail loader-->

	<!--mail loader-->
		<div class="modal" id="excelModal">
			<div class="modal-dialog" style="margin-top: 150px !important;">
				<div class="modal-content">
					<div class="modal-body">
						<center>
							<img src="{{asset('images/excel.gif')}}" width="120px" height="120px">
							<br><br> 
							<strong class="text-muted"> Preparing employees content for export, just a moment...</strong>
						</center>
					</div>
				</div>
			</div>
		</div>
	<!--mail loader-->

	<!--mail loader-->
		<div class="modal" id="payrollLoaderModal">
			<div class="modal-dialog" style="margin-top: 150px !important;">
				<div class="modal-content">
					<div class="modal-body">
						<center>
							<img src="{{asset('images/excel.gif')}}" width="120px" height="120px">
							<br><br> 
							<strong class="text-muted"> Preparing payroll,please wait this may take a moment...</strong>
						</center>
					</div>
				</div>
			</div>
		</div>
	<!--mail loader-->

	<!--mail loader-->
		<div class="modal" id="printModal">
			<div class="modal-dialog" style="margin-top: 150px !important;">
				<div class="modal-content">
					<div class="modal-body">
						<center>
							<img src="{{asset('images/print.gif')}}" width="120px" height="120px">
							<br><br> 
							<strong class="text-muted"> Preparing employees content for printing, just a moment...</strong>
						</center>
					</div>
				</div>
			</div>
		</div>
	<!--mail loader-->

	<!--mail loader-->
		<div class="modal" id="trashModal">
			<div class="modal-dialog" style="margin-top: 150px !important;">
				<div class="modal-content">
					<div class="modal-body">
						<center>
							<img src="{{asset('images/trash.gif')}}" width="120px" height="120px">
							<br><br> 
							<strong class="text-muted"> Preparing employees content for archiving, just a moment...</strong>
						</center>
					</div>
				</div>
			</div>
		</div>
	<!--mail loader-->

	<!--loader-->
		<div class="modal" id="loaderModal">
			<div class="modal-dialog" style="margin-top: 150px !important;">
				<div class="modal-content">
					<div class="modal-body">
						<center>
							<img src="{{asset('images/loader3.gif')}}" width="80px" height="80px">
							<br><br> 
							<strong class="text-muted" id="loaderText"></strong>
						</center>
					</div>
				</div>
			</div>
		</div>
	<!--loader-->
<!--message modals->

<!--Error Sheet
<div class="card shadow-lg errorSheet" id="errorSheet">
	<div class="card-body">
	<h6><i class="fas fa-info"></i> Error Logs

		<i class="fas fa-times float-right errorSheetCloseBtn"  style="cursor: pointer;"></i></h6>
	<hr>
	<span id="nameError" class="text-muted mt-4">
		<strong class="text-danger">Firstname/ Lastname/ Surname:</strong><br> Use a valid name of proper length and characters only
	</span>

	<br><br>

	<span id="emailError" class="text-muted mt-4">
		<strong class="text-danger">Email:</strong><br> Use a valid email i.e abc@xyz.com
	</span>

	<br><br>

	<span id="contactError" class="text-muted mt-4">
		<strong class="text-danger">Phone contact:</strong><br> Use a valid number i.e 254701020304
	</span>

	<br><br>

	<span id="passwordError" class="text-muted mt-4">
		<strong class="text-danger">Password:</strong><br> Use a valid password, length 8 characters.
	</span>

	<br><br>

	<span id="cPasswordError" class="text-muted mt-4">
		<strong class="text-danger">Confirm Password:</strong><br> Passwords do not match
	</span>

	<br><br>
	
</div>

</div>
<!--Error Sheet-->
