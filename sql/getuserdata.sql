SELECT email, "nomeUsuario", "idPublico", senha, saldo, salt, idioma, is_active, codigo_ativacao, tempo_codigo, recovery_code
, session_token, avatar_path, account_type
	FROM public.usuario WHERE email = ?;