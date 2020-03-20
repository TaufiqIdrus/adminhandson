            </div>
        </div>
    <script src="<?= base_url(); ?>assets/js/sweetalert2.all.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/myscript.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.2/js/responsive.bootstrap4.js">
    <script>
        $(document).ready( function () {
            $('#example').DataTable({
                "responsive": true,
                "columnDefs": [
                    {responsivePriority: 1, targets: 0},
                    {responsivePriority: 2, targets: 4},
                ]
            });
        } );
    </script>
    </body>
</html>