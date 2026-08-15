from django.urls import path
from . import views

urlpatterns = [
    path('login/', views.login_view, name='login'),
    path('criar_conta/', views.criar_conta, name='criar_conta'),
    path('home/', views.home, name='home'),
    path('perfil_usuario/', views.perfil_usuario, name='perfil_usuario'),

    path('consulta-psicologos/', views.consulta_psicologos, name='consulta_psicologos'),
    path('api/pesquisar-psicologos/', views.pesquisar_psicologos, name='pesquisar_psicologos'), 
]