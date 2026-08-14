from django.contrib import admin
from .models import Perfil

# Register your models here.
@admin.register(Perfil)
class PerfilAdmin(admin.ModelAdmin):
    list_display = ['user', 'cpf', 'cidade', 'intencao', 'status']
    search_fields = ['user__username', 'cpf', 'nome_completo']
