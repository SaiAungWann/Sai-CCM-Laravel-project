<x-emailLayout>
     <div class="email-container">
        <!-- Header -->
        <div class="email-header">
            <h1>Thank you for your Register!</h1>
        </div>

        <!-- Body -->
        <div class="email-body">
            <p>Hello, <strong> {{$name}} </strong> </p>
            
            @if (url('/sent-email/otp/confirm'))
            <p>Plese verify your Email Address : <strong>{{$email}}</strong> </p>
                <form action="/sent-email/otp" class="input" >

                @csrf
                <input type="hidden" name="email" value="{{$email}}">
            <button type="submit"> Request New OTP</button>
            </form>
                    <br>
            
            @endif

            {{-- @if (url('/sent-email/verify'))
                <p>Your One Time Password has been sent to <strong>{{$email}}</strong></p>
            @endif --}}
                
                <form action="/sent-email/verify" 
                class="input" 
                method="POST" 
                > @csrf 
                @method('POST')
                <label for="otp">Please Enter One Time Password: </label>
                <input type="number" name="otp" id="otp" placeholder="ENTER OTP" required >
                <button type="submit"> Submit OTP</button>
            </form>
            <p>We are happy to let you know that this <strong>OTP will expires after 1 minute</strong>!</p>
        </div>
    </div>

</x-emailLayout>