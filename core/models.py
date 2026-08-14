from django.db import models
from django.contrib.auth.models import User

class Perfil(models.Model):
    user = models.OneToOneField(User, on_delete=models.CASCADE, related_name='perfil')

    cpf = models.CharField('CPF',max_length=14, unique=True)
    nome_completo = models.CharField('Nome Completo', max_length=100,null=False ,blank=False)
    data_nascimento = models.DateField('Data de Nascimento', null=False ,blank=False)
    cidade = models.CharField('Cidade', max_length=100, null=False ,blank=False)
    endereco = models.CharField('Endereço', max_length=200, null=False ,blank=False)

    #Campos Profissionais
    crp = models.CharField('CRP', max_length=20, null=True, blank=True)
    status = models.CharField('Status', max_length=20, null=False, choices=[
        ('ativo', 'Ativo'),
        ('inativo', 'Inativo'),
    ], default='ativo')
    instituicao = models.CharField('Instituição', max_length=100, null=True, blank=True)
    tipo = models.CharField('Tipo', max_length=50, null=True, blank=True)
    intencao = models.TextField('Intenção', max_length=20, null=False, choices=[
        ('usuario', 'Usuário'),
        ('supervisor', 'Supervisor'),
        ('profissional', 'Profissional'),
        ('estagiario', 'Estagiário'),
    ], default='usuario')

    def __str__(self):
        return f'Perfil de {self.user.username}'

# Create your models here.
