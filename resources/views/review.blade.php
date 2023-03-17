@extends('templates.komok_index.layout')
@section('body')
    <div class="grid-container">
        {{ Breadcrumbs::render('reviews') }}
        <div class="article">
            <div class="article__header">
                <h1 class="article__title">{{ $meta->headline }}</h1>
                <div class="article__img">
                    <img class="article__photo" src="{{ asset('i/article/reviews.png') }}">
                </div>
            </div>
            <div class="grid-x grid-padding-y">
                <div class="cell medium-16 large-16">
                    {!! $meta->description !!}
                </div>
            </div>
        </div>
        <br><br>
        <x-pagination.simple-paginator :paginator="$blocks_on_review" />
        <div class="card">
            <div class="card__col">
                @foreach($blocks_on_review as $index => $item)
                    @if (in_array($index, [0,1,2]))
                    <div class="card__item">
                        <div class="card__img">
                            <img class="card__photo" src="{{ asset('storage/' . $item->picture) }}">
                            <img class="card__circle" src="{{ asset('i/reviews/circle.svg') }}">
                        </div>
                        <div class="card__header">
                            <div class="card__name">{{ $item->name }}</div>
                            <div class="card__age">{{ $item->age }}</div>
                        </div>
                        <div class="card__content">{!! $item->text !!}</div>
                    </div>
                    @endif
                @endforeach
            </div>
            <div class="card__col">
                @foreach($blocks_on_review as $index => $item)
                    @if (in_array($index, [3,4,5]))
                    <div class="card__item">
                        <div class="card__img">
                            <img class="card__photo" src="{{ asset('storage/' . $item->picture) }}">
                            <img class="card__circle" src="{{ asset('i/reviews/circle.svg') }}">
                        </div>
                        <div class="card__header">
                            <div class="card__name">{{ $item->name }}</div>
                            <div class="card__age">{{ $item->age }}</div>
                        </div>
                        <div class="card__content">{!! $item->text !!}</div>
                    </div>
                    @endif
                @endforeach
            </div>
            <div class="card__col">
                @foreach($blocks_on_review as $index => $item)
                    @if (in_array($index, [6,7,8]))
                    <div class="card__item">
                        <div class="card__img">
                            <img class="card__photo" src="{{ asset('storage/' . $item->picture) }}">
                            <img class="card__circle" src="{{ asset('i/reviews/circle.svg') }}">
                        </div>
                        <div class="card__header">
                            <div class="card__name">{{ $item->name }}</div>
                            <div class="card__age">{{ $item->age }}</div>
                        </div>
                        <div class="card__content">{!! $item->text !!}</div>
                    </div>
                    @endif
                @endforeach
            </div>
        </div>
        <x-pagination.simple-paginator :paginator="$blocks_on_review" />
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
