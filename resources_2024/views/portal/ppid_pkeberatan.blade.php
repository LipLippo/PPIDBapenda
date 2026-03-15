
{{View::make('portal.ppid_header',array('judul'=> 'Pengajuan Keberatan','type' => 'pages'))}}
<script src='https://www.google.com/recaptcha/api.js?hl=id'></script>

<br>
<div class="container">
    <div class="row">
        <div class="col-xs-12">                        
            <ul vocab="http://schema.org/" typeof="BreadcrumbList" class="breadcrumb" id="bc1">
                <li property="itemListElement" typeof="ListItem" >
                    <a property="item" typeof="WebPage" href="{{url('')}}">
                        <span property="name">Beranda</span></a>
                    <span property="position" content="1"></span>
                </li>
                <li property="itemListElement" typeof="ListItem">
                    <a property="item" typeof="WebPage" href="{{url('')}}/pengajuan_informasi">
                        <span property="name">Pegajuan Informasi</span></a>
                    <span property="position" content="2"></span>
                </li>
            </ul>
        </div>

        <div class="col-xs-12">
            <div class="artikel-items detail">

                <h1 class="artikel-judul detail">Pengajuan Keberatan</h1>

                <div class="artikel-isi">

                    <p>Sampaikan permohonan Keberatan kepada DPMPTSP terkait mekanisme maupun pelayanan dengan mengisi formulir di bawah ini.</p>
                    <form method="POST" action="{{url('')}}/kirim-peromohonan-keberatan" accept-charset="UTF-8" id="kirim-keberatan">
                        <div class="form-group">
                            {{ Form::label('nama', 'Nama Lengkap:', array('class' => 'control-label')) }}
                            {{ Form::text('nama', null, array('class'=> 'form-control validate[required]', 'placeholder'=>'Nama Lengkap')) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('alamat', 'Alamat:', array('class' => 'control-label')) }}
                            <textarea name="alamat" id="alamat" cols="30" rows="3" class="form-control validate[required]" placeholder="Alamat Permohonan Informasi"></textarea>
                        </div>
                        <div class="form-group">
                            {{ Form::label('telp', 'Telepon :', array('class' => 'control-label')) }}
                            {{ Form::text('telp', null, array('class'=> 'form-control validate[required]', 'placeholder'=>'Telepon')) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('email', 'Email:', array('class' => 'control-label')) }}
                            {{ Form::text('email', null, array('class'=> 'form-control validate[required]', 'placeholder'=>'Email')) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('deskripsi', 'Deskripsi Keberatan:', array('class' => 'control-label')) }}
                            <textarea name="deskripsi" id="deskripsi" cols="30" rows="5" class="form-control validate[required]" placeholder="Deskripsi Keberatan"></textarea>
                        </div>
                        <div class="form-group">
                            {{ Form::label('tanggal', 'Tanggal Deskripsi:', array('class' => 'control-label')) }}
                            {{ Form::text('tanggal', null, array('class'=> 'form-control validate[required] date', 'placeholder'=>'dd-mm-yyyy')) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('keberatan_1', 'Alasan Keberatan:', array('class' => 'control-label')) }}
                            <br><input type="checkbox" name="keberatan_1" value="1"> Permohonan Informasi ditolak
                            <br><input type="checkbox" name="keberatan_2" value="1"> Informasi berkala tidak disediakan
                            <br><input type="checkbox" name="keberatan_3" value="1"> Permintaan informasi tidak ditanggapi
                            <br><input type="checkbox" name="keberatan_4" value="1"> permintaan informasi ditanggapi tidak sebagaimana yang diminta
                            <br><input type="checkbox" name="keberatan_5" value="1"> Biaya yang dikenakan tidak wajar
                            <br><input type="checkbox" name="keberatan_6" value="1"> Informasi disampaikan melebihi jangka waktu yang diberikan
                        </div>
                        <div class="form-group">
                            {{ Form::label('masterky', 'Kode Keamanan:', array('class' => 'control-label')) }}<br>
                            <div class="g-recaptcha" data-sitekey="6LfuQCgUAAAAAMsTCu4NSp43Sdv-m4LWV5CHW0TP" id="rc-imageselect" style="transform:scale(0.72);-webkit-transform:scale(0.77);transform-origin:0 0;-webkit-transform-origin:0 0;"></div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success"><i class="fa fa-fw fa-paper-plane-o"></i> Kirim</button>
                            <button type="reset" class="btn btn-default"><i class="fa fa-fw fa-refresh"></i> Batal</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>

        <!-- <div class="col-xs-12 col-sm-4 col-md-4 col-lg-3">
            <div class="panel panel-danger">
                <div class="panel-heading">
                    <h3 class="panel-title">PPID</h3>
                </div>
                <div class="list-group">                
                    {{showmenu(0)}}
                </div>
            </div>
            <div id="grafik-permohonan">
                Grafik Permohonan
            </div>
        </div> -->
    </div>
</div>

{{View::make('portal.ppid_footer')}}

<link rel="stylesheet" type="text/css" href="{{asset('/packages/tugumuda/claravel/assets_min/css/validation/validationEngine.jquery.css')}}" media="all">
<script type="text/javascript" src="{{asset('/packages/tugumuda/claravel/assets_min/js/validation/jquery.validationEngine-id.js')}}"></script>
<script type="text/javascript" src="{{asset('/packages/tugumuda/claravel/assets_min/js/validation/jquery.validationEngine.js')}}"></script>
<script type="text/javascript" src="{{asset('/packages/tugumuda/claravel/assets/plugins/bootbox/bootbox.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/packages/tugumuda/claravel/assets/plugins/mask/jquery.maskedinput.js')}}"></script>

<script type="text/javascript">
    $(document).ready(function(){
        $(".date").mask("99-99-9999");

        $('#kirim-keberatan').on('submit',function(e){
            var $this = $(this);
            var formData = new FormData(this);
            e.preventDefault();
            if($this.validationEngine('validate')){
                bootbox.confirm('<b>Perhatian</b>, Pengajuan Keberatan anda akan ditanggapi oleh admin melaui email / telepon. Lanjutkan kirim Pengajuan Keberatan ?',function(a){
                    if (a == true){
                        $.ajax({
                            type:'POST',
                            url: $this.attr('action'),
                            data:formData,
                            cache:false,
                            contentType: false,
                            processData: false,
                            beforeSend: function(){
                                /*$('#loading-state').fadeIn("slow");*/
                            },
                            success:function(response){
                                /*$('#loading-state').fadeOut("slow");*/
                                if(response=='1'){
                                    bootbox.alert('<b>Terimakasih</b>, Pengajuan Keberatan anda berhasil terkirim.');
                                    $('#kirim-keberatan').trigger('reset');
                                }else{
                                    bootbox.alert(response)
                                }
                            }
                        });
                    }
                });
            }
        });
    })
</script>