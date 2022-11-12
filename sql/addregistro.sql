INSERT INTO public.usuario(
	email, "nomeUsuario", "idPublico", senha, saldo, salt, idioma, codigo_ativacao, tempo_codigo)
	VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?);