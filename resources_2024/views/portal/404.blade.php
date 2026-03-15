
{{View::make('portal.header',array('judul'=> '404 Not Found','type' => 'pages'))}}

<main>
    <div class="container">
        <div class="row">
          <div class="col-md-12">
            <!-- Breadcrumbs SEO Optimized, tanya wiguna untuk mengaplikasikan -->
            <ol vocab="http://schema.org/" typeof="BreadcrumbList" class="breadcrumb">
              <li property="itemListElement" typeof="ListItem">
                <a property="item" typeof="WebPage" href="{{url()}}">
                <span property="name">Home</span></a>
                <span property="position" content="1">&gt;</span>
              </li>
              <li property="itemListElement" typeof="ListItem">
                <a property="item" typeof="WebPage" href="{{url()}}">
                <span property="name">404 Not Found</span></a>
                <span property="position" content="2"></span>
              </li>
            </ol>
          </div>
        </div>
        <div class="row">
          <div class="col-md-8">
            <section class="daftar-artikel">
              <h1>404 Not Found</h1>
              <hr>
              <article class="row">
                <div class="col-md-8">
                  <!--<h1 class="judul-artikel">404 Not Found</h1>-->
                  <p>Mohon maaf, Halaman tidak ditemukan.</p>
                  <a href="{{url()}}" class="btn btn-default">Kembali ke Home</a>
                </div>
              </article>
            </section>

          </div>
          <div class="col-md-4">
            {{View::make('portal.sidebar')}}
          </div>
        </div>

      </div><!-- /.container -->
</main>

{{View::make('portal.footer')}}