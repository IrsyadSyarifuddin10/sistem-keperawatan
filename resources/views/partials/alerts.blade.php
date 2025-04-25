<script>
    document.querySelectorAll('.confirm-submit').forEach(button => {
    button.addEventListener('click', function (e) {
        e.preventDefault();
        const form = button.closest('form');
        const actionType = button.dataset.action || 'simpan'; // bisa "simpan" atau "ubah"

        Swal.fire({
            title: `Yakin ingin ${actionType} data?`,
            text: `Pastikan semua data sudah benar sebelum ${actionType}.`,
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#aaa',
            confirmButtonText: `Ya, ${actionType}`,
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
                showConfirmButton: true
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