@extends('templates.komok_index.layout')
@section('body')
    <div class="grid-container">
        {{ Breadcrumbs::render('team') }}
        <div class="article">
            <div class="article__header">
                <h1 class="article__title">{{ $meta->headline }}</h1>
                <div class="article__img">
                    <img class="article__photo" src="{{ asset('i/article/team.png') }}">
                </div>
            </div>
            <div class="grid-x grid-padding-y">
                <div class="cell large-13">
                    <div class="article__subtitle">
                        {{ $blocks_on_team[1]->headline }}<br><span class="article__underline">{{ $blocks_on_team[1]->emphasized_text }}</span>
                    </div>
                </div>
            </div>
        </div>
        <br><br>
        <div class="card card_slider">
            <div class="card__slider" id="counselors">
                @foreach($blocks_on_team[1]->employees as $employee)
                <div class="card__item card__item_slider">
                    <div class="card__img">
                        <img class="card__photo card__photo_team" src="{{ asset('storage/' . $employee->picture) }}">
                        <img class="card__circle card__circle_team" src="{{ asset('i/reviews/circle.svg') }}">
                    </div>
                    <div class="card__header card__header_bottom">
                        <div class="card__name card__name_slider">{{ $employee->name }}</div>
                        <div class="card__prof">{{ $employee->profession }}</div>
                    </div>
                    <div class="card__content card__content_bottom">
                        <a class="button" data-open="TeamModal{{ $employee->id }}">Познакомиться</a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="card card_slider card_violet">
            <div class="card__mainheader">
                <div class="card__title">{{ $blocks_on_team[3]->headline }}<br>
                    <span class="card__underline">{{ $blocks_on_team[3]->emphasized_text }}</span>
                </div>
            </div>
            <div class="card__slider" id="workers">
                @foreach($blocks_on_team[3]->employees as $employee)
                <div class="card__item card__item_slider">
                    <div class="card__img">
                        <img class="card__photo card__photo_team" src="{{ asset('storage/' . $employee->picture) }}">
                        <img class="card__circle card__circle_team" src="{{ asset('i/reviews/circle.svg') }}"></div>
                    <div class="card__header">
                        <div class="card__name card__name_slider">{{ $employee->name }}</div>
                        <div class="card__prof">{{ $employee->profession }}</div>
                    </div>
                    <div class="card__content">
                        {!! $employee->description !!}
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="card card_large">
            <div class="card__mainheader">
                <div class="card__title">
                    <span class="card__underline card__underline_violet">{{ $blocks_on_team[4]->emphasized_text }}</span>
                    {{ $blocks_on_team[4]->headline }}
                </div>
                <div class="card__content">{!! $blocks_on_team[4]->text !!}</div>
            </div>
            <div class="card__wrapper">
                @foreach($blocks_on_team[4]->employees as $employee)
                <div class="card__item card__item_large">
                    <div class="card__img">
                        <img class="card__photo card__photo_team" src="{{ asset('storage/' . $employee->picture) }}">
                        <img class="card__circle card__circle_team" src="{{ asset('i/reviews/circle.svg') }}">
                    </div>
                    <div class="card__header">
                        <div class="card__name card__name_large">{{ $employee->name }}</div>
                        <div class="card__prof">{{ $employee->profession }}</div>
                    </div>
                    <div class="card__content">
                        {!! $employee->description !!}
                    </div>
                </div>
                @endforeach
            </div>
            <div class="card__button"><a class="button" type="submit" data-open="Shift">Выбрать смену</a></div>
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
    @foreach($blocks_on_team[1]->employees as $employee)
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
@endsection
