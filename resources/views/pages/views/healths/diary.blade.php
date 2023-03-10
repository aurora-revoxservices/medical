@extends('layouts.pages')

@section('title', 'Inicio')

@section('content')

@include ('pages.includes.header.healths')

<main>

    <section class="about-area pt-130 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-12 col-md-11 modules-box wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="2000ms"    >

                    <img src="/pages/img/healths/modules/diary.svg" alt="">




                </div>


                <div class="col-xl-6 col-lg-7">
                    <div class="about-right-side h4about-right mb-30">
                        <div class="about-title mb-20">
                            <h5 class="pink-color wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="2000ms">MODULO 4</h5>
                            <h1 class="wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="2000ms">Agenda Inteligente digital</h1>

                        </div>
                        <div class="about-text">
                            <p class="mb-20 wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="2000ms">Simplifica tu proceso de agendamiento de servicios y brinda una mejor experiencia a tus paciente para convertirlos en clientes fieles de tu centro de salud.</p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="about-area pt-20 pb-90">
        <div class="container">
            <div class="row ">
                <div class="col-xl-12 col-lg-12 col-md-12">
                    <div class="section-title text-center pos-rel mb-75">
                        <div class="section-text pos-rel home_ser_title wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="2000ms">
                            <h1>Simplifica tu proceso de citas y empodera a tus pacientes</h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6">
                    <div class="service-box service-box-border text-center mb-30 wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="2000ms">
                        <div class="service-thumb">
                            <img src="/pages/img/healths/dairy/attention.svg" alt="">
                        </div>
                        <div class="service-content">
                            <h3><a>Planificaci??n de horarios de atenci??n</a></h3>
                            <p> Olv??date de la planificaci??n manual de tus doctores: accede a la Planificaci??n autom??tica e inteligente, totalmente visual. Planificaci??n efectiva de horarios de atenci??n por doctor, administraci??n de citas, m??ltiples horarios que puedes adecuar a tus turnos, especialidades o la clasificaci??n que mas se adecue a tu necesidad.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6">
                    <div class="service-box service-box-border text-center mb-30 wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="2000ms">
                        <div class="service-thumb">
                            <img src="/pages/img/healths/dairy/payment.svg" alt="">
                        </div>
                        <div class="service-content">
                            <h3><a>Pagos en l??nea</a></h3>
                            <p>Te permitir?? programar distintos tipos de citas, con duraci??n y precio diferenciado, teniendo la opci??n de poder recibir pagos en l??nea directamente en la cuenta de tu centro de salud.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6">
                    <div class="service-box service-box-border text-center mb-30 wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="2000ms">
                        <div class="service-thumb">
                            <img src="/pages/img/healths/dairy/messenger.svg" alt="">
                        </div>
                        <div class="service-content">
                            <h3><a>Recordatorios Automaticos</a></h3>
                            <p>Reduce la cantidad de citas agendadas sin asistencia de pacientes y optimiza el tiempo de espera de tus doctores. Tus pacientes ya no olvidar??n una cita. Esta funci??n te permitir?? programar recordatorios de citas para tus pacientes: al momento de la reserva, con la confirmaci??n y antes de su inicio.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6">
                    <div class="service-box service-box-border text-center mb-30 wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="2000ms">
                        <div class="service-thumb">
                            <img src="/pages/img/healths/dairy/quotes.svg" alt="">
                        </div>
                        <div class="service-content">
                            <h3><a>Horarios privados</a></h3>
                            <p>Atiende a tus pacientes especiales o seleccionados, en el horario que m??s se ajuste a su necesidad. Podr??s crear horarios adicionales para la gesti??n interna de tu centro de salud, lo que te permitir?? ofrecer programaciones de citas especiales a ciertos grupos de pacientes.</p>
                        </div>
                    </div>
                </div>






            </div>



        </div>
    </section>


    <section class="calculate-area pos-rel pt-115 pb-120" data-background="/pages/img/calculate/calculate-bg.png" style="background-image: url(&quot;img/calculate/calculate-bg.png&quot;);">
        <div class="container">
            <div class="row">
                <div class="col-xl-7 col-lg-6 col-md-10">
                    <div class="section-title calculate-section pos-rel mb-45 wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="2000ms">
                        <div class="section-text section-text-white pos-rel">
                            <h5>MEDICAL CLOUD</h5>
                            <h1>Est??s listo para la salud digital ?</h1>
                            <p>Genera m??s eficiencia y rentabilidad en tu centro de salud con??Medical??Cloud??.</p>

                        </div>
                    </div>
                    <div class="section-button section-button-left mb-80 wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="2000ms">
                        <a data-animation="fadeInLeft" data-delay=".6s" href="https://api.whatsapp.com/send?phone=57{{ $setting->whatsapp }}&text=Buenas%21%20Quisiera%20m%C3%A1s%20informaci%C3%B3n%20sobre%20los%20productos%202." class="btn btn-icon ml-0">Conoce m??s</a>

                    </div>
                </div>
                <div class="col-xl-5 col-lg-6">
                    <form id="actionForm" class="calculate-box white-bg wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="2000ms" enctype="multipart/form-data" role="form" onSubmit="return false">

                        <input type="hidden" id="service" value="Agenda Inteligente digital">

                        <div class="calculate-content">
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="calculate-form" action="#">
                                        <input type="text" id="names" placeholder="Tu nombres" required>
                                    </div>
                                </div>

                                <div class="col-xl-12">
                                    <div class="calculate-form mt-2" action="#">

                                        <input type="email" id="email" placeholder="Tu correo electr??nico" required>

                                    </div>
                                </div>

                                <div class="col-xl-12">
                                    <div class="calculate-form mt-2" action="#">

                                        <input type="text" id="phone" placeholder="Tu tel??fono" >


                                    </div>

                                </div>

                                <div class="col-xl-12">
                                    <div class="calculate-form mt-2" action="#">
                                        <input type="text" id="company" placeholder="Tu Empresa" >
                                    </div>

                                </div>
                            </div>
                        </div>
                        <button type="submit" id="action" class="btn mt-40 text-center">Solicitar Demo</button>
                    </form>


                </div>

            </div>
        </div>
        </div>
    </section>


</main>


@endsection
