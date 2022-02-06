<div class="modal fade" id="modalinput">
  <div class="modal-dialog">
    <div class="modal-content">   
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">DATA PASIEN</h4>
      </div>
      <form class="form-horizontal" role="form" id="forminput">  
      <div class="modal-body">    
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
          <div class="form-group">
            <div class="col-md-3">
              <label  class="control-label">Tempat Lahir</label> 
            </div>
            <div class="col-md-9">
              <input style="width: 100%;" type="text" class="form-control" name="tempat_lahir" id="tempat_lahir">     
            </div> 
          </div>
          <div class="form-group">  
            <div class="col-md-3">
              <label  class="control-label">Tanggal Lahir</label> 
            </div>
            <div class="col-md-9">
              <input style="width: 100%;" type="text" class="form-control datepicker" name="tanggal_lahir" id="tanggal_lahir">  
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
        <input type="hidden" id="simpan" name="simpan" value="pasien" />
        <button type="button" id="bsimpan" class="btn btn-primary" >Simpan</button>
      </div>
      </form>
    </div>
  </div>
</div>

<div class="box box-solid box-primary">
   <div class="box-header with-border">
      <h3 class="box-title">DATA PASIEN</h3>  
        <button class="btn btn-success pull-right" id="tambah" type="button">Tambah Data</button>
    </div>
    <div class="box-body">
        <table id="example2" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th class="text-center">No</th>
            <th class="text-center">Nama</th> 
            <th class="text-center">Alamat</th>
            <th class="text-center">Tempat Lahir</th> 
            <th class="text-center">Tanggal Lahir</th> 
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
<script src="style/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
<script>
$(function () {
  $('.datepicker').datepicker({
    autoclose: true,
    format :"yyyy-mm-dd"
  });
});

tampil(); 

$("#tambah").on('click',function(){
  $('#id,#nama,#alamat,#tempat_lahir').val('');
  $('#tanggal_lahir').datepicker('setDate', null);
  $("#modalinput").modal('show');
});   

$("#bsimpan").on('click',function()
{
  if($('#nama').val()==''||$('#alamat').val()==''||$('#tempat_lahir').val()==''||$('#tanggal_lahir').val()=='')
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
      "ajax": "tampil.php?data=pasien",
      "destroy": true,
      "columns": [
          { "data": "aksi" },
          { "data": "nama" },
          { "data": "alamat" },
          { "data": "tempat_lahir" },
          { "data": "tanggal_lahir" },
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
        "aTargets": [ 5 ],
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
  $.getJSON("tampil.php?data=editpasien&id="+$(this).val(), function(data) {
    $('#id').val(data.id);
    $('#nama').val(data.nama);
    $('#alamat').val(data.alamat);
    $('#tempat_lahir').val(data.tempat_lahir);
    $('#tanggal_lahir').val(data.tanggal_lahir);
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
      return $.post("hapus.php?hapus=pasien&id="+id, function(data) {
        swal("Sukses", "Data Berhasil Dihapus", "success");
        tampil();
      });
    } 
    });  
});

</script>
