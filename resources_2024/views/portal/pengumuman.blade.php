
<?php $rs = \DB::table('pengumuman')->where('flag', 1)->orderBy('order', 'asc')->get(); ?>
@if(count($rs) > 0)
    @foreach($rs as $item)
        {{$item->pengumuman}} <br>
    @endforeach
@endif

