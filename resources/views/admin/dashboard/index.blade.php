<x-admin-layout>
    <x-slot:title>{{ $title }}</x-slot>

    <div class="flex min-h-screen bg-gray-50">

        <!-- Main Content -->
        <main class="flex-1 p-8">
            <header class="flex justify-between items-center mb-6 bg-white p-4 rounded-lg shadow-md">
                <h2 class="text-2xl font-bold text-gray-800">👋 Selamat Datang, {{ Auth::user()->name }}</h2>
                <img src="https://i.pravatar.cc/50" alt="Profile" class="rounded-full border-2 border-gray-300">
            </header>

            <!-- Statistik Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition">
                    <h3 class="text-lg font-semibold text-gray-700">👨‍🎓 Total Siswa</h3>
                    <p class="text-3xl font-bold mt-2 text-blue-500">{{ $totalStudents }}</p>
                </div>

                <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition">
                    <h3 class="text-lg font-semibold text-gray-700">🏫 Total Kelas</h3>
                    <p class="text-3xl font-bold mt-2 text-green-500">{{ $totalGrades }}</p>
                </div>

                <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition">
                    <h3 class="text-lg font-semibold text-gray-700">📅 Total Departement</h3>
                    <p class="text-3xl font-bold mt-2 text-red-500">{{ $totalDepartments }}</p>
                </div>
            </div>

        </main>
    </div>
</x-admin-layout>
