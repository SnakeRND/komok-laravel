@extends('templates.komok_index.layout')
@section('body')
    <div class="grid-container">
        {{ Breadcrumbs::render('faq') }}
        <div class="article">
            <div class="article__header">
                <h1 class="article__title">{{ $meta->headline }}</h1>
                <div class="article__img">
                    <img class="article__photo" src="{{ asset('i/article/faq.png') }}">
                </div>
            </div>
            <div class="grid-x grid-padding-y article__content">
                <div class="cell medium-16 large-6">
                    {!! $meta->description !!}
                </div>
            </div>
        </div>
        <br>
        <div class="grid-x">
            <div class="cell large-17">
                <ul class="accordion" data-accordion data-multi-expand="true" data-allow-all-closed="true">
                    @foreach($blocks_on_faq as $item)
                    <li class="accordion-item" data-accordion-item>
                        <a class="accordion-title" href="#">
                            <span>{{ $item->headline }}</span>
                        </a>
                        <div class="accordion-content" data-tab-content>
                            {!! $item->text !!}
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <section class="section" id="askQuestion">
            <div class="grid-container">
                <div class="section__background section__background_faq">
                    <div class="grid-x">
                        <div class="cell large-11 large-offset-6">
                            <div class="section__content section__content_center">
                                <div class="section__head">
                                    Задайте&nbsp;<span class="section__violet section__violet_2">свой вопрос</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="question">
                    <div class="grid-x">
                        <div class="cell medium-12 question__item">
                            @if ($errors->any())
                                <div class="callout callout_alert">
                                    <ul>
                                        @foreach(array_unique($errors->all()) as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            @if(session()->has('success'))
                                <div class="callout callout_success">
                                    {{ session()->get('success') }}
                                </div>
                            @endif
                            <div class="question__title">Через электронную почту</div>
                            <form method="post" action="/askQuestion">
                                @csrf
                                <div class="grid-x grid-margin-x">
                                    <div class="cell large-8">
                                        <div class="custom-input">
                                            <input name="name" placeholder=" " value="{{ old('name') }}">
                                            <label>Имя и фамилия</label>
                                        </div>
                                    </div>
                                    <div class="cell large-14">
                                        <div class="custom-input">
                                            <input name="mail" placeholder=" " type="mail" value="{{ old('mail') }}">
                                            <label>Электронная почта</label>
                                        </div>
                                    </div>
                                    <div class="cell large-22">
                                        <textarea name="text" rows="5" cols="33" placeholder="Поле для текста">{{ old('text') }}</textarea>
                                    </div>
                                    <div class="cell large-22 question__button">


                                        <button class="button" type="submit">Отправить</button>
                                        <br>

                                    </div>
                                    <div class="cell large-22">

                                        <div>Нажимая на кнопку, вы даете согласие на обработку персональных данных и соглашаетесь c <a target="_blank" href="/oferta" style="">политикой конфиденциальности</a></div>

                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="cell medium-12 question__item">
                            <div class="grid-x">
                                <div class="cell medium-22 medium-offset-2">
                                    <div class="question__title">Или по телефону, так быстрее</div>
                                    <a class="question__phone"
                                       href="tel:+{{ preg_replace('/[^0-9.]+/', '', $settings["site.main_phone"]->value) }}"
                                       title="Позвонить нам"
                                    >
                                        {{ $settings["site.main_phone"]->value }}
                                    </a>
                                    <div class="question__time">{{ $settings["site.work_time"]->value }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
