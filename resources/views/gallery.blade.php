@extends('templates.komok_index.layout')
@section('body')
    <div class="grid-container">
        {{ Breadcrumbs::render('gallery') }}
        <div class="article">
            <div class="article__header">
            <h1 class="article__title">{{ $meta->headline }}</h1>
            <div class="article__img">
                <img class="article__photo" src="{{ asset('i/article/gallery.png') }}">
            </div>
            </div>
            <div class="grid-x grid-padding-y article__content">
                <div class="cell medium-12">
                    {!! $meta->description !!}
                </div>
            </div>
            @if ($errors->any())
                <div class="grid-x grid-padding-x">
                    <ul class="callout callout_alert">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="/gallery">
                <div class="grid-x grid-padding-x grid-margin-y grid-padding-y medium-up-3 xlarge-up-6 large-up-5">
                    <div class="cell">
                        <div class="custom-select">
                            <select name="year">
                                <option value="0">Год</option>
                                @foreach($years as $year)
                                    <option
                                        {{ old('year') == $year ? "selected" : "" }}
                                        {{ request()->query('year') == $year ? "selected" : "" }}
                                        value="{{ $year }}"
                                    >
                                        {{ $year }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="cell">
                        <div class="custom-select">
                            <select name="season">
                                <option value="0">Время года</option>
                                <option
                                    {{ old('season') == "Зима" ? "selected" : "" }}
                                    {{ request()->query('season') == "Зима" ? "selected" : "" }}
                                    value="Зима"
                                >
                                    Зима
                                </option>
                                <option
                                    {{ old('season') == "Лето" ? "selected" : "" }}
                                    {{ request()->query('season') == "Лето" ? "selected" : "" }}
                                    value="Лето"
                                >
                                    Лето
                                </option>
                                <option
                                    {{ old('season') == "Весна" ? "selected" : "" }}
                                    {{ request()->query('season') == "Лето" ? "selected" : "" }}
                                    value="Весна"
                                >
                                    Весна
                                </option>
                                <option
                                    {{ old('season') == "Осень" ? "selected" : "" }}
                                    {{ request()->query('season') == "Осень" ? "selected" : "" }}
                                    value="Осень"
                                >
                                    Осень
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="cell">
                        <div class="custom-select">
                            <select name="shift">
                                <option value="0">Смена</option>
                                <option
                                    {{ old('shift') == "1" ? "selected" : "" }}
                                    {{ request()->query('shift') == "1" ? "selected" : "" }}
                                    value="1"
                                >
                                    1
                                </option>
                                <option
                                    {{ old('shift') == "2" ? "selected" : "" }}
                                    {{ request()->query('shift') == "2" ? "selected" : "" }}
                                    value="2"
                                >
                                    2
                                </option>
                                <option
                                    {{ old('shift') == "3" ? "selected" : "" }}
                                    {{ request()->query('shift') == "3" ? "selected" : "" }}
                                    value="3"
                                >
                                    3
                                </option>
                                <option
                                    {{ old('shift') == "4" ? "selected" : "" }}
                                    {{ request()->query('shift') == "4" ? "selected" : "" }}
                                    value="4"
                                >
                                    4
                                </option>
                                <option
                                    {{ old('shift') == "5" ? "selected" : "" }}
                                    {{ request()->query('shift') == "5" ? "selected" : "" }}
                                    value="5"
                                >
                                    5
                                </option>
                                <option
                                    {{ old('shift') == "6" ? "selected" : "" }}
                                    {{ request()->query('shift') == "6" ? "selected" : "" }}
                                    value="6"
                                >
                                    6
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="cell">
                        <div class="custom-radio">
                            <input
                                id="small"
                                type="radio"
                                {{ old('age') == "Смены 7-12 лет" ? "checked" : "" }}
                                {{ request()->query('age') == "Смены 7-12 лет" ? "checked" : "" }}
                                name="age"
                                value="Смены 7-12 лет"
                                checked
                            />
                            <div class="custom-radio__wrapper">
                                <label for="small">Смены 7-12 лет</label>
                            </div>
                        </div>
                    </div>
                    <div class="cell">
                        <div class="custom-radio">
                            <input
                                id="large"
                                type="radio"
                                {{ old('age') == "Смены 13-17 лет" ? "checked" : "" }}
                                {{ request()->query('age') == "Смены 13-17 лет" ? "checked" : "" }}
                                name="age"
                                value="Смены 13-17 лет"
                            />
                            <div class="custom-radio__wrapper">
                                <label for="large">Смены 13-17 лет</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="grid-x grid-padding-x grid-padding-y">
                    <div class="search-buttons cell">
                        <button class="button" type="submit">Найти</button>
                        <a class="button button_hollow" href="{{url()->current();}}">Сбросить</a>
                    </div>
                </div>

            </form>
        </div>
        <div class="gallery">
            <x-pagination.simple-paginator :paginator="$pictures" />
            @if($pictures && $pictures->total() > 0)
            <div class="grid-x grid-padding-x grid-padding-y">
                <div class="cell large-12">
                @foreach($pictures->slice(
                            request()->query('page') >= 2 ? $pictures->perPage() * (request()->query('page')-1) : 0,
                            $pictures->perPage()
                        ) as $index => $picPath)
                        @if(in_array($index, [
                            0 + (request()->query('page') >= 2 ? $pictures->perPage() * (request()->query('page')-1) : 0),
                        ]))
                        <div class="grid-x">
                            <div class="cell">
                                <a
                                    class="gallery__link"
                                    href="{{'/storage/' . $picPath}}"
                                    data-fancybox="gallery"
                                >
                                    <img
                                        class="gallery__photo"
                                        src="{{'/storage/' . $picPath}}"
                                    >
                                </a>
                            </div>
                        </div>
                        @endif
                    @endforeach
                    <div class="grid-x grid-padding-y grid-margin-y grid-padding-x">
                    @foreach($pictures->slice(
                            request()->query('page') >= 2 ? $pictures->perPage() * (request()->query('page')-1) : 0,
                            $pictures->perPage()
                        ) as $index => $picPath)
                            @if(in_array($index, [
                                    1 + (request()->query('page') >= 2 ? $pictures->perPage() * (request()->query('page')-1) : 0),
                                    2 + (request()->query('page') >= 2 ? $pictures->perPage() * (request()->query('page')-1) : 0)
                                ]))
                                <div class="cell medium-12">
                                    <a
                                        class="gallery__link"
                                        href="{{'/storage/' . $picPath}}"
                                        data-fancybox="gallery"
                                    >
                                        <img
                                            class="gallery__photo"
                                            src="{{'/storage/' . $picPath}}"
                                        >
                                    </a>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
                <div class="cell large-12">
                    <div class="grid-x">
                        <div class="grid-x grid-padding-y grid-margin-y grid-padding-x">
                        @foreach($pictures->slice(
                            request()->query('page') >= 2 ? $pictures->perPage() * (request()->query('page')-1) : 0,
                            $pictures->perPage()
                        ) as $index => $picPath)
                                @if(in_array($index, [
                                        3 + (request()->query('page') >= 2 ? $pictures->perPage() * (request()->query('page')-1) : 0),
                                        4 + (request()->query('page') >= 2 ? $pictures->perPage() * (request()->query('page')-1) : 0)
                                    ]))
                                    <div class="cell medium-12">
                                        <a
                                            class="gallery__link"
                                            href="{{'/storage/' . $picPath}}"
                                            data-fancybox="gallery"
                                        >
                                            <img
                                                class="gallery__photo"
                                                src="{{'/storage/' . $picPath}}"
                                            >
                                        </a>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        @foreach($pictures->slice(
                            request()->query('page') >= 2 ? $pictures->perPage() * (request()->query('page')-1) : 0,
                            $pictures->perPage()
                        ) as $index => $picPath)
                            @if(in_array($index, [
                                    5 + (request()->query('page') >= 2 ? $pictures->perPage() * (request()->query('page')-1) : 0)
                                ]))
                            <div class="cell">
                                <a
                                    class="gallery__link"
                                    href="{{'/storage/' . $picPath}}"
                                    data-fancybox="gallery"
                                >
                                    <img
                                        class="gallery__photo"
                                        src="{{'/storage/' . $picPath}}"
                                    >
                                </a>
                            </div>
                            @endif
                        @endforeach
                    </div>
                </div>
                @foreach($pictures->slice(
                            request()->query('page') >= 2 ? $pictures->perPage() * (request()->query('page')-1) : 0,
                            $pictures->perPage()
                        ) as $index => $picPath)
                        @if(in_array($index, [
                            6 + (request()->query('page') >= 2 ? $pictures->perPage() * (request()->query('page')-1) : 0)
                        ]))
                        <div class="cell">
                            <a
                                class="gallery__link"
                                href="{{'/storage/' . $picPath}}"
                                data-fancybox="gallery"
                            >
                                <img
                                    class="gallery__photo"
                                    src="{{'/storage/' . $picPath}}"
                                >
                            </a>
                        </div>
                        @endif
                    @endforeach
                </div>
                @else
                    @if (!empty(request()->all()))
                    <div class="callout callout__info">
                        К сожалению, фотографии не найдены
                    </div>
                    @endif
                @endif
            </div>
        <br>
        <x-pagination.simple-paginator :paginator="$pictures" />
    </div>
@endsection
