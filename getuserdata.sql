SELECT email, "nomeUsuario", "idPublico", senha, saldo, salt, idioma, is_active, codigo_ativacao, tempo_codigo
	FROM public.usuario WHERE email = ?;