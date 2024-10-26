import pandas as pd
from sqlalchemy.orm import sessionmaker
from sqlalchemy import create_engine
from surprise import Dataset, Reader, SVD
from surprise.model_selection import train_test_split
from surprise import accuracy

# Подключение к базе данных
engine = create_engine('sqlite:///food_recommendation.db')
Session = sessionmaker(bind=engine)
session = Session()

# Загрузка данных из базы данных
orders = pd.read_sql('SELECT * FROM orders', engine)

# Подготовка данных для библиотеки Surprise
reader = Reader(rating_scale=(1, 5))
data = Dataset.load_from_df(orders[['user_id', 'id', 'order_history']], reader)

# Разделение данных на обучающую и тестовую выборки
trainset, testset = train_test_split(data, test_size=0.25)

# Обучение модели SVD
algo = SVD()
algo.fit(trainset)

# Оценка модели
predictions = algo.test(testset)
accuracy.rmse(predictions)

def get_collaborative_recommendations(user_id, n=5):
    user_orders = orders[orders['user_id'] == user_id]
    all_orders = orders['id'].unique()
    user_order_ids = user_orders['id'].unique()
    recommendations = []

    for order_id in all_orders:
        if order_id not in user_order_ids:
            est = algo.predict(user_id, order_id).est
            recommendations.append((order_id, est))

    recommendations.sort(key=lambda x: x[1], reverse=True)
    return recommendations[:n]
