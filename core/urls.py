from django.urls import path
from . import views

urlpatterns = [
    path('login/', views.login_view, name='login'),
    path('criar_conta/', views.criar_conta, name='criar_conta'),
    path('home/', views.home, name='home'),
    path('consulta-psicologos/', views.consulta_psicologos, name='consulta_psicologos'),
]