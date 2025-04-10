@extends('layouts.navbar')

@section('title')
    Perfil
@endsection

@section('contenido')
    <div class="container">

        <div class="banner">
            <img class="bannerPic" src="{{asset('images/imagenes_perfil/bannerMusico2.jpg')}}" alt="foto del banner">
            <div class="bannerContent">
                <div class="profilePicDivBg m-5 rounded-circle">
                    <div class="profilePicDiv rounded-circle">
                        <img class="profilePic" src="{{asset('images/imagenes_perfil/musico.jpg')}}" alt="foto de perfil">
                    </div>
                </div>
                <div class="bannerText ms-2">
                    <h1>Pepita García Muñoz</h1>
                    <h4 class="mb-0">Cantante - Guitarrista</h4>
                    <h4>Carrer d'Aragó</h4>
                </div>
            </div>
        </div>

        <p class="mt-4 mb-4">Cantante de pop con una voz cautivadora y un estilo único que transmite emoción en cada nota.</p>
        <div class="tagRow">
            <div class="badge text-bg-danger rounded-pill p-2 px-3 mx-1">Cantante</div>
            <div class="badge text-bg-danger rounded-pill p-2 px-3 mx-1">Guitarrista</div>
        </div>

        <h5 class="mt-5 redText">Teléfono</h5>
        <h6>+34 634 50 50 50</h6>

        <h5 class="mt-5 redText">Canciones</h5>
        <div class="musicDiv">
            <div class="musicPlayer rounded-pill">
                <div class="songTitle">
                    <p>Canción tal tal</p>
                </div>
                <audio controls>
                    <source src="{{asset('audio/purr.mp3')}}" type="audio/mpeg">
                  Your browser does not support the audio element.
                </audio>
            </div>
            <div class="musicPlayer rounded-pill">
                <div class="songTitle">
                    <p>Canción tal tal</p>
                </div>
                <audio controls>
                    <source src="{{asset('audio/purr.mp3')}}" type="audio/mpeg">
                  Your browser does not support the audio element.
                </audio>
            </div>
        </div>


        <h5 class="mt-5 redText">Galería</h5>

        {{-- GALLERY -------------------------------------------------------------------------------------}}
        {{-- Referencia: https://codepen.io/TheMOZZARELLA/pen/oNpMxyy --}}

        <div id="mz-gallery-container">

            <div id="mz-gallery">

              <figure>
                <img src="{{asset('images/img_ejemplo/1.jpg')}}" alt="Statue of Liberty" width="700" height="700" alt="adasdasd">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
              </figure>

              <figure>
                <img src="{{asset('images/img_ejemplo/2.jpg')}}" alt="Night Sky" width="700" height="700"  alt="adasdasd">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
              </figure>

              <figure>
                <img src="{{asset('images/img_ejemplo/3.jpg')}}" alt="Ravine Between Rocks" width="700" height="700"  alt="adasdasd">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
              </figure>

              <figure>
                <img src="{{asset('images/img_ejemplo/4.jpg')}}" alt="Wheat Farm" width="700" height="700"  alt="adasdasd">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
              </figure>

              <figure>
                <img src="{{asset('images/img_ejemplo/5.jpg')}}" alt="City Street" width="700" height="700"  alt="adasdasd">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
              </figure>

              <figure>
                <img src="{{asset('images/img_ejemplo/6.jpg')}}" alt="Crumbling Pier" width="700" height="700"  alt="adasdasd">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
              </figure>

              <figure>
                <img src="{{asset('images/img_ejemplo/7.jpg')}}" alt="Foggy Mountains" width="700" height="700"  alt="adasdasd">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
              </figure>

              <figure>
                <img src="{{asset('images/img_ejemplo/8.jpg')}}" alt="Dense Forest" width="700" height="700"  alt="adasdasd">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
              </figure>

              <figure>
                <img src="{{asset('images/img_ejemplo/9.jpg')}}" alt="Sunset Over Mountains" width="700" height="700"  alt="adasdasd">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
              </figure>

              <figure>
                <img src="{{asset('images/img_ejemplo/10.jpg')}}" alt="SUV in Front of Building" width="700" height="700"  alt="adasdasd">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
              </figure>

              <figure>
                <img src="{{asset('images/img_ejemplo/11.jpg')}}" alt="Classic Vehicle" width="700" height="700"  alt="adasdasd">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
              </figure>

              <figure>
                <img src="{{asset('images/img_ejemplo/12.jpg')}}" alt="Stacked Rocks" width="700" height="700"  alt="adasdasd">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
              </figure>

              <figure>
                <img src="{{asset('images/img_ejemplo/13.jpg')}}" alt="Brick Wall" width="700" height="700"  alt="adasdasd">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
              </figure>

              <figure>
                <img src="{{asset('images/img_ejemplo/14.jpg')}}" alt="Waterfront" width="700" height="700"  alt="adasdasd">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
              </figure>

              <figure>
                <img src="{{asset('images/img_ejemplo/15.jpg')}}" alt="Overgrown Buildings" width="700" height="700"  alt="adasdasd">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
              </figure>

              <figure>
                <img src="{{asset('images/img_ejemplo/16.jpg')}}" alt="Dying Trees" width="700" height="700"  alt="adasdasd">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
              </figure>

              <figure>
                <img src="{{asset('images/img_ejemplo/17.jpg')}}" alt="Ocean View" width="700" height="700"  alt="adasdasd">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
              </figure>

            </div>

        </div>

        {{-- GALLERY -------------------------------------------------------------------------------------}}

        <h5 class="mt-5 redText">Estadísticas</h5>
        <div class="estadisticasDiv">
            <div class="estadistica">Estadística 1</div>
            <div class="estadistica">Estadística 1</div>
        </div>

    </div>

@endsection


<style>
    h1 {
        padding-top: 300px;
        color: black;
    }
</style>
