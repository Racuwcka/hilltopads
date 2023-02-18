# Класс для работы с лейблами.

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
