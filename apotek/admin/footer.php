</div><!-- end container-fluid" -->
</main><!-- end page-content" -->
</div><!-- end page-wrapper -->

<!-- Modal Exit -->
<div class="modal fade" id="Exit" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content border-0">
      <div class="modal-body text-center">
        <i class="fas fa-exclamation-triangle fa-4x text-warning mb-3"></i>
        <h3 class="mb-4">Apakah anda yakin ingin keluar ?</h3>
        <button type="button" class="btn btn-secondary px-4 mr-2" data-dismiss="modal">Batal</button>
        <a href="logout.php" class="btn btn-primary px-4">Keluar</a>
      </div>
    </div>
  </div>
  <!-- end Modal Exit -->
  <script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="../../assets/js/sidebar.js"></script>
  <script src="../../assets/vendor/datatables/jquery-3.5.1.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.7.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.70/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.70/vfs_fonts.js"></script>



  <!-- <script src="../../assets/vendor/html5-qrcode/html5-qrcode.min.js"></script> -->
  <!-- <script type="text/javascript" src="https://rawgit.com/andrastoth/webcodecamjs/master/js/webcodecamjs.js"></script> -->
  <script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
  <script src="https://cdn.jsdelivr.net/chartist.js/latest/chartist.min.js"></script>



  <script type="text/javascript">
$(document).ready(function() {
    $('#table').DataTable({
      
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'copy',
                text: 'Salin',
                className: 'dt-button'
            },
            {
                extend: 'excel',
                text: 'Excel',
                className: 'dt-button'
            },
            {
                extend: 'pdf',
                text: 'PDF',
                className: 'dt-button'
            },
            {
                extend: 'print',
                text: 'Cetak',
                className: 'dt-button'
            }
        ], 
        responsive: true,
        scrollX: true
    });
});
  </script>

  </body>

  </html>