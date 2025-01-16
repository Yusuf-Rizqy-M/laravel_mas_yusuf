<x-layout>
    <x-slot:title>{{ $title }}</x-slot>
    {{-- <h3>Halaman Students</h3> --}}


    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">No</th>
                    <th scope="col" class="px-6 py-3">Name</th>
                    <th scope="col" class="px-6 py-3">Grade</th>
                    <th scope="col" class="px-6 py-3">Department</th>
                    <th scope="col" class="px-6 py-3">Email</th>
                    <th scope="col" class="px-6 py-3">Address</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$student->id}}
                    </th>
                    <td class="px-6 py-4">{{$student->name}}</td>
                    <td class="px-6 py-4">{{$student->grade->name}}</td>
                    <td class="px-6 py-4">{{$student->grade->department->name}}</td>
                    <td class="px-6 py-4">{{$student->email}}</td>
                    <td class="px-6 py-4">{{$student->address}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-layout>
