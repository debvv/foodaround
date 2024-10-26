from sqlalchemy import create_engine, Column, Integer, String, Text
from sqlalchemy.orm import declarative_base

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

# Создание базы данных
engine = create_engine('sqlite:///food_recommendation.db')
Base.metadata.create_all(engine)
