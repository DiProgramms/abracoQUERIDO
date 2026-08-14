from django.shortcuts import render, redirect
from django.contrib.auth import authenticate, login
from django.contrib.auth.models import User
from django.contrib.auth.decorators import login_required
from django.contrib import messages

from .models import Perfil

def criar_conta(request):
    username = request.POST.get('username')
    password = request.POST.get('password')
    nome = request.POST.get('nome')
    email = request.POST.get('email')

    cpf = request.POST.get('cpf')
    birthdate = request.POST.get('birthdate')
    city = request.POST.get('city')
    address = request.POST.get('address')
    crp = request.POST.get('crp')
    status = request.POST.get('status')
    instituicao = request.POST.get('instituicao')
    tipo = request.POST.get('tipo')
    intention = request.POST.get('intention')

    if User.objects.filter(username=username).exists():
        messages.error(request, 'Nome de usuário já existe.')
        return render(request,'core/account/criarCONTA.html')

    user = User.objects.create_user(
        username=username, 
        password=password, 
        email=email, 
        first_name=nome)

    #Cria Perfil com dados extras
    Perfil.objects.create(
        user=user,
        cpf=cpf,
        nome_completo=nome,
        data_nascimento=birthdate,
        cidade=city,
        endereco=address,
        crp=crp,
        status=status,
        instituicao=instituicao,
        tipo=tipo,
        intencao=intention
    )


    messages.success(request, 'Conta criada com sucesso! Faça login para continuar.')
    return render(request, 'core/index.html')

def login_view(request):
    if request.method == 'POST':
        username = request.POST.get('username')
        password = request.POST.get('password')

        user = authenticate(request, username=username, password=password)

        if user is not None:
            login(request, user)
            return redirect('home')  # Redirect to a success page.
        else:
            return render(request, 'core/index.html', {'error': 'Invalid username or password.'})

    return render(request, 'core/index.html')

@login_required
def home(request):
    return render(request, 'core/main/menuprincipalUSUARIO.html')

@login_required
def consulta_psicologos(request):
    return render(request, 'core/main/usuario_html/consulta_psicologos.html')

# Create your views here.

