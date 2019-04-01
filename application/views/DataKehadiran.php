<div class="panel panel-primary">
    <div class="panel-heading" style="background-color:black" >
        <h3 class="panel-title">Data Artikel</h3>
    </div>
        <div class="panel-body">
        	<div class="container-fluid">
	<?=$this->session->flashdata('notif')?>
	<div style="width:100%; overflow:auto">
<table class="table table-striped table-condensed table-bordered" id="dataTable" >
	<a style="margin-bottom: 10px;" class="btn btn-primary" role="button" href="<?php echo base_url('Homepage/tambah_data') ?>" >
  			<i class="fa fa-plus-circle"></i> Tambah Data
	</a><br>

	<thead>
		<th>NO</th>
		<th>NIP</th>
		<th>Nama Pegawai</th>
		<th>Tanggal mulai</th>
		<th>Tanggal selesai</th>
		<th>Keterangan</th>
		<th>Sub Keterangan</th>
		<th>Nomor Surat</th>
		<th>Keterangan</th>
		<th>Tanggal</th>
		<th>Aksi</th>
	</thead>
	<tbody>
		<?php
			$no=1;
			foreach($data as $data){
		?>
		<tr>
		<td><?php echo $no++; ?></td>
		<td><?php echo $data['nip']; ?></td>
		<td><?php echo $data['nama']; ?></td>
		<td><?php echo $data['tanggal_mulai']?></td>
		<td><?php echo $data['tanggal_selesai']; ?></td>
		<td><?php echo $data['nama_ket']?></td>
		<td><?php echo $data['nama_sub']; ?></td>
		<td><?php echo $data['nomor_surat']?></td>
		<td><?php echo $data['keterangan']; ?></td>
		<td><?php echo $data['tanggal']?></td>
		<td>
		<a 
			href="javascript:;"
			data-id="<?php echo $data['id_kehadiran'] ?>"
			data-nip="<?php echo $data['nip'] ?>"
			data-nama="<?php echo $data['nama'] ?>"
			data-mulai="<?php echo $data['tanggal_mulai'] ?>"
			data-selesai="<?php echo $data['tanggal_selesai'] ?>"
			data-ket="<?php echo $data['nama_ket'] ?>"
			data-sub="<?php echo $data['nama_sub'] ?>"
			data-nomor="<?php echo $data['nomor_surat'] ?>"
			data-keterangan="<?php echo $data['keterangan'] ?>"
			data-tanggal="<?php echo $data['tanggal'] ?>"
			data-toggle="modal" data-target="#edit-data">
            <button class="btn btn-info tooltips" data-original-title="Ubah Data" data-toggle="tooltip" data-placement="top" title="">
            <i class="fa fa-pencil"></i>
            </button>
		</a> 
		<a type="button" class="btn btn-danger tooltips" data-original-title="Hapus Data" data-toggle="tooltip" data-placement="top" title="" href="<?php echo base_url().'Homepage/hapus/'.$data['id_kehadiran'];?>" onclick="return confirm('Apakah anda yakin akan menghapus ini?')"><i class="fa fa-times"></i></a>
		</td>
		</tr>
		<?php } ?>
	</tbody>
</table>
</div>

</div>

