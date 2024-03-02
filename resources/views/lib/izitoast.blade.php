@if (Session::has('success'))
    <script>
        iziToast.success({
            title: 'Success',
            message: "{{ Session::get('success') }}",
            position: "topRight"
        });
    </script>
@endif

@if (Session::has('fail'))
    <script>
        iziToast.error({
            title: 'Error',
            message: "{{ Session::get('fail') }}",
            position: "topRight"
        })
    </script>
@endif
