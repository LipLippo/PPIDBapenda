<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
    <div class="panel panel-warning">
        <div class="panel-heading">
            <h3 class="panel-title">Berita Terbaru</h3>
        </div>
        <div class="list-group">
            <?php $konten = get_posts_by_cat('Berita', 5, 'tgl_publish', 'desc'); ?>
            @foreach($konten as $p)
            <a href="{{url()}}/p/{{$p->id}}/{{$p->url}}" class="list-group-item">
                <h4 class="list-group-item-heading">{{$p->titel}}</h4>
            </a>
            @endforeach            
        </div>
    </div>
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">Berita Populer</h3>
        </div>
        <div class="list-group">
            <?php $konten = get_posts_by_cat('Berita', 5, 'hits', 'desc'); ?>
            @foreach($konten as $p)
            <a href="{{url()}}/p/{{$p->id}}/{{$p->url}}" class="list-group-item">
                <h4 class="list-group-item-heading">{{$p->titel}}</h4>
            </a>
            @endforeach            
        </div>
    </div>
</div>