<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="edit-data" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title">Ubah Data</h4>
            </div>
                <form id="myForm" action="<?=base_url()."Homepage/ubah/"?>" method="post" enctype="multipart/form-data" novalidate="novalidate" role="form">
                    <div class="modal-body">
                        <table width='100%' border='0' cellpadding='2' cellspacing='0'>
                       <tr>
                            <td>NIP</td>
                            <td>
                                <div class="form-group">
                                    
                                    <input name="nip1" id="nip1" type="text" class="form-control" readonly="" />
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Nama</td>
                            <td>
                                <div class="form-group">
                                    
                                    <input name="nama1" id="nama1" type="text" class="form-control" readonly="" />
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Tanggal Mulai</td>
                            <td>
                                <div class="form-group">
                                    
                                    <input name="tanggal_mulai1" id="tanggal_mulai1" type="text" class="form-control" readonly="" />
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Tanggal Selesai</td>
                            <td>
                                <div class="form-group">
                                    
                                    <input name="tanggal_selesai1" id="tanggal_selesai1" type="text" class="form-control" readonly="" />
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Keterangan</td>
                            <td>
                                <div class="form-group">                                    
                                    <select name="id_ket1" id="id_ket1" class="form-control keterangan">
                                        <option value="">--Select--</option>
                                    </select>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Sub Keterangan</td>
                            <td>
                                <div class="form-group">                                    
                                    <select name="id_sub1" id="id_sub1" class="form-control id_sub">
                                         <option value="">--Select--</option>
                                    </select>
                                </div>
                            </td>
                        </tr>
                       
                        <tr>
                            <td>Nomor SUrat</td>
                            <td>
                                <div class="form-group">
                                    
                                    <input name="nomor1" id="nomor1" type="text" class="form-control" readonly="" />
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Keterangan</td>
                            <td>
                                <div class="form-group">
                                    
                                    <input name="keterangan1" id="keterangan1" type="text" class="form-control" readonly="" />
                                </div>
                            </td>
                        </tr>
                        </table>
                    </div>
                    <div class="modal-footer">
                      <button class="btn btn-info" value="Tambah Data" type="submit"><i class="fa fa-pencil fa-fw"></i> Ubah&nbsp;</button>
                    <button class="btn btn-primary" type="button" onclick="myFunction()"><i class="fa fa-refresh fa-fw"></i> Reset</button>
                    </div>
                </form>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        // Untuk sunting
        $('#edit-data').on('show.bs.modal', function (event) {
            var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan

            var id  = div.data('id');
            var nip  = div.data('nip');
            var nama        = div.data('nama');
            var mulai           = div.data('mulai');
            var selesai            = div.data('selesai');
            var ket        = div.data('ket');
            var sub       = div.data('sub');
            var nomor         = div.data('nomor');
            var keterangan       = div.data('keterangan');
            var nomor         = div.data('nomor');

            var modal        = $(this)

            // Isi nilai pada field
            modal.find('#nip1').attr("value",nip);
            modal.find('#nama1').attr("value",nama);
            modal.find('#tanggal_mulai1').attr("value",mulai);
            modal.find('#tanggal_selesai1').attr("value",selesai);
             modal.find('# option').each(function(){
                if ($(this).val() == div.data('id_ket1'))
                    $(this).attr("selected","selected");
            });
              modal.find('# option').each(function(){
                if ($(this).val() == div.data('id_sub1'))
                    $(this).attr("selected","selected");
            });
            modal.find('#nomor1').attr("value",nomor);
            modal.find('#keterangan1').attr("value",keterangan);
           modal.find('#nomor_surat1').attr("value",nomor);
        });


        $.ajax({
            type: "GET",
            url: "<?php echo base_url();?>Homepage/get_keterangan",
            data:{id:$(this).val()}, 
            beforeSend :function(){
                $('.keterangan').find("option:eq(0)").html("Please wait..");
            },                         
            success: function (data) {
                /*get response as json */
                $('.keterangan').find("option:eq(0)").html("Pilih keterangan");
                var obj=jQuery.parseJSON(data);
                $(obj).each(function(){
                    var option = $('<option />');
                    option.attr('value', this.value).text(this.label);           
                    $('.keterangan').append(option);
                });            
            }
        });
    });     
</script>
<script type="text/javascript">
function myFunction() {
    document.getElementById("myForm").reset();
}

        $('.keterangan').change(function(){
            // $('.jam_awal').attr('value','');
            // $('.jam_akhir').attr('value','');
            $.ajax({
                type: "POST",
                url: "<?php echo base_url();?>Homepage/get_sub",
                data:{id:$(this).val()}, 
                beforeSend :function(){
                    $(".id_sub option:gt(0)").remove(); 
                    // $(".cities option:gt(0)").remove(); 
                    $('.id_sub').find("option:eq(0)").html("Please wait..");
                },                         
                success: function (data) {
                    /*get response as json */
                    $('.id_sub').find("option:eq(0)").html("Pilih Sub keterangan");
                    var obj=jQuery.parseJSON(data);
                    $(obj).each(function(){
                        var option = $('<option />');
                        option.attr('value', this.value).text(this.label);           
                        $('.id_sub').append(option);
                    });
                }
            });
        });

        $('.id_sub').change(function(){
            // $('.jam_awal').attr('value','');
            // $('.jam_akhir').attr('value','');
            $.ajax({
                type: "POST",
                url: "<?php echo base_url();?>Homepage/get_sub",
                data:{id:$(this).val()},                        
                success: function (data) {
                    /*get response as json */
                    var obj=jQuery.parseJSON(data);
                    $(obj).each(function(){
                        $('#id_sub').attr('value',this.sks);
                    });
                }
            });
        });

        $('#nip').keyup(function(){
            var nip = $("#nip").val();
            $.ajax({
                type: "POST",
                url: "<?php echo base_url();?>Homepage/namapegawai",
                data:{"id":$(this).val(),"nip":nip},
                success: function (data1) {
                    /*get response as json */
                    var obj=jQuery.parseJSON(data1);
                    $(obj).each(function(){
                        $('#nama').attr('value',this.jam_akhir);
                    });
                }
            });
        });
</script>