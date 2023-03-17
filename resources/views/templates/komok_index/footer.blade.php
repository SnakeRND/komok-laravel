<div class="grid-container">
    <footer class="footer">

        <div class="grid-x large-up-4 medium-up-2 grid-margin-y">
            {{ menu('Главное', 'components.menu.main_bottom') }}
            {{ menu('Главное 2', 'components.menu.main_bottom_second') }}
            <div class="cell">
                <div class="footer__contacts">
                    <div class="footer__worktime">
                        <a class="footer__phone"
                           href="tel:+{{ preg_replace('/[^0-9.]+/', '', $settings["site.main_phone"]->value) }}">
                            {{ $settings["site.main_phone"]->value }}
                        </a>
                        <div>{{ $settings["site.work_time"]->value }}</div>
                    </div>
                    {{ menu('Соц.сети', 'components.menu.main_bottom_social') }}
                    <div>
                        <a href="https://vlagere.ru/organization/ooo-mba/" id="widget_vlagere" target="_blank"
                           style="margin:0 0 10px 0!important;text-align:left!important;font-size:14px!important;display:block!important;text-decoration:none!important;position:relative!important;border:0px solid #d4d4d4!important;height:50px!important;min-height:50px!important;max-height:50px!important;padding:5px 5px 5px 12px!important;border-radius:5px!important;line-height:15px!important;width:185px!important;min-width:185px!important;max-width:185px!important;box-sizing:border-box;font-family:Arial, Helvetica!important;background:#4285f4!important;"
                           rel="noopener"><span
                                style="line-height:17px!important;float:left!important;margin: 2px 8px 0 0px!important;padding: 0!important;font-family: Arial, Helvetica!important;color:#fff!important;">Рейтинг на <strong
                                    style="padding: 0!important;margin: 3px 0px 0 0px!important;display: block!important;font-size: 14px!important;line-height:17px!important;">vlagere.ru</strong></span><img
                                src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4KPCEtLSBHZW5lcmF0b3I6IEFkb2JlIElsbHVzdHJhdG9yIDIyLjAuMSwgU1ZHIEV4cG9ydCBQbHVnLUluIC4gU1ZHIFZlcnNpb246IDYuMDAgQnVpbGQgMCkgIC0tPgo8c3ZnIHZlcnNpb249IjEuMSIgaWQ9ItCh0LvQvtC5XzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4IgoJIHZpZXdCb3g9IjAgMCAxODQuNyA4NC4yIiBzdHlsZT0iZW5hYmxlLWJhY2tncm91bmQ6bmV3IDAgMCAxODQuNyA4NC4yOyIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSI+CjxzdHlsZSB0eXBlPSJ0ZXh0L2NzcyI+Cgkuc3Qwe2ZpbGw6I0Y5Q0UwMDt9Cgkuc3Qxe2ZpbGw6I0ZGRkZGRjt9Cjwvc3R5bGU+CjxwYXRoIGNsYXNzPSJzdDAiIGQ9Ik00NS4yLDU4LjJjMC4yLTguNiwzLTE3LjMsOC0yNC43YzIuNS0zLjcsNS42LTcuMSw5LjItOS45YzMuNi0yLjgsNy41LTUuMSwxMS43LTYuOWM0LjItMS43LDguNy0yLjcsMTMuMi0zLjIKCWM0LjUtMC41LDktMC40LDEzLjQsMC40YzQuNCwwLjcsOC43LDIsMTIuNywzLjhjNCwxLjgsNy43LDQuMSwxMSw2LjhjLTQuMS0xLjQtOC4xLTIuNy0xMi4xLTMuNmMtNC0wLjktOC4xLTEuNC0xMi4yLTEuNQoJYy0xLDAtMi0wLjEtMy0wLjFsLTMsMC4xYy0yLDAuMi00LDAuMy01LjksMC43bC0xLjUsMC4ybC0xLjUsMC4zYy0xLDAuMi0xLjksMC40LTIuOSwwLjdjLTAuOSwwLjMtMS45LDAuNS0yLjgsMC44bC0yLjgsMQoJYy03LjMsMy0xMy45LDcuNS0xOS4yLDEzLjZDNTIuMyw0Mi44LDQ4LjMsNTAuMSw0NS4yLDU4LjJ6Ii8+CjxwYXRoIGNsYXNzPSJzdDAiIGQ9Ik0yNy4xLDU5LjFjMS0xMS41LDUuMS0yMi44LDExLjktMzIuNUM0NS44LDE3LDU1LjYsOS4yLDY2LjcsNC44YzExLjEtNC40LDIzLjMtNS44LDM1LTQuMQoJYzUuOCwwLjksMTEuNiwyLjMsMTcsNC42YzUuNCwyLjMsMTAuNSw1LjEsMTUuMSw4LjVjLTUuMy0yLjMtMTAuNi00LjMtMTYtNS43Yy01LjQtMS41LTExLTIuMy0xNi41LTIuN2MtMTEuMS0wLjgtMjIuMSwxLTMyLjMsNQoJQzU4LjgsMTQuNCw0OS44LDIxLDQyLjcsMjkuNUMzNS42LDM4LDMwLjUsNDguMiwyNy4xLDU5LjF6Ii8+CjxwYXRoIGNsYXNzPSJzdDEiIGQ9Ik0xNzcuNyw1Mi42Yy03LjItMy41LTE0LjQtNi45LTIxLjktOS41Yy03LjQtMi43LTE1LTQuOC0yMi42LTUuOWwtMi45LTAuM2wtMS40LTAuMWwtMS40LTAuMQoJYy0xLDAtMS45LTAuMS0yLjktMC4xbC0yLjksMGMtMy44LDAuMS03LjYsMC41LTExLjIsMS4zYy0xLjgsMC40LTMuNywwLjktNS40LDEuNWwtMi42LDAuOWMtMC45LDAuMy0xLjcsMC43LTIuNiwxLjEKCWMtMS43LDAuNy0zLjQsMS42LTUuMSwyLjVjLTAuOCwwLjUtMS42LDEtMi40LDEuNWwtMS4yLDAuN0w5MCw0N2MtNi40LDQuMi0xMi41LDkuNC0xOS41LDEzLjhjLTMuNSwyLjItNy4yLDQuMS0xMS4xLDUuOGwtMywxLjEKCUw1NSw2OC4ybC0xLjUsMC40bC0zLDAuOGMtMSwwLjItMiwwLjQtMy4xLDAuNmMtOC4yLDEuNi0xNi42LDEuNC0yNC42LTAuMUMxNC43LDY4LjQsNyw2NS42LDAsNjEuOGM3LjYsMi40LDE1LjQsNC4yLDIzLjIsNC44CgljMy45LDAuMyw3LjgsMC4zLDExLjYsMGMzLjgtMC4zLDcuNy0wLjgsMTEuNC0xLjljMC45LTAuMiwxLjktMC40LDIuOC0wLjdsMi43LTAuOWwxLjMtMC41bDEuMy0wLjZsMi42LTEuMQoJYzMuNC0xLjcsNi43LTMuNSw5LjktNS43YzYuNC00LjMsMTIuNC05LjUsMTkuMy0xNC4xYzYuOC00LjYsMTQuOC04LjIsMjMuMS05LjdjNC4yLTAuOCw4LjQtMS4xLDEyLjYtMWM0LjIsMC4xLDguMywwLjcsMTIuNCwxLjQKCWM4LjEsMS43LDE1LjgsNC42LDIzLDguMUMxNjQuNCw0My42LDE3MS4zLDQ3LjgsMTc3LjcsNTIuNnoiLz4KPHBhdGggY2xhc3M9InN0MSIgZD0iTTE4NC43LDY1LjZjLTcuMi0zLjUtMTQuNC02LjktMjEuOS05LjVjLTcuNC0yLjctMTUtNC44LTIyLjYtNS45bC0yLjktMC4zbC0xLjQtMC4xbC0xLjQtMC4xCgljLTEsMC0xLjktMC4xLTIuOS0wLjFsLTIuOSwwYy0zLjgsMC4xLTcuNiwwLjUtMTEuMiwxLjNjLTEuOCwwLjQtMy43LDAuOS01LjQsMS41bC0yLjYsMC45Yy0wLjksMC4zLTEuNywwLjctMi42LDEuMQoJYy0xLjcsMC43LTMuNCwxLjYtNS4xLDIuNWMtMC44LDAuNS0xLjYsMS0yLjQsMS41bC0xLjIsMC43TDk3LDYwYy02LjQsNC4yLTEyLjUsOS40LTE5LjUsMTMuOGMtMy41LDIuMi03LjIsNC4xLTExLjEsNS44bC0zLDEuMQoJTDYyLDgxLjJsLTEuNSwwLjRsLTMsMC44Yy0xLDAuMi0yLDAuNC0zLjEsMC42Yy04LjIsMS42LTE2LjYsMS40LTI0LjYtMC4xYy04LTEuNS0xNS43LTQuMy0yMi43LTguMmM3LjYsMi40LDE1LjQsNC4yLDIzLjIsNC44CgljMy45LDAuMyw3LjgsMC4zLDExLjYsMGMzLjgtMC4zLDcuNy0wLjgsMTEuNC0xLjljMC45LTAuMiwxLjktMC40LDIuOC0wLjdsMi43LTAuOWwxLjMtMC41bDEuMy0wLjZsMi42LTEuMQoJYzMuNC0xLjcsNi43LTMuNSw5LjktNS43YzYuNC00LjMsMTIuNC05LjUsMTkuMy0xNC4xYzYuOC00LjYsMTQuOC04LjIsMjMuMS05LjdjNC4yLTAuOCw4LjQtMS4xLDEyLjYtMWM0LjIsMC4xLDguMywwLjcsMTIuNCwxLjQKCWM4LjEsMS43LDE1LjgsNC42LDIzLDguMUMxNzEuNCw1Ni42LDE3OC4zLDYwLjgsMTg0LjcsNjUuNnoiLz4KPC9zdmc+Cg=="
                                alt="Партнер vlagere.ru" title="Партнер vlagere.ru" border="0" align="left"
                                style="margin:0!important;height:40px!important;min-height:40px!important;max-height:40px!important;width:40px!important;min-width:40px!important;max-width:40px!important;display:block!important;float: left!important;height: 40px!important;position:relative!important;"><strong
                                style="position:relative!important;text-align:center!important;font-family: Arial, Helvetica!important;display: block!important;margin: 0 0 0 0px!important;font-size: 26px!important;border-radius: 20px!important;border: 0px solid #fff!important;width: 45px!important;min-width: 45px!important;max-width: 45px!important;line-height: auto!important;height: 40px!important;min-height: 40px!important;max-height: 40px!important;vertical-align: middle!important;box-sizing: border-box!important;padding: 8px 0 0 5px!important;float: left!important;color:#fff!important;">5<small
                                    style="margin:3px 0 0 0;line-height:auto!important;display:block!important;font-size:11px!important;color:#fff!important;">из
                                    5</small></strong></a>
                        <script src="https://vlagere.ru/api/1.0/widget/rating/?id=16928&amp;v=1" async=""></script>

                        <script type="text/javascript"
                                src="https://ratings.7ya.ru/informer/informer-js.aspx?rating=camps&amp;id=9273"></script>
                        <style type="text/css">.informer-7ya {
                                border-radius: 10px;
                                border: 1px solid #feb500;
                                background: #f46901;
                                float: left;
                                margin: 0px !important;
                                margin-left: 0px !important;
                                padding: 0 !important;
                                max-width: 200px;
                                text-align: center;
                                width: 200px;
                                font-family: arial, tahoma, verdana, sans-serif;
                                font-size: 12px;
                                line-height: 18px;
                            }

                            .informer-7ya h2 {
                                margin: 2px;
                                font-size: 13px;
                            }

                            .informer-7ya a, .informer-7ya a:visited {
                                text-decoration: none;
                                color: #fff;
                            }

                            .informer-7ya .item-7ya a, .informer-7ya .item-7ya a:visited {
                                line-height: 16px;
                                font-weight: bold;
                                font-size: 13px;
                            }

                            .informer-7ya .item-7ya {
                                background: #feb500 url("https://ratings.7ya.ru/img/ratings_logo_bgr.jpg") no-repeat;
                                background-position: 0px 0px;
                                border-top-right-radius: 10px;
                                border-top-left-radius: 10px;
                                margin-top: -2px;
                                padding-top: 3px;
                            }

                            .informer-7ya .ball-7ya span {
                                font-weight: bold;
                                font-size: 14px;
                                margin-right: 10px;
                            }

                            .ball-7ya {
                                font-size: 12px;
                                line-height: 16px;
                                background: url("https://img.7ya.ru/pict/pict_stars.png") no-repeat;
                                padding: 7px 0 5px 40px;
                            }</style>


                    </div>
                </div>
            </div>
            <div class="cell">
                <div class="footer__addres">
                    <div class="footer__addres-item">{{ $settings["site.main_address"]->value}}</div>
                    <div class="footer__addres-item">{{ $settings["site.bank_detalis"]->value }}</div>
                </div>
            </div>
        </div>


    </footer>
</div>
