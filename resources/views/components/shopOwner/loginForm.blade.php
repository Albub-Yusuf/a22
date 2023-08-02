<div class="card shadow-lg">
	<div class="card-body p-5">
			<h1 class="fs-4 card-title fw-bold mb-4">Login</h1>
			<div  class="needs-validation" novalidate="" autocomplete="off">
				<div class="mb-3">
					<label class="mb-2 text-muted" for="email">E-Mail Address</label>
						<input id="email" type="email" class="form-control" name="email" value="" required autofocus>
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

				<div class="align-items-center">
					<button type="submit" class="btn btn-primary ms-auto" onclick="submitLogin()">Login</button>
				</div>

			</div>
		</div>
		
        <div class="card-footer py-3 border-0">
			<div class="text-center">
				Don't have an account? <a href="{{url('/registration')}}" class="text-dark">Create One</a>
			</div>
		</div>
	</div>

    <script>
        async function submitLogin(){

            let email = document.getElementById('email').value;
            let password = document.getElementById('password').value;

            if(email.length===0){
                alert('email is required');
            }
            if(password.length===0){
                alert('password is required');
            }

            else{
               
                try{

                    let res = await axios.post(
                    '/shop-owner-login',
                    {
                        email:email,
                        password:password
                    }
                
                );

                if(res.status===200){
                    alert('login successful!');
                    window.location.href="/dashboard";
                }

                }catch(error){
                    alert('access denied!');
                }

            }

        }
    </script>