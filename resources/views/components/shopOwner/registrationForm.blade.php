<div class="card shadow-lg">
						<div class="card-body p-5">
							<h1 class="fs-4 card-title fw-bold mb-4">Register</h1>
							<div class="needs-validation" novalidate="" autocomplete="off">
								<div class="mb-3">
									<label class="mb-2 text-muted" for="firstName">First Name</label>
									<input id="firstName" type="text" class="form-control" name="firstName" value="" required autofocus>
									<div class="invalid-feedback">
										First Name is required	
									</div>
								</div>

								<div class="mb-3">
									<label class="mb-2 text-muted" for="lastName">Last Name</label>
									<input id="lastName" type="text" class="form-control" name="lastName" value="" required autofocus>
									<div class="invalid-feedback">
										Last Name is required	
									</div>
								</div>

								<div class="mb-3">
									<label class="mb-2 text-muted" for="email">E-Mail Address</label>
									<input id="email" type="email" class="form-control" name="email" value="" required>
									<div class="invalid-feedback">
										Email is invalid
									</div>
								</div>

								<div class="mb-3">
									<label class="mb-2 text-muted" for="password">Password</label>
									<input id="password" type="password" class="form-control" name="password" required>
								    <div class="invalid-feedback">
								    	Password is required
							    	</div>
								</div>

                                <div class="mb-3">
									<label class="mb-2 text-muted" for="phone">Phone</label>
									<input id="phone" type="text" class="form-control" name="phone" value="" required autofocus>
									<div class="invalid-feedback">
										Phone number is required	
									</div>
								</div>

								<div class="align-items-center">
									<button type="submit" onclick="submitRegistration()" class="btn btn-primary ms-auto">
										Register	
									</button>
								</div>
							</div>
						</div>
						<div class="card-footer py-3 border-0">
							<div class="text-center">
								Already have an account? <a href="{{url('/')}}" class="text-dark">Login</a>
							</div>
						</div>
					</div>

                    <script>
                        async function submitRegistration(){

                                let firstName = document.getElementById('firstName').value;
                                let lastName = document.getElementById('lastName').value;
                                let email = document.getElementById('email').value;
                                let password = document.getElementById('password').value;
                                let phone = document.getElementById('phone').value;

                                if(firstName.length===0){
								alert('firstName required')
							}
							else if(lastName.length===0){
								alert('lastName required')
							}
							else if(email.length===0){
								alert('email required')
							}
							else if(password.length===0){
								alert('password required')
							}
                            else if(phone.length===0){
                                alert('phone number required')
                            }
							else{
								

								try{

								 let res = await axios.post(
										'/shop-owner-registration',
										{
											firstName:firstName,
											lastName:lastName,
											email:email,
											password:password,
                                            phone:phone
										}
									);

									if(res.status===200){
										alert('registration successful!');
										window.location.href="/"
									}
								}catch(error){
					
					
								alert('access denied!');
					
				
							}
							}

                        }
                    </script>

					
					