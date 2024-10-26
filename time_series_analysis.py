import pandas as pd
from sqlalchemy.orm import sessionmaker
from sqlalchemy import create_engine
import matplotlib.pyplot as plt
from statsmodels.tsa.seasonal import seasonal_decompose

# Подключение к базе данных
engine = create_engine('sqlite:///food_recommendation.db')
Session = sessionmaker(bind=engine)
session = Session()

# Загрузка данных из базы данных
orders = pd.read_sql('SELECT * FROM orders', engine)

# Преобразование данных в формат временного ряда
orders['order_date'] = pd.to_datetime(orders['order_date'])
orders.set_index('order_date', inplace=True)
order_counts = orders.resample('M').size()

# Анализ временных рядов
decomposition = seasonal_decompose(order_counts, model='additive')
decomposition.plot()
plt.show()

def get_seasonal_trends():
    return decomposition.seasonal
