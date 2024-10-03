<x-emailLayout>
 <div class="email-container">
        <!-- Header -->
        <div class="email-header">
            <h1>Thank you for your Register!</h1>
        </div>

        <!-- Body -->
        <div class="email-body">
            <p>Hello, <strong> {{$user->first_name . ' ' . $user->middle_name . ' ' . $user->last_name}} </strong> </p>
            <p>Plese verify your Email Address : <strong>{{$user->email}}</strong> </p>
            <p>Here your One Time Password : <strong>{{$newOtp}}</strong></p>

            {{-- {{dd($user, $newOtp)}} --}}
            <p>We are happy to let you know that this <strong>OTP is valid until 1 minute!</strong></p>
            <p>Thanks You.</p>
        </div>
    </div>
</x-emailLayout>