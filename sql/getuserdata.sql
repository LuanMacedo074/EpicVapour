SELECT email, "nomeUsuario", "idPublico", senha, saldo, salt, idioma, is_active, codigo_ativacao, tempo_codigo, recovery_code
	FROM public.usuario WHERE email = ?;