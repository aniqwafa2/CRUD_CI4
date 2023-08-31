<div class="container mt-5">
    <div class="row">
        <div class="col">
            <h1>Data Tugas</h1>
            <table class="table" id="myTable">
                <thead>
                    <tr>
                    <th scope="col">No</th>
                    <th scope="col">Tugas</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    
                </tbody>
                </table>
        </div>
    </div>
</div>

<script>
    $(document).ready(function()
    {
        $('#myTable').DataTable({
            "pageLength": 10,
            "ajax": {
                "url":"<?= site_url('home/ajaxList'); ?>",
                "type":"GET"
            },
            // "serverSide": true,
            // "deferRender": true
        });
    })

</script>