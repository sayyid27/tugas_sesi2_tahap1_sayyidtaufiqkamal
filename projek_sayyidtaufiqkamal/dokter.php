<div class="modal fade" id="modalinput">
  <div class="modal-dialog">
    <div class="modal-content">   
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">DATA DOKTER</h4>
      </div>
      <form class="form-horizontal" role="form" id="forminput">  
      <div class="modal-body"> 
          <div class="form-group">
            <div class="col-md-3">
              <label  class="control-label">NIP</label> 
            </div>
            <div class="col-md-9">
              <input style="width: 100%;" type="text" class="form-control" name="nip" id="nip">     
            </div> 
          </div>   
          <div class="form-group">  
            <div class="col-md-3">
              <label  class="control-label">Nama</label> 
            </div>
            <div class="col-md-9">
              <input style="width: 100%;" type="text" class="form-control" name="nama" id="nama"> 
              <input type="hidden" name="id" id="id">    
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-3">
              <label  class="control-label">Alamat</label> 
            </div>
            <div class="col-md-9">
              <input style="width: 100%;" type="text" class="form-control" name="alamat" id="alamat">     
            </div> 
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
        <input type="hidden" id="simpan" name="simpan" value="dokter" />
        <button type="button" id="bsimpan" class="btn btn-primary" >Simpan</button>
      </div>
      </form>
    </div>
  </div>
</div>

<div class="box box-solid box-primary">
   <div class="box-header with-border">
      <h3 class="box-title">DATA DOKTER</h3>  
        <button class="btn btn-success pull-right" id="tambah" type="button">Tambah Data</button>
    </div>
    <div class="box-body">
        <table id="example2" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th class="text-center">No</th>
            <th class="text-center">NIP</th> 
            <th class="text-center">Nama</th> 
            <th class="text-center">Alamat</th>
            <th class="text-center" style="min-width:100px">Aksi</th> 
          </tr>
          </thead>
          <tbody>
          <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr> 
          </tbody>
        </table>
      </div> 
  </div>     
<!-- </div> -->

<!--footer-->
 <!--    </div> -->
      <!-- /.row -->

    </section>
    
   <!-- /.container -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="container">
      <strong>Copyright &copy; 2022 Sayyid Taufiq Kamal</strong> All rights reserved.
    </div>
    <!-- /.container -->
  </footer>
</div>

<script src="style/plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="style/bootstrap/js/bootstrap.min.js"></script>
<script src="style/dist/js/app.min.js"></script>
<script src="style/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="style/plugins/datatables/dataTables.bootstrap.min.js"></script>
<script src="style/sweetalert.min.js"></script>
<script>
tampil(); 

$("#tambah").on('click',function(){
  $('#id,#nama,#alamat,#nip').val('');
  $("#modalinput").modal('show');
});   

$("#bsimpan").on('click',function()
{
  if($('#nama').val()==''||$('#alamat').val()==''||$('#nip').val()=='')
  {
    swal("Info", "Lengkapi Inputan Data", "warning");
  }
  else
  {
    var data = $('#forminput').serialize();
    $.ajax({
      type: 'POST',
      url: "simpan.php",
      data: data,
      success: function() {
        $("#modalinput").modal('hide');
        swal("Sukses", "Data Berhasil Disimpan", "success");
        tampil();
      }
    });
  }
});

function tampil(){
  var nomor=0;
  $('#example2').dataTable( {
      "ajax": "tampil.php?data=dokter",
      "destroy": true,
      "columns": [
          { "data": "aksi" },
          { "data": "nip" },
          { "data": "nama" },
          { "data": "alamat" },
          { "data": "aksi" }
        ],
      "aoColumnDefs": [ {
        "aTargets": [ 0 ],
        "mRender": function (data, type, full) {
            nomor=nomor+1;
            return nomor;
          },
          "className": "text-center"
        },
        {
        "aTargets": [ 4 ],
        "mRender": function (data, type, full) {
          var formmatedvalue = "<button type='button'  class='btn btn-sm btn-success edit' ";
            formmatedvalue = formmatedvalue+" value='"+full.id+"'> <i class='fa fa-pencil-square'></i></button>";
            formmatedvalue = formmatedvalue+" <button type='button' class='btn btn-sm btn-danger hapus' value='"+full.id+"'>";
            formmatedvalue = formmatedvalue+" <i class='fa fa-trash'></i></button>";
            return formmatedvalue;
          }
        },
      ],
      "lengthChange": false,
      "scrollY": 500,
      "scrollX": true,
      "scrollCollapse": true,
      "autoWidth": true,
      "ordering" : false,
      "info" : false
    });
}

//edit
$("#example2").on('click','.edit',function(){
  $.getJSON("tampil.php?data=editdokter&id="+$(this).val(), function(data) {
    $('#id').val(data.id);
    $('#nip').val(data.nip);
    $('#nama').val(data.nama);
    $('#alamat').val(data.alamat);
    $("#modalinput").modal('show');
  });
});

$("#example2").on('click','.hapus',function(){
    var id = $(this).val();
    swal({
      title: "Hapus Data?",
      text: "Data Akan Dihapus Permanen",
      icon: "warning",
      buttons: {
        cancel: "Batal",
        catch: {
          text: "Hapus",
          value: true,
          closeModal: false
        },
      },
      dangerMode: true,
    })
    .then((willDelete) => {
    if (willDelete) {
      return $.post("hapus.php?hapus=dokter&id="+id, function(data) {
        swal("Sukses", "Data Berhasil Dihapus", "success");
        tampil();
      });
    } 
    });  
});

</script>
