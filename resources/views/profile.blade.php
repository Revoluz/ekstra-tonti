@extends('layout.mainlayout')
@section('title', 'Profil')
    
@section('head')
            <link rel="stylesheet" href="{{ URL::asset('css/profile.css') }}" />
    
@endsection
@section('judul')
          <div class="judul">
        <h2>PROFILE EKSTRAKULIKULER</h2>
        <div class="row justify-content-center w-100 flex-column align-items-center">
          <div class="col-6">
            <hr />
          </div>
          <div class="col-4"><hr /></div>
        </div>
      </div>
@endsection
@section('content')
      <div class="content">
      <div class="container-fluid">
        <div class="container">
          <div class="sambutan-kepsek">
            <div class="row">
              <div class="col-lg-7 offset-lg-1">
                <h3>Sambutan kepala sekolah</h3>
                <hr />
                <p>
                  Selamat datang di web SMK Negeri 1 Bantul dengan motto My School Zero Waste Green Is Life. Sekolah
                  Saya Indah, Tidak Ada Sampah, Suasana Hijau, Segar Adalah Kehidupanku. Silahkan kunjungi web kami.
                  Percayakan siswa siswi, putra putri bapak ibu untuk sekolah di SMK Negeri 1 Bantul. Kami siap untuk
                  mengemban amanah dari masyarakat, mengantarkan siswa siswi kami menjadi orang yang sukses di masa
                  depan. SMK BISA, SMK HEBAT, SMK BISA HEBAT, SMK Negeri 1 Bantul siap untuk mengantarkan putra putri
                  Anda di jenjang kesuksesan.
                </p>
              </div>
              <div class="col-lg-3 offset-lg-1 snapshot">
                <div class="container-fluid kepsek">
                  <img src="resources/img/Pengurus-dt/Ardika.jpg" alt="" />
                  <h4>nama</h4>
                  <p>jabatan</p>
                </div>
              </div>
            </div>
          </div>
          <div class="profil-ekstra">
            <div class="row">
              <div class="col-lg-7 offset-lg-1">
                <h3>Profile dan pembimbing ekstra tonti</h3>
                <hr />
                <p>
                  Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam qui vel nobis ad. Ab fugiat
                  aspernatur, ullam eum repudiandae provident porro impedit ipsam a doloremque et qui minus amet id!
                  Ipsum, fugit eligendi, eius neque debitis, totam ratione explicabo natus sed libero molestiae
                  inventore praesentium delectus dolorem reprehenderit quod veniam earum amet vero dignissimos? Aliquid,
                  placeat consequuntur. Hic, non aliquam. Aliquam, quibusdam ipsa. Enim, labore corporis iure tenetur
                  voluptate, pariatur qui saepe maxime error vel rem ut illo consequuntur commodi aperiam cum deserunt
                  quam praesentium temporibus quae et nulla molestias.
                </p>
              </div>
              <div class="col-lg-3 offset-lg-1 snapshot col-sm-12">
                <div class="container-fluid pembimbing">
                  <img src="resources/img/pakWidodo.jpg" alt="" />
                  <h4>nama</h4>
                  <p>jabatan</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
@endsection