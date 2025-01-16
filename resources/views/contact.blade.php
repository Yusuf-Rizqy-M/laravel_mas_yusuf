<x-layout>
    <x-slot:title>{{ $title }}</x-slot>
    <ul>
        <li>Nama: {{$nama}}</li>
        <li>Kelas: {{$kelas}}</li>
        <li>LinkedIn: <a href={{$linkedin}}>LinkedIn saya</a></li>
        <li>Github: <a href={{$github}}>GitHub saya</a></li>
    </ul>
</x-layout>
