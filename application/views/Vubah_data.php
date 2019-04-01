<?php echo form_open_multipart('Homepage/ubah');?>
<div class="container">
 
</div>

<td>NIP :<br />
<div class="form-group"><input type="text" class="form-control" name="nip1" id="nip1" placeholder="INPUT NIP (NUMBER 18 DIGIT)" required/></div><br><br>
<td>Nama :<br />
<div class="form-group"><input type="text" class="form-control" name="nama1" id="nama1" placeholder="Nama pegawai" /></div><br><br>
<td>Tanggal mulai :<br />
<div class="form-group"><input type="date" class="form-control" name="tanggal_mulai1" id="tanggal_mulai1"  /></div><br><br>
<td>Tanggal selesai :<br />
<div class="form-group"><input type="date" class="form-control" name="tanggal_selesai" id="tanggal_Selesai1" /></div><br><br>
<td>Keterangan :<br />
<div class="form-group"><select name="id_ket" class="form-control keterangan">
                                        <option value="">--Select--</option>
                                    </select></div><br><br>
<td>Sub Keterangan :<br />
 <div class="form-group"><select name="id_sub" class="form-control id_sub">
                                         <option value="">--Select--</option>
                                    </select></div><br><br>
<td>Nomor surat :<br />
<div class="form-group"><input type="text" class="form-control" name="nomor_surat1" id="nomor_surat1" placeholder="Nomor surat cuti/tugas/belajar"/></div><br><br>
<td>Keterangan :<br />
<div class="form-group"><textarea type="text-area" class="form-control" name="keterangan1" id=:"keterangan1" placeholder="Keterangan"/></textarea></div><br><br>
<button type="submit" class="btn btn-primary">Ubah
</button>

<?php echo form_close();?>
<script>
    $(document).ready(function() {
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