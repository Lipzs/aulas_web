from django.shortcuts import render
from django.core.validators import validate_email

from html import escape

def preprocessa(campo):
	if campo is not None:
		return escape(bytes(campo.strip(), "utf-8").decode("unicode_escape"))
	else:
		return ""

def usuario_criar(request):
	contexto = {}
	erros = []

	if request.method == "POST":
		nome = preprocessa(request.POST.get("nome"))
		email = preprocessa(request.POST.get("email"))
		senha = preprocessa(request.POST.get("senha"))
		conf_senha = preprocessa(request.POST.get("conf_senha"))
		cidade = preprocessa(request.POST.get("cidade"))
		idade = preprocessa(request.POST.get("idade"))
		comentarios = preprocessa(request.POST.get("comentarios"))
		sexo = preprocessa(request.POST.get("sexo"))
		termos = preprocessa(request.POST.get("termos"))

		if not nome:
			erros.append("Nome é campo obrigatório.")
		if not email:
			erros.append("E-mail é campo obrigatório.")
		else:
			try:
				validate_email(email)
			except:
				erros.append("E-mail inválido.")
		if not senha:
			erros.append("Senha é campo obrigatório.")
		if not conf_senha:
			erros.append("Confirmar senha é campo obrigatório.")
		elif conf_senha != senha:
			erros.append("Senhas não conferem.")
		if idade and not idade.isdigit():
			erros.append("Idade deve ser um inteiro maior ou igual a 0.")
		if not termos:
			erros.append("Você precisa concordar com os termos de uso.")

		contexto = {
			"campos": {
				"nome": nome,
				"email": email,
				"senha": senha,
				"conf_senha": conf_senha,
				"cidade": cidade,
				"idade": idade,
				"comentarios": comentarios,
				"sexo": sexo,
				"termos": termos
			},
		"erros": erros,
		}
	return render(request, "usuarios/usuario_criar.html", contexto)
