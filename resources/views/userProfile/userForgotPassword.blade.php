<x-emailLayout>
     <div class="email-container">
        <!-- Header -->
        <div class="email-header">
            <h1>Forgot Password ?</h1>
        </div>

        <!-- Body -->
        <div class="email-body">
            <form action="/sent-email/forgotPassword/otp" class="input" >
                @csrf

            <input type="email" placeholder="Email" name="email" />
            @error('email')
            <p class="error">{{ $message }}</p>
            @enderror
                <button type="submit"> Request New OTP</button>
                <p>Your One Time Password will be sent to <strong>Your Email</strong></p>
            </form>
            <br>

            <form action="/user/profile/verifyNewPassword" 
                class="input" 
                method="POST" 
                > 
                @csrf 
                @method('POST')
                <label for="otp">Please Enter One Time Password: </label>
                <input type="number" name="otp" id="otp" placeholder="ENTER OTP" required >
                @error('otp')
                <p class="error">{{ $message }}</p>
                @enderror
                <button type="submit"> Submit OTP</button>
            </form>
            <p>We are happy to let you know that this <strong>OTP will expires after 1 minute</strong>!</p>
        </div>
    </div>
</x-emailLayout>