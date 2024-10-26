import pandas as pd
from sqlalchemy.orm import sessionmaker
from sqlalchemy import create_engine
from sklearn.cluster import KMeans
from sklearn.preprocessing import StandardScaler

# Подключение к базе данных
engine = create_engine('sqlite:///food_recommendation.db')
Session = sessionmaker(bind=engine)
session = Session()

# Загрузка данных из базы данных
users = pd.read_sql('SELECT * FROM users', engine)
orders = pd.read_sql('SELECT * FROM orders', engine)

# Подготовка данных для кластеризации
user_order_counts = orders.groupby('user_id').size().reset_index(name='order_count')
user_data = pd.merge(users, user_order_counts, left_on='id', right_on='user_id')
user_data = user_data.drop(columns=['user_id'])

# Стандартизация данных
scaler = StandardScaler()
user_data_scaled = scaler.fit_transform(user_data[['order_count']])

# Кластеризация пользователей
kmeans = KMeans(n_clusters=5, random_state=42)
user_data['cluster'] = kmeans.fit_predict(user_data_scaled)

def get_user_cluster(user_id):
    return user_data[user_data['id'] == user_id]['cluster'].values[0]
