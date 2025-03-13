<script>
    function sortTable(columnIndex, button) {
        let table = document.querySelector("table tbody");
        let rows = Array.from(table.rows);
        let isAscending = button.dataset.sortOrder === "asc";

        rows.sort((rowA, rowB) => {
            let cellA = rowA.cells[columnIndex].innerText.trim();
            let cellB = rowB.cells[columnIndex].innerText.trim();

            if (columnIndex === 0) { // Sorting berdasarkan Tanggal
                let dateA = new Date(cellA.split("-").reverse().join("-"));
                let dateB = new Date(cellB.split("-").reverse().join("-"));
                return isAscending ? dateA - dateB : dateB - dateA;
            } else {
                return isAscending ? cellA.localeCompare(cellB) : cellB.localeCompare(cellA);
            }
        });

        // Toggle sorting order
        button.dataset.sortOrder = isAscending ? "desc" : "asc";

        // Reset semua ikon sorting di tombol lain
        document.querySelectorAll(".sort-btn i").forEach(icon => {
            icon.classList.remove("bi-chevron-up", "bi-chevron-down");
            icon.classList.add("bi-chevron-expand");
        });

        // Ubah ikon sorting di tombol yang diklik
        let icon = button.querySelector("i");

        // Re-render rows
        rows.forEach(row => table.appendChild(row));
    }
</script>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @isset($header)
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endisset

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>
</body>

</html>