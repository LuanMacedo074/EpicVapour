SELECT email, "nomeUsuario", "idPublico", descricao, avatar_path
	FROM public.usuario WHERE "idPublico" = ?;