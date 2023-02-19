# Класс для работы с лейблами.

/app/Http/Controllers/Label/LabelController.php

Лейбл представляет собой текстовую строку (например: label1) которая может
устанавливаться на трёх видах сущностей: пользователи, кампании или сайте.

### Доступный пример файла для работы с классом

/app/Http/Controllers/Label/IndexController.php

## **Пример использования класса**:

```php
// 1) Перезапись лейблов у сущности пользователь
$user = new User();
$label = new LabelController();
$result = $label->rewrite($user, 1, ['label1', 'label2']);

// 2) Добавление лейблов к сущности компания
$company = new Company();
$label = new LabelController();
$result = $label->add($company, 2, ['label3']);

// 3) Удаление лейблов у сущности сайт
$site = new Site();
$label = new LabelController();
$result = $label->delete($site, 2, ['label2', 'label3']);

// 3) Чтение лейблов у сущности пользователь
$user = new User();
$label = new LabelController();
$result = $label->read($user, 2);
```

## Для запуска миграций используйте Artisan-команду migrate

```bash
php artisan migrate
```
