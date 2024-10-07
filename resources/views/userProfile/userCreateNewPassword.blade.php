<x-emailLayout>
     <div class="email-container">
        <!-- Header -->
        <div class="email-header">
            <h1>Forgot Password ?</h1>
        </div>

        <!-- Body -->
        <div class="email-body">
            <form action="/user/profile/storeNewPassword" class="input" method="post">
                @csrf
                @method('PUT')
            <input type="email" placeholder="Email" name="email" />
            @error('email')
            <p class="error">{{ $message }}</p>
            @enderror

            <input type="password" placeholder="New Password" name="new_password" />
            @error('new_password')
            <p class="error">{{ $message }}</p>
            @enderror

            <input type="password" placeholder="Re-Enter Password" name="re_enter_password" />
            @error('re_enter_password')
            <p class="error">{{ $message }}</p>
            @enderror
                <button type="submit"> Create New Password</button>
                <p>Your One Time Password will be sent to <strong>Your Email</strong></p>
            </form>
            <br>
        </div>
    </div>
</x-emailLayout>