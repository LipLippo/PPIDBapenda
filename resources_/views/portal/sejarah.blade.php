<div class="row">
    <div id="timeline">
        <?php $rs = DB::table('sotk_sejarah')->where('flag', '1')->orderBy('id', 'DESC')->get(); ?>
        <ul id="issues">
            @foreach($rs as $item)
            <li id="{{$item->tahun_awal}}">
                <?php
                    if($item->photo != ''){
                        if(file_exists('./packages/upload/sejarah/'.$item->photo)){
                            $img = url('').'/packages/upload/sejarah/'.$item->photo;
                        }else{
                            $img = url('').'/packages/upload/sejarah/default.jpg';
                        }
                    }else{
                        $img = url('').'/packages/upload/sejarah/default.jpg';
                    }
                ?>
                <!-- <img src="{{$img}}" width="180" height="auto"/>
                <h1>{{$item->nama}}</h1> -->
                
                    <div class="col-9" style="margin: auto;">
                        <div class="thumbnail" style="box-shadow: 10px 10px 8px #888888;">
                            <div class="row">
                                <div class="col-4 m-2" style="">
                                    <img src="{{$img}}" width="180" height="250"/>
                                </div>
                                <div class="col-6" style="margin-top: 25px; margin-left: 50px;">
                                    <h3 style="color: #d2151e;">{{$item->tahun_awal}} - {{$item->tahun_akhir}}</h3>
                                    <h1>{{$item->nama}}</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                
            </li>
            @endforeach
        </ul>
         <ul id="dates">

            @foreach($rs as $item)
            <li><a href="#{{$item->tahun_awal}}">{{$item->tahun_awal}}</a></li>
            @endforeach
        </ul>

        <a href="#" id="prev"><i class="fa fa-fw fa-lg fa-chevron-left"></i></a>
        <a href="#" id="next"><i class="fa fa-fw fa-lg fa-chevron-right"></i></a>
    </div>
</div>