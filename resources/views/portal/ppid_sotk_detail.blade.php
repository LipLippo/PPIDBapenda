
    <div class="twPc-div">
        <div class="twPc-bg twPc-block"></div>
        <div class="clearfix">
            @if(count($sotk) > 0)
            <?php
                if($sotk->photo != ''){
                    if(file_exists('./packages/upload/pejabat/'.$sotk->photo)){
                        $img = url('').'/packages/upload/pejabat/'.$sotk->photo;
                    }else{
                        $img = url('').'/packages/upload/pejabat/default.jpg';
                    }
                }else{
                    $img = url('').'/packages/upload/sejarah/default.jpg';
                }

                $jabatan = getUtility('ppid_sotk', 'id', $sotk->idjab, 'jabatan');
                $pangkat = getUtility('a_golruang', 'idgolru', $sotk->idgol, 'pangkat');
                $golongan = getUtility('a_golruang', 'idgolru', $sotk->idgol, 'golru');
            ?>
            <div class="col-sm-4">
                <figure class="twPc-avatarLink">
                    <img alt="{{$jabatan}}" src="{{$img}}" class="twPc-avatarImg">
                </figure>
            </div>
            <div class="col-sm-8">
                <div class="twPc-divUser">
                    <div class="twPc-divName">
                        {{$sotk->nama}}
                    </div>
                    <table class="table table-condensed">
                        <tbody>
                        <tr>
                            <td><b>NIP</b></td>
                            <td>{{$sotk->nip}}</td>
                        </tr>
                        <tr>
                            <td><b>Jabatan</b></td>
                            <td>{{$jabatan}}</td>
                        </tr>
                        <tr>
                            <td><b>Pangkat</b></td>
                            <td>{{$pangkat." (".$golongan.")"}}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            @else
                <div align="center">Data Jabatan Kosong</div>
            @endif
        </div>
    </div>
