<div class="grid-container">
    <header class="header">
        <a class="header__logo" href="/" title="На главную">
            <img style="width: 80%" src="/storage/{{ json_decode($settings['site.logo']->value, true)[0]['download_link']}}">
        </a>
        <button class="burger" id="navToggle" type="button">
            <span class="burger__item">Menu</span>
        </button>
        <nav class="nav" id="nav">
            <div class="work-time">
                <div class="work-time__wrapper">
                    <div class="work-time__item">
                        <a class="work-time__link" href="tel:+{{ preg_replace('/[^0-9.]+/', '', $settings["site.main_phone"]->value) }}">
                            {{ $settings["site.main_phone"]->value }}
                        </a>
                    </div>
                    <div class="work-time__item">{{ $settings["site.work_time"]->value }}</div>
                </div>
            </div>
            <div class="nav__links">
                {{ menu('Главное', 'components.menu.main_top') }}
                {{ menu('Главное 2', 'components.menu.main_top_second') }}
            </div>
        </nav>
        <div class="work-time">
            <div class="work-time__wrapper">
                <div class="work-time__item">
                    <a class="work-time__link" href="tel:+{{ preg_replace('/[^0-9.]+/', '', $settings["site.main_phone"]->value) }}">
                        {{ $settings["site.main_phone"]->value }}
                    </a>
                </div>
                <div class="work-time__item">{{ $settings["site.work_time"]->value }}</div>
            </div>
        </div>
    </header>
</div>
