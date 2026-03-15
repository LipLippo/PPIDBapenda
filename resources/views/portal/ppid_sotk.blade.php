<ul class="metisFolder">
    <?php $rs = DB::table('ppid_sotk')->where('parent', '')->where('flag', '1')->get();?>
    @foreach($rs as $item)
        @if(count($rs) > 0)
            <li class="active">
                <a href="#"><span class="fa fa-plus-square fa-fw"></span> <b>{{$item->jabatan_singkat}}</b></a> <small data-toggle="modal" onclick="getModal('{{$item->id}}');">detail</small>
                <?php $rs = DB::table('ppid_sotk')->where('parent', $item->id)->where('flag', '1')->get();?>
                @foreach($rs as $item)
                    @if(count($rs) > 0)
                        <ul>
                            <li class="active">
                                <a href="#"><span class="fa fa-plus-square fa-fw"></span> <b>{{$item->jabatan_singkat}}</b></a> <small data-toggle="modal" onclick="getModal('{{$item->id}}');">detail</small>
                                <?php $rs = DB::table('ppid_sotk')->where('parent', $item->id)->where('flag', '1')->get();?>
                                @foreach($rs as $item)
                                    @if(count($rs) > 0)
                                        <ul>
                                            <li class="active">
                                                <a href="#"><span class="fa fa-plus-square fa-fw"></span> <b>{{$item->jabatan_singkat}}</b></a> <small data-toggle="modal" onclick="getModal('{{$item->id}}');">detail</small>
                                                <?php $rs = DB::table('ppid_sotk')->where('parent', $item->id)->where('flag', '1')->get();?>
                                                @foreach($rs as $item)
                                                    @if(count($rs) > 0)
                                                        <ul>
                                                            <li><a href="#"> {{$item->jabatan_singkat}}</a> <small data-toggle="modal" onclick="getModal('{{$item->id}}');">detail</small></li>
                                                        </ul>
                                                    @endif
                                                @endforeach
                                            </li>
                                        </ul>
                                    @endif
                                @endforeach
                            </li>
                        </ul>
                    @endif
                @endforeach
            </li>
        @endif
    @endforeach
</ul>

<script type="text/javascript">
    function claravel_modal_close(elemen){
        $('#' + elemen + '').modal('hide');
        $('body').removeClass('modal-open');
        $('.modal-backdrop').remove();
    }

    function claravel_modal(judul,isi,elemen){
        elemen = (elemen == '')?'modal2':elemen;
        $('#' + elemen + '').modal({ keyboard: true });
        $('#' + elemen + ' .modal-title').html(judul);
        $('#' + elemen + ' .modal-body').html(isi);
    }

    function getModal(id){
        claravel_modal('Detail Pejabat PPID','Loading...','main_modal');
        $.ajax({
            type:'post',
            url : '{{url('')}}/profilpejabatppid',
            data: {'id': id, '_token' : '{{csrf_token()}}'},
            success:function(html){
                $('#main_modal .modal-body').html(html);
            }
        });
    };
</script>

