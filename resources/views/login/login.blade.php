

<link rel="stylesheet" href="{{asset('access/css/loginAndRegister.css')}}">
<div class="container" id="container">

    <div class="form-container sign-in-container">
        <form action="/login" method="post">
            @csrf
            <h1>Sign in</h1>
            <div class="social-container">
                <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
            </div>
            <span>or use your account</span>

            <input type="email" placeholder="Email" name="email" />
            @error('email')
            <p class="error">{{ $message }}</p>
            @enderror

            <input type="password" placeholder="Password" name="password" />
            @error('password')
            <p class="error">{{ $message }}</p>
            @enderror

            <a href="/user/profile/forgotPassword">Forgot your password?</a>
            <button type="submit">Sign In</button>
        </form>
    </div>

    <div class="form-container sign-up-container">
        <form action="/register" method="post">
            @csrf
            <h1>Create Account</h1>
            <div class="social-container">
                <a href="#" class="social"><i class="bi bi-facebook"></i></a>
                <a href="#" class="social"><i class="bi bi-google"></i></a>
                <a href="#" class="social"><i class="bi bi-linkedin"></i></a>
            </div>
            <span>or use your email for registration</span>
            <input type="text" placeholder="First Name" name="first_name" />
            @error('first_name')
            <p class="error">{{ $message }}</p>
            @enderror
            <input type="text" placeholder="Middle Name" name="middle_name" />
            @error('middel_name')
            <p class="error">{{ $message }}</p>
            @enderror
            <input type="text" placeholder="Last Name" name="last_name" />
            @error('last_name')
            <p class="error">{{ $message }}</p>
            @enderror

            <input type="email" placeholder="Email" name="email" />
            @error('email')
            <p class="error">{{ $message }}</p>
            @enderror

            <input type="password" placeholder="Password" name="password" />
            @error('password')
            <p class="error">{{ $message }}</p>
            @enderror
            <button type="submit">Sign Up</button>
        </form>
    </div>

    <div class="overlay-container">
        <div class="overlay">
            <div class="overlay-panel  overlay-left ">
                <h1>Welcome Back!</h1>
                <p>To keep connected with us please login with your personal info</p>
                <button class="ghost" id="signIn">Sign In</button>
                 <a href="/"><button class="ghost" id="signIn">Home Page</button></a>
            </div>
        
                <div class="overlay-panel overlay-right">
                    <h1>Hello, Friend!</h1>
                    <p>Enter your personal details and start journey with us</p>
                    <button herf="/register" class="ghost" id="signUp">Sign Up</button>
                    <br>
                     <a href="/"> <button class="ghost" id="signUp">Home Page</button></a>
                </div>
        </div>
    </div>
</div>

<script src="{{asset('access/js/loginAndRegister.js')}}"></script>
    