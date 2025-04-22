<script>
    document.querySelectorAll('.confirm-delete').forEach(button => {
        button.addEventListener('click', function (e) {
            e.preventDefault();
            const form = button.closest('form');
            Swal.fire({
                title: 'Yakin mau hapus?',
                text: "Data ini tidak bisa dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });
</script>
@if (session('error'))
<script>
    Swal.fire({
                icon: 'error',
                title: 'Oops!',
                text: '{{ session('error') }}',
                timer: 3000,
                showConfirmButton: false
            });
</script>
@endif
</script>

@if (session('success'))
<script>
    Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: '{{ session('success') }}',
            timer: 3000,
            showConfirmButton: false
        });
</script>
@endif

@if (session('error'))
<script>
    Swal.fire({
            icon: 'error',
            title: 'Oops!',
            text: '{{ session('error') }}',
            timer: 3000,
            showConfirmButton: false
        });
</script>
@endif