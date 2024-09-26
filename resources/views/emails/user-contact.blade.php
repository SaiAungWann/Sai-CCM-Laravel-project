<x-emailLayout>

    <div class="m-auto p-10 text-white">
        <h1 class=" font-bold text-2xl">
            User Questions?
        </h1>
        @php

            $name = $data['name'];
            $email = $data['email'];
            $message = $data['message'];
        @endphp
        <p>
            Name: {{ $name }} <br>
            Email: {{ $email }} <br>
            Message: {{ $message }}
        </p>
    </div>
</x-emailLayout>