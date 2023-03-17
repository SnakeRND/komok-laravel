@extends('templates.komok_index.layout')
@section('body')
    <div class="grid-container">
        {{ Breadcrumbs::render('about') }}

        <section class="section">
            <div class="grid-container">
                <div class="grid-x">
                    <div class="cell large-12 large-order-1 small-order-2">
                        <div class="section__content section__content_second">
                            <div class="section__head">{{ $blocks_on_about[1]->headline }}&nbsp;<span
                                    class="section__violet section__violet_2">{{ $blocks_on_about[1]->emphasized_text }}</span>&nbsp;{{ $blocks_on_about[1]->headline2 }}
                            </div>
                            <div class="section__text">
                                {!! $blocks_on_about[1]->text !!}
                            </div>
                        </div>
                    </div>
                    <div
                        class="cell large-10 large-offset-2 section__background section__background_second large-order-2 small-order-1">
                        <img class="section__slide" src="{{ asset('storage/' . $blocks_on_about[1]->picture) }}">
                    </div>
                </div>
            </div>
        </section>

        <section class="section">
            <div class="grid-container">
                <div class="grid-x player">
                    <div class="player__content">
                        <div class="player__wrapper">
                            <iframe
                                src="{{ $blocks_on_about[2]->video }}"
                                title="YouTube video player" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                allowfullscreen=""></iframe>
                        </div>
                        <br><img class="player__circle" src="{{ asset('images/about/player-circle.png') }}"></div>
                </div>
            </div>
        </section>
    </div>
    <div class="achievments"><img class="achievments__circle" src="{{ asset('images/about/achievments-circle.png') }}">
        <div class="grid-container">
            <div class="grid-x">
                <div class="cell achievments__container">
                    <div class="achievments__header">
                        <div class="article__subtitle"></div>
                        <span class="article__underline">Комок</span>&nbsp;это
                    </div>
                    <div class="achievments__wrapper" style="max-width: 70%" id="achievments-drop-up-list">

                        @foreach($skills as $skill)
                            <div class="achievments__item">
                                <div class="achievments__picture">
                                    <img class="achievments__image"
                                         src="{{ asset('storage/'.$skill->image) }}">
                                </div>
                                <div class="achievments__content">
                                    <div class="achievments__header">{{ $skill->headline }}</div>
                                    <div class="achievments__description">{!! $skill->text !!}</div>
                                </div>

                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="grid-container">
        <div class="grid-container">
            <div class="grid-x cifry">
                <div class="cifry__header">
                    <div class="div">Комок <span class="article__underline">в цифрах</span></div>
                </div>


                @foreach($programs as $program)
                <div class="cifry__item">
                    <span class="cifry__nomer">{{ $program->headline }}
                        <img class="cifry__circle" src="{{ asset('images/about/cifry-circle.png') }}">
                    </span>
                    <div class="cifry__description">{!! $program->text !!}</div>
                </div>
                @endforeach

            </div>
            <div class="board board_no-margin">
                <div class="grid-container">
                    <div class="board__wrapper board__wrapper_second">
                        <div class="board__content board__content_center">{!! $blocks_on_about[3]->text !!}</div>
                    </div>
                </div>
            </div>

        </div>

        <section class="section">
            <div class="grid-container">
                <div class="section__background section__background_review">
                    <img class="section__img section__img_1" src="{{ asset('images/review/review-circle-1.svg') }}">
                    <img class="section__img section__img_2" src="{{ asset('images/review/review-circle-2.svg') }}">
                    <img class="section__img section__img_3" src="{{ asset('images/review/review-frame-1.svg') }}">
                    <img class="section__img section__img_4" src="{{ asset('images/review/review-frame-2.svg') }}">
                    <div class="grid-x" id="orderTicket">
                        <div class="cell">
                            <div class="section__content section__content_center">
                                <div class="section__head">
                                    <span class="section__violet section__violet_2">Забронируйте &nbsp;</span>выездную программу
                                </div>
                            </div>
                        </div>
                    </div>
                    @if ($errors->any())
                        <div class="grid-x justify-content-center">
                            <div class="cell large-10">
                                <div class="grid-x grid-margin-x grid-padding-y">
                                    <div class="cell">
                                        <div class="callout callout_alert">
                                            <ul>
                                                @foreach(array_unique($errors->all()) as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    @if(session()->has('success'))
                        <div class="grid-x justify-content-center">
                            <div class="cell large-10">
                                <div class="grid-x grid-margin-x grid-padding-y">
                                    <div class="cell">
                                        <div class="callout callout_success">
                                            {{ session()->get('success') }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    <form method="post" action="/orderTicket">
                        @csrf
                        <div class="grid-x justify-content-center">
                            <div class="cell large-10">
                                <div class="grid-x grid-margin-x grid-padding-y">
                                    <div class="cell">
                                        <div class="custom-input">
                                            <input name="name" placeholder=" " value="{{ old('name') }}">
                                            <label>Имя и фамилия</label>
                                        </div>
                                    </div>
                                    <div class="cell">
                                        <div class="custom-input">
                                            <input placeholder=" " type="tel" name="phone" id="phone" value="{{ old('phone') }}">
                                            <label>Номер телефона</label>
                                        </div>
                                    </div>
                                    <div class="cell">
                                        <div class="custom-input">
                                            <input name="mail" placeholder=" " type="mail" value="{{ old('mail') }}">
                                            <label>Электронная почта</label>
                                        </div>
                                    </div>
                                    <div class="cell text-align-center">


                                        <button class="button z-index-1" type="submit">Забронировать место</button>
                                        <br>
                                        <div>Нажимая на кнопку, вы даете согласие на обработку персональных данных и соглашаетесь c <a target="_blank" href="/oferta" style="">политикой конфиденциальности</a></div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection
