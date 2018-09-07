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
                        <li><a href="" target="_blank">Главная →</a></li>
                        <li><a href="" target="_blank">Категории →</a></li>
                        <li><a href="" target="_blank">Карточка товара →</a></li>
                        <li><a href="" target="_blank">Оформление кредита</a></li>
                    </ul>
                </div>
                <form action="/creditsender" class="ajax_form credit_form"
                      data-error-title="Ошибка отправки!"
                      data-error-message="Попробуйте отправить заявку через некоторое время."
                      data-success-title="Спасибо за заявку!"
                      data-success-message="Наш менеджер свяжется с вами в ближайшее время.">
                    <div id="tab1">
                        <div class="col-sm-12 col-xs-12">
                            <p class="main-title">Заполнение анкеты</p>
                            <div class="basket__step-title">
                                <p class="active">1.Основная информация</p>
                                <p class="to_tab_2" style="cursor: pointer;">2. Дополнительная информация</p>
                            </div>
                            <p class="credit__subtitle">Данные для заявки на оформление рассрочки/кредит <br><span>Обязательные поля отмечены <span>*</span></span></p>
                        </div>
                        <div class="col-md-4 col-sm-3 hidden-xs">
                            <ul class="credit-features">
                                <li>
                                    <img src="../../images/icons/credit/1.png" alt="">
                                    <p>
                                        <span>Безопасно</span>
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                                    </p>
                                </li>
                                <li>
                                    <img src="../../images/icons/credit/2.png" alt="">
                                    <p>
                                        <span>Прозрачно</span>
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                                    </p>
                                </li>
                                <li>
                                    <img src="../../images/icons/credit/3.png" alt="">
                                    <p>
                                        <span>Просто</span>
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                                    </p>
                                </li>
                                <li>
                                    <img src="../../images/icons/credit/4.png" alt="">
                                    <p>
                                        <span>Быстро</span>
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                                    </p>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-8 col-sm-9 col-xs-12">
                            <div class="credit-form">
                                <p class="credit-form__title">Основная информация</p>
                                <div class="credit-form__name-list credit-form__margin">
                                    <div class="credit-form__input-wrp">
                                        <label for="surname" class="label-width">Фамилия <span>*</span></label>
                                        <input type="text" id="surname" name="surname" data-title="Фамилия" data-validate-required="Обязательное поле">
                                    </div>
                                    <div class="credit-form__input-wrp">
                                        <label for="name">Имя <span>*</span></label>
                                        <input id="name" type="text" name="name" data-title="Имя" data-validate-required="Обязательное поле">
                                    </div>
                                    <div class="credit-form__input-wrp">
                                        <label for="patronymic">Отчество <span>*</span></label>
                                        <input type="text" id="patronymic" name="patronymic" data-title="Отчество" data-validate-required="Обязательное поле">
                                    </div>
                                </div>
                                <div class="credit-form__input-wrp credit-form__margin">
                                    <label for="phone" class="label-width">Контактный телефон <span>*</span></label>
                                    <input class="input-width100" id="phone" type="tel" name="phone" data-title="Телефон" data-validate-required="Обязательное поле" data-validate-uaphone="Неправильный номер">
                                </div>
                                <div class="credit-form__name-list credit-form__margin">
                                    <div class="credit-form__input-wrp date-inputs">
                                        <label class="label-width">Дата Рождения <span>*</span></label>
                                        <div>
                                            <input type="text" name="birthday-year" data-title="Год рождения" placeholder="год" data-validate-required="Обязательное поле">
                                            <input type="text" name="birthday-mounth" data-title="Месяц рождения" placeholder="месяц" data-validate-required="Обязательное поле">
                                            <input type="text" name="birthday-day" data-title="День рождения" placeholder="день" data-validate-required="Обязательное поле">
                                        </div>
                                    </div>
                                    <div class="credit-form__input-wrp identification-code">
                                        <label for="identification-code">Идентификационнный код <span>*</span></label>
                                        <input id="identification-code" type="text" name="identification-code" data-title="Идентификационнный код" data-validate-required="Обязательное поле">
                                        <p>Код должен состоять из 10 цифр *</p>
                                    </div>
                                </div>
                                <div class="credit-form__name-list credit-form__margin">
                                    <div class="credit-form__input-wrp date-inputs">
                                        <label class="label-width">Дата выдачи паспорта <span>*</span></label>
                                        <div>
                                            <input type="text" name="passport-year" data-title="Год выдачи паспорта" placeholder="год" data-validate-required="Обязательное поле">
                                            <input type="text" name="passport-mounth" data-title="Месяц выдачи паспорта" placeholder="месяц" data-validate-required="Обязательное поле">
                                            <input type="text" name="passport-day" data-title="День выдачи паспорта" placeholder="день" data-validate-required="Обязательное поле">
                                        </div>
                                    </div>
                                    <div class="credit-form__input-wrp date-inputs">
                                        <label>Серия и номер паспорта <span>*</span></label>
                                        <div>
                                            <input type="text" name="passport-code" data-title="Серия паспорта" placeholder="НР" data-validate-required="Обязательное поле">
                                            <input type="text" name="passport-num" data-title="Номер паспорта" placeholder="123456" data-validate-required="Обязательное поле">
                                        </div>
                                    </div>
                                </div>
                                <div class="credit-form__input-wrp credit-form__margin">
                                    <label for="passport-place" class="label-width">Кем выдан паспорт <span>*</span></label>
                                    <input class="input-width100" name="dep" id="passport-place" type="text" data-title="Кем выдан паспорт" data-validate-required="Обязательное поле">
                                </div>
                                <button type="button" class="credit-form__btn to_tab_2">Продолжить</button>
                            </div>
                        </div>
                    </div>
                    <div id="tab2" style="display: none;">
                        <div class="col-sm-12 col-xs-12">
                            <p class="main-title">Заполнение анкеты</p>
                            <div class="basket__step-title">
                                <p class="to_tab_1" style="cursor: pointer;">1.Основная информация</p>
                                <p class="active">2. Дополнительная информация</p>
                            </div>
                            <p class="credit__subtitle">Данные для заявки на оформление рассрочки/кредит <br><span>Обязательные поля отмечены <span>*</span></span></p>
                        </div>
                        <div class="col-md-4 col-sm-3 hidden-xs">
                            <ul class="credit-features">
                                <li>
                                    <img src="../../images/icons/credit/1.png" alt="">
                                    <p>
                                        <span>Безопасно</span>
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                                    </p>
                                </li>
                                <li>
                                    <img src="../../images/icons/credit/2.png" alt="">
                                    <p>
                                        <span>Прозрачно</span>
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                                    </p>
                                </li>
                                <li>
                                    <img src="../../images/icons/credit/3.png" alt="">
                                    <p>
                                        <span>Просто</span>
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                                    </p>
                                </li>
                                <li>
                                    <img src="../../images/icons/credit/4.png" alt="">
                                    <p>
                                        <span>Быстро</span>
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                                    </p>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-8 col-sm-9 col-xs-12">
                            <div class="credit-form">
                                <p class="credit-form__title">Дополнительная информация</p>
                                <div class="credit-form__work-list">
                                    <div class="credit-form__input-wrp">
                                        <label for="name">Текущее место работы <span>*</span></label>
                                        <input type="text" name="w1" data-title="Текущее место работы <s" data-validate-required="Обязательное поле">
                                    </div>
                                    <div class="credit-form__input-wrp">
                                        <label for="name">Место работы <span>*</span></label>
                                        <input type="text" name="w2" data-title="Место работы" data-validate-required="Обязательное поле">
                                    </div>
                                </div>
                                <p class="credit-form__input-title">Кто может подтвердить Вашу информацию</p>
                                <div class="credit-form__name-list credit-form__margin">
                                    <div class="credit-form__input-wrp">
                                        <label for="surname" class="label-width">Фамилия <span>*</span></label>
                                        <input type="text" name="psurname" data-title="Фамилия поручителя" data-validate-required="Обязательное поле">
                                    </div>
                                    <div class="credit-form__input-wrp">
                                        <label for="name">Имя <span>*</span></label>
                                        <input type="text" name="pname" data-title="Имя поручителя" data-validate-required="Обязательное поле">
                                    </div>
                                    <div class="credit-form__input-wrp">
                                        <label for="patronymic">Отчество <span>*</span></label>
                                        <input type="text" name="ppatronymic" data-title="Отчество поручителя" data-validate-required="Обязательное поле">
                                    </div>
                                </div>
                                <div class="credit-form__input-wrp credit-form__margin">
                                    <label for="phone" class="label-width">Номер телефон <span>*</span></label>
                                    <input class="input-width100" type="tel" name="pphone" data-title="Телефон поручителя" data-validate-required="Обязательное поле" data-validate-uaphone="Неправильный номер">
                                </div>
                                <p class="credit-form__input-title">Адрес регистрации</p>
                                <div class="credit-form__address-list">
                                    <div class="credit-form__input-wrp">
                                        <label for="name">Область <span>*</span></label>
                                        <input type="text" name="obl1" data-title="Область регистрации" data-validate-required="Обязательное поле">
                                    </div>
                                    <div class="credit-form__input-wrp">
                                        <label for="name">Город <span>*</span></label>
                                        <input  type="text" name="gorod1" data-title="Город регистрации" data-validate-required="Обязательное поле">
                                    </div>
                                    <div class="credit-form__input-wrp">
                                        <label for="name">Улица <span>*</span></label>
                                        <input type="text" name="ulica1" data-title="Улица регистрации" data-validate-required="Обязательное поле">
                                    </div>
                                    <div class="credit-form__input-wrp">
                                        <label for="name">Дом <span>*</span></label>
                                        <input type="text" name="dom1" data-title="Дом регистрации" data-validate-required="Обязательное поле">
                                    </div>
                                    <div class="credit-form__input-wrp">
                                        <label for="name">Кв. <span>*</span></label>
                                        <input type="text" name="kv1" data-title="Кв. регистрации" data-validate-required="Обязательное поле">
                                    </div>
                                </div>
                                <p class="credit-form__input-title">Адрес проживания</p>
                                <div class="credit-form__address-list">
                                    <div class="credit-form__input-wrp">
                                        <label for="name">Область <span>*</span></label>
                                        <input type="text" name="obl2" data-title="Область проживания" data-validate-required="Обязательное поле">
                                    </div>
                                    <div class="credit-form__input-wrp">
                                        <label for="name">Город <span>*</span></label>
                                        <input  type="text" name="gorod2" data-title="Город проживания" data-validate-required="Обязательное поле">
                                    </div>
                                    <div class="credit-form__input-wrp">
                                        <label for="name">Улица <span>*</span></label>
                                        <input type="text" name="ulica2" data-title="Улица проживанияи" data-validate-required="Обязательное поле">
                                    </div>
                                    <div class="credit-form__input-wrp">
                                        <label for="name">Дом <span>*</span></label>
                                        <input type="text" name="dom2" data-title="Дом проживания" data-validate-required="Обязательное поле">
                                    </div>
                                    <div class="credit-form__input-wrp">
                                        <label for="name">Кв. <span>*</span></label>
                                        <input type="text" name="kv2" data-title="Кв. проживания" data-validate-required="Обязательное поле">
                                    </div>
                                </div>
                                <div class="credit-form__agree">
                                    <input type="checkbox" name="credit-form-agree" class="checkbox-custom" id="credit-form-agree" data-validate-required="Обязательное поле">
                                    <label for="credit-form-agree" class="label-custom">Я ознакомлен и согласен с <a href="">офертой</a> и с <a href="">паспортом кредита</a></label>
                                </div>
                                <button type="button" class="credit-form__btn to_tab_1" style="float: left">Назад</button>
                                <button type="submit" class="credit-form__btn">Отправить</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection