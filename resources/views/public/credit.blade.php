@extends('public.layouts.main')
@section('meta')
    <title>Кредит</title>
    <meta name="description" content="Отзывы">
    <meta name="keywords" content="Отзывы">
@endsection

@section('content')
    <section>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 hidden-xs">
                    <ul class="breadcrambs">
                        <li><a href="{{env('APP_URL')}}" target="_blank">Главная →</a></li>
                        <li><a href="javascript:void(0);" target="_blank">Оформление кредита</a></li>
                    </ul>
                </div>
                <div class="col-sm-12 col-xs-12">
                    <p class="main-title">Заполнение анкеты</p>
                    <div class="basket__step-title">
                        <p class="active">1.Основная информация</p>
                        <p>2. Дополнительная информация</p>
                    </div>
                    <p class="credit__subtitle">Данные для заявки на оформление рассрочки/кредит <br><span>Обязательные поля отмечены <span>*</span></span></p>
                </div>
                <div class="col-md-4 col-sm-3 hidden-xs">
                    <ul class="credit-features">
                        <li>
                            <img src="/images/icons/credit/1.png" alt="">
                            <p>
                                <span>Безопасно</span>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                            </p>
                        </li>
                        <li>
                            <img src="/images/icons/credit/2.png" alt="">
                            <p>
                                <span>Прозрачно</span>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                            </p>
                        </li>
                        <li>
                            <img src="/images/icons/credit/3.png" alt="">
                            <p>
                                <span>Просто</span>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                            </p>
                        </li>
                        <li>
                            <img src="/images/icons/credit/4.png" alt="">
                            <p>
                                <span>Быстро</span>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                            </p>
                        </li>
                    </ul>
                </div>
                <div class="col-md-8 col-sm-9 col-xs-12">
                    <form action="" class="credit-form">
                        <p class="credit-form__title">Основная информация</p>
                        <div class="credit-form__name-list credit-form__margin">
                            <div class="credit-form__input-wrp">
                                <label for="surname" class="label-width">Фамилия <span>*</span></label>
                                <input type="text" id="surname" name="surname" data-title="Фамилия">
                            </div>
                            <div class="credit-form__input-wrp">
                                <label for="name">Имя <span>*</span></label>
                                <input id="name" type="text" name="name" data-title="Имя">
                            </div>
                            <div class="credit-form__input-wrp">
                                <label for="patronymic">Отчество <span>*</span></label>
                                <input type="text" id="patronymic" name="patronymic" data-title="Отчество">
                            </div>
                        </div>
                        <div class="credit-form__input-wrp credit-form__margin">
                            <label for="phone" class="label-width">Контактный телефон <span>*</span></label>
                            <input class="input-width100" id="phone" type="tel" name="phone" data-title="Телефон" data-validate-required="Обязательное поле" data-validate-uaphone="Неправильный номер">
                        </div>
                        <div class="credit-form__name-list credit-form__margin">
                            <div class="credit-form__input-wrp date-inputs">
                                <label for="birthday" class="label-width">Дата Рождения <span>*</span></label>
                                <div>
                                    <input type="text" id="birthday" name="birthday-year" data-title="Год рождения" placeholder="год">
                                    <input type="text" id="birthday" name="birthday-mounth" data-title="Месяц рождения" placeholder="месяц">
                                    <input type="text" id="birthday" name="birthday-day" data-title="День рождения" placeholder="день">
                                </div>
                            </div>
                            <div class="credit-form__input-wrp identification-code">
                                <label for="identification-code">Идентификационнный код <span>*</span></label>
                                <input id="identification-code" type="text" name="identification-code" data-title="Идентификационнный код">
                                <p>Код должен состоять из 10 цифр *</p>
                            </div>
                        </div>
                        <div class="credit-form__name-list credit-form__margin">
                            <div class="credit-form__input-wrp date-inputs">
                                <label for="passport-date" class="label-width">Дата выдачи паспорта <span>*</span></label>
                                <div>
                                    <input type="text" id="passport-date" name="passport-year" data-title="Год выдачи паспорта" placeholder="год">
                                    <input type="text" id="passport-date" name="passport-mounth" data-title="Месяц выдачи паспорта" placeholder="месяц">
                                    <input type="text" id="passport-date" name="passport-day" data-title="День выдачи паспорта" placeholder="день">
                                </div>
                            </div>
                            <div class="credit-form__input-wrp date-inputs">
                                <label for="passport-date">Серия и номер паспорта <span>*</span></label>
                                <div>
                                    <input type="text" id="passport-date" name="passport-year" data-title="Год выдачи паспорта" placeholder="НР">
                                    <input type="text" id="passport-date" name="passport-mounth" data-title="Месяц выдачи паспорта" placeholder="123456">
                                </div>
                            </div>
                        </div>
                        <div class="credit-form__input-wrp credit-form__margin">
                            <label for="passport-place" class="label-width">Кем выдан паспорт <span>*</span></label>
                            <input class="input-width100" id="passport-place" type="text">
                        </div>
                        <div class="credit-form__agree">
                            <input type="checkbox" name="credit-form-agree" class="checkbox-custom" id="credit-form-agree">
                            <label for="credit-form-agree" class="label-custom">Я ознакомлен и согласен с <a href="">офертой</a> и с <a href="">паспортом кредита</a></label>
                        </div>
                        <button type="submit" class="credit-form__btn">Отправить заказ</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection