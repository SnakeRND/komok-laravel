@extends('templates.komok_index.layout')
@section('body')
    <div class="grid-container">
        {{ Breadcrumbs::render('place') }}
    </div>
    <div class="article">
        <img class="article__circle" src="{{ asset('images/place/circle-1.png') }}">
        <div class="grid-container">
            <div class="article__header"><h1 class="article__title">{{ $meta->headline }}</h1>
                <div class="article__img">
                    <img class="article__photo" src="{{ asset('i/article/home.png') }}">
                </div>
            </div>
            <div class="article__subtitle">
                <span class="article__underline">{{ $blocks_on_place[1]->headline }}</span> {{ $blocks_on_place[1]->emphasized_text }}
            </div>
            <div class="grid-x grid-padding-y">
                <div class="cell large-8">
                    {!! $blocks_on_place[1]->text !!}
                </div>
            </div>
        </div>
    </div>
    <div class="place">
        <img class="place__circle" src="{{ asset('images/place/circle-2.svg') }}">
        <div class="grid-container">
            <div class="place__wrapper" id="place">
                @foreach($blocks_on_place[1]->pictures as $path)
                <a class="place__item" href="{{ asset('storage/' . $path) }}" data-fancybox="gallery">
                    <img src="{{ asset('storage/' . $path) }}">
                </a>
                @endforeach
            </div>
        </div>
    </div>
    <div class="grid-container">
        <div class="skill skill_center">
            @foreach($features as $feature)
            <div class="skill__item skill__item_large">
                <div class="skill__image"><img src="{{ asset('storage/' . $feature->picture) }}"></div>
                <div class="skill__title">{{ $feature->headline }}</div>
            </div>
            @endforeach
        </div>
    </div>
    <div class="article"><img class="article__circle" src="{{ asset('images/place/circle-1.svg') }}">
        <div class="grid-container">
            <div class="article__subtitle">{{ $blocks_on_place[2]->headline }} <span class="article__underline">{{ $blocks_on_place[2]->emphasized_text }}</span></div>
            <div class="grid-x grid-padding-y">
                <div class="cell large-8">
                    {!! $blocks_on_place[2]->text !!}
                </div>
            </div>
        </div>
    </div>
    <div class="grid-container">
        <div class="map"><img class="map__circle" src="{{ asset('images/place/circle-4.svg') }}">
            <iframe class="map__frame"  src="https://yandex.ru/map-widget/v1/?um=constructor%3Adf55a69b8378379ea16e8bb6c8d1380edcb7568efac8257d280b29af61fe6fec&amp;source=constructor" width="718" height="543" frameborder="0"></iframe>
        </div>
    </div>
    <div class="bus">
        <img class="bus__image" src="{{ asset('images/place/bus.svg') }}">
        <div class="grid-container">
            <div class="grid-x">
                <div class="cell large-13">
                    <div class="article article_no-padding">
                        <div class="article__subtitle article__subtitle_no-margin">{{ $blocks_on_place[3]->headline }}<br><span
                                class="article__underline">{{ $blocks_on_place[3]->emphasized_text }}</span></div>
                        <div class="grid-x grid-padding-y">
                            <div class="cell large-13">
                                {!! $blocks_on_place[3]->text !!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="cell large-10 bus__form" id="orderTicket">
                    @if ($errors->any())
                        <div class="grid-x justify-content-center">
                            <div class="cell large-18">
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
                            <div class="cell large-18">
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
                            <div class="cell large-18">
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
        </div>
    </div>
@endsection
