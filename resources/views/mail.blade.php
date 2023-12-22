<x-mail::message>
    <h1> Halo {{ $users->name }}!</h1>
    <p>Kode token anda adalah : {{ $users->token }}</p>
    <p>Silahkan login menggunakan NIM anda dan Token</p>

    <x-mail::button :url="$url">
        Link Website
    </x-mail::button>

</x-mail::message>
