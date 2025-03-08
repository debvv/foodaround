-- Таблица для отзывов о кулинарах
CREATE TABLE chef_reviews (
    id SERIAL PRIMARY KEY,
    chef_name VARCHAR(255) NOT NULL,
    rating FLOAT NOT NULL,
    comment TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Таблица для отзывов из скрапинга/датасетов
CREATE TABLE scraped_reviews (
    id SERIAL PRIMARY KEY,
    restaurant_name VARCHAR(255) NOT NULL,
    source VARCHAR(255), -- Например, "TripAdvisor", "Google Reviews"
    rating FLOAT,
    review_text TEXT,
    review_date TIMESTAMP,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


-- ?  ALTER TABLE feedback ADD COLUMN additional_info TEXT; -- Если хотим расширить `feedback`



-- 1. В chef_reviews стоит добавить связь с users Сейчас у отзыва о кулинаре нет связи с пользователем (кто оставил отзыв).
-- 👉 Решение: Добавить user_id с внешним ключом:
ALTER TABLE chef_reviews ADD COLUMN user_id INT;
ALTER TABLE chef_reviews ADD FOREIGN KEY (user_id) REFERENCES users(unique_id) ON DELETE CASCADE;
--📌 2. В scraped_reviews добавить связь с ресторанами Отзывы из скрапинга не связаны с restaurants (которой пока нет).
--👉 Решение: Добавить таблицу restaurants:
CREATE TABLE restaurants (
    id SERIAL PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    address TEXT,
    rating FLOAT,
    cuisine JSON,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
-- Затем обновить scraped_reviews:
ALTER TABLE scraped_reviews ADD COLUMN restaurant_id INT;
ALTER TABLE scraped_reviews ADD FOREIGN KEY (restaurant_id) REFERENCES restaurants(id) ON DELETE CASCADE;

--📌 3. В orders возможно стоит привязать к users Сейчас поле from_id – это пользователь? Если да, стоит сделать FOREIGN KEY:
ALTER TABLE orders ADD FOREIGN KEY (from_id) REFERENCES users(unique_id) ON DELETE CASCADE;

-- 📌 4. Нужно ли хранить пароли в users? Пароль сейчас в открытом виде – это плохо для безопасности.
--👉 Решение: Сделать password_hash, а хранение паролей переделать под bcrypt (SHA256):
ALTER TABLE users RENAME COLUMN password TO password_hash;

