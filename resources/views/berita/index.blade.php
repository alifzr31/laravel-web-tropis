<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data beritas - SantriKoding.com</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
</head>
<body style="background: lightgray">

    <div class="container mt-5">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                        <b>Berita</b>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a href="{{ route('berita.create') }}" class="dropdown-item">Tambah Berita</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/gambar">Galeri</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Kontak</a>
                </li>
            </ul>
            <ul class="nav navbar-nav">
                <strong>
                <li class="nav-item">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                        <i class="bi bi-person-fill"></i> Sign Up
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="margin-left: 957px;">
                        <a href="{{ route('berita.create') }}" class="dropdown-item">
                            <i class="bi bi-box-arrow-left"></i> Logout
                        </a>
                    </div>
                </li>
                </strong>
            </ul>
        </nav>
        <br/>
        <div class="row">
            <div class="col-md-12">
                <div class="container"style="margin-top: 50px;">
                    <div class="container" style="margin-top: 50px;">
                        <div class="row" style="margin-top: 50px;">
                        @forelse ($beritas as $berita)
                            <div class="col" style="padding: 25px; margin-left:40px;">
                                <div class="card" style="width: 21rem;">
                                <img src="{{ Storage::url('app/public/beritas/latar.png') }}" alt="">
                                <img src="{{ Storage::url('public/beritas/').$berita->gambar }}" class="card-img-top" alt="..." style="width: 335px;">
                                <div class="card-body">
                                    <p style="text-align: center; font-family: Poppins-semibold;">{{ $berita->judul }}</p>
                                    <p style="text-align: center; font-family: Poppins-regular; color: grey;">{{ $berita->short_desc }}</p>
                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('berita.destroy', $berita->id) }}" method="POST">
                                            <a href="{{ route('berita.edit', $berita->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                        </form>
                                </div>
                                </div>
                            </div>
                        @empty
                            <div class="alert alert-danger">
                                Data berita belum Tersedia.
                            </div>
                        @endforelse  
                        {{ $beritas->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div style="background-color: black; height: 400px;">
    <div class="container" style="margin-top: 75px;">
        <div class="row">
        <div class="col-5 text-white" style="margin-top: 75px;">
            <h3 style="font-family: Poppins-semibold;">Tropisianimal</h3>
            <p style="margin-top: 20px;" style="font-family: Poppins-regular;">Lorem ipsum dolor sit amet<br>consectetur adipisicing elit. Sed<br>tempora reprehenderit cum, nemo<br>voluptates pariatur in aliquam</p>
            <img src="x1/fb.png" alt="">
            <img src="x1/twiter.png" alt="">
        </div>
        <div class="col-2 text-white" style="margin-top: 75px;">
            <h5 style="font-family: Poppins-semibold;">Usefull links</h5>
            <h6 style="margin-top: 20px;" style="font-family: Poppins-regular;">Blog</h6>
            <h6 style="font-family: Poppins-regular;">Hewan</h6>
            <h6 style="font-family: Poppins-regular;">Galeri</h6>
            <h6 style="font-family: Poppins-regular;">Testimonial</h6>
        </div>
        <div class="col-2 text-white" style="margin-top: 75px;">
            <h5 style="font-family: Poppins-semibold;">Privacy</h5>
            <h6 style="margin-top: 20px;" style="font-family: Poppins-regular;">Karir</h6>
            <h6 style="font-family: Poppins-regular;">Tentang Kami</h6>
            <h6 style="font-family: Poppins-regular;">Kontak Kami</h6>
            <h6 style="font-family: Poppins-regular;">Servis</h6>
        </div>
        <div class="col-3 text-white image-white" style="margin-top: 75px;">
            <h5 style="font-family: Poppins-semibold;">Contact Info</h5>
            <h6 style="margin-top: 20px; font-family: Poppins-regular;"><i class="bi bi-envelope-fill"></i> tropisianimal@gmail.com</h6>
            <h6 style="margin-top: 20px; font-family: Poppins-regular;"><i class="bi bi-telephone"></i> +62 812 3456 7890</h6>
            <h6 style="margin-top: 20px; font-family: Poppins-regular;"><i class="bi bi-geo-alt"></i> Kota Bandung,Jawa Barat</h6>
        </div>
        </div>
    </div>
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

</body>
</html>