import { FormEvent, useEffect, useState } from "react";
import { useNavigate } from "react-router-dom";
import api from "./../../service/instance";
import { notifyError } from "./../../util/notify";
import "./signin.css"
function SignIn(): JSX.Element {
  const navigate = useNavigate();
  const [email, setEmail] = useState<string>("");
  const [password, setPassword] = useState<string>("");

  useEffect(() => {
    const token = sessionStorage.getItem("token");
    if (token) navigate("/main");
  }, [navigate]);

  async function handleSubmit(e: FormEvent) {
    e.preventDefault();
    if (!email || !password)
      return notifyError("Todos os campos são obrigatórios.");

    try {
      const response = await api.post("/login", { email, senha: password });
      const { usuarioLogado, token } = response.data;

      sessionStorage.getItemsetItem("token", token);
      sessionStorage.getItemsetItem("userId", usuarioLogado.id);
      sessionStorage.getItemsetItem("userName", usuarioLogado.nome);
      navigate("/main");
    } catch (error: unknown) {
      if (typeof error === "object" && error !== null) {
        const errorResponse = error as {
          response?: { data?: { mensagem?: string } };
        };
        notifyError(
          errorResponse?.response?.data?.mensagem ||
            "Ocorreu um erro ao fazer login."
        );
      } else {
        notifyError("Ocorreu um erro ao fazer login.");
      }
    }
  }

  return (
    <div className="container-sign-in">

      <div className="content-sign-in">
        <div className="left">
          <h1>
            Conecte-se, <span>compartilhe</span> e aprenda!
          </h1>
          <h3>
            Aproveite a funcionalidade de fórum de discussão da nossa plataforma
            de LMS SaaS. Troque conhecimentos, tire suas dúvidas e participe de
            discussões relevantes sobre os cursos e conteúdos disponíveis.
            Juntos, vamos explorar novas ideias e enriquecer nossa jornada de
            aprendizado.
          </h3>
          <button
            className="btn-purple btn-big"
            onClick={() => navigate("/sign-up")}
          >
            Cadastre-se
          </button>
        </div>
        <div className="right">
          <form onSubmit={handleSubmit}>
            <h2>Login</h2>
            <div className="container-inputs">
              <label htmlFor="email">E-mail</label>
              <input
                type="text"
                name="email"
                value={email}
                onChange={(e) => setEmail(e.target.value)}
              />
            </div>
            <div className="container-inputs">
              <label htmlFor="password">Senha</label>
              <input
                type="password"
                name="password"
                value={password}
                onChange={(e) => setPassword(e.target.value)}
              />
            </div>
            <button className="btn-purple btn-big">Entrar</button>
          </form>
        </div>
      </div>
    </div>
  );
}

export default SignIn;