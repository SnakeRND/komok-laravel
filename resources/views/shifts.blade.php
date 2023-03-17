@extends('templates.komok_index.layout')
@section('body')
    <div class="grid-container">
        {{ Breadcrumbs::render('shifts') }}
    </div>
    <div class="article">
        <img class="article__circle" src="{{ asset('images/place/circle.png') }}">
        <div class="grid-container">
            <div class="article__subtitle">
                @if (request()->get('age') !== 'family')
                    Выездные смены <span class="article__underline">для детей </span> в Подмосковье
                @else
                Семейные выезды
                @endif
            </div>
        </div>
    </div>
    <br>
    <div class="grid-container">
        <div>
            <h3>Для того, чтобы выбрать смену:</h3>
            <div class="raider">
                <div class="raider__col">
                            <div class="raider__item">Выберите период проведения смены. </div>
                            <div class="raider__item">Нажмите кнопку <b>"КУПИТЬ ПУТЕВКУ"</b></div>
                            <div class="raider__item">Заполните форму и нажмите <b>"ЗАБРОНИРОВАТЬ МЕСТО"</b> :)</div>
                </div>

            </div>
        </div>
    </div>
    <br>
    <div class="shift">
        <div class="grid-container">
            <div class="grid-x grid-padding-x grid-margin-x grid-padding-y grid-margin-y">
                <div class="cell large-4">
                    <div class="vertical tabs" id="example-tabs" data-responsive-accordion-tabs="accordion medium-tabs"
                         data-multi-expand="true" data-allow-all-closed="true" data-deep-link="true" data-update-history="false">
                        @foreach($shifts_period as $index => $period)
                        <div class="tabs-title {{ $loop->first ? 'is-active' : '' }} elements">
                            <a href="#panel{{$period->id}}v" aria-selected="true">
                                {{$period->title}}
                                <div class="tabs__subtitle">{{$period->period}}</div>
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="cell large-19 large-offset-1">
                    <div class="tabs-content vertical" data-tabs-content="example-tabs">
                        @foreach($shifts_period as $period)

                        <div class="tabs-panel {{ $loop->first ? 'is-active' : '' }} tabs-panel_no-padding" id="panel{{$period->id}}v">
                            <div class="tabs-content vertical" data-tabs-content="second-tabs">
                                <div class="vertical tabs" id="second-tabs" data-tabs="">
                                    <h2>
                                        {{ $period->title }}
                                    </h2>
                                    <div>
                                        {!! $period->description  !!}
                                    </div>
                                    @foreach($period->programs as $program)
                                    <div class="tabs-panel {{ $loop->first ? 'is-active' : '' }} tabs-panel_no-padding" id="second{{$period->id}}v{{$program->id}}">
                                        <div class="grid-x">
                                            <div class="cell large-14">
                                                <div class="grid-x">
                                                    <div class="cell">
                                                        <div>
                                                            <h3>{{ $program->title }}</h3>
                                                            <p>{!! $program->description !!}</p>
                                                        </div>
                                                    </div>
                                                    <div class="cell">
                                                        @foreach($period->programs as $program)
                                                        <div class="tabs-title {{ $loop->first ? 'is-active' : '' }} tabs-title_program">
                                                            <div>
                                                                <a href="#second{{$period->id}}v{{$program->id}}">{{ $program->title }}</a>
                                                            </div>
                                                        </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="cell large-5 large-offset-2">
                                                <div class="todo">
                                                    <div class="todo__item">
                                                        <a class="todo__link" data-open="exampleModal{{ $period->id }}schedule" aria-controls="exampleModal{{ $period->id }}schedule" aria-haspopup="dialog" tabindex="0">Распорядок дня</a>
                                                    </div>
                                                    <div class="todo__item">
                                                        <a class="todo__link" data-open="exampleModal{{ $period->id }}docs" aria-controls="exampleModal{{ $period->id }}docs" aria-haspopup="dialog" tabindex="0">Необходимые документы</a>
                                                    </div>
                                                    <div class="todo__item">
                                                        <a class="todo__link" data-open="exampleModal{{ $period->id }}things" aria-controls="exampleModal{{ $period->id }}things" aria-haspopup="dialog" tabindex="0">Список вещей для лагеря</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="cell">
                                                <h3>Путевка <span class="h3__underline">включает в себя</span></h3>
                                                <div class="raider">
                                                    <div class="raider__col">
                                                        @foreach(explode(',',$period->includes) as $index => $include)
                                                            @if($index % 2 == 0)
                                                                <div class="raider__item">{{ $include }}</div>
                                                            @endif
                                                        @endforeach
                                                    </div>
                                                    <div class="raider__col">
                                                        @foreach(explode(',',$period->includes) as $index => $include)
                                                            @if($index % 2 != 0)
                                                                <div class="raider__item">{{ $include }}</div>
                                                            @endif
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="cell large-16" id="orderTicket">
                                                <div class="amount">
                                                    @if ($errors->any())
                                                        <div class="grid-x justify-content-center">
                                                            <div class="cell">
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
                                                            <div class="cell">
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
                                                    <h3 class="amount__title">Стоимость</h3>
                                                    <div class="amount__content">
                                                        <div class="amount__price">{{ $period->price }} ₽
                                                            @if ($period->old_price)
                                                                <div class="amount__price_old">{{ $period->old_price }} ₽</div>
                                                            @endif
                                                        </div>
                                                        <div>
                                                            <a class="button" data-open="exampleModalform{{$period->id}}" aria-controls="exampleModalform{{$period->id}}" aria-haspopup="dialog" tabindex="0">
                                                                Купить путевку
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="amount__description">
                                                        <div class="amount__text">
                                                            {{ $period->price_text }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="reveal large" id="exampleModalform{{$period->id}}" data-reveal="" data-animation-in="spin-in"
                                                 data-animation-out="spin-out">
                                                <section class="section">
                                                    <div class="grid-container">
                                                        <div class="section__background section__background_review">
                                                            <img
                                                                class="section__img section__img_1 section__img_z-minus"
                                                                src="{{ asset('images/review/review-circle-1.svg') }}">
                                                            <img
                                                                class="section__img section__img_2 section__img_z-minus"
                                                                src="{{ asset('images/review/review-circle-2.svg') }}">
                                                            <img
                                                                class="section__img section__img_3 section__img_z-minus"
                                                                src="{{ asset('images/review/review-frame-1.svg') }}">
                                                            <img
                                                                class="section__img section__img_4 section__img_z-minus"
                                                                src="{{ asset('images/review/review-frame-2.svg') }}">
                                                            <div class="grid-x">
                                                                <div class="cell">
                                                                    <div class="section__content section__content_center">
                                                                        <div class="section__head">
                                                                            <span class="section__violet section__violet_2">Забронируйте &nbsp;</span>выездную программу
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
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
                                                                                <br>
                                                                                <button class="button z-index-1" type="submit">Забронировать место</button>
                                                                                <div>Нажимая на кнопку, вы даете согласие на обработку персональных данных и соглашаетесь c <a target="_blank" href="/oferta" style="">политикой конфиденциальности</a></div>

                                                                            </div>
                                                                        </div>
                                                                        <div class="amount">
                                                                            <h3 class="amount__title amount__title_center">Стоимость</h3>
                                                                            <div class="amount__content amount__content_center">
                                                                                <div class="amount__price">{{ $period->price }} ₽
                                                                                    @if($period->old_price)
                                                                                        <div class="amount__price_old">{{ $period->old_price }} ₽</div>
                                                                                    @endif
                                                                                </div>
                                                                            </div>
                                                                            <div class="amount__description amount__description_center">
                                                                                <div class="amount__text">{{ $period->price_text }}</div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <input
                                                                    type="hidden"
                                                                    name="shift"
                                                                    value="{{ request()->get('age') === 'younger' ? '7-12 лет' : '13-17 лет' }} {{$period->title}} {{$period->period}}"
                                                                />
                                                            </form>
                                                        </div>
                                                    </div>
                                                </section>
                                                <button class="close-button" data-close="" aria-label="Close modal" type="button"><span
                                                        aria-hidden="true">&times;</span></button>
                                            </div>
                                            <div class="reveal large" id="exampleModal{{$period->id}}schedule" data-reveal="" data-animation-in="spin-in" data-animation-out="spin-out">
                                                {!! $period->schedule !!}
                                                <button class="close-button" data-close="" aria-label="Close modal" type="button">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="reveal large" id="exampleModal{{$period->id}}docs" data-reveal="" data-animation-in="spin-in" data-animation-out="spin-out">
                                                {!! $period->docs !!}
                                                <button class="close-button" data-close="" aria-label="Close modal" type="button">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="reveal large" id="exampleModal{{$period->id}}things" data-reveal="" data-animation-in="spin-in" data-animation-out="spin-out">
                                                {!! $period->things !!}
                                                <button class="close-button" data-close="" aria-label="Close modal" type="button">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <br><br>
        </div>
    </div>
    <div class="card card_slider card_violet card_violet-image">
        <div class="grid-container">
            <div class="card__mainheader">
                <div class="card__title">Более 10 000 детей участвовали<br/>в реализованных мероприятиях</div>
            </div>
            <div class="card__slider" id="events">
                @foreach($reviews as $review)
                <div class="card__item card__item_slider card__item_lines">
                    <div class="card__mainwrapper">
                        <div class="grid-x">
                            <div class="cell medium-8 card__img-container">
                                <div class="card__img">
                                    <img class="card__photo card__photo_lines" src="{{ asset('storage/' . $review->picture) }}">
                                    <img class="card__circle" src="{{ asset('i/reviews/circle.png') }}">
                                </div>
                            </div>
                            <div class="cell medium-15 medium-offset-1">
                                <div class="card__header">
                                    <div class="card__name card__name_slider">{{ $review->name }}, {{ $review->age }}</div>
                                </div>
                                <div class="card__content">
                                    {!! $review->text !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="article">
        <div class="grid-container">
            <div class="article__subtitle">Вашим ребенком будут заниматься наши<br/><span class="article__underline">молодые талантливые вожатые</span>
            </div>
        </div>
    </div>
    <div class="card card_slider">
        <img class="card__back-image card__back-image_1" src="{{ asset('images/shift/shift-one.png') }}">
        <div class="grid-container">
            <div class="card__slider" id="counselors">
                @foreach($elders as $elder)
                <? if ($elder["is_public"]): ?>
                <div class="card__item card__item_slider">
                    <div class="card__img">
                        <img class="card__photo" src="{{ asset('storage/' . $elder->picture) }}">
                        <img class="card__circle" src="{{ asset('i/reviews/circle.png') }}"></div>
                    <div class="card__header card__header_bottom">
                        <div class="card__name card__name_slider">{{ $elder->name }}</div>
                        <div class="card__prof">{{ $elder->profession }}</div>
                    </div>
                    <div class="card__content card__content_bottom">
                        <a class="button" data-open="TeamModal{{ $elder->id }}">Познакомиться</a>
                    </div>
                </div>
                <? endif; ?>
                @endforeach
            </div>
        </div>
    </div>
    <div class="article">
        <div class="grid-container">
            <div class="article__subtitle">Мастер-классы будут проводить<br/><span class="article__underline">профессионалы своего дела</span>
            </div>
        </div>
    </div>
    <div class="card card_slider">
        <img class="card__back-image card__back-image_2" src="{{ asset('images/shift/circle-second.png') }}">
        <div class="grid-container">
            <div class="card__slider" id="counselors-second">
                @foreach($employees->employees as $employee)
                <? if ($employee["is_public"]): ?>
                <div class="card__item card__item_slider">
                    <div class="card__img">
                        <img class="card__photo" src="{{ asset('storage/' . $employee->picture) }}">
                        <img class="card__circle" src="{{ asset('i/reviews/circle.png') }}">
                    </div>
                    <div class="card__header card__header_bottom">
                        <div class="card__name card__name_slider">{{ $employee->name }}</div>
                        <div class="card__prof">{{ $employee->profession }}</div>
                    </div>
                    <div class="card__content card__content_bottom">
                        <a class="button" data-open="TeamModal{{ $employee->id }}">Познакомиться</a>
                    </div>
                </div>



                <? endif; ?>
                @endforeach
            </div>
        </div>
    </div>
    <div class="article">
        <div class="grid-container">
            <div class="article__subtitle"><span class="article__underline">Жизнь</span> лагеря</div>
            <div class="article__content">Все фотографии можно будет посмотреть в <a href="/gallery">Галерее</a></div>
        </div>
    </div>
    <br>
    <div class="grid-container">
        <div class="card card_slider">
            <div class="card__slider" id="life">
                @foreach($pictures as $path)
                <div class="card__item card__item_life">
                    <a href="{{ asset('storage/' . $path) }}" data-fancybox="gallery">
                        <img class="card__life" src="{{ asset('storage/' . $path) }}">
                    </a>
                </div>
                @endforeach
            </div>
            <div class="card__button">
                <a class="button" type="submit" data-open="Shift">Выбрать смену</a>
            </div>
        </div>
    </div>
    <div class="reveal large" id="Shift" data-reveal="" data-animation-in="spin-in" data-animation-out="spin-out">
        <section class="section">
            <div class="grid-container">
                <div class="section__background section__background_review">
                    <img class="section__img section__img_1 section__img_z-minus" src="{{ asset('images/review/review-circle-1.svg') }}">
                    <img class="section__img section__img_2 section__img_z-minus" src="{{ asset('images/review/review-circle-2.svg') }}">
                    <img class="section__img section__img_3 section__img_z-minus" src="{{ asset('images/review/review-frame-1.svg') }}">
                    <img class="section__img section__img_4 section__img_z-minus" src="{{ asset('images/review/review-frame-2.svg') }}">
                    <div class="grid-x">
                        <div class="cell">
                            <div class="section__content section__content_center">
                                <div class="section__head">
                                    <span class="section__violet section__violet_2">Подберите смену&nbsp;</span>для вашего ребенка
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-align-center">
                        <div>
                            <a class="button button_hollow" href="/shifts?age=younger">Смены 7-12 лет</a>
                        </div>
                        <div>
                            <a class="button" href="/shifts">Смены 13-17 лет</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <button class="close-button" data-close="" aria-label="Close modal" type="button">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @foreach($employees->employees as $employee)
            <? if ($employee["is_public"]): ?>
            <div id="TeamModal{{ $employee->id }}" class="reveal medium" data-reveal="" data-animation-in="spin-in" data-animation-out="spin-out">
                <div class="person">
                    <div class="person__header h1">
                        {{ $employee->name }}
                    </div>
                    <div class="person__subheader h2">
                        {{ $employee->profession }}
                    </div>
                    <div class="person__content">
                        {!! $employee->description !!}
                    </div>
                    <img src="./images/mainpage/back1/Group-3.svg" alt="" class="section__img section__img_3">
                    <img src="./images/mainpage/back1/Group-5.svg" alt="" class="section__img section__img_5">
                    <button class="close-button" data-close='' aria-label='Close modal' type='button'>
                        <span aria-hidden=true>
                                          &times;
                        </span>
                    </button>

                </div>
            </div>
        <? endif; ?>
    @endforeach
    @foreach($elders as $elder)
            <? if ($elder["is_public"]): ?>
            <div id="TeamModal{{ $elder->id }}" class="reveal medium" data-reveal="" data-animation-in="spin-in" data-animation-out="spin-out">
                <div class="person">
                    <div class="person__header h1">
                        {{ $elder->name }}
                    </div>
                    <div class="person__subheader h2">
                        {{ $elder->profession }}
                    </div>
                    <div class="person__content">
                        {!! $elder->description !!}
                    </div>
                    <img src="./images/mainpage/back1/Group-3.svg" alt="" class="section__img section__img_3">
                    <img src="./images/mainpage/back1/Group-5.svg" alt="" class="section__img section__img_5">
                    <button class="close-button" data-close='' aria-label='Close modal' type='button'>
                        <span aria-hidden=true>
                                          &times;
                        </span>
                    </button>

                </div>
            </div>
        <? endif; ?>
    @endforeach

@endsection
