from flask import Flask, request, jsonify
import pandas as pd
from sklearn.metrics.pairwise import cosine_similarity
from sklearn.feature_extraction.text import CountVectorizer

app = Flask(__name__)

# Пример данных о заказах
data = {
    'user_id': [1, 2, 3, 4, 5],
    'order_history': [
        'Pancakes, Sweets, Burgers',
        'Porridge, Meat, Rice',
        'Pancakes, Meat, Rice',
        'Sweets, Burgers, Rice',
        'Pancakes, Porridge, Meat'
    ]
}

# Создание DataFrame
df = pd.DataFrame(data)

# Векторизация данных
count_vectorizer = CountVectorizer(tokenizer=lambda x: x.split(', '))
count_matrix = count_vectorizer.fit_transform(df['order_history'])

# Вычисление косинусного сходства
cosine_sim = cosine_similarity(count_matrix, count_matrix)

# Функция для получения рекомендаций
def get_recommendations(user_id, cosine_sim=cosine_sim):
    idx = df.index[df['user_id'] == user_id].tolist()[0]
    sim_scores = list(enumerate(cosine_sim[idx]))
    sim_scores = sorted(sim_scores, key=lambda x: x[1], reverse=True)
    sim_scores = sim_scores[1:4]  # Получение топ-3 похожих пользователей
    user_indices = [i[0] for i in sim_scores]
    recommendations = df['order_history'].iloc[user_indices]
    return recommendations

@app.route('/recommend', methods=['GET'])
def recommend():
    user_id = int(request.args.get('user_id'))
    recommendations = get_recommendations(user_id)
    return jsonify(recommendations.tolist())

if __name__ == '__main__':
    app.run(debug=True)
from sqlalchemy import create_engine, Column, Integer, String, Text
from sqlalchemy.ext.declarative import declarative_base
from sqlalchemy.orm import sessionmaker

Base = declarative_base()

class User(Base):
    __tablename__ = 'users'
    id = Column(Integer, primary_key=True)
    name = Column(String)

class Order(Base):
    __tablename__ = 'orders'
    id = Column(Integer, primary_key=True)
    user_id = Column(Integer)
    order_history = Column(Text)

engine = create_engine('sqlite:///food_recommendation.db')
Base.metadata.create_all(engine)
Session = sessionmaker(bind=engine)
session = Session()
