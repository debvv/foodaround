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
