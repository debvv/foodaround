from flask import Flask, request, jsonify
import pandas as pd
from sklearn.metrics.pairwise import cosine_similarity
from sklearn.feature_extraction.text import CountVectorizer
from sqlalchemy import create_engine
from sqlalchemy.orm import sessionmaker
from models import User, Order

app = Flask(__name__)

# Подключение к базе данных
engine = create_engine('sqlite:///food_recommendation.db')
Session = sessionmaker(bind=engine)
session = Session()

# Функция для получения данных о заказах
def get_order_data():
    orders = session.query(Order).all()
    data = {'user_id': [], 'order_history': []}
    for order in orders:
        data['user_id'].append(order.user_id)
        data['order_history'].append(order.order_history)
    return pd.DataFrame(data)

# Функция для получения рекомендаций
def get_recommendations(user_id):
    df = get_order_data()
    count_vectorizer = CountVectorizer(tokenizer=lambda x: x.split(', '))
    count_matrix = count_vectorizer.fit_transform(df['order_history'])
    cosine_sim = cosine_similarity(count_matrix, count_matrix)
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
