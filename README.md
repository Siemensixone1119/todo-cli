# 📝 TODO CLI — Task Manager in PHP  
Версия **v1.0.0**

Красивый, быстрый и полностью протестированный CLI на чистом PHP.

---

## 🚀 Особенности

- Добавление задач  
- Удаление задач  
- Обновление описания  
- Смена статуса (`todo`, `in-progress`, `done`)  
- Фильтрация списка задач  
- Красивый цветной вывод  
- Полный набор PHPUnit тестов  
- Изолированная тестовая среда (`$GLOBALS["TASKS_PATH"]`)

---

## 📦 Установка

```bash
composer install
```

---

## ▶️ Запуск команд

```bash
php task-cli.php add "купить хлеб"
php task-cli.php update 3 "починить код"
php task-cli.php delete 1
php task-cli.php list
php task-cli.php list done
php task-cli.php mark-in-progress 2
php task-cli.php mark-done 2
php task-cli.php help
```

---

## 🧪 Запуск тестов

```bash
vendor/bin/phpunit --testdox
```

---

## 📁 Структура проекта

```
todo-cli/
│
├── src/
│   ├── commands/
│   ├── helpers/
│   └── ...
│
├── tests/
│   ├── AddCommandTest.php
│   ├── DeleteCommandTest.php
│   ├── MarkCommandTest.php
│   ├── ListCommandTest.php
│   └── TestCase.php
│
├── vendor/
│
├── task-cli.php
├── composer.json
├── phpunit.xml
└── README.md
```

---

## 🧰 Пример использования

### Добавление задачи

```bash
php task-cli.php add "написать автотесты"
```

### Удаление

```bash
php task-cli.php delete 2
```

### Обновление

```bash
php task-cli.php update 3 "обновлённое описание"
```

### Просмотр

```bash
php task-cli.php list
```

---

## 🎨 Красивый вывод

Проект использует цветной вывод через ANSI-коды,  
который делает интерфейс удобным и читаемым.

---

## 🏁 Релиз

Это стабильная версия: **v1.0.0**.

Включает полный набор функциональности и тестов.  

---

Автор: **Siemensixone**  
GitHub: https://github.com/Siemensixone1119
