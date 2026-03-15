
{{View::make('portal.ppid_header',array('judul'=> 'Pengajuan Informasi','type' => 'pages'))}}
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

        <!-- <div class="col-xs-12 col-sm-8 col-md-8 col-lg-9"> -->
        <div class="col-xs-12">
            <div class="artikel-items detail">

                <h1 class="artikel-judul detail">Pengajuan Informasi</h1>

                <div class="artikel-isi">

                    <p>Sampaikan permohonan informasi kepada DPMPTSP dengan mengisi formulir di bawah ini.</p>
                    <form method="POST" action="{{url('')}}/kirim-peromohonan-informasi" accept-charset="UTF-8" id="kirim-permohonan">
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
                            {{ Form::label('informasi', 'Peromohonan Informasi:', array('class' => 'control-label')) }}
                            <textarea name="informasi" id="informasi" cols="30" rows="5" class="form-control validate[required]" placeholder="Permohonan Informasi"></textarea>
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

<script type="text/javascript">
    $(document).ready(function(){
        $('#kirim-permohonan').on('submit',function(e){
            var $this = $(this);
            var formData = new FormData(this);
            e.preventDefault();
            if($this.validationEngine('validate')){
                bootbox.confirm('<b>Perhatian</b>, Permohonan Informasi anda akan ditanggapi oleh admin melaui email / telepon. Lanjutkan kirim Permohonan Informasi ?',function(a){
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
                                    bootbox.alert('<b>Terimakasih</b>, Permohonan informasi anda berhasil terkirim.');
                                    $('#kirim-permohonan').trigger('reset');
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