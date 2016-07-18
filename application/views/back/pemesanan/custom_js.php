    <!-- DataTables -->
    <script src="<?php echo base_url(); ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.bootstrap.min.js"></script>  

<script type="text/javascript">
      $(function () {
        $('#tablePemesanan').DataTable({
          "paging": true,
          "lengthChange": true,
          "searching": true,
          "ordering": true,
          "info": false, 
          "autoWidth": true,
          // "pageLength":5
        });
      });

$('#deleteModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var link = button.data('link') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  // modal.find('.modal-title').text('New message to ' + recipient)
  // modal.find('.modal-body input').val(recipient)
  modal.find('#linkDelete').attr('href',link)
})

$('#viewMerchandise').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var baseatas = '<?php echo base_url('assets/ornamen/atas')."/"; ?>'
  var basekonten = '<?php echo base_url('assets/ornamen/konten')."/"; ?>'
  var basebawah = '<?php echo base_url('assets/ornamen/bawah')."/"; ?>'
  var basegambar = '<?php echo base_url('assets/uploads/orders')."/"; ?>'
  var ornamenatas = button.data('ornamenatas') // Extract info from data-* attributes
  var ornamen1 = button.data('ornamenkonten1') // Extract info from data-* attributes
  var ornamen2 = button.data('ornamenkonten2') // Extract info from data-* attributes
  var ornamen3 = button.data('ornamenkonten3') // Extract info from data-* attributes
  var ornamen4 = button.data('ornamenkonten4') // Extract info from data-* attributes
  var ornamen5 = button.data('ornamenkonten5') // Extract info from data-* attributes
  var ornamen6 = button.data('ornamenkonten6') // Extract info from data-* attributes
  var ornamenbawah = button.data('ornamenbawah') // Extract info from data-* attributes
  var gambar = button.data('gambar') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  // modal.find('.modal-title').text('New message to ' + recipient)
  // modal.find('.modal-body input').val(recipient)
  modal.find('#linkornamenatas').attr('src',baseatas+ornamenatas)
  modal.find('#linkornamen1').attr('src',basekonten+ornamen1)
  modal.find('#linkornamen2').attr('src',basekonten+ornamen2)
  modal.find('#linkornamen3').attr('src',basekonten+ornamen3)
  modal.find('#linkornamen4').attr('src',basekonten+ornamen4)
  modal.find('#linkornamen5').attr('src',basekonten+ornamen5)
  modal.find('#linkornamen6').attr('src',basekonten+ornamen6)
  modal.find('#linkornamenbawah').attr('src',basebawah+ornamenbawah)
  modal.find('#linkgambar').attr('src',basegambar+gambar)
})



</script>