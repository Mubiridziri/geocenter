# Первоначальная установка

___
> Установка пакета и настройка обязательных параметров

## Установка

```
$ composer require mubiridziri/geocenter
```

#### Зависимости

| Пакет                        | Версия |
|------------------------------|--------|
| symfony/config               | 5.4.*  |
| symfony/dependency-injection | 5.4.*  |
| symfony/http-client          | 5.4.*  |
| symfony/serializer           | 5.4.*  |


## Настройка

> Создайте файл в `config/packages/geocenter_bundle.yaml`

В geocenter_bundle.yaml поместить следующие параметры:

```
geocenter_bundle:
  license: "..."
  decoder_url: '%env(resolve:DECODER_URL)%'
  reverse_decoder_url: '%env(resolve:REVERSE_DECODER_URL)%'

```

В вашем файле параметров окружения (.env) описать использующиеся переменные, пример:

```
DECODER_URL=http://host:port
REVERSE_DECODER_URL=http://host:port
```
