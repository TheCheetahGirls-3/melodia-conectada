@extends('layouts.navbar')

@section('title')
    Perfil
@endsection

@section('contenido')
    <div class="container">

        <div class="banner">
            <div class="bannerContent">
                <div class="profilePic m-5"></div>
                <div class="bannerText ms-2">
                    <h3>Pepita García</h3>
                    <p class="mb-0">Cantante - Guitarrista</p>
                    <p>Carrer d'Aragó</p>
                </div>
            </div>
        </div>

        <p class="mt-3 mb-3">Cantante de pop con una voz cautivadora y un estilo único que transmite emoción en cada nota.</p>
        <div class="tagRow">
            <div class="badge text-bg-danger rounded-pill p-2 px-3 mx-1">Cantante</div>
            <div class="badge text-bg-danger rounded-pill p-2 px-3 mx-1">Guitarrista</div>
        </div>

        <h5 class="mt-5 redText">Teléfono</h5>
        <p>+34 634 50 50 50</p>

        <h5 class="mt-5 redText">Canciones</h5>
        <div class="musicPlayer rounded-3 mb-3"></div>
        <div class="musicPlayer rounded-3 mb-3"></div>
        <div class="musicPlayer rounded-3 mb-3"></div>

        <h5 class="mt-5 redText">Galería</h5>

        {{-- GALLERY -------------------------------------------------------------------------------------}}
        {{-- Referencia: https://codepen.io/TheMOZZARELLA/pen/oNpMxyy --}}

        <div id="mz-gallery-container">

            <div id="mz-gallery">

              <figure>
                <img src="{{asset('images/img_ejemplo/1.jpg')}}" alt="Statue of Liberty" width="700" height="700" alt="adasdasd">
                <figcaption>Statue of Liberty</figcaption>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
              </figure>

              <figure>
                <img src="{{asset('images/img_ejemplo/2.jpg')}}" alt="Night Sky" width="700" height="700"  alt="adasdasd">
                <figcaption>Night Sky</figcaption>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
              </figure>

              <figure>
                <img src="{{asset('images/img_ejemplo/3.jpg')}}" alt="Ravine Between Rocks" width="700" height="700"  alt="adasdasd">
                <figcaption>Ravine Between Rocks</figcaption>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
              </figure>

              <figure>
                <img src="{{asset('images/img_ejemplo/4.jpg')}}" alt="Wheat Farm" width="700" height="700"  alt="adasdasd">
                <figcaption>Wheat Farm</figcaption>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
              </figure>

              <figure>
                <img src="{{asset('images/img_ejemplo/5.jpg')}}" alt="City Street" width="700" height="700"  alt="adasdasd">
                <figcaption>City Street</figcaption>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
              </figure>

              <figure>
                <img src="{{asset('images/img_ejemplo/6.jpg')}}" alt="Crumbling Pier" width="700" height="700"  alt="adasdasd">
                <figcaption>Crumbling Pier</figcaption>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
              </figure>

              <figure>
                <img src="{{asset('images/img_ejemplo/7.jpg')}}" alt="Foggy Mountains" width="700" height="700"  alt="adasdasd">
                <figcaption>Foggy Mountains</figcaption>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
              </figure>

              <figure>
                <img src="{{asset('images/img_ejemplo/8.jpg')}}" alt="Dense Forest" width="700" height="700"  alt="adasdasd">
                <figcaption>Dense Forest</figcaption>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
              </figure>

              <figure>
                <img src="{{asset('images/img_ejemplo/9.jpg')}}" alt="Sunset Over Mountains" width="700" height="700"  alt="adasdasd">
                <figcaption>Sunset Over Mountains</figcaption>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
              </figure>

              <figure>
                <img src="{{asset('images/img_ejemplo/10.jpg')}}" alt="SUV in Front of Building" width="700" height="700"  alt="adasdasd">
                <figcaption>SUV in Front of Building</figcaption>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
              </figure>

              <figure>
                <img src="{{asset('images/img_ejemplo/11.jpg')}}" alt="Classic Vehicle" width="700" height="700"  alt="adasdasd">
                <figcaption>Classic Vehicle</figcaption>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
              </figure>

              <figure>
                <img src="{{asset('images/img_ejemplo/12.jpg')}}" alt="Stacked Rocks" width="700" height="700"  alt="adasdasd">
                <figcaption>Stacked Rocks</figcaption>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
              </figure>

              <figure>
                <img src="{{asset('images/img_ejemplo/13.jpg')}}" alt="Brick Wall" width="700" height="700"  alt="adasdasd">
                <figcaption>Brick Wall</figcaption>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
              </figure>

              <figure>
                <img src="{{asset('images/img_ejemplo/14.jpg')}}" alt="Waterfront" width="700" height="700"  alt="adasdasd">
                <figcaption>Waterfront</figcaption>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
              </figure>

              <figure>
                <img src="{{asset('images/img_ejemplo/15.jpg')}}" alt="Overgrown Buildings" width="700" height="700"  alt="adasdasd">
                <figcaption>Overgrown Buildings</figcaption>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
              </figure>

              <figure>
                <img src="{{asset('images/img_ejemplo/16.jpg')}}" alt="Dying Trees" width="700" height="700"  alt="adasdasd">
                <figcaption>Dying Trees</figcaption>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
              </figure>

              <figure>
                <img src="{{asset('images/img_ejemplo/17.jpg')}}" alt="Ocean View" width="700" height="700"  alt="adasdasd">
                <figcaption>Ocean View</figcaption>
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
