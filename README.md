📌 Laravel Product Pricing Calculation**

Этот проект позволяет рассчитывать стоимость продукта с учетом налогов (аналог НДС) в зависимости от страны покупателя.

🛠️ Требования**
Перед началом убедитесь, что у вас установлены:
- **PHP 8.3**
- **Composer**
- **Laravel 12**
- **MySQL 8.2 / PostgreSQL / SQLite**
- **Node.js & npm**
- 
🚀 Установка и запуск**
1️⃣ Клонируем проект**
git clone https://github.com/your-repo/product-pricing.git
cd product-pricing

2️⃣ Устанавливаем зависимости
composer install

3️⃣ Настраиваем .env файл
Создайте .env, скопировав .env.example:
cp .env.example .env

В .env настройте базу данных:
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=product_pricing
DB_USERNAME=root
DB_PASSWORD=

4️⃣ Генерируем ключ приложения
php artisan key:generate

5️⃣ Запускаем миграции и заполняем базу
php artisan migrate --seed

php artisan serve
http://127.0.0.1:8000

📌 Как использовать?
Откройте страницу /.
Выберите продукт из списка.
Введите Tax номер (например, GR123456789).
Нажмите кнопку "Рассчитать".
Получите итоговую цену с налогом.


🛠️ Основные компоненты проекта
📁 Структура кода
app/
 ├── Http/
 │   ├── Controllers/
 │   │   ├── PriceCalculatorController.php
 │   ├── Requests/
 │   │   ├── PriceCalculationRequest.php
 ├── Models/
 │   ├── Product.php
 │   ├── Country.php
 │   ├── TaxRate.php
 ├── Services/
 │   ├── TaxCalculatorService.php

📌 Основные файлы
Product.php – Модель продуктов.
Country.php – Модель стран.
TaxRate.php – Модель налоговых ставок.
PriceCalculatorController.php – Контроллер обработки формы.
TaxCalculatorService.php – Сервис расчета стоимости с налогами.
PriceCalculationRequest.php – Валидация формы запроса.

🧪 Тестирование
📌 Запуск всех тестов
php artisan test

📌 Запуск unit-теста (без очистки базы)
php artisan test --filter=PriceCalculationUnitTest

📌 Ожидаемые результаты
PASS  Tests\Unit\PriceCalculationUnitTest
✓ it calculates price correctly for germany
✓ it calculates price correctly for italy
✓ it calculates price correctly for greece
✓ it returns original price for invalid country code

📌 Расширение проекта
✅ Добавить новые страны – просто добавить запись в таблицу countries.
✅ Изменить налоговые ставки – обновить tax_rates в базе.
✅ Поддержка API – создать API Resource и Controller.








