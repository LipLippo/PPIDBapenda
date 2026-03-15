{{View::make('portal.ppid_header',array('judul'=> 'Status Permohonan','type' => 'pages'))}}

<script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script>
<br>
<div class="container" style="margin-top:30px">
    <div class="row">
        <div class="col-xs-12">                        
            <ul vocab="http://schema.org/" typeof="BreadcrumbList" class="breadcrumb" id="bc1">
                <li property="itemListElement" typeof="ListItem" >
                    <a property="item" typeof="WebPage" href="{{url('ppid')}}">
                        <span property="name">Beranda</span></a>
                    <span property="position" content="1"></span>
                </li>
                <li class="active">Status Permohonan</li>
            </ul>
        </div>
        <div class="col-xs-12">
            <div class="artikel-items detail">
              <h1 class="artikel-judul detail">Status Permohonan</h1>
              <table class="table table-bordered table-stripped">
                  <thead>
                      <tr>
                          <th>No</th>
                          <th>Tanggal</th>
                          <th>Nama Pemohon</th>
                          <th>Informasi Yang Dibutuhkan</th>
                          <th>Status</th>
                          <th>Keterangan</th>
                      </tr>
                  </thead>
                  <tbody>
                        @forelse(\DB::table('ppid_permohonan_informasi')->orderBy('tanggal')->where('publish', 1)->get() as $informasi)
                            @php
                            
                                $dt = new \DateTime($informasi->tanggal);
                                $dta = $dt->format("d-m-Y H:i:s");
                                
                            @endphp
                            <!---->
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td class="text-center">{{ $dta }}</td>
                                <td>{{ $informasi->nama }}</td>
                                <td>{{ $informasi->informasi }}</td>
                                <td class="text-center">
                                    @if($informasi->status == 1)
                                        <span class="badge bg-warning">DITERIMA</span>
                                    @elseif($informasi->status == 2)
                                        <span class="badge bg-info">DIPROSES</span>
                                    @elseif($informasi->status == 3)
                                        <span class="badge bg-success">SELESAI</span>
                                    @elseif($informasi->status == 4)
                                        <span class="badge bg-danger">DITOLAK</span>
                                    @endif
                                </td>
                                <td>{{ (!empty($informasi->keterangan)) ? $informasi->keterangan : '-' }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td class="text-center" colspan="6">Belum ada data</td>
                            </tr>
                        @endforelse
                  </tbody>
              </table>
            </div>
        </div>
    <!---->
    </div>
</div>
{{View::make('portal.ppid_footer')}}