<div class="col-md-3 sidebar">
	<sidebar class="col-md-3 sidebar" id='sidebar'>
					<form action="trucksearch.php" method="get" class="shop text-center">
						<h3 class="subtitle mt-3">Find Best Rental Trucks</h3>
						<div class="row">
							<div class="col-md-12">
								<div class="form-search dark">
									<div class="form-title col-md-12">
										<i class="search"></i>
										<h2>Search for Cheap Rental Trucks Around You!</h2>
									</div>
									<div class="row row-inputs">
										<div class="container-fluid mr-4">
											<div class="col-md-12 d-flex justify-content-between align-items-center">
												<div class="col-md-5 mr-3 form-group detail has-labe">
													<label for="formSearchUpLocation">
														Truck Type </label>
													<input name="type" type="text"
														class="form-control formSearchUpLocation" id="formSearchUpLocation"
														value="" placeholder="DAF,MACK,Others">

												</div>
												<div class="col-md-5 ml-3 form-group detail labely">
													<label for="formSearchUpDate">
														Truck Category </label>
													<input name="cat" type="text" class="form-control"
														id="formSearchUpDate" value=""
														placeholder="Flatbed,Offcountry,Others">

												</div>
											</div>
											<div class="col-md-12 d-flex justify-content-between align-items-cente">
												<div class="col-md-5 mr-3 form-group detail labely">
													<label for="formSearchOffLocation">
														Picking Up Location </label>
													<input name="dropoff" type="text"
														class="form-control formSearchUpLocation"
														id="formSearchOffLocation" value=""
														placeholder="Factory or Anywhere">

												</div>
												<div class="col-md-5 ml-3 form-group detail labely">
													<label for="formSearchOffDate">
														Picking Up Date </label>
													<input name="end_date" type="date" class="form-control"
														id="formSearchOffDate" value="" placeholder="dd/mm/yyyy">

												</div>
											</div>
											<div class="col-md-12 d-flex justify-content-between align-items-cente mb-3">
												<div class="col-md-5 mr-3 form-group detail labely">
													<label for="formSearchOffLocation">
														Dropping Off Location </label>
													<input name="dropoff" type="text"
														class="form-control formSearchUpLocation date"
														id="formSearchOffLocation" value=""
														placeholder="Warehouse or Anywhere">

												</div>
												<div class="col-md-5 ml-3 form-group detail labely">
													<label for="formSearchOffDate">
														Dropping Off Date </label>
													<input name="end_date" type="date" class="form-control"
														id="formSearchOffDate" value="" placeholder="dd/mm/yyyy">

												</div>
											</div>
											<div class="col-md-11 mx-aut">
												<button type="submit" id="formSearchSubmit"
													class="mx-auto btn btn-block btn-submit btn-theme">
													Find Truck </button>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</form>
				</sidebar>
</div